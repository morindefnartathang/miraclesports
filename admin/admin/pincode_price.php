<?php
session_start();
include_once 'function.php';

// add Details
if ($_POST['add'] == 'Create') {
    $pincode   = $_POST['pincode'];
    $price      = $_POST['price'];


    mysqli_query($connect,"INSERT into pincode_price (`pincode`, `price`) values ('$pincode','$price')") or die(mysqli_error());

    
    echo "<div style='width: 350px; text-align: center; margin: 20% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'> 
        Please wait while we update loading...</div>";
    
    echo "<script type='text/javascript'>window.location = 'pincode_price.php?msg=added&action=list'</script>";
}
// Edit

if ($_POST['update_page'] == 'Update') {
    
    $pincode   = $_POST['pincode'];
    $price      = $_POST['price'];
    $pincode_price_id      = $_POST['pincode_price_id'];


  mysqli_query($connect,"UPDATE pincode_price SET `pincode` = '$pincode', `price` = '$price' where pincode_price_id = '$pincode_price_id'") or die(mysqli_error());


    echo "<div style='width: 350px; text-align: center; margin: 20% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'> 
        Please wait while we update loading...</div>";
    
    echo "<script type='text/javascript'>window.location = 'pincode_price.php?msg=updated&action=list'</script>";
}

// Delete

//deleting record
//action=delete&catid
if ($_GET['action'] == 'delete') {
    
    $id  = $_GET['nwsevnt_id'];

    $sql = "DELETE FROM pincode_price WHERE pincode_price_id = $id;";
    $query = mysqli_query($connect,$sql) or die("There was a problem while deleting: " . mysqli_error());
    
    echo "<div style='width: 350px; text-align: center; margin: 20% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update the record loading...</div>";
    

        echo "<script type='text/javascript'>window.location = 'pincode_price.php?msg=deleted&action=list'</script>";
    
}



