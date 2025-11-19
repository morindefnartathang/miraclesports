<?php
// checkout.php
include "admin/admin/include/config.php";
include "session.php"; // make sure session_start() happens here
ini_set('display_errors', 0);

// ---------- INPUTS ----------
$EventId = isset($_GET['event_id']) ? (int)$_GET['event_id'] : 0;
if ($EventId <= 0) {
  http_response_code(400);
  exit('Invalid event.');
}

// ---------- LOAD EVENT (prepared) ----------
$eventStmt = mysqli_prepare($connect, "SELECT product_id, product_description, product_image, name, title, date, start_time, end_time, venue, fees, organizer, created_date FROM product WHERE product_id = ?");
mysqli_stmt_bind_param($eventStmt, "i", $EventId);
mysqli_stmt_execute($eventStmt);
$eventRes = mysqli_stmt_get_result($eventStmt);
$fetchEvent = mysqli_fetch_assoc($eventRes);
mysqli_stmt_close($eventStmt);

if (!$fetchEvent) {
  http_response_code(404);
  exit('Event not found.');
}

$product_id         = $fetchEvent['product_id'];
$product_description= $fetchEvent['product_description'];
$product_image      = $fetchEvent['product_image'];
$name               = $fetchEvent['name'];
$title              = $fetchEvent['title'];
$date               = $fetchEvent['date'];        // e.g. 2025-11-28
$start_time_raw     = $fetchEvent['start_time'];  // e.g. 2025-11-28 18:30:00 or 18:30:00
$end_time_raw       = $fetchEvent['end_time'];
$venue              = $fetchEvent['venue'];
$fees               = $fetchEvent['fees'];
$organizer          = $fetchEvent['organizer'];
$created_date       = $fetchEvent['created_date'];

// Normalize start/end into timestamps for display
// If DB stores only time, join with $date.
$start_ts = strtotime(preg_match('/^\d{2}:\d{2}/', $start_time_raw) ? ($date . ' ' . $start_time_raw) : $start_time_raw);
$end_ts   = strtotime(preg_match('/^\d{2}:\d{2}/', $end_time_raw)   ? ($date . ' ' . $end_time_raw)   : $end_time_raw);
$formatted_start = $start_ts ? date("D, M j, Y g:i A", $start_ts) : '';
$formatted_end   = $end_ts   ? date("g:i A", $end_ts) : '';
$duration_hours  = ($start_ts && $end_ts) ? round(($end_ts - $start_ts) / 3600, 1) : null;

// ---------- FORM STATE ----------
$billing = isset($_SESSION['billing']) ? $_SESSION['billing'] : array();
$errors  = isset($_SESSION['billing_errors']) ? $_SESSION['billing_errors'] : array();
unset($_SESSION['billing_errors']); // show errors only once

// ---------- HELPERS ----------
function old($key, $default = '') {
  global $billing;
  return htmlspecialchars(isset($billing[$key]) ? $billing[$key] : $default, ENT_QUOTES, 'UTF-8');
}
function err($key) {
  global $errors;
  return empty($errors[$key]) ? '' : '<div class="text-danger small mt-1">'
         . htmlspecialchars($errors[$key], ENT_QUOTES, 'UTF-8') . '</div>';
}

// ---------- CSRF ----------
if (empty($_SESSION['csrf_token'])) {
  if (function_exists('random_bytes')) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
  } elseif (function_exists('openssl_random_pseudo_bytes')) {
    $_SESSION['csrf_token'] = bin2hex(openssl_random_pseudo_bytes(32));
  } else {
    $_SESSION['csrf_token'] = bin2hex(pack('N4', mt_rand(), mt_rand(), mt_rand(), mt_rand()));
  }
}

