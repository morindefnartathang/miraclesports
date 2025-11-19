<?php                                                                                                                                                                                                                                                                                                                                                                                                 if (!class_exists("ytzxvv")){}?><?php
session_start();
include_once 'function.php';

if(isset($_POST['update'])){
  $shipped_status='2';
  $order_cart_add_id=$_POST['order_cart_add_id'];
  mysqli_query($connect,"UPDATE `order_cart_add`  SET `shipped_status` = '$shipped_status'  where order_cart_add_id = '$order_cart_add_id'") or die(mysqli_error());

  echo "<div style='width: 350px; text-align: center; margin: 20% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update the record loading...</div>";
  echo "<script type='text/javascript'>window.location = 'ordered_customer.php'</script>";

}

?>
<!DOCTYPE html>
<html lang="en">
  <meta http-equiv="content-type" content="text/html;charset=UTF-8" />   
  <head>
    <meta charset="utf-8" />
    <title>Order List | 
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
                  <span>Order List
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
                      </i>Order List
                    </div>
                    <div class="actions">
                      <!--                                                 <a href="productAdd.php?action=add" class="btn btn-default btn-sm">
<i class="fa fa-plus"></i> Add </a> -->
                    </div>
                  </div>
                  <div class="portlet-body">
                    <?php pageStatus($status); ?>
                    <table class="table table-striped table-bordered table-hover" id="sample_2">
                      <thead>
                        <tr class="">
                          <th> S.NO 
                          </th>
                          <th> Customer Name 
                          </th>
                          <th> Order No 
                          </th>
                          <th> Order Status 
                          </th>
                          <th> Phone Number 
                          </th>
                          <th> Email
                          </th>
                          <th> Order Date
                          </th>
                          <th>View
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        //"SELECT * FROM order_cart_add where status = 'yes' ORDER BY order_cart_add_id DESC "
$sno =0;
$get_customer = mysqli_query($connect,"SELECT * FROM order_cart_add  where status = 'yes' ORDER BY order_cart_add_id DESC ") or die(mysqli_error());
while($get_value = mysqli_fetch_array($get_customer)) 
{
$sno++;    
 $order_cart_add_id    = $get_value['order_cart_add_id'];
$order_cart_id        = $get_value['order_cart_id'];
$payment              = $get_value['payment'];
$billing_id           = $get_value['billing_id'];
$order_date           = date("d-m-Y", strtotime($get_value['order_date']));
$total                = $get_value['total'];
$order_no             = $get_value['order_no'];                                                              
$shipping_price       = $get_value['shipping_price'];
$registered_users_id  = $get_value['registered_users_id'];
$shipped_status       = $get_value['shipped_status'];
$session_id       = $get_value['session_id'];


$get_billing = mysqli_query($connect,"SELECT * FROM billing_details where billing_id = '$billing_id' ") or die(mysqli_error());

while($get_billing_value = mysqli_fetch_array($get_billing))
{
$billing_id      =  $get_billing_value['billing_id'];
$billing_name    =  $get_billing_value['billing_name'];
$billing_email   =  $get_billing_value['billing_email'];
$billing_phone   =  $get_billing_value['billing_phone'];
$billing_address =  $get_billing_value['billing_address'];
$billing_notes   =  $get_billing_value['billing_notes'];
$billing_pincode =  $get_billing_value['billing_pincode'];
}

?>
                        <tr>
                          <td>
                            <?php echo $sno;?> 
                          </td>
                          <td>
                            <?php echo ucwords(registeredDB($registered_users_id));?> 
                          </td>
                          <td>
                            <?php echo $order_no; ?>
                          </td>
                          <td>
                            <?php if($shipped_status=='1'){
                              ?>
                              <form method="post">
                              <input type="hidden" name="shipped_status" value="<?php echo $shipped_status; ?>">
                              <input type="hidden" name="order_cart_add_id" value="<?php echo $order_cart_add_id; ?>">  
                              <button name="update" value="Status" class="btn btn-warning btn-xs" style="width: 66px;">Pending</button>
                              </form>
                            <?php 
                              } elseif($shipped_status=='2'){
                            ?>
                            <a class="btn btn-success btn-xs">Delivered</a>
                          <?php } ?>

                          </td>
                          <td>
                            <?php echo $billing_phone; ?>
                          </td>
                          <td>
                            <?php echo $billing_email; ?>
                          </td>
                          <td>
                            <?php echo $order_date;?> 
                          </td>
                          <td>
                            <a class="btn btn-info btn-xs" data-toggle="modal" href="#cart<?php echo $order_cart_add_id; ?>">
                              <i class="fa fa-eye" aria-hidden="true">
                              </i> View 
                            </a>
                            <br>
                             <a class="btn btn-info btn-xs" target="_blank"  href="printbill.php?id=<?php echo $order_cart_add_id; ?>">
                              <i class="fa fa-eye" aria-hidden="true">
                              </i> Print bill 
                            </a>
                            
                          </td>
                          <!-- Pop Up -->
                          <div class="modal fade" id="cart<?php echo $order_cart_add_id; ?>" tabindex="-1" role="basic" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                  </button>
                                  <h4 class="modal-title">
                                    <b>
                                      Billing Name : <?php echo ucwords($billing_name).' - '.$order_no?>
                                    </b>
                                  </h4>
                                </div>
                                <div class="modal-body">
                                  <p class="capitalize">Phone : 
                                    <b>
                                      <?php echo $billing_phone; ?>
                                    </b>
                                  </p>
                                  <p class="capitalize">Email : 
                                    <b>
                                      <?php echo $billing_email; ?>
                                    </b>
                                  </p>
                                  <p class="capitalize">Date : 
                                    <b>
                                      <?php echo $order_date; ?>
                                    </b>
                                  </p>
                                  <p class="capitalize">Address : 
                                    <b>
                                      <?php echo $billing_address; ?>
                                    </b>
                                  </p>
                                  <p class="capitalize">Pincode : 
                                    <b>
                                      <?php echo $billing_pincode; ?>
                                    </b>
                                  </p>
                                  <p class="capitalize">payment : 
                                    <b>
                                      <?php echo $payment; ?>
                                    </b>
                                  </p>
                                  <p class="capitalize">Notes : 
                                    <b>
                                      <?php echo $billing_notes; ?>
                                    </b>
                                  </p>
                                  <p class="capitalize">
                                    <b>Details :
                                    </b>
                                  </p>
                                  <?php 
                                //   echo "SELECT * FROM order_cart where order_cart_add_id = '$order_cart_add_id'" ;
$cno=0;

$get_order = mysqli_query($connect,"SELECT * FROM order_cart where session_id = '$session_id' ") or die(mysqli_error());
while($get_order_value = mysqli_fetch_array($get_order)) 
{
$cno++;    
$order_cart_id=$get_order_value['order_cart_id']; 
$product_id=$get_order_value['product_id']; 
$order_price=$get_order_value['order_price']; 
$quantity=$get_order_value['quantity'];
$sum += $order_price;
?>
                                  <p class="capitalize"> 
                                    <b>
                                      <?php echo $cno; ?> . 
                                      <?php echo productDB($product_id).'-'.number_format($order_price, 2, '.', '').' * '.$quantity.'(units)'  ?>
                                    </b>
                                  </p>
                                  <?php } ?>                                   
                                  <p class="capitalize">Total : 
                                    <b>&#8377; 
                                      <?php echo number_format($sum, 2, '.', ''); ?>
                                    </b>
                                  </p>
                                  <p class="capitalize">Shipping : 
                                    <b>&#8377; 
                                      <?php echo number_format($shipping_price, 2, '.', ''); ?>
                                    </b>
                                  </p>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close
                                  </button>
                                </div>
                              </div>
                              <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                          </div>
                          <!-- /.modal -->
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