?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />   
<head>
        
            <meta charset="utf-8" />
        <title>Pincode Price | <?php echo $site_title; ?></title>
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
            <div class="clearfix"> </div>
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
                                    <a href="index.php">Home</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span>Organic Category</span>
                                </li>
                            </ul>
                            <div class="page-toolbar">
                                <div id="dashboard-report-range" class="pull-right tooltips btn btn-sm" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
                                    <i class="icon-calendar"></i>&nbsp;
                                    <span class="thin uppercase hidden-xs"></span>&nbsp;
                                    <i class="fa fa-angle-down"></i>
                                </div>
                            </div>
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
                       
                          <?php
                            //get action 
                            if(isset($_GET['action']) =='' || $_GET['action'] == 'list') {
                            ?>
                            <br>
                        
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                        <div class="portlet box red">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-globe"></i>Pincode Price</div>
                                                <div class="actions">
                                                <a href="?action=add" class="btn btn-default btn-sm">
                                                    <i class="fa fa-plus"></i> Add </a>
                                            </div>
                                        </div>
                                        <div class="portlet-body">

                                        <?php pageStatus($status); ?>
                                            <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                <thead>
                                                    <tr class="">
                                                        <th> S.NO </th>
                                                        <th> Pincode </th>
                                                        <th> Amount</th>
                                                        <th>Modify</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                <?php
                                                $sno =0;
                                                $get_organic = mysqli_query($connect,"SELECT * FROM `pincode_price` ") or die(mysqli_error());
                                                while($get_value = mysqli_fetch_array($get_organic)) 
                                                {
                                                    $sno++;
                                                    $pincode_price_id = $get_value['pincode_price_id'];
                                                    $pincode = $get_value['pincode'];
                                                    $price = $get_value['price'];
                                                    
                                                
                                                ?>
                                                    <tr>
                                                        <td><?php echo $sno;?> </td>
                                                        <td><?php echo $pincode;?> </td>
                                                        <td>
                                                            <?php echo $price;?>
                                                        </td>
                                                        <td>

                                                            <a class="btn btn-warning  btn-xs" href="?action=edit&nwsevnt_id=<?php echo base64_encode($pincode_price_id); ?>">
                                                            <i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>

                                                            <a class="btn btn-xs red"  onClick="delete_menu('pincode_price.php?action=delete&nwsevnt_id=<?php echo $pincode_price_id; ?>')" href="javascript:;">
                                                            <i class="icon-trash"></i> Delete</a>

                                                        </td>

                                                        <!-- Pop Up -->
                                                        
                                                        <!-- End Pop Up -->
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
                             <?php
                               }
                               if($_GET['action'] == 'add')
                               {
                               ?>
                               <div class="row">
                               <div class="col-md-12">
                                <!-- BEGIN VALIDATION STATES-->
                                <div class="portlet light portlet-fit portlet-form bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                        <i class="fa fa-list  font-red" aria-hidden="true"></i>
                                            <span class="caption-subject font-red sbold uppercase">ADD </span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <!-- BEGIN FORM-->
                                        <form action="" id="form_sample_1" method="post" class="form-horizontal" novalidate="novalidate" enctype="multipart/form-data" onsubmit="return CheckFormData();">
                                            <div class="form-body">
                                                

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Pincode
                                                        <span class="required" aria-required="true"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <input type="text" name="pincode" id="pincode" data-required="1" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Price
                                                        <span class="required" aria-required="true"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <input type="number" name="price" id="price" data-required="1" class="form-control">
                                                    </div>
                                                </div>
                                                
                                                    
                                                    
                                                </div>
                                                <div class="form-actions">
                                                    <div class="row">
                                                        <div class="col-md-offset-3 col-md-9">
                                                            <button type="submit" class="btn green" name="add" value="Create">Submit</button>
                                                            <button type="reset" value="Reset" class="btn grey-salsa btn-outline">Reset</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        <!-- END FORM-->
                                    </div>
                                </div>
                                <!-- END VALIDATION STATES-->
                                </div>
                                </div>
                               <?php
                               }
                               if(isset($_GET['action']) == 'edit' && isset($_GET['nwsevnt_id'])) {                            
                               $NewsID = base64_decode($_GET["nwsevnt_id"]);
                               // echo "SELECT * FROM `organic_menu` where organic_menu_id = '$NewsID'";
                               // die();
                               $get_buyer_edit = mysqli_query($connect,"SELECT * FROM `pincode_price` where pincode_price_id = '$NewsID'") or die(mysqli_error());
                                                while($get_edit = mysqli_fetch_array($get_buyer_edit)) 
                                                {
                                                    $sno++;
                                                    $pincode_price_id = $get_edit['pincode_price_id'];
                                                    $pincode = $get_edit['pincode'];
                                                    $price = $get_edit['price'];
                                }
                               ?>
                               <div class="row">
                                <div class="col-md-12">
                                <!-- BEGIN VALIDATION STATES-->
                                 <div class="portlet light portlet-fit portlet-form bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                         <i class="fa fa-pencil font-red" aria-hidden="true"></i>
                                            <span class="caption-subject font-red sbold uppercase">Edit </span>
                                        </div>
                                        
                                    </div>
                                    <div class="portlet-body">
                                        <!-- BEGIN FORM-->
                                        <form action="" id="form_sample_1" method="post" class="form-horizontal" novalidate="novalidate" enctype="multipart/form-data">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Pincode
                                                        <span class="required" aria-required="true"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <input type="text" name="pincode" value="<?php echo $pincode; ?>" data-required="1" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Price
                                                        <span class="required" aria-required="true"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <input type="number" name="price" value="<?php echo $price; ?>" data-required="1" class="form-control">
                                                    </div>
                                                </div>
                                                
                                                    
                                                    
                                                </div>
                                                
                                            <!-- hidden Form -->
                                        <input type="hidden" name="pincode_price_id" value="<?php echo $pincode_price_id;?>">
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <button type="submit" class="btn green" name="update_page" value="Update">Update</button>
                                                        <button type="reset" value="Reset" class="btn grey-salsa btn-outline">Reset</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- END FORM-->
                                    </div>
                                </div>
                                <!-- END VALIDATION STATES-->
                                </div>
                               </div>
                               <?php
                               }
                               ?>
                             <div class="clearfix"></div>
                        
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
   
        <div class="quick-nav-overlay"></div>
        <!-- END QUICK NAV -->
        <!--[if lt IE 9]>
<script src="assets/global/plugins/respond.min.js"></script>
<script src="assets/global/plugins/excanvas.min.js"></script> 
<script src="assets/global/plugins/ie8.fix.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="assets/pages/scripts/table-datatables-colreorder.min.js" type="text/javascript"></script>


                 <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->

        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
        <script src="assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
        <script src="assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
         <script src="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>

        <!-- END THEME LAYOUT SCRIPTS -->
        <!-- Password Check -->
            <script language="javascript">
                function pswcheck()
                    {
                        pass=document.getElementById("password").value;
                        repassword=document.getElementById("repassword").value;
                        if(pass!=repassword)
                        {
                            alert("password Mismatch");
                            document.getElementById("password").value="";
                            document.getElementById("repassword").value="";
                            document.getElementById("password").focus();
                        }
                    }
            </script>

            <script language="javascript" type="text/javascript">

function CheckFormData()

{

var organic_menu  = document.getElementById("organic_menu");
var image  = document.getElementById("image");


if(organic_menu.value == '')

{

alert('Please Fill Category.');

organic_menu.focus();

organic_menu.style.border = 'thin solid red';

return false;

}

if(image.value == '')

{

alert('Please Select Image.');

image.focus();

image.style.border = 'thin solid red';

return false;

}


return true;

}

</script>

</body>

</html>