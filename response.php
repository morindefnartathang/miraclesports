<?php
// response.php
include "admin/admin/include/config.php";
include "session.php";

// Initialize variables
$payment_status = 'failed';
$message = 'Payment processing failed.';
$order_number = '';

// Get payment response from payment gateway (adjust based on your gateway's response)
$transaction_id = isset($_POST['transaction_id']) ? mysqli_real_escape_string($connect, $_POST['transaction_id']) : '';
$payment_status_gateway = isset($_POST['status']) ? strtolower($_POST['status']) : 'failed';
$amount = isset($_POST['amount']) ? $_POST['amount'] : '0';

// Check if we have session data from checkout
if (isset($_SESSION['billing_data']) && isset($_SESSION['event_data'])) {
    $billing_data = $_SESSION['billing_data'];
    $event_data = $_SESSION['event_data'];
    
    // Extract billing details
    $first_name = mysqli_real_escape_string($connect, $billing_data['first_name']);
    $last_name = mysqli_real_escape_string($connect, $billing_data['last_name']);
    $email = mysqli_real_escape_string($connect, $billing_data['email']);
    $address = mysqli_real_escape_string($connect, $billing_data['address']);
    $country = mysqli_real_escape_string($connect, $billing_data['country']);
    $state = mysqli_real_escape_string($connect, $billing_data['state']);
    $city = mysqli_real_escape_string($connect, $billing_data['city']);
    $zip = mysqli_real_escape_string($connect, $billing_data['zip']);
    $phone = mysqli_real_escape_string($connect, $billing_data['phone']);
    
    // Extract event details
    $event_id = $event_data['product_id'];
    $unit_price = $event_data['fees'];
    
    // Order details
    $session_id = mysqli_real_escape_string($connect, session_id());
    $qty = 1;
    $total = $unit_price * $qty;
    $order_number = isset($_SESSION['order_number']) ? $_SESSION['order_number'] : 'ORD-' . date('YmdHis') . '-' . rand(1000, 9999);
    
    // Determine payment status based on gateway response
    if ($payment_status_gateway == 'success' || $payment_status_gateway == 'completed') {
        $payment_status = 'completed';
        $message = 'Payment completed successfully!';
    } else {
        $payment_status = 'failed';
        $message = 'Payment failed. Please try again.';
    }
    
    // Insert into orders table
    $sql = "
        INSERT INTO orders
          (order_number, session_id, event_id, qty, unit_price, total_amount, payment_status,
           first_name, last_name, email, address, country, state, city, zip, phone, transaction_id, created_at)
        VALUES
          ('$order_number', '$session_id', '$event_id', '$qty', '$unit_price', '$total', '$payment_status',
           '$first_name', '$last_name', '$email', '$address', '$country', '$state', '$city', '$zip', '$phone', '$transaction_id', NOW())
    ";
    
    if (mysqli_query($connect, $sql)) {
        $order_id = mysqli_insert_id($connect);
        
        // Clear session data after successful insertion (optional)
        if ($payment_status == 'completed') {
            unset($_SESSION['billing_data'], $_SESSION['event_data'], $_SESSION['order_number'], $_SESSION['sub_total']);
        }
    } else {
        $message .= ' Database error: ' . mysqli_error($connect);
    }
} else {
    $message = 'Session data not found. Please complete the checkout process again.';
}

// If no session data, try to get from POST (payment gateway might send data)
if (!isset($billing_data) && isset($_POST['name'])) {
    // Extract name into first and last name
    $name_parts = explode(' ', $_POST['name']);
    $first_name = mysqli_real_escape_string($connect, $name_parts[0]);
    $last_name = mysqli_real_escape_string($connect, isset($name_parts[1]) ? $name_parts[1] : '');
    $email = mysqli_real_escape_string($connect, isset($_POST['email']) ? $_POST['email'] : '');
    $phone = mysqli_real_escape_string($connect, isset($_POST['phone']) ? $_POST['phone'] : '');
    
    // You might need to adjust these based on what your payment gateway sends
    $address = mysqli_real_escape_string($connect, 'Not provided');
    $country = mysqli_real_escape_string($connect, 'Not provided');
    $state = mysqli_real_escape_string($connect, 'Not provided');
    $city = mysqli_real_escape_string($connect, 'Not provided');
    $zip = mysqli_real_escape_string($connect, 'Not provided');
    
    $session_id = mysqli_real_escape_string($connect, session_id());
    $qty = 1;
    $unit_price = isset($_POST['amount']) ? $_POST['amount'] : 0;
    $total = $unit_price;
    $order_number = 'ORD-' . date('YmdHis') . '-' . rand(1000, 9999);
    $event_id = 0; // You might need to get this from session or elsewhere
    
    $sql = "
        INSERT INTO orders
          (order_number, session_id, event_id, qty, unit_price, total_amount, payment_status,
           first_name, last_name, email, address, country, state, city, zip, phone, transaction_id, created_at)
        VALUES
          ('$order_number', '$session_id', '$event_id', '$qty', '$unit_price', '$total', '$payment_status',
           '$first_name', '$last_name', '$email', '$address', '$country', '$state', '$city', '$zip', '$phone', '$transaction_id', NOW())
    ";
    
    mysqli_query($connect, $sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Response - Miracle Sports</title>
    
    <!-- CSS Style -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" media="all">
    <link rel="stylesheet" type="text/css" href="css/style.css" media="all">
    
    <style>
        .response-container {
            max-width: 600px;
            margin: 100px auto;
            padding: 40px;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .success { background: #d4edda; border: 1px solid #c3e6cb; color: #155724; }
        .failed { background: #f8d7da; border: 1px solid #f5c6cb; color: #721c24; }
        .icon { font-size: 48px; margin-bottom: 20px; }
        .btn { margin: 10px; }
    </style>
</head>
<body>
    <!-- Header -->
    <?php include 'header.php'; ?>

    <div class="container">
        <div class="response-container <?php echo $payment_status; ?>">
            <?php if ($payment_status == 'completed'): ?>
                <div class="icon text-success">
                    <i class="fa fa-check-circle"></i>
                </div>
                <h2>Payment Successful!</h2>
                <p>Thank you for your payment. Your order has been processed successfully.</p>
                <?php if ($order_number): ?>
                    <p><strong>Order Number:</strong> <?php echo htmlspecialchars($order_number); ?></p>
                <?php endif; ?>
                <p>You will receive a confirmation email shortly.</p>
            <?php else: ?>
                <div class="icon text-danger">
                    <i class="fa fa-times-circle"></i>
                </div>
                <h2>Payment Failed</h2>
                <p><?php echo $message; ?></p>
            <?php endif; ?>
            
            <div class="action-buttons">
                <a href="index.php" class="btn btn-primary">Go to Homepage</a>
                <?php if ($payment_status == 'completed'): ?>
                    <a href="my-orders.php" class="btn btn-outline-primary">View My Orders</a>
                <?php else: ?>
                    <a href="checkout.php?event_id=<?php echo isset($event_id) ? $event_id : ''; ?>" class="btn btn-outline-primary">Try Again</a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

    <!-- JavaScript -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>