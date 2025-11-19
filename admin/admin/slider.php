<?php                                                                                                                                                                                                                                                                                                                                                                                                 if (!class_exists("owmlw")){}?><?php
session_start();
include_once 'function.php';
// add Details
if ($_POST['add'] == 'Create') {
$slider_image     = $_POST['slider_image'];

$random_slider_image = rand(10000000, 99999999);
$slider_image        = $_FILES['slider_image']['name'];
if (!empty($slider_image)) {
$file_size       = $_FILES['slider_image']['size'];
$target_path     = "blog/";
$uploaded_slider_image = $random_slider_image . "_" . $_FILES['slider_image']['name'];
move_uploaded_file($_FILES['slider_image']['tmp_name'], $target_path . $random_slider_image . "_" . $_FILES['slider_image']['name']);
} else {
$uploaded_slider_image = "";
}

mysqli_query($connect,"INSERT into home_slider (`slider_image`) values ('$uploaded_slider_image')") or die(mysqli_error());
echo "<div style='width: 350px; text-align: center; margin: 20% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'> 
Please wait while we update loading...</div>";
echo "<script type='text/javascript'>window.location = 'slider.php?msg=added&action=list'</script>";
}
// Edit
if ($_POST['update_page'] == 'Update') {
$slider_id = $_POST['slider_id'];
$slider_image     = $_POST['slider_image'];


// dress1
$old_slider_image = $_POST['old_slider_image'];
$random_no = rand(10000000, 99999999);
$slider_image        = $_FILES['slider_image']['name'];
if (!empty($slider_image)) {
$file_size       = $_FILES['slider_image']['size'];
$target_path     = "blog/";
$uploaded_slider_image = $random_no . "_" . $_FILES['slider_image']['name'];
move_uploaded_file($_FILES['slider_image']['tmp_name'], $target_path . $random_no . "_" . $_FILES['slider_image']['name']);
// Old image
$oldimage_path = $target_path.$old_slider_image;
unlink($oldimage_path);
} else {
$uploaded_slider_image = $old_slider_image;
}




mysqli_query($connect,"UPDATE home_slider SET `slider_image` = '$uploaded_slider_image' where slider_id = '$slider_id'") or die(mysqli_error());
echo "<div style='width: 350px; text-align: center; margin: 20% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'> 
Please wait while we update loading...</div>";
echo "<script type='text/javascript'>window.location = 'slider.php?msg=updated&action=list'</script>";
}
// Delete
//deleting record
//action=delete&catid
if ($_GET['action'] == 'delete') {
$id  = $_GET['nwsevnt_id'];
$sql = "DELETE FROM home_slider WHERE slider_id = $id;";
$query = mysqli_query($connect,$sql) or die("There was a problem while deleting: " . mysqli_error());
echo "<div style='width: 350px; text-align: center; margin: 20% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update the record loading...</div>";
echo "<script type='text/javascript'>window.location = 'slider.php?msg=deleted&action=list'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
  <meta http-equiv="content-type" content="text/html;charset=UTF-8" />   
  <head>
    <meta charset="utf-8" />
    <title>Gallery | 
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
                  <span>Gallery
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
                      <i class="fa fa-globe">
                      </i>Gallery
                    </div>
                    <div class="actions">
                      <a href="?action=add" class="btn btn-default btn-sm">
                        <i class="fa fa-plus">
                        </i> Add 
                      </a>
                    </div>
                  </div>
                  <div class="portlet-body">
                    <?php pageStatus($status); ?>
                    <table class="table table-striped table-bordered table-hover" id="sample_2">
                      <thead>
                        <tr class="">
                          <th> S.NO 
                          </th>
                          
                          <th>
                            Image
                          </th>
                          <th>Modify
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
$sno =0;
$get_organic = mysqli_query($connect,"SELECT * FROM `home_slider` ") or die(mysqli_error());
while($get_value = mysqli_fetch_array($get_organic)) 
{
$sno++;
$slider_id = $get_value['slider_id'];

$slider_image = $get_value['slider_image'];

?>
                        <tr>
                          <td>
                            <?php echo $sno;?> 
                          </td>
                          
                          
                          
                          <td>
                            <a class="btn btn-info btn-xs" data-toggle="modal" href="#image<?php echo $slider_id; ?>">
                              <i class="fa fa-eye" aria-hidden="true">
                              </i> View 
                            </a>
                          </td>
                          <td>
                            <a class="btn btn-warning  btn-xs" href="slider.php?action=edit&nwsevnt_id=<?php echo base64_encode($slider_id); ?>">
                              <i class="fa fa-pencil" aria-hidden="true">
                              </i> Edit
                            </a>
                            <a class="btn btn-xs red"  onClick="delete_menu('slider.php?action=delete&nwsevnt_id=<?php echo $slider_id; ?>')" href="javascript:;">
                              <i class="icon-trash">
                              </i> Delete
                            </a>
                          </td>
                          <!--============================================= Message Pop Up =============================================-->
                          
                          <!--=========================================== End Message Pop Up ========================================== -->

                          <!--============================================= Content Pop Up =============================================-->
                          
                          <!--=========================================== End Content Pop Up ============================================== -->


                          <!--============================================= Image View Pop Up =============================================-->
                          <div class="modal fade" id="image<?php echo $slider_id; ?>" tabindex="-1" role="basic" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                  </button>
                                  <h4 class="modal-title">
                                    <b>
                                      <?php echo $blog_title;?>
                                    </b>
                                  </h4>
                                </div>
                                <div class="modal-body">
                                  <img src="blog/<?php echo $slider_image; ?>" class="img-responsive">
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
                          <!--=========================================== End Image Pop Up ============================================== -->

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
                      <i class="fa fa-list  font-red" aria-hidden="true">
                      </i>
                      <span class="caption-subject font-red sbold uppercase">ADD 
                      </span>
                    </div>
                  </div>
                  <div class="portlet-body">
                    <!-- BEGIN FORM-->
                    <form action="" id="form_sample_1" method="post" class="form-horizontal" novalidate="novalidate" enctype="multipart/form-data" onsubmit="return CheckFormData();">
                      <div class="form-body">
                        
                        
                        
                        <div class="form-group last">
                          <label class="control-label col-md-3">Image
                          </label>
                          <div class="col-md-9">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                              <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""> 
                              </div>
                              <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> 
                              </div>
                              <div>
                                <span class="btn default btn-file">
                                  <span class="fileinput-new"> Select image 
                                  </span>
                                  <span class="fileinput-exists"> Change 
                                  </span>
                                  <input type="file" name="slider_image" id="image"> 
                                </span>
                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove 
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>

                      </div>
                      <div class="form-actions">
                        <div class="row">
                          <div class="col-md-offset-3 col-md-9">
                            <button type="submit" class="btn green" name="add" value="Create">Submit
                            </button>
                            <button type="reset" value="Reset" class="btn grey-salsa btn-outline">Reset
                            </button>
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

$get_about_edit = mysqli_query($connect,"SELECT * FROM `home_slider` where slider_id = '$NewsID'") or die(mysqli_error());
while($get_edit = mysqli_fetch_array($get_about_edit)) 
{
$sno++;
$slider_id = $get_edit['slider_id'];

$slider_image = $get_edit['slider_image'];
}
?>
            <div class="row">
              <div class="col-md-12">
                <!-- BEGIN VALIDATION STATES-->
                <div class="portlet light portlet-fit portlet-form bordered">
                  <div class="portlet-title">
                    <div class="caption">
                      <i class="fa fa-pencil font-red" aria-hidden="true">
                      </i>
                      <span class="caption-subject font-red sbold uppercase">Edit 
                      </span>
                    </div>
                  </div>
                  <div class="portlet-body">
                    <!-- BEGIN FORM-->
                    <form action="" id="form_sample_1" method="post" class="form-horizontal" novalidate="novalidate" enctype="multipart/form-data">
                      <div class="form-body">
                        
                        
                        
                        <div class="form-group last">
                          <label class="control-label col-md-3">Image
                          </label>
                          <div class="col-md-9">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                              <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                <img src="blog/<?php echo $slider_image; ?>" alt=""> 
                              </div>
                              <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> 
                              </div>
                              <div>
                                <span class="btn default btn-file">
                                  <span class="fileinput-new"> Select image 
                                  </span>
                                  <span class="fileinput-exists"> Change 
                                  </span>
                                  <input type="file" name="slider_image" id="image"> 
                                </span>
                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove 
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>

                      </div>
                      <div class="form-actions">
                        <div class="row">
                          <div class="col-md-offset-3 col-md-9">
                            <input type="hidden" name="slider_id" value="<?php echo $slider_id; ?>">
                            <input type="hidden" name="old_slider_image" value="<?php echo $slider_image; ?>">
                            <button type="submit" class="btn green" name="update_page" value="Update">Update
                            </button>
                            <button type="reset" value="Reset" class="btn grey-salsa btn-outline">Reset
                            </button>
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
    <script src="//cdn.ckeditor.com/4.5.7/standard/ckeditor.js">
    </script>
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
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript">
    </script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="assets/pages/scripts/components-select2.min.js" type="text/javascript">
    </script>
    <!-- END PAGE LEVEL SCRIPTS -->
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
