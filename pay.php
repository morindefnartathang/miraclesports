<?php
include "admin/admin/include/config.php";
include "session.php";

// Check if session data exists
if (!isset($_SESSION['billing_data']) || !isset($_SESSION['event_data'])) {
    header("Location: index.php");
    exit();
}

// Get data from session
$billing_data = $_SESSION['billing_data'];
$event_data = $_SESSION['event_data'];

// Billing details
$first_name = $billing_data['first_name'];
$last_name = $billing_data['last_name'];
$billing_name = $first_name . ' ' . $last_name;
$billing_email = $billing_data['email'];
$billing_phone = $billing_data['phone'];
$billing_address = $billing_data['address'];
$billing_city = $billing_data['city'];
$billing_state = $billing_data['state'];
$billing_country = $billing_data['country'];
$billing_zip = $billing_data['zip'];

// Event details
$product_id = $event_data['product_id'];
$event_title = $event_data['title'];
$event_fees = $event_data['fees'];
$event_venue = $event_data['venue'];

// Order details
$sub_total = isset($_SESSION['sub_total']) ? $_SESSION['sub_total'] : $event_fees;
$billing_id = isset($_SESSION['order_number']) ? $_SESSION['order_number'] : 'ORD-' . date('YmdHis') . '-' . rand(1000, 9999);

// Your existing payment configuration
$famt = base64_encode($sub_total);
$responseurl = "https://miraclesports.in/response.php";
$secretKey = "HM5GPofrdArBLVyb4pbhacyYMXe2SGCqA2vtBDzzn5VFa9ZWE7s=";
$QPayID = 'REBTIapiacc`' . $famt; 
$QPayPWD = 'rebti!123';

$TransactionType = "PURCHASE";
$Currency = 'INR';
$Mode = 'live';

$secure_hash_data = $secretKey . "|" . $responseurl . "|" . $QPayID . "|" . $QPayPWD . "|" . $TransactionType . "|" . $billing_id . "|" . $Currency . "|" . $Mode . "|" . $billing_name . "|" . $billing_email . "|" . $billing_phone;
$secure_hash = strtoupper(hash('sha512', $secure_hash_data));

$session_id = session_id();
$registered_users_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

// Clear session data after use (optional)
// unset($_SESSION['billing_data'], $_SESSION['event_data'], $_SESSION['order_number'], $_SESSION['sub_total']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>Payment Confirmation - Miracle Sports</title>

<!-- Favicons Icon -->
<link rel="icon" href="#" type="image/x-icon" />
<link rel="shortcut icon" href="#" type="image/x-icon" />

<!-- Mobile Specific -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS Style -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" media="all">
<link rel="stylesheet" type="text/css" href="css/simple-line-icons.css" media="all">
<link rel="stylesheet" type="text/css" href="css/style.css" media="all">
<link rel="stylesheet" type="text/css" href="css/revslider.css" >
<link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="css/owl.theme.css">
<link rel="stylesheet" type="text/css" href="css/flexslider.css">
<link rel="stylesheet" type="text/css" href="css/jquery.mobile-menu.css">

