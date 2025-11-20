<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
//---> Connect to DB --->
// $DB_HOST = 'localhost';
// $DB_USER = 'miracle_sports';
// $DB_PASS = 'miracle_sports';
// $DB_NAME = 'miracle_sports';
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = ''; // empty password
$DB_NAME = 'miracle_sports';




$RAZORPAY_KEY_ID = 'rzp_live_RNMzQuA335JiZx';
$RAZORPAY_KEY_SECRET = 'isi3FUWZ60J7DcNawpiIkpgM';



// config.php
define('APP_SECRET_KEY_HEX', 'PUT_64_HEX_HERE'); // e.g. 64 hex chars from bin2hex(random_bytes(32))
// OR: define('APP_SECRET_KEY_HEX', trim(@file_get_contents(__DIR__.'/.app_key')));




$connect = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);

if (!$connect) {
    die('Connect Error : (' . mysqli_connect_errno() . ')<hr/>'. mysqli_connect_error());
}

function EncodeURL($url)
{
$new = strtolower(ereg_replace(' ','_',$url));
return($new);
}

function DecodeURL($url)
{
$new = ucwords(ereg_replace('_',' ',$url));
return($new);
}

/*************************************
			        Alert
*************************************/

function pageStatus($status_type)
{
  if($status_type == 'added')  {  
  echo '<div class="alert alert-success"><button data-dismiss="alert" class="close"></button><strong>Record created succesfully</strong>   </div>'; 
  }
  else if($status_type == 'updated')  {
  echo '<div class="alert alert-success"><button data-dismiss="alert" class="close"></button><strong>Record Updated succesfully</strong></div>';
  } 
  else if($status_type == 'deleted')  {
  echo '<div class="alert alert-danger"><button data-dismiss="alert" class="close"></button><strong>Record removed succesfully</strong></div>';
  }
  else if($status_type == 'log_out')  {
    echo '<div class="alert alert-success"><button data-dismiss="alert" class="close"></button><strong>Logged out successfully.  Thankyou for using me:)</strong></div>';
  }else if($status_type == 'loggedIN')  {
    echo '<div class="alert alert-success"><button data-dismiss="alert" class="close"></button><strong>Welcome admin.  Check what you got today.</strong></div>';
  }
}

//page error
function errorStatus($edit_type)
{
  if(!empty($edit_type))  { 
  echo '<div class="alert alert-danger"><button data-dismiss="alert" class="close"></button><strong>';
  foreach ($edit_type as $e) { echo "$e <br>"; }  
  echo '</strong></div>';
  }
}


// ?>