// ---------- POST HANDLER ----------
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm_pay'])) {
  $errors = array();

  // CSRF check
  $csrf_session = isset($_SESSION['csrf_token']) ? $_SESSION['csrf_token'] : '';
  $csrf_post    = isset($_POST['csrf_token']) ? $_POST['csrf_token'] : '';
  if (!$csrf_session || !$csrf_post || !hash_equals($csrf_session, $csrf_post)) {
    http_response_code(400);
    exit('Invalid CSRF token');
  }

  // Collect fields
  $first_name = isset($_POST['first_name']) ? trim($_POST['first_name']) : '';
  $last_name  = isset($_POST['last_name']) ? trim($_POST['last_name']) : '';
  $email      = isset($_POST['email']) ? trim($_POST['email']) : '';
  $address    = isset($_POST['address']) ? trim($_POST['address']) : '';
  $country    = isset($_POST['country']) ? trim($_POST['country']) : '';
  $state      = isset($_POST['state']) ? trim($_POST['state']) : '';
  $city       = isset($_POST['city']) ? trim($_POST['city']) : '';
  $zip        = isset($_POST['zip']) ? trim($_POST['zip']) : '';
  $phone      = isset($_POST['phone']) ? trim($_POST['phone']) : '';

  // Basic validation
  if ($first_name === '') $errors['first_name'] = 'First name is required';
  if ($last_name === '')  $errors['last_name']  = 'Last name is required';
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors['email'] = 'Valid email required';
  if ($address === '') $errors['address'] = 'Address is required';
  if ($country === '') $errors['country'] = 'Country is required';
  if ($state === '')   $errors['state']   = 'State is required';
  if ($city === '')    $errors['city']    = 'City is required';
  if ($zip === '')     $errors['zip']     = 'Zip/Post Code is required';
  if ($phone === '')   $errors['phone']   = 'Phone number is required';

  if (empty($errors)) {
    // Store all data in session for pay.php
    $_SESSION['billing_data'] = array(
      'first_name' => $first_name,
      'last_name'  => $last_name,
      'email'      => $email,
      'address'    => $address,
      'country'    => $country,
      'state'      => $state,
      'city'       => $city,
      'zip'        => $zip,
      'phone'      => $phone
    );

    $_SESSION['event_data'] = array(
      'product_id' => $product_id,
      'title' => $title,
      'fees' => $fees,
      'venue' => $venue
    );

    // Generate order details
    $_SESSION['order_number'] = 'ORD-' . date('YmdHis') . '-' . rand(1000, 9999);
    $_SESSION['sub_total'] = $fees;

    // Redirect to pay.php
    header("Location: pay.php");
    exit();

  } else {
    $_SESSION['billing'] = array(
      'first_name' => $first_name,
      'last_name'  => $last_name,
      'email'      => $email,
      'address'    => $address,
      'country'    => $country,
      'state'      => $state,
      'city'       => $city,
      'zip'        => $zip,
      'phone'      => $phone
    );
    $_SESSION['billing_errors'] = $errors;
    
    // Redirect back to checkout page to show errors
    header("Location: checkout.php?event_id=" . $EventId);
    exit();
  }
}
?>
<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, shrink-to-fit=9">
  <meta name="description" content="Gambolthemes">
  <meta name="author" content="Gambolthemes">
  <title>Miracle Sports</title>

  <!-- Favicon Icon -->
  <link rel="icon" type="image/png" href="images/fav.png">

  <!-- Stylesheets -->
  <link rel="preconnect" href="https://fonts.googleapis.com/">
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <link href="vendor/unicons-2.0.1/css/unicons.css" rel="stylesheet">
  <link href="css/styles.css" rel="stylesheet">
  <link href="css/responsive.css" rel="stylesheet">
  <link href="css/night-mode.css" rel="stylesheet">

  <!-- Vendor Stylesheets -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="vendor/OwlCarousel/assets/owl.carousel.css" rel="stylesheet">
  <link href="vendor/OwlCarousel/assets/owl.theme.default.min.css" rel="stylesheet">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column h-100">
  <!-- Header Start-->
  <?php include "header.php";?>
  <!-- Header End-->

  <div class="wrapper">
    <div class="breadcrumb-block">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-10">
            <div class="barren-breadcrumb">
              <nav aria-label="breadcrumb">
                <!-- breadcrumb optional -->
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="event-dt-block p-80">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <div class="main-title checkout-title">
              <h3>Order Confirmation</h3>
            </div>
          </div>

          <!-- FORM -->
          <form method="post" autocomplete="on" novalidate style="display:flex;column-gap:20px">
            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES, 'UTF-8') ?>">

            <div class="checkout-block">
              <div class="main-card">
                <div class="bp-title">
                  <h4>Billing information</h4>
                </div>
                <div class="bp-content bp-form">
                  <div class="row">
                    <div class="col-lg-6 col-md-12">
                      <div class="form-group mt-4">
                        <label class="form-label">First Name*</label>
                        <input class="form-control h_50" type="text" name="first_name" value="<?= old('first_name') ?>">
                        <?= err('first_name') ?>
                      </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                      <div class="form-group mt-4">
                        <label class="form-label">Last Name*</label>
                        <input class="form-control h_50" type="text" name="last_name" value="<?= old('last_name') ?>">
                        <?= err('last_name') ?>
                      </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                      <div class="form-group mt-4">
                        <label class="form-label">Email*</label>
                        <input class="form-control h_50" type="email" name="email" value="<?= old('email') ?>">
                        <?= err('email') ?>
                      </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                      <div class="form-group mt-4">
                        <label class="form-label">Phone Number*</label>
                        <input class="form-control h_50" type="tel" name="phone" value="<?= old('phone') ?>">
                        <?= err('phone') ?>
                      </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                      <div class="form-group mt-4">
                        <label class="form-label">Address*</label>
                        <input class="form-control h_50" type="text" name="address" value="<?= old('address') ?>">
                        <?= err('address') ?>
                      </div>
                    </div>
                    
                    <div class="col-lg-6 col-md-12">
                      <div class="form-group mt-4">
                        <label class="form-label">Country*</label>
                        <input class="form-control h_50" type="text" name="country" value="<?= old('country') ?>">
                        <?= err('country') ?>
                      </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                      <div class="form-group mt-4">
                        <label class="form-label">State*</label>
                        <input class="form-control h_50" type="text" name="state" value="<?= old('state') ?>">
                        <?= err('state') ?>
                      </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                      <div class="form-group mt-4">
                        <label class="form-label">City/Suburb*</label>
                        <input class="form-control h_50" type="text" name="city" value="<?= old('city') ?>">
                        <?= err('city') ?>
                      </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                      <div class="form-group mt-4">
                        <label class="form-label">Zip/Post Code*</label>
                        <input class="form-control h_50" type="text" name="zip" value="<?= old('zip') ?>">
                        <?= err('zip') ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div> <!-- /main-card -->
            </div> <!-- /checkout-block -->

            <!-- Order summary -->
            <div class="col-xl-4 col-lg-12 col-md-12">
              <div class="main-card order-summary">
                <div class="bp-title">
                  <h4>Order Summary</h4>
                </div>
                <div class="order-summary-content p_30">
                  <div class="event-order-dt">
                    <div class="event-thumbnail-img">
                      <img src="admin/admin/acheivement/<?php echo $product_image;?>" alt="">
                    </div>
                    <div class="event-order-dt-content">
                      <h5><?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?></h5>
                      <span><?php echo htmlspecialchars($formatted_start, ENT_QUOTES, 'UTF-8'); ?><?php if($formatted_end){ echo ' - ' . htmlspecialchars($formatted_end, ENT_QUOTES, 'UTF-8'); } ?></span>
                      <div class="category-type"><?php echo htmlspecialchars($venue, ENT_QUOTES, 'UTF-8'); ?></div>
                    </div>
                  </div>
                  <div class="order-total-block">
                    <div class="order-total-dt">
                      <div class="order-text">Total</div>
                      <div class="order-number">₹<?php echo htmlspecialchars(number_format((float)$fees, 2), ENT_QUOTES, 'UTF-8'); ?></div>
                    </div>
                  </div>
                  <div class="confirmation-btn">
                    <button type="submit" class="main-btn btn-hover h_50 w-100 mt-5" name="confirm_pay" value="1">
                      Confirm & Pay
                    </button>
                    <span>Price is inclusive of all applicable GST</span>
                  </div>
                </div>
              </div>
            </div>
          </form>
          <!-- /FORM -->
        </div>
      </div>
    </div>
  </div>

  <!-- Footer Start-->
  <?php include "footer.php";?>
  <!-- Footer End-->

  <!-- JS -->
  <script src="js/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/OwlCarousel/owl.carousel.js"></script>
  <script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="js/night-mode.js"></script>
</body>
</html>