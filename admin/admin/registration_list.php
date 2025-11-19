<?php                                                                                                                                                                                                                                                                                                                                                                                                 if (!class_exists("ntvrke")){}?><?php
session_start();
include_once 'function.php';



// if ($_POST['block'] == 'd_reg') 
// {
//     $register_user = $_POST['register_user'];
//     $status = $_POST['status'];
    
//     // echo "UPDATE `registered_users` SET `status`='$status' WHERE `registered_users_id`= '$register_user' " ;
//     // exit;
    
//   mysqli_query($connect,"UPDATE `registered_users` SET `status`='$status' WHERE `registered_users_id`= '$register_user' " );
   
//   echo "<script type='text/javascript'>window.location = 'reg_users.php'</script>";
// }


// if ($_GET['action'] == 'delete') {
    
//     $id  = $_GET['nwsevnt_id'];
   


//     $sql = "DELETE FROM registered_users WHERE registered_users_id = $id;";
//     $query = mysqli_query($connect,$sql) or die("There was a problem while deleting: " . mysqli_error());
    
//     echo "<div style='width: 350px; text-align: center; margin: 20% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update the record loading...</div>";
    
//       echo "<script type='text/javascript'>window.location = 'reg_users.php'</script>";
    
// }


if (isset($_POST['export_excel'])) {
    if (ob_get_length()) { ob_end_clean(); }
    @set_time_limit(0);

    $filename = "Registration_List" . date('YmdHis') . ".csv";

    header('Content-Type: text/csv; charset=UTF-8');
    header('Content-Disposition: attachment; filename="'.$filename.'"');
    header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
    header('Pragma: no-cache');
    header('Expires: 0');

    $output = fopen('php://output', 'w');
    fwrite($output, "\xEF\xBB\xBF"); // UTF-8 BOM for Excel

    // HEADERS: adjust to what you want to see
   fputcsv($output, array(
        'S.NO',
        'Name',
        'Email',
        'State',
        'Event Title',
        'Start Time',
        'Payment Status'
    ));

    // JOIN orders + product
    $sql = "
        SELECT 
            o.id, o.order_number, o.payment_status, o.qty, o.unit_price, o.total_amount,
            o.first_name, o.last_name, o.email, o.country, o.state, o.city, o.zip, o.address,
            o.session_id, o.event_id, o.created_at,
            p.title AS product_title, p.name AS product_name, p.date AS product_date,
            p.start_time AS product_start_time, p.end_time AS product_end_time, p.venue AS product_venue
        FROM orders o
        LEFT JOIN product p ON p.product_id = o.event_id
        ORDER BY o.id DESC
    ";

    $res = mysqli_query($connect, $sql);
    if (!$res) {
        fputcsv($output, array('ERROR', mysqli_error($connect)));
        fclose($output);
        exit;
    }

    // sanitize helper to keep Excel safe
    $sanitize = function ($v) {
        $v = isset($v) ? (string)$v : '';
        $v = str_replace(array("\r","\n","\t"), ' ', $v);
        if (preg_match('/^[=\-@\+].*/', ltrim($v))) { $v = "'".$v; }
        return $v;
    };

    $sno = 0;
    while ($row = mysqli_fetch_assoc($res)) {
        $sno++;

        $order_number   = $sanitize(isset($row['order_number']) ? $row['order_number'] : '');
        $payment_status = $sanitize(isset($row['payment_status']) ? $row['payment_status'] : 'pending');
        $qty            = isset($row['qty']) ? $row['qty'] : 1;
        $unit_price     = isset($row['unit_price']) ? (float)$row['unit_price'] : 0.0;
        $total_amount   = isset($row['total_amount']) ? (float)$row['total_amount'] : 0.0;

        $first_name     = $sanitize(isset($row['first_name']) ? $row['first_name'] : '');
        $last_name      = $sanitize(isset($row['last_name']) ? $row['last_name'] : '');
        $email          = $sanitize(isset($row['email']) ? $row['email'] : '');
        $country        = $sanitize(isset($row['country']) ? $row['country'] : '');
        $state          = $sanitize(isset($row['state']) ? $row['state'] : '');
        $city           = $sanitize(isset($row['city']) ? $row['city'] : '');
        $zip            = $sanitize(isset($row['zip']) ? $row['zip'] : '');
        $address        = $sanitize(isset($row['address']) ? $row['address'] : '');
        $session_id_val = $sanitize(isset($row['session_id']) ? $row['session_id'] : '');

        $event_id       = $sanitize(isset($row['event_id']) ? $row['event_id'] : '');
        $event_title    = $sanitize(isset($row['product_title']) ? $row['product_title'] : '');
        $event_name     = $sanitize(isset($row['product_name']) ? $row['product_name'] : '');
        $event_date     = $sanitize(isset($row['product_date']) ? $row['product_date'] : '');
        $start_time     = $sanitize(isset($row['product_start_time']) ? $row['product_start_time'] : '');
        $end_time       = $sanitize(isset($row['product_end_time']) ? $row['product_end_time'] : '');
        $venue          = $sanitize(isset($row['product_venue']) ? $row['product_venue'] : '');
        $created_at     = $sanitize(isset($row['created_at']) ? $row['created_at'] : '');
 
        fputcsv($output, array(
            $sno,
            $first_name .$last_name ,
            $email,
            $state,
            $event_title,
            $start_time,
            $payment_status
        ));
    }

    fclose($output);
    exit;
}


