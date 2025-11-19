<?php
session_start();
include_once 'function.php';



if($_POST['update_page'] == 'Update') 
{

$product_id            = $_POST['product_id'];  
$product_description   = $_POST['product_description'];


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


$path = "acheivement/";


mysqli_query($connect,"UPDATE `product` SET `product_image`='$uploaded_slider_image',`product_description`='$product_description' WHERE product_id = '$product_id'") or die(mysqli_error());


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
<title>Product Edit | <?php echo $site_title; ?></title>
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

<?php

$NewsID = base64_decode($_GET["nwsevnt_id"]);

$get_model = mysqli_query($connect,"SELECT * FROM `product` where product_id = '$NewsID'") or die(mysqli_error());
while($get_value = mysqli_fetch_array($get_model)) 
{
    $sno++;
    $product_id            = $get_value['product_id'];
    $organic_menu_id       = $get_value['organic_menu_id'];
    $sub_category_id       = $get_value['sub_category_id'];
    $sub_category_name       = $get_value['sub_category_name'];
    $mrp_price       = $get_value['mrp_price'];
     $product_kg       = $get_value['product_kg'];
     $product_quantity             = $get_value['product_quantity'];
     
      $distributer_price             = $get_value['distributer_price'];
 $distributer_commission             = $get_value['distributer_commission'];
     
     
    $product_name          = $get_value['product_name'];
    $product_description   = $get_value['product_description'];
    $product_ingredients   = $get_value['product_ingredients'];
    $product_features      = $get_value['product_features'];
    $product_usage         = $get_value['product_usage'];
    $product_price         = $get_value['product_price'];
    $product_image         = $get_value['product_image'];
    $status                = $get_value['status'];

    if($status == '1') 
        {
            $active = "selected";
        } else if ($status =='0') 
        {
            $inactive = "selected";
        }
}
?>

<div class="row">
<div class="col-md-12">
<!-- BEGIN VALIDATION STATES-->
<div class="portlet light portlet-fit portlet-form bordered">
<div class="portlet-title">
<div class="caption">
<i class="fa fa-list  font-red" aria-hidden="true"></i>
<span class="caption-subject font-red sbold uppercase">EDIT </span>
</div>
</div>
<div class="portlet-body">
<!-- BEGIN FORM-->
<form action="" id="form_sample_1" method="post" class="form-horizontal" novalidate="novalidate" enctype="multipart/form-data">
<div class="form-body">

<div class="form-group">
<label class="control-label col-md-3">Description
    <span class="required" aria-required="true"> * </span>
</label>
<div class="col-md-6">
    <textarea name="product_description" data-required="1" class="form-control ckeditor" rows="5"><?php echo $product_description; ?></textarea>
</div>
</div>


<div class="form-group last">
    <label class="control-label col-md-3">Image</label>
    <div class="col-md-9">
        <div class="fileinput fileinput-new" data-provides="fileinput">
            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
            <img src="product/<?php echo $product_image; ?>" alt=""> </div>
            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
            <div>
                <span class="btn default btn-file">
                    <span class="fileinput-new"> Select image </span>
                    <span class="fileinput-exists"> Change </span>
                    <input type="file" name="product_image"> </span>
                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                </div>
            </div>
            <!-- <div class="clearfix margin-top-10">
                <span class="label label-danger">NOTE!</span> Image preview only works in IE10+, FF3.6+, Safari6.0+, Chrome6.0+ and Opera11.1+. In older browsers the filename is shown instead.
            </div> -->
        </div>
    </div>


</div>
<div class="form-actions">
<div class="row">
<div class="col-md-offset-3 col-md-9">
<input type="hidden" name="product_id" value="<?php echo $product_id; ?>" />
<input type="hidden" name="old_image" value="<?php echo $product_image; ?>" />
    <button type="submit" class="btn green" name="update_page" value="Update">Update</button>
    <button type="reset" value="Reset" class="btn grey-salsa btn-outline">Reset</button>
</div>
</div>
</div>
</div>
<!-- END VALIDATION STATES-->
</div>
</div>

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
<!-- END THEME LAYOUT SCRIPTS -->
<!-- Password Check -->


</body>


</html>