<!-- Google Fonts -->
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Poppins:400,300,500,600,700' rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/css?family=Kaushan+Script&amp;subset=latin-ext" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
<style>
    /* Your existing CSS styles */
    .main-container { background: #f5f7fa; padding: 40px 0; font-family: Arial, sans-serif; }
    .col-main { background: #fff; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.08); padding: 30px; transition: 0.3s; margin-left: 150px; }
    .col-main:hover { box-shadow: 0 6px 18px rgba(0,0,0,0.12); }
    .page-title h2 { font-size: 24px; text-align: center; color: #333; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 20px; position: relative; }
    .page-title h2::after { content: ""; display: block; width: 60px; height: 3px; background: #007bff; margin: 8px auto 0; border-radius: 2px; }
    .col-md-12 .container { background: #f9f9f9; border: 1px solid #eee; border-radius: 6px; padding: 20px; margin-bottom: 20px; }
    .col-md-12 .container p { font-size: 15px; color: #555; margin: 8px 0; }
    .col-md-12 .container p strong { color: #333; }
    .btn.btn-primary.btn-lg { display: inline-block; background: #007bff; color: #fff; padding: 12px 30px; font-size: 16px; border: none; border-radius: 30px; cursor: pointer; text-transform: uppercase; transition: background 0.3s ease; }
    .btn.btn-primary.btn-lg:hover { background: #0056b3; }
    .btn-wrapper { text-align: center; margin-top: 20px; }
    .btn.btn-transparent { background: transparent; border: 1px solid #ccc; color: #555; padding: 8px 20px; font-size: 14px; border-radius: 30px; transition: 0.3s ease; text-decoration: none; }
    .btn.btn-transparent:hover { border-color: #007bff; color: #007bff; }
    div#offcanvasNavbar{
        display:none !important;
    }
</style>
</head>

<body class="checkout-page">
<div id="page"> 
<!-- Header -->
  <?php include'header.php';?>
  <!-- end header --> 
  
  <!-- Main Container -->
  <section class="main-container col2-left-layout" style="margin-top:100px;">
    <div class="container">
      <div class="row">
        <div class="col-sm-9 col-sm-push-0">
          <article class="col-main">
            <div class="page-title">
              <h2>Payment Confirmation</h2>
            </div>
            <div class="col-md-12">
              
              <!-- Order Information -->
              <div style="background: #e8f5e8; border: 1px solid #c8e6c9; border-radius: 6px; padding: 15px; margin-bottom: 20px; text-align: center;">
                <strong>Order Number:</strong> <?php echo htmlspecialchars($billing_id); ?>
              </div>

              <!-- Event Summary -->
              <div style="background: #f0f8ff; border: 1px solid #d1e7ff; border-radius: 6px; padding: 20px; margin-bottom: 20px;">
                <h5 style="color: #007bff; margin-bottom: 15px;">Event Details</h5>
                <p><strong>Event:</strong> <?php echo htmlspecialchars($event_title); ?></p>
                <p><strong>Amount:</strong> ₹<?php echo number_format($event_fees, 2); ?></p>
                <p><strong>Venue:</strong> <?php echo htmlspecialchars($event_venue); ?></p>
              </div>

              <!-- Billing Information -->
              <div class="container">
                <h5>Billing Information</h5>
                <p><strong>Name:</strong> <?php echo htmlspecialchars($billing_name); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($billing_email); ?></p>
                <p><strong>Phone:</strong> <?php echo htmlspecialchars($billing_phone); ?></p>
                <p><strong>Address:</strong> <?php echo htmlspecialchars($billing_address); ?></p>
                <p><strong>City:</strong> <?php echo htmlspecialchars($billing_city); ?></p>
                <p><strong>State:</strong> <?php echo htmlspecialchars($billing_state); ?></p>
                <p><strong>Country:</strong> <?php echo htmlspecialchars($billing_country); ?></p>
                <p><strong>Zip Code:</strong> <?php echo htmlspecialchars($billing_zip); ?></p>
              </div>

              <!-- Payment Form -->
              <form id="qpay_form" name="qpay_form" action="https://pg.qpayindia.com/wwws/payment/paymentdetails.aspx" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="name" value="<?php echo htmlspecialchars($billing_name); ?>" />
                <input type="hidden" name="phone" value="<?php echo htmlspecialchars($billing_phone); ?>"/>
                <input type="hidden" name="email" value="<?php echo htmlspecialchars($billing_email); ?>" />
                <input type="hidden" name="amount" value="<?php echo htmlspecialchars($sub_total); ?>" />

                <input type="hidden" name="QPayID" value="<?php echo htmlspecialchars($QPayID); ?>" />
                <input type="hidden" name="QPayPWD" value="<?php echo htmlspecialchars($QPayPWD); ?>" />
                <input type="hidden" name="secure_hash" value="<?php echo htmlspecialchars($secure_hash); ?>"/>
                <input type="hidden" name="ResponseURL" id="ResponseURL" value="<?php echo htmlspecialchars($responseurl); ?>" />

                <input type="hidden" name="TransactionType" id="TransactionType" value="PURCHASE" />
                <input type="hidden" name="OrderID" id="OrderID" value="<?php echo htmlspecialchars($billing_id); ?>" />
                <input type="hidden" name="Mode" id="Mode" value="<?php echo htmlspecialchars($Mode); ?>" />
                <input type="hidden" name="PaymentPageRequired" id="PaymentPageRequired" value="Y" />
                <input type="hidden" name="Paymentoption" id="Paymentoption" value="C,D,U,N,W" />
                <input type="hidden" name="Currency" id="Currency" value="INR" />
                <input type="hidden" readonly name="Submerchantname" value="Miracle Sports" />
                <input type="hidden" name="session_id" id="session_id" value="<?php echo htmlspecialchars($session_id); ?>" />
                
                <?php if (!empty($registered_users_id)): ?>
                <input type="hidden" name="registered_users_id" id="registered_users_id" value="<?php echo htmlspecialchars($registered_users_id); ?>" />
                <?php endif; ?>

                <div class="col-sm-4">&nbsp;</div>
                <div class="col-sm-5">
                  <center>
                    <button type="submit" class="btn btn-primary btn-lg" name="add" value="Create">
                      Proceed to Payment - ₹<?php echo number_format($sub_total, 2); ?>
                    </button>
                  </center>
                </div>
              </form>
            </div>
            
            <div class="btn-wrapper">
              <a href="index.php" class="btn btn-transparent">
                <i class="fas fa-long-arrow-alt-left"></i> BACK TO HOME
              </a>
            </div>
          </article>
        </div>
      </div>
    </div>
  </section>
  
  <!-- Footer -->
  <?php include'footer.php';?>
</div>

<?php include'mobilemenu.php';?>

<!-- JavaScript --> 
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script> 
<script type="text/javascript" src="js/bootstrap.min.js"></script> 
<script type="text/javascript" src="js/revslider.js"></script> 
<script type="text/javascript" src="js/common.js"></script> 
<script type="text/javascript" src="js/owl.carousel.min.js"></script> 
<script type="text/javascript" src="js/jquery.mobile-menu.min.js"></script>
</body>
</html>