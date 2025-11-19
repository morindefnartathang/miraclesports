<?php
session_start();
include_once 'function.php';

if (isset($_POST['update_page']) == 'Update')
    {
        $oldpassword = $_POST['oldpassword'];
        $newpassword = $_POST['newpassword'];
    
        if ($oldpassword == $Admin_adminPassword)
            {
                   if (strlen($newpassword) > 25 || strlen($newpassword) < 3)
                {

                        $err = "<span class='btn btn-outline sbold red'>Password must be between 3 & 25</span>";
               
                }
                else
                {
                  

                    $querychange = mysqli_query($connect,"UPDATE admin SET adminPassword='$newpassword' WHERE admin_id='$Admin_admin_id'");


                    echo "<div style='width: 350px; text-align: center; margin: 20% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update loading...</div>";
                    echo "<script type='text/javascript'>window.location = 'logout.php?logout'</script>";
                }
            }else{
                $err = "<span class='btn btn-outline sbold red'>Old Pass doesn't match</span>";   
            }
    }
    

?>

<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />   
<head>
    
    <meta charset="utf-8" />
    <title>Change Password | <?php echo $site_title; ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/font-awesome/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />

      <script src="//cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>

    <link href="assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/layouts/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
    <link href="assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
    
    <link href="assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
    
    <link href="assets/layouts/customer.css" rel="stylesheet" type="text/css" />
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
                                    <span>Change Password</span>
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
                       
                       
                            <br>
                        <div class="text-center">
                                                    <?php echo $err;?>
                                                </div>
                                                <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                        <div class="portlet box red">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-globe"></i>Change Password</div>
                                                <div class="actions">
                                                
                                            </div>
                                        </div>
                                        <div class="portlet-body">

                                        <form action="" id="form_sample_1" method="post" class="form-horizontal" novalidate="novalidate">
                                            <div class="form-body">
                                                <!-- <div class="form-group">
                                                    <label class="control-label col-md-3">Site Title
                                                        <span class="required" aria-required="true"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <input type="text" name="site_title" data-required="1" class="form-control" value="<?php echo $site_title?>"> </div>
                                                </div> -->
                                                
                                                
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">User Name
                                                        <span class="required" aria-required="true"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <input type="text" name="user_name" data-required="1" readonly class="form-control" value="<?php echo $Admin_adminUser?>"> </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Old Password
                                                        <span class="required" aria-required="true"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <input type="Password" name="oldpassword" data-required="1" class="form-control"> </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">New Password
                                                        <span class="required" aria-required="true"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <input type="Password" name="newpassword" id="password" data-required="1" class="form-control"> </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Re-New Password
                                                        <span class="required" aria-required="true"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <input type="Password" name ="repeatnewpassword" id="pass11" onblur="pswcheck();" data-required="1" class="form-control"> </div>
                                                </div>
                                            </div>    
                                            <!-- hidden Form -->
                                            <input type="hidden" name="oldpassworddb" value="<?php echo $Admin_user_pass;?>">
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <button type="submit" class="btn green" name="update_page" value="Update">Update</button>
                                                        <button type="reset" value="Reset" class="btn grey-salsa btn-outline">Reset</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                            
                                        </div>
                                    </div>
                                  

                                </div>
                             </div>   

                             <div class="clearfix"></div>
                        
                    </div>
                </div>
              
            </div>


            <?php include("footer.php");?>


            
        </div>
   
        <div class="quick-nav-overlay"></div>

        <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <script src="assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        <script src="assets/global/scripts/app.min.js" type="text/javascript"></script>
        <script src="assets/pages/scripts/table-datatables-colreorder.min.js" type="text/javascript"></script>
        <script src="assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
        <script src="assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
        <script src="assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
         <script src="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>

        <script src="assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <script src="assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>

        <script language="javascript">
        function pswcheck()
        {
            pass=document.getElementById("password").value;
            pass11=document.getElementById("pass11").value;
            if(pass!=pass11)
            {
                alert("password Mismatch");
                document.getElementById("password").value="";
                document.getElementById("pass11").value="";
                document.getElementById("password").focus();
            }
        }
        </script>


</body>

</html>