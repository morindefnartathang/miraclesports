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


if (isset($_POST['export_excel'])) {
    // Set the filename for the exported Excel file
    $filename = "customer_data_" . date('YmdHis') . ".csv";
    
    // Open a file in write mode (the file will be generated dynamically and downloaded)
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment;filename="' . $filename . '"');
    header('Cache-Control: max-age=0');
    
    // Create a file pointer connected to the output stream
    $output = fopen('php://output', 'w');
    
    // Column headers for the CSV file
    fputcsv($output, array('S.NO', 'Student Name', 'Parents Name', 'NDCA', 'DOB', 'Email', 'Phone', 'District', 'Pincode', 'Address', 'FIDE ID',  'TNSCA ID' ,'Organization'));
    
    // Fetch data from the database

    $get_customer = mysqli_query($connect, "SELECT * FROM ooty_tour") or die(mysqli_error($connect));
    
    $sno = 0;  // Serial number for each row
    // Loop through the data and write it to the CSV
    while ($get_value = mysqli_fetch_array($get_customer)) {
        $sno++;  // Increment serial number
        fputcsv($output, array(
            $sno, 
            $get_value['name'], 
            $get_value['parent_name'], 
            $get_value['ndca'], 
            $get_value['dob'] . ' / ' . $get_value['category'], 
            $get_value['email'], 
            $get_value['phone'] . ' / ' . $get_value['alt_phnone'], 
            $get_value['state'], 
            $get_value['pincode'], 
            $get_value['address'], 
            $get_value['field_id'], 
            $get_value['remark'],
            $get_value['org_name'] 
        ));
    }
    
    // Close the output file pointer
    fclose($output);
    exit();
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
                  <span>Tournament Student List
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
                      </i>Tournament Student List
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

                    <table class="table table-striped table-bordered table-hover" id="sample_2">
                      <thead>
                        <tr class="">
                          <th> S.NO 
                          </th>
                          <th> Student Name 
                          </th>
                          <th>Parents Name
                          </th>
                          <th> NDCA
                          </th>
                         
                          <th> DOB 
                          </th>
                          
                          
                          <th>Email
                          </th>
                          <th>Phone
                          </th>
                          <th>District
                          </th>
                          <th>Pincode
                          </th>
                          <th>Address
                          </th>
                          <th>FIDE ID
                          </th>
                            <th>TNSCA ID
                          </th>
                          <th>Organization
                          </th>
                        
                        </tr>
                      </thead>
                      <tbody>
                        <?php


$sno =0;



// SELECT `id`, `name`, `parent_name`, `ndca`, `gender`, `dob`, `category`, `rating`, `age`, `email`, `phone`, `alt_phnone`, `state`, `pincode`, `address`, `field_id`, `org_name`, `remark` FROM `ooty_tour` WHERE 1



$get_customer = mysqli_query($connect,"SELECT * FROM ooty_tour ") or die(mysqli_error());
while($get_value = mysqli_fetch_array($get_customer)) 
{
$sno++;    
$id = $get_value['id'];    
$name=$get_value['name']; 
$parent_name=$get_value['parent_name']; 
$ndca=$get_value['ndca']; 
$gender=$get_value['gender']; 
$dob = $get_value['dob']; 
$category = $get_value['category']; 
$rating = $get_value['rating']; 
$age = $get_value['age']; 
$email = $get_value['email']; 
$phone = $get_value['phone']; 
$alt_phnone = $get_value['alt_phnone']; 
$state = $get_value['state']; 
$pincode = $get_value['pincode']; 
$address = $get_value['address']; 
$field_id = $get_value['field_id']; 
$org_name = $get_value['org_name']; 
$remark = $get_value['remark']; 


?>
                        <tr>
                          <td>
                            <?php echo $sno;?> 
                          </td>
                          <td>
                            <?php echo $name;?> 
                          </td>
                          <td>
                            <?php echo $parent_name; ?>
                          </td>
                          <td>
                            <?php echo $ndca;?> 
                          </td>
                         
                          <td>
                           <?php echo $dob;?> /   <?php echo $category;?>
                          </td>
                          <td>
                           <?php echo $email;?>
                          </td>
                          <td>
                           <?php echo $phone;?> /<?php echo $alt_phnone;?>
                          </td>
                          <td>
                           <?php echo $state;?>
                          </td>
                          <td>
                           <?php echo $pincode;?>
                          </td>
                          
                          <td>
                           <?php echo $address;?>
                          </td>
                          
                          <td>
                           <?php echo $field_id;?>
                          </td>
                            <td>
                           <?php echo $remark;?>
                          </td>
                          
                          <td>
                           <?php echo $org_name;?>
                          </td>
                          
                        
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
