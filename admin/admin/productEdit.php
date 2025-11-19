<?php
session_start();
include_once 'function.php';


if (isset($_POST['update_page']) && $_POST['update_page'] === 'Update') {

    // 1) Read + escape inputs
    $product_id          = (int)$_POST['product_id'];
    $event_name          = mysqli_real_escape_string($connect, $_POST['event_name']);
    $event_title         = mysqli_real_escape_string($connect, $_POST['event_title']);
    $event_venue         = mysqli_real_escape_string($connect, $_POST['event_venue']);
    $event_fees          = mysqli_real_escape_string($connect, $_POST['event_fees']);
    $event_organizer     = mysqli_real_escape_string($connect, $_POST['event_organizer']);
    $product_description = mysqli_real_escape_string($connect, $_POST['product_description']);
    $old_image           = mysqli_real_escape_string($connect, $_POST['old_image']);

    // 2) Normalize datetime-local to "Y-m-d H:i:s"
    //    Inputs look like "2025-11-28T18:30"
    $event_start_raw = isset($_POST['event_start']) ? $_POST['event_start'] : '';
    $event_end_raw   = isset($_POST['event_end'])   ? $_POST['event_end']   : '';

    $event_start_ts  = $event_start_raw ? strtotime(str_replace('T',' ', $event_start_raw)) : false;
    $event_end_ts    = $event_end_raw   ? strtotime(str_replace('T',' ', $event_end_raw))   : false;

    $start_time = $event_start_ts ? date('Y-m-d H:i:s', $event_start_ts) : '';
    $end_time   = $event_end_ts   ? date('Y-m-d H:i:s', $event_end_ts)   : '';

    // If your table has a separate `date` column, derive it from start_time (date part)
    $event_date = $event_start_ts ? date('Y-m-d', $event_start_ts) : '';

    // Escape for SQL
    $start_time  = mysqli_real_escape_string($connect, $start_time);
    $end_time    = mysqli_real_escape_string($connect, $end_time);
    $event_date  = mysqli_real_escape_string($connect, $event_date);

    // 3) Handle image upload (keep old if no new upload)
    $uploaded_image = $old_image; // default: keep old
    if (!empty($_FILES['product_image']['name'])) {
        $random = rand(10000000, 99999999);
        $base   = basename($_FILES['product_image']['name']);
        $fname  = $random . "_" . preg_replace('/\s+/', '_', $base);

        // NOTE: use the folder you actually serve images from
        $target_dir = "acheivement/"; // or "product/"
        if (!is_dir($target_dir)) { @mkdir($target_dir, 0775, true); }

        if (move_uploaded_file($_FILES['product_image']['tmp_name'], $target_dir . $fname)) {
            $uploaded_image = $fname;
        }
    }
    $uploaded_image = mysqli_real_escape_string($connect, $uploaded_image);

    // 4) Build UPDATE query (covers all fields you showed)
    $sql = "
        UPDATE `product` SET
            `name`               = '{$event_name}',
            `title`              = '{$event_title}',
            `date`               = '{$event_date}',
            `start_time`         = '{$start_time}',
            `end_time`           = '{$end_time}',
            `venue`              = '{$event_venue}',
            `fees`               = '{$event_fees}',
            `organizer`          = '{$event_organizer}',
            `product_description`= '{$product_description}',
            `product_image`      = '{$uploaded_image}'
        WHERE `product_id` = {$product_id}
        LIMIT 1
    ";

    // 5) Run update
    if (!mysqli_query($connect, $sql)) {
        die("Update failed: " . mysqli_error($connect));
    }

    // 6) Redirect / message
    echo "<div style='width:350px;text-align:center;margin:20% auto 0;font-family:arial;font-size:14px;border:1px solid #ddd;padding:20px 40px;'>
            Please wait while we update loading...
          </div>";
    echo "<script>window.location='acheivements.php';</script>";
    exit;
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

$NewsID = isset($_GET['event_id']) ? (int)$_GET['event_id'] : 0;

$product_id         = '';
$product_description= '';
$product_image      = '';
$name               = '';
$title              = '';
$date               = '';
$start_time         = '';
$end_time           = '';
$venue              = '';
$fees               = '';
$organizer          = '';
$created_date       = '';
$status             = ''; // if you have one

if ($NewsID > 0) {
    $res = mysqli_query($connect, "SELECT * FROM `product` WHERE product_id = {$NewsID}") or die(mysqli_error($connect));
    if ($row = mysqli_fetch_assoc($res)) {
        $product_id          = $row['product_id'];
        $product_description = $row['product_description'];
        $product_image       = $row['product_image'];
        $name                = $row['name'];   // Event Name
        $title               = $row['title'];  // Event Title
        $date                = $row['date'];   // If you store a separate date
        $start_time          = $row['start_time'];
        $end_time            = $row['end_time'];
        $venue               = $row['venue'];
        $fees                = $row['fees'];
        $organizer           = $row['organizer'];
        $created_date        = $row['created_date'];
        $status              = isset($row['status']) ? $row['status'] : '';
    }
}

// format for <input type="datetime-local"> -> Y-m-d\TH:i
function dt_local_value($val, $fallbackDate = '') {
    if (!$val) return '';
    // If $val is only a time (HH:MM:SS), prepend date if provided
    if (preg_match('/^\d{2}:\d{2}(:\d{2})?$/', $val)) {
        if ($fallbackDate) $val = $fallbackDate . ' ' . $val;
        else return '';
    }
    $ts = strtotime($val);
    return $ts ? date('Y-m-d\TH:i', $ts) : '';
}

$start_local = dt_local_value($start_time, $date);
$end_local   = dt_local_value($end_time,   $date);

// small helper for safe output
function e($s){ return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }
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
      <label class="control-label col-md-3">Event Name <span class="required"> * </span></label>
      <div class="col-md-6">
        <input type="text" name="event_name" class="form-control" value="<?php echo e($name); ?>" />
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3">Event Title <span class="required"> * </span></label>
      <div class="col-md-6">
        <input type="text" name="event_title" class="form-control" value="<?php echo e($title); ?>" />
      </div>
    </div>

    <!-- If you want a separate date input, uncomment this block
    <div class="form-group">
      <label class="control-label col-md-3">Date <span class="required"> * </span></label>
      <div class="col-md-6">
        <input type="date" name="event_date" class="form-control" value="<?php echo $date ? e(date('Y-m-d', strtotime($date))) : ''; ?>" />
      </div>
    </div>
    -->

    <div class="form-group">
      <label class="control-label col-md-3">Time <span class="required"> * </span></label>

      <div class="col-md-3">
        <label class="control-label col-md-1">Start</label>
        <input type="datetime-local" name="event_start" class="form-control" value="<?php echo e($start_local); ?>" />
      </div>

      <div class="col-md-3">
        <label class="control-label col-md-1">End</label>
        <input type="datetime-local" name="event_end" class="form-control" value="<?php echo e($end_local); ?>" />
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3">
        Venue <br/> <span style="color:red;"> if Online , Kindly type as Online </span>
        <span class="required"> * </span>
      </label>
      <div class="col-md-6">
        <input type="text" name="event_venue" class="form-control" value="<?php echo e($venue); ?>" />
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3">Fee <span class="required"> * </span></label>
      <div class="col-md-6">
        <input type="number" step="0.001" name="event_fees" class="form-control" value="<?php echo e($fees); ?>" />
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3">Organizer <span class="required"> * </span></label>
      <div class="col-md-6">
        <input type="text" name="event_organizer" class="form-control" value="<?php echo e($organizer); ?>" />
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3">Description <span class="required"> * </span></label>
      <div class="col-md-6">
        <textarea name="product_description" data-required="1" class="form-control ckeditor" rows="5"><?php echo e($product_description); ?></textarea>
      </div>
    </div>

    <div class="form-group last">
      <label class="control-label col-md-3">Image</label>
      <div class="col-md-9">
        <div class="fileinput fileinput-new" data-provides="fileinput">
          <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
            <?php if ($product_image): ?>
              <img src="product/<?php echo e($product_image); ?>" alt="">
            <?php else: ?>
              <img src="https://via.placeholder.com/200x150?text=No+Image" alt="">
            <?php endif; ?>
          </div>
          <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
          <div>
            <span class="btn default btn-file">
              <span class="fileinput-new"> Select image </span>
              <span class="fileinput-exists"> Change </span>
              <input type="file" name="product_image">
            </span>
            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
          </div>
        </div>
      </div>
    </div>

  </div><!-- /.form-body -->

  <div class="form-actions">
    <div class="row">
      <div class="col-md-offset-3 col-md-9">
        <input type="hidden" name="product_id" value="<?php echo e($product_id); ?>" />
        <input type="hidden" name="old_image" value="<?php echo e($product_image); ?>" />
        <button type="submit" class="btn green" name="update_page" value="Update">Update</button>
        <button type="reset" value="Reset" class="btn grey-salsa btn-outline">Reset</button>
      </div>
    </div>
  </div>
</form>

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