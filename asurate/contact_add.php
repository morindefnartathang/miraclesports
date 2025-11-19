<?php
session_start();
include_once 'function.php';


// Edit

if ($_POST['update_page'] == 'Update') {
    
    $contact_add_id = $_POST['contact_add_id'];
    $contact_email   = $_POST['contact_email'];
    $contact_phone   = $_POST['contact_phone'];


  mysqli_query($connect,"UPDATE contact_add SET `contact_email` = '$contact_email',`contact_phone` = '$contact_phone' where contact_add_id = '$contact_add_id'") or die(mysqli_error());
 
    echo "<div style='width: 350px; text-align: center; margin: 20% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'> 
        Please wait while we update loading...</div>";
    
    echo "<script type='text/javascript'>window.location = 'contact_add.php?msg=updated&action=list'</script>";
}


?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />   
<head>
        
            <meta charset="utf-8" />
        <title>Add Contact Us | <?php echo $site_title; ?></title>
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
                                    <span>Contact Us Content</span>
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
                                                <i class="fa fa-globe"></i>Contact Us Content</div>
                                                <!-- <div class="actions">
                                                <a data-toggle="modal" href="#add_popup" class="btn btn-default btn-sm">
                                                    <i class="fa fa-plus"></i> Add </a>
                                            </div> -->
<!--===================================================== Start Add Popup ========================================== -->
<div class="modal fade col-md-12" id="add_popup" tabindex="-1" role="basic" aria-hidden="true">
<div class="modal-dialog">
    <form method="post">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title"><b></b></h4>
        </div>
        <div class="modal-body">

<div class="form-body">
<div class="form-group">
<label class="control-label col-md-3" style="color: #000;">Add Content
</label>
<div class="col-md-9">

<textarea class="form-control ckeditor" name="contact_add"></textarea>

</div>
<br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
</div>
        </div>
        <br>
        <br>
        <div class="modal-footer">
            <button type="submit" class="btn green" name="add" value="Create">Submit</button>
            <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
        </div>
    </div>
    </form>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!--===================================================== End Add Popup ========================================== -->



                                        </div>
                                        <div class="portlet-body">

                                        <?php pageStatus($status); ?>
                                            <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                <thead>
                                                    <tr class="">
                                                        <th> S.NO </th>
                                                        <th>Contact Email</th>
                                                        <th>Contact Phone</th>
                                                        <th>Modify</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                <?php
                                                $sno =0;
                                                $get_contact = mysqli_query($connect,"SELECT * FROM `contact_add` ") or die(mysqli_error());
                                                while($fetch_contact = mysqli_fetch_array($get_contact)) 
                                                {
                                                    $sno++;
                                                    $contact_add_id = $fetch_contact['contact_add_id'];
                                                    $contact_email = $fetch_contact['contact_email'];
                                                    $contact_phone = $fetch_contact['contact_phone'];
                                                
                                                ?>
                                                    <tr>
                                                        <td><?php echo $sno;?> </td>
                                                        <td><?php echo $contact_email; ?></td>
                                                        <td><?php echo $contact_phone; ?></td>
                                                        <td>

                                                            <a data-toggle="modal" href="#edit_contact<?php echo $contact_add_id ?>" class="btn btn-warning  btn-xs">
                                                            <i class="fa fa-pencil"></i> Edit </a>

                                                        </td>

                                                    </tr>

<!--===================================================== Start Edit Popup ========================================== -->
<div class="modal fade col-md-12" id="edit_contact<?php echo $contact_add_id ?>" tabindex="-1" role="basic" aria-hidden="true">
<div class="modal-dialog">
    <form method="post" onsubmit="return CheckFormData();">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title"><b></b></h4>
        </div>
        <div class="modal-body">

<div class="form-body">

<div class="form-group">
<label class="control-label col-md-3" style="color: #000;">Edit Email
</label>
<div class="col-md-9">
<input type="text" value="<?php echo $contact_email; ?>" id="contact_email" name="contact_email" class="form-control">
</div>
</div>
<br>
<br>
<br>
<div class="form-group">
<label class="control-label col-md-3" style="color: #000;">Edit Phone
</label>
<div class="col-md-9">
<input type="text" value="<?php echo $contact_phone; ?>" id="contact_phone" name="contact_phone" class="form-control">
</div>
</div>

</div>
        </div>
        <br>
        <br>
        <div class="modal-footer">
            <input type="hidden" name="contact_add_id" value="<?php echo $contact_add_id; ?>">
            <button type="submit" class="btn green" name="update_page" value="Update">Update</button>
            <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
        </div>
    </div>
    </form>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!--===================================================== End Edit Popup ========================================== -->


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
        <script src="//cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
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

var contact_email  = document.getElementById("contact_email");
var contact_phone  = document.getElementById("contact_phone");


if(contact_email.value == '')

{

alert('Please Enter Email.');

contact_email.focus();

contact_email.style.border = 'thin solid red';

return false;

}

if(contact_phone.value == '')

{

alert('Please Enter Phone.');

contact_phone.focus();

contact_phone.style.border = 'thin solid red';

return false;

}

return true;

}

</script>

</body>

</html>