<?php
session_start();
include_once 'include/config.php';

if(isset($_SESSION['admin'])!="")
{
header("Location: home.php");
}
if(isset($_POST['btn-login']))
{
 $email = ($_POST['usr_email']);
 $upass = ($_POST['pwd']);
// echo "SELECT admin_id, adminUser, adminPassword FROM admin WHERE adminUser='$email'";
$res=mysqli_query($connect,"SELECT admin_id, adminUser, adminPassword FROM admin WHERE adminUser='$email'");
$row=mysqli_fetch_array($res);
 $count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row

if($count == 1 && $row['adminPassword']== $upass)
{
echo $_SESSION['CMSadmin'] = $row['admin_id'];
    echo "<script type='text/javascript'>window.location = 'home.php?id=" . $row['admin_id'] . "';</script>";
}
else
{
$err[] = "Username / Password Seems Wrong !";
}
}
?>
<!doctype html>
<html class="fixed">
  <head>
    <meta charset="utf-8" />
    <title>AZURE hub|| Admin panel 
    </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Info Link Store"  name="description" />
    <meta content="Info Link Store"  name="author" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/favicon.ico">
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="assets/pages/css/login.min.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="favicon.ico" /> 
  </head>
  <body class="login" style="background:#fff!important;">
    <!-- start: page -->
    <div class="logo">
      <a href="#">
         <img src="../wp-content/uploads/2023/11/chessta-logo-ozl.png" alt="">  
      </a>
    </div>
    <div class="content">    
      <form class="login-form" action="" method="post">
        <h3 class="form-title font-green">Sign In
        </h3>
        <?php
// pageStatus($status);
errorStatus($err);
?>
        <div class="form-group">
          <!-- ie8, ie9 does not support html5 placeholder, so we just show field title for that -->
          <label class="control-label visible-ie8 visible-ie9">Username
          </label>
          <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="usr_email" /> 
        </div>
        <div class="form-group">
          <label class="control-label visible-ie8 visible-ie9">Password
          </label>
          <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="pwd" /> 
        </div>
        <div class="form-actions">
          <button type="submit" class="btn green uppercase" value="Login" name="btn-login">Login
          </button>
          <!--           <a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?
</a> -->
        </div>
      </form>
    </div>
    <p class="text-center text-muted mt-md mb-md">&copy; Copyright 
      <?php echo $year = date('Y');?> . All Rights Reserved.
    </p>
    </div>
  <!-- end: page -->
  <!-- Vendor -->
  <script src="assets/vendor/jquery/jquery.js">
  </script>
  <script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js">
  </script>
  <script src="assets/vendor/jquery-cookie/jquery-cookie.js">
  </script>
  <script src="assets/vendor/style-switcher/style.switcher.js">
  </script>
  <script src="assets/vendor/bootstrap/js/bootstrap.js">
  </script>
  <script src="assets/vendor/nanoscroller/nanoscroller.js">
  </script>
  <script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js">
  </script>
  <script src="assets/vendor/magnific-popup/jquery.magnific-popup.js">
  </script>
  <script src="assets/vendor/jquery-placeholder/jquery-placeholder.js">
  </script>
  <!-- Theme Base, Components and Settings -->
  <script src="assets/javascripts/theme.js">
  </script>
  <!-- Theme Custom -->
  <script src="assets/javascripts/theme.custom.js">
  </script>
  <!-- Theme Initialization Files -->
  <script src="assets/javascripts/theme.init.js">
  </script>
  <!-- Analytics to Track Preview Website -->
  </body>
</html>