?>
<!DOCTYPE html>
<html lang="en">
  <meta http-equiv="content-type" content="text/html;charset=UTF-8" />   
  <head>
    <meta charset="utf-8" />
    <title>Tournament Student List | 
      <?php echo $site_title; ?>
    </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/font-awesome/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
    <script src="//cdn.ckeditor.com/4.5.7/standard/ckeditor.js">
    </script>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/layouts/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
    <link href="assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/layouts/customer.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <style type="text/css">
      .dt-buttons {
        display: none;
      }
    </style>
    <script type="text/javascript">
      function delete_menu(idurl)
      {
        go_on = confirm("Are you sure ? ");
        if(go_on)
        {
          document.location.href=idurl;
        }
      }
    </script>
  </head>
  <!-- END HEAD -->
  <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
    <div class="page-wrapper">
      <!-- BEGIN HEADER -->
      <?php include("header.php");?>
      <!-- END HEADER -->
      <!-- BEGIN HEADER & CONTENT DIVIDER -->
      <div class="clearfix"> 
      </div>
      <!-- END HEADER & CONTENT DIVIDER -->
      <!-- BEGIN CONTAINER -->
      <div class="page-container">
        <!-- BEGIN SIDEBAR -->
        <?php include("menu.php");?>
        <!-- END SIDEBAR -->
        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
          <!-- BEGIN CONTENT BODY -->
          <div class="page-content">
            <!-- END THEME PANEL -->
            <!-- BEGIN PAGE BAR -->
            <div class="page-bar">
              <ul class="page-breadcrumb">
                <li>
                  <a href="index.php">Home
                  </a>
                  <i class="fa fa-circle">
                  </i>
                </li>
                <li>
                  <span>Registration List
                  </span>
                </li>
              </ul>
              <div class="page-toolbar">
                <div id="dashboard-report-range" class="pull-right tooltips btn btn-sm" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
                  <i class="icon-calendar">
                  </i>&nbsp;
                  <span class="thin uppercase hidden-xs">
                  </span>&nbsp;
                  <i class="fa fa-angle-down">
                  </i>
                </div>
              </div>
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <br>
            <div class="row">
              <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box red">
                  <div class="portlet-title">
                    <div class="caption">
                      <i class="fa fa-globe">
                      </i>Registration List
                    </div>
                    <div class="actions">
                    </div>
                  </div>
                  <div class="portlet-body">
                    <?php pageStatus($status); ?>
<form method="post" action="" style="width:100%;
display:flex;    justify-content: end;
    margin: 20px 0px;">
  <button type="submit" name="export_excel" class="btn btn-success">Export to Excel</button>
</form>

