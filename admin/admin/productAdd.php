<?php
session_start();
include_once 'function.php';

if ($_POST['add'] == 'Create') {


$product_description   = $_POST['product_description'];
$event_name   = $_POST['event_name'];
$event_title   = $_POST['event_title'];
$event_date   = $_POST['event_date'];
$event_end   = $_POST['event_end'];
$event_start   = $_POST['event_start'];
$event_venue   = $_POST['event_venue'];
$event_fees   = $_POST['event_fees'];
$event_organizer   = $_POST['event_organizer'];


$random_slider_image = rand(10000000, 99999999);
$slider_image        = $_FILES['product_image']['name'];

if (!empty($slider_image)) {
$file_size       = $_FILES['product_image']['size'];
$target_path     = "acheivement/";
$uploaded_slider_image = $random_slider_image . "_" . $_FILES['product_image']['name'];
move_uploaded_file($_FILES['product_image']['tmp_name'], $target_path . $random_slider_image . "_" . $_FILES['product_image']['name']);
} else {
$uploaded_slider_image = "";
}

$today=date('Y-m-d');

// SELECT `product_id`, `product_description`, `product_image`, `name`, `title`, `date`, `start_time`, `end_time`, `venue`, `fees`, `organizer`, `created_date` FROM `product` WHERE 1

mysqli_query($connect,"INSERT INTO `product`(`product_description`, `product_image`, `name`, `title`, `start_time`, `end_time`, `venue`, `fees`, `organizer`, `created_date`)
VALUES ('$product_description' ,'$uploaded_slider_image','$event_name','$event_title','$event_start','$event_end','$event_venue','$event_fees','$event_organizer','$today')") or die(mysqli_error());





echo "<div style='width: 350px; text-align: center; margin: 20% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'> 
Please wait while we update loading...</div>";

echo "<script type='text/javascript'>window.location = 'acheivements.php'</script>";
}




?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />   
<head>
<meta charset="utf-8" />
<title>Events | <?php echo $site_title; ?></title>
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
<script src="//cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
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
<span>Product Add</span>
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
    <label class="control-label col-md-3">Event Name
<span class="required" aria-required="true"> * </span>
</label>
<div class="col-md-6">

    <input type="text" name="event_name" class="form-control" /> 
</div>
</div>
<div class="form-group">
    <label class="control-label col-md-3">Event Title
<span class="required" aria-required="true"> * </span>
</label>
<div class="col-md-6">

    <input type="text" name="event_title" class="form-control" /> 
</div>
</div>
<!--<div class="form-group">-->
<!--    <label class="control-label col-md-3">Date-->
<!--<span class="required" aria-required="true"> * </span>-->
<!--</label>-->
<!--<div class="col-md-6">-->

<!--    <input type="date" name="event_date" class="form-control" /> -->
<!--</div>-->
<!--</div>-->
<div class="form-group">
    <label class="control-label col-md-3">Time
<span class="required" aria-required="true"> * </span>
</label>
<div class="col-md-3">
    <label class="control-label col-md-1">Start </label>

    <input type="datetime-local" name="event_start" class="form-control" /> 
</div>
<div class="col-md-3">
    <label class="control-label col-md-1">End </label>

    <input type="datetime-local" name="event_end" class="form-control" /> 
</div>
</div>
<div class="form-group">
    <label class="control-label col-md-3">Venue <br/> <span style="color:red;"> if Online , Kindly type as Online </span>
<span class="required" aria-required="true"> * </span>
</label>
<div class="col-md-6">

    <input type="text" name="event_venue" class="form-control" /> 
</div>
</div>
<div class="form-group">
    <label class="control-label col-md-3">Fee
<span class="required" aria-required="true"> * </span>
</label>
<div class="col-md-6">

    <input type="number" step="0.001" name="event_fees" class="form-control" /> 
</div>
</div>
<div class="form-group">
    <label class="control-label col-md-3">Organizer
<span class="required" aria-required="true"> * </span>
</label>
<div class="col-md-6">

    <input type="text" name="event_organizer" class="form-control" /> 
</div>
</div>


<div class="form-group">
<label class="control-label col-md-3">Description
<span class="required" aria-required="true"> * </span>
</label>
<div class="col-md-6">
<textarea name="product_description" data-required="1" class="form-control ckeditor" rows="5" id="product_description"></textarea>
</div>
</div>



<div class="form-group last">
<label class="control-label col-md-3">Image</label>
<div class="col-md-9">
<div class="fileinput fileinput-new" data-provides="fileinput">
<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""> </div>
<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
<div>
    <span class="btn default btn-file">
        <span class="fileinput-new"> Select image </span>
        <span class="fileinput-exists"> Change </span>
        <input type="file" name="product_image" id="image"> </span>
        <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
    </div>
</div>
<!-- <div class="clearfix margin-top-10">
    <span class="label label-danger">NOTE!</span> Image preview only works in IE10+, FF3.6+, Safari6.0+, Chrome6.0+ and Opera11.1+. In older browsers the filename is shown instead.
</div> -->
</div>
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
>
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
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
<script src="assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
<script src="assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
<script src="assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>

<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>


<!-- repeater -->
<script src="assets/global/plugins/jquery-repeater/jquery.repeater.js" type="text/javascript"></script>
<script src="assets/pages/scripts/form-repeater.min.js" type="text/javascript"></script>
<!-- End repeater -->

<!-- END THEME LAYOUT SCRIPTS -->
<!-- Password Check -->

<!-- <script language="javascript" type="text/javascript">

function CheckFormData()

{

var product_category  = document.getElementById("product_category");

var product_name  = document.getElementById("product_name");

var product_price  = document.getElementById("product_price");

var product_description  = document.getElementById("product_description");

var image  = document.getElementById("image");

if(product_category.value == '0')

{

alert('Please Choose Category.');

product_category.focus();

product_category.style.border = 'thin solid red';

return false;

}

if(product_name.value == '')

{

alert('Please complete all fields.');

product_name.focus();

product_name.style.border = 'thin solid red';

return false;

}

if(product_price.value == '')

{

alert('Please complete all fields.');

product_price.focus();

product_price.style.border = 'thin solid red';

return false;

}

if(product_description.value == '')

{

alert('Please complete all fields.');

product_description.focus();

product_description.style.border = 'thin solid red';

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

</script> -->

</body>


</html>