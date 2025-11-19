<?php
// session.php (bootstrap + POST handler)

// ========== Session bootstrap ==========
ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);

// Optional, for older PHP to approximate SameSite
if (function_exists('ini_set')) {
    ini_set('session.cookie_samesite', 'Lax'); // or 'Strict' if entirely same-site
}

$https = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off');

session_name('app_sess'); // custom name

// Old-style cookie params for broad compatibility
$lifetime = 0;
$path = '/';
$domain = '';
$secure = $https;
$httponly = true;
session_set_cookie_params($lifetime, $path, $domain, $secure, $httponly);

session_start();

// First run: mitigate fixation
if (!isset($_SESSION['__init'])) {
    $_SESSION['__init'] = time();
    session_regenerate_id(true);
}

// Ensure a stable guest id
if (empty($_SESSION['guest_id'])) {
    if (function_exists('random_bytes')) {
        $_SESSION['guest_id'] = bin2hex(random_bytes(16));
    } elseif (function_exists('openssl_random_pseudo_bytes')) {
        $_SESSION['guest_id'] = bin2hex(openssl_random_pseudo_bytes(16));
    } else {
        // Weak fallback, should rarely be needed
        $_SESSION['guest_id'] = bin2hex(pack('N4', mt_rand(), mt_rand(), mt_rand(), mt_rand()));
    }
    $_SESSION['created_at'] = time();
}
$_SESSION['last_seen'] = time();

// Inactivity soft-expiry (30 minutes)
$INACTIVITY_LIMIT = 30 * 60;
if (isset($_SESSION['last_action']) && (time() - $_SESSION['last_action'] > $INACTIVITY_LIMIT)) {
    $_SESSION = [
        'guest_id'   => $_SESSION['guest_id'],
        'created_at' => $_SESSION['created_at'],
    ];
    session_regenerate_id(true);
}
$_SESSION['last_action'] = time();

?>