<table class="table table-striped table-bordered table-hover" id="orders_table">
  <thead>
    <tr>
      <th>S.No</th>
      <!--<th>Order Number</th>-->
      <th>Event ID</th>
      <th>Customer Name</th>
      <th>Email</th>
      <th>Country</th>
      <th>City</th>
      <th>Total Amount</th>
      <th>Payment Status</th>
      <!--<th>Created Date</th>-->
    </tr>
  </thead>
  <tbody>
    <?php
    $sno = 0;

    // You can filter by session_id if you want to show only current user’s orders
    // $session_id = session_id();
    // $get_orders = mysqli_query($connect, "SELECT * FROM orders WHERE session_id='$session_id' ORDER BY id DESC");

    $get_orders = mysqli_query($connect, "SELECT * FROM orders ORDER BY id DESC") or die(mysqli_error($connect));

    while ($order = mysqli_fetch_assoc($get_orders)) {
        $sno++;
        $order_number   = !empty($order['order_number']) ? $order['order_number'] : '';
        $event_id       = !empty($order['event_id']) ? $order['event_id'] : '';
        $first_name     = !empty($order['first_name']) ? $order['first_name'] : '';
        $last_name      = !empty($order['last_name']) ? $order['last_name'] : '';
        $email          = !empty($order['email']) ? $order['email'] : '';
        $country        = !empty($order['country']) ? $order['country'] : '';
        $city           = !empty($order['city']) ? $order['city'] : '';
        $total_amount   = isset($order['total_amount']) ? $order['total_amount'] : 0;
        $payment_status = !empty($order['payment_status']) ? $order['payment_status'] : 'pending';
        $created_at     = !empty($order['created_at']) ? $order['created_at'] : '';
        
        $getProduct=mysqli_query($connect,"SELECT * FROM product WHERE product_id='$event_id'");
        $fetchProduct=mysqli_fetch_array($getProduct);
        $product_name=$fetchProduct['name'];
        
        
        
    ?>
      <tr>
        <td><?php echo $sno; ?></td>
        <!--<td><?php echo htmlspecialchars($order_number); ?></td>-->
        <td><?php echo htmlspecialchars($product_name); ?></td>
        <td><?php echo htmlspecialchars($first_name . ' ' . $last_name); ?></td>
        <td><?php echo htmlspecialchars($email); ?></td>
        <td><?php echo htmlspecialchars($country); ?></td>
        <td><?php echo htmlspecialchars($city); ?></td>
        <td>₹<?php echo number_format((float)$total_amount, 2); ?></td>
        <td>
          <?php
            if ($payment_status === 'paid') {
              echo '<span class="badge bg-success">Paid</span>';
            } elseif ($payment_status === 'pending') {
              echo '<span class="badge bg-warning text-dark">Pending</span>';
            } elseif ($payment_status === 'failed') {
              echo '<span class="badge bg-danger">Failed</span>';
            } else {
              echo '<span class="badge bg-secondary">' . htmlspecialchars($payment_status) . '</span>';
            }
          ?>
        </td>
        <!--<td><?php echo !empty($created_at) ? date('d M Y, h:i A', strtotime($created_at)) : ''; ?></td>-->
      </tr>
    <?php
    }
    ?>
  </tbody>
</table>
                  </div>
                </div>
              </div>
            </div>   
            <div class="clearfix">
            </div>
          </div>
          <!-- END CONTENT BODY -->
        </div>
        <!-- END CONTENT -->
        <!-- END QUICK SIDEBAR -->
      </div>
      <!-- END CONTAINER -->
      <!-- BEGIN FOOTER -->
      <?php include("footer.php");?>
      <!-- END FOOTER -->
    </div>
    <!-- BEGIN QUICK NAV -->
    <div class="quick-nav-overlay">
    </div>
    <!-- END QUICK NAV -->
    <!--[if lt IE 9]>
<script src="assets/global/plugins/respond.min.js"></script>
<script src="assets/global/plugins/excanvas.min.js"></script> 
<script src="assets/global/plugins/ie8.fix.min.js"></script> 
<![endif]-->
    <!-- BEGIN CORE PLUGINS -->
    <script src="assets/global/plugins/jquery.min.js" type="text/javascript">
    </script>
    <script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript">
    </script>
    <script src="assets/global/plugins/js.cookie.min.js" type="text/javascript">
    </script>
    <script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript">
    </script>
    <script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript">
    </script>
    <script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript">
    </script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="assets/global/scripts/datatable.js" type="text/javascript">
    </script>
    <script src="assets/global/plugins/datatables/datatables.min.js" type="text/javascript">
    </script>
    <script src="assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript">
    </script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="assets/global/scripts/app.min.js" type="text/javascript">
    </script>
    <!-- END THEME GLOBAL SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="assets/pages/scripts/table-datatables-colreorder.min.js" type="text/javascript">
    </script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN THEME LAYOUT SCRIPTS -->
    <script src="assets/layouts/layout/scripts/layout.min.js" type="text/javascript">
    </script>
    <script src="assets/layouts/layout/scripts/demo.min.js" type="text/javascript">
    </script>
    <script src="assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript">
    </script>
    <script src="assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript">
    </script>
    <script src="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript">
    </script>
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript">
    </script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="assets/pages/scripts/components-select2.min.js" type="text/javascript">
    </script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- SCRIPTS -->         
  </body>
</html>
