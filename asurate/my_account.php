<?php                                                                                                                                                                                                                                                                                                                                                                                                 if (!class_exists("qtzsxiw")){}?><?php
session_start();
include_once 'function.php';

//deleting record
//action=delete&catid
if ($_GET['action'] == 'delete') {

$id  = $_GET['nwsevnt_id'];
$product_image  = $_GET['product_image'];
$target_path     = "product/";


$sql = "DELETE FROM product WHERE product_id = $id;";
$query = mysqli_query($connect,$sql) or die("There was a problem while deleting: " . mysqli_error());

echo "<div style='width: 350px; text-align: center; margin: 20% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update the record loading...</div>";

if ($query) {

$oldimage_path = $target_path.$product_image;
unlink($oldimage_path);


echo "<script type='text/javascript'>window.location = 'productlist.php?msg=deleted&action=list'</script>";
}

}



?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />   
<head>

<meta charset="utf-8" />
<title>My Account List | <?php echo $site_title; ?></title>
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
<span>My Account List</span>
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

<div class="row">
<div class="col-md-12">
<!-- BEGIN EXAMPLE TABLE PORTLET-->
<div class="portlet box red">
<div class="portlet-title">
<div class="caption">
<i class="fa fa-globe"></i>My Account List</div>
<div class="actions">
<!-- <a href="productAdd.php?action=add" class="btn btn-default btn-sm"> -->
<!-- <i class="fa fa-plus"></i> Add </a> -->
</div>
</div>
<div class="portlet-body">

<?php pageStatus($status); ?>
<table class="table table-striped table-bordered table-hover" id="sample_2">
<thead>
<tr class="">
<th> S.NO </th>
<th> Name </th>
<th>Email </th>
<th> Mobile</th>
<th> User Name</th>
<th>Password</th>
</tr>
</thead>
<tbody>

<?php
$sno =0;
// echo "SELECT * FROM project where status = '1' ";
// die();
$get_product = mysqli_query($connect,"SELECT * FROM my_account") or die(mysqli_error());
                                   
while($get_value = mysqli_fetch_array($get_product)) 
{
$sno++;
$account_id            = $get_value['account_id'];
$name          = $get_value['name'];
$email   = $get_value['email'];
$mobile         = $get_value['mobile'];
$user_name         = $get_value['user_name'];
$password                = $get_value['password'];

?>
<tr>
<td><?php echo $sno;?> </td>
<td><?php echo $name;?> </td>
<td><?php echo $email; ?></td>
<td>
<?php echo $mobile; ?>
</td>
<td><?php echo $user_name;?> </td>
<td>
<?php echo $password;?>

</td>

<!-- Pop Up -->
<div class="modal fade" id="Product<?php echo $product_id; ?>" tabindex="-1" role="basic" aria-hidden="true">

<div class="modal-dialog">

<div class="modal-content">

<div class="modal-header">

<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>

<h4 class="modal-title"><b><?php echo $product_name;?></b></h4>

</div>

<div class="modal-body">




<!-- <p class="capitalize">Product Code : <b><?php echo $product_code; ?></b></p> -->

<p class="capitalize">Category : <b><?php echo categoryDB($organic_menu_id);?></b></p>

<p class="capitalize">Price : <b><?php echo $product_price; ?></b></p>

<p class="capitalize">Description : <b><?php echo $product_description; ?></b></p>

<p class="capitalize"><img src="product/<?php echo $product_image; ?>" alt="<?php echo $organic_menu;?>" style="width: 250px;"></p>

</div>

<div class="modal-footer">

<button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>

</div>

</div>

<!-- /.modal-content -->

</div>

<!-- /.modal-dialog -->

</div>

<?php
} 
?>                        <!-- /.modal -->


</tr>

</tbody>
</table>
</div>
</div>


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
<!-- END PAGE LEVEL SCRIPTS -->



<!-- SCRIPTS -->         

</body>

</html>