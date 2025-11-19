<?php include 'config.php'; ?>
<?php
 $getuser = mysqli_query($conn, "select * from admin");
 while($getstorevalue = mysqli_fetch_array($getuser)){
       $username = $getstorevalue['username'];
   
          $password = $getstorevalue['password'];
 }
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Login - <?php echo $password; ?></title>
  <style>
    /* Simple modern form styling */
    :root{
      --bg:#f6f8fa;
      --card:#fff;
      --accent:#2563eb;
      --muted:#6b7280;
      --danger:#ef4444;
      font-family: Inter, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
    }
    body{
      background: linear-gradient(180deg,var(--bg),#fff 60%);
      display:flex;
      min-height:100vh;
      align-items:center;
      justify-content:center;
      margin:0;
      padding:24px;
    }
    .card{
      background:var(--card);
      border-radius:12px;
      box-shadow:0 6px 24px rgba(16,24,40,0.08);
      width:100%;
      max-width:420px;
      padding:28px;
    }
    h1{ margin:0 0 10px; font-size:20px; }
    p.lead{ margin:0 0 18px; color:var(--muted); font-size:14px; }
    label{ display:block; font-size:13px; margin-bottom:6px; color:#111827; }
    .field{ margin-bottom:14px; position:relative; }
    input[type="text"],
    input[type="password"]{
      width:100%;
      padding:10px 40px 10px 12px;
      border-radius:8px;
      border:1px solid #e6e9ee;
      font-size:15px;
      outline:none;
      box-sizing:border-box;
    }
    input:focus{ box-shadow:0 0 0 4px rgba(37,99,235,0.08); border-color:var(--accent); }
    .toggle{
      position:absolute;
      right:8px;
      top:50%;
      transform:translateY(-50%);
      background:transparent;
      border:0;
      color:var(--muted);
      padding:6px;
      cursor:pointer;
      font-size:13px;
    }
    .hint{ font-size:12px; color:var(--muted); margin-top:6px; }
    .error{ color:var(--danger); font-size:13px; margin-top:6px; display:none; }
    button[type="submit"]{
      width:100%;
      padding:10px;
      border-radius:10px;
      border:0;
      background:var(--accent);
      color:#fff;
      font-weight:600;
      cursor:pointer;
      margin-top:8px;
    }
    button[type="submit"]:disabled{ opacity:0.6; cursor:not-allowed; }
  </style>
</head>
<body>
  <form class="card" id="loginForm" action="/login" method="post" novalidate>
    <h1>Sign in</h1>
    <p class="lead">Enter your username and password.</p>

    <div class="field">
      <label for="username">Username</label>
      <input id="username" name="username" type="text" autocomplete="username"
             required minlength="3" maxlength="50" aria-describedby="usernameHelp" />
  
    </div>

    <div class="field">
      <label for="password">Password</label>
      <input id="password" name="password" type="password" autocomplete="current-password"
             required aria-describedby="passwordHelp" />
      <button type="button" class="toggle" id="togglePwd" aria-label="Show password">Show</button>
   
    </div>

    <button type="submit" id="submitBtn">Sign in</button>
  </form>


</body>
</html>
