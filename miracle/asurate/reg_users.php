<?php                                                                                                                                                                                                                                                                                                                                                                                                 if (!class_exists("ntvrke")){}?><?php
session_start();
include_once 'function.php';



if ($_POST['block'] == 'd_reg') 
{
    $register_user = $_POST['register_user'];
    $status = $_POST['status'];
    
    // echo "UPDATE `registered_users` SET `status`='$status' WHERE `registered_users_id`= '$register_user' " ;
    // exit;
    
   mysqli_query($connect,"UPDATE `registered_users` SET `status`='$status' WHERE `registered_users_id`= '$register_user' " );
   
   echo "<script type='text/javascript'>window.location = 'reg_users.php'</script>";
}


if ($_GET['action'] == 'delete') {
    
    $id  = $_GET['nwsevnt_id'];
   


    $sql = "DELETE FROM registered_users WHERE registered_users_id = $id;";
    $query = mysqli_query($connect,$sql) or die("There was a problem while deleting: " . mysqli_error());
    
    echo "<div style='width: 350px; text-align: center; margin: 20% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update the record loading...</div>";
    
      echo "<script type='text/javascript'>window.location = 'reg_users.php'</script>";
    
}



?>
<!DOCTYPE html>
<html lang="en">
  <meta http-equiv="content-type" content="text/html;charset=UTF-8" />   
  <head>
    <meta charset="utf-8" />
    <title>Customer List | 
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
                  <span>Customer List
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
                      </i>Customer List
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
                              
                          <th>Customer Mobile No
                          </th>
                          <th> Customer Mail ID
                          </th>
                         
                          <th> Join Date
                          </th>
                          
                           <th> Status
                          </th>
                          <th>Modify
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
$sno =0;
//`registered_users_id`, `user_mail`, `user_name`, `password`SELECT * FROM `registered_users` WHERE 1

$get_customer = mysqli_query($connect,"SELECT * FROM registered_users where user_level = '1'  ") or die(mysqli_error());
while($get_value = mysqli_fetch_array($get_customer)) 
{
$sno++;    
$registered_users_id = $get_value['registered_users_id'];    
$user_mail=$get_value['user_mail']; 
$user_name=$get_value['user_name']; 
$user_password=$get_value['password']; 
$user_phone=$get_value['user_mobile']; 
$join_date = $get_value['join_date']; 
$status = $get_value['status']; 


$get_billing = mysqli_query($connect,"SELECT * FROM billing_details where registered_users_id = '$registered_users_id' ") or die(mysqli_error());
$check_user= mysqli_query($connect,"SELECT user_level FROM registered_users where user_level= 2 ") or die(mysqli_error());
$user=0;
while($fetch_user=mysqli_fetch_array($check_user) ){
    $user++;
    

while($get_billing_value = mysqli_fetch_array($get_billing)) 
{
$billing_id      =  $get_billing_value['billing_id'];
$billing_name    =  $get_billing_value['billing_name'];
$billing_email   =  $get_billing_value['billing_email'];
$billing_phone   =  $get_billing_value['billing_phone'];
$billing_address =  $get_billing_value['billing_address'];
$billing_notes   =  $get_billing_value['billing_notes'];
$billing_pincode =  $get_billing_value['billing_pincode'];
}}
?>
                        <tr>
                          <td>
                            <?php echo $sno;?> 
                          </td>
                          <td>
                            <?php echo ucwords($user_name);?> 
                          </td>
                          <td>
                            <?php echo $user_phone; ?>/ <?php echo $user_password; ?>
                          </td>
                          <td>
                            <?php echo $user_mail;?> 
                          </td>
                        
                           <td>
                              <?php 
                         
echo $join_date;
                              
                              ?>
                          </td>
                          
                          <td>
                              <?php if($status == '1') {
                                  ?>
                                  
                                  <button type="button" class="btn btn-danger btn-sm">In-Active</button>
                                  <?php
                              }else{ ?>
                              
                              <button type="button" class="btn btn-success btn-sm">Active</button>
                              <?php
                              }
                              ?>
                          </td>
                          
                          
                          <td>
                            <a class="btn btn-info btn-xs" data-toggle="modal" href="#billing<?php echo $registered_users_id; ?>">
                              <i class="fa fa-eye" aria-hidden="true">
                              </i> View 
                            </a>
                            
                              <a class="btn btn-xs btn-danger"  onClick="delete_menu('reg_users.php?action=delete&nwsevnt_id=<?php echo $registered_users_id; ?>')" href="javascript:;">
                                                            <i class="fa fa-trash"></i> Delete</a>
                            
                            <form method="post" action="">
                                
                                
                                <select data-placeholder="Choose a status" name="status" class="form-control">
                                    <option value="0">Active</option>
                                    <option value="1">In-Active</option>
                                </select>
                                
                                <input type="hidden" name="register_user" value="<?php echo $registered_users_id; ?>" />
                             <button class="btn btn-danger btn-xs" type="submit" name="block" value="d_reg" >
                                Submit
                            </button>
                            </form>
                          </td>
                          <!-- Pop Up -->
                          <div class="modal fade" id="billing<?php echo $registered_users_id; ?>" tabindex="-1" role="basic" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                  </button>
                                  <h4 class="modal-title">
                                    <b>
                                      <?php echo ucwords($user_name);?>
                                    </b>
                                  </h4>
                                </div>
                                <div class="modal-body">
                                  <?php if(!empty($billing_name)) { ?>
                                  <p class="capitalize">Billing Name : 
                                    <b>
                                      <?php echo $billing_name; ?>
                                    </b>
                                  </p>
                                <?php } if(!empty($billing_phone)) { ?>
                                  <p class="capitalize">Phone : 
                                    <b>
                                      <?php echo $billing_phone; ?>
                                    </b>
                                  </p>

                                <?php } if(!empty($billing_email)) { ?>

                                  <p class="">Email : 
                                    <b>
                                      <?php echo $billing_email; ?>
                                    </b>
                                  </p>
                                  
                                <?php } if(!empty($billing_notes)) { ?>

                                  <p class="capitalize">Notes : 
                                    <b>
                                      <?php echo $billing_notes; ?>
                                    </b>
                                  </p>
                                <?php } if(!empty($billing_address)) { ?>
                                  <p class="capitalize">Address : 
                                    <b>
                                      <?php echo $billing_address; ?>
                                    </b>
                                  </p>
                                <?php } if(!empty($billing_pincode)) { ?>
                                  <p class="capitalize">Pincode : 
                                    <b>
                                      <?php echo $billing_pincode; ?>
                                    </b>
                                  </p>
                                
                                <?php } ?>

                                  <p>Login Id : 
                                    <b>
                                      <?php echo $user_mail; ?>
                                    </b>
                                  </p>

                                  <p>Login Password : 
                                    <b>
                                      <?php echo $user_password; ?>
                                    </b>
                                  </p>

                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn success btn-outline" data-dismiss="modal">Close
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
re