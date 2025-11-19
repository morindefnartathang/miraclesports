<?php

session_start();

include_once 'function.php';



$product_id = base64_decode($_GET["product_id"]);



$get_model = mysqli_query($connect,"SELECT * FROM `product` where product_id = '$product_id'") or die(mysqli_error());

while($get_value = mysqli_fetch_array($get_model)) 

{

$product_id = $get_value['product_id'];

$SessionID = $get_value['SessionID'];

$showroom_id = $get_value['showroom_id'];

$brand_id = $get_value['brand_id'];

$model_id = $get_value['model_id'];

}

// =================================================




// add Bank Details

if ($_POST['add'] == 'Create') {



$product_id = $_POST['product_id'];

$path = "product/";

for($i=1;$i<=(int)($_POST["line"]);$i++)

{

// echo "string";

$name = $_FILES["image".$i]['name'];

if(strlen($name))

{

if($_FILES["image".$i]["name"] != "")

{



list($txt, $ext) = explode(".", $name);

$actual_image_name = time().substr(str_replace(" ", "_", $txt), 1).".".$ext;

$tmp = $_FILES["image".$i]['tmp_name'];



if(move_uploaded_file($tmp, $path.$actual_image_name))

{



$strSQL = "INSERT INTO product_image ";

$strSQL .="(product_id, image_url) VALUES 

('$product_id','".$actual_image_name."')";



mysqli_query($connect,$strSQL);

//echo $_FILES["image".$i]["name"]." completed.<br>";

}

else {

$err[] =  "Unable to upload.  May be invalid formats or size is bigger, please upload images less than 1MB.";

}

}

}

else {}

}











echo "<div style='width: 350px; text-align: center; margin: 20% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'> 

Please wait while we update loading...</div>";

$url= base64_encode($product_id);



echo "<script type='text/javascript'>window.location = 'product_image.php?product_id=$url'</script>";

}



//action=delete&catid

if ($_GET['action'] == 'delete') {



$product_id  = $_GET['product_id'];

$id  = $_GET['nwsevnt_id'];

$image_url  = $_GET['image_url'];

$target_path     = "product/";





$sql = "DELETE FROM product_image WHERE product_image_id = $id;";

$query = mysqli_query($connect,$sql) or die("There was a problem while deleting: " . mysqli_error());



echo "<div style='width: 350px; text-align: center; margin: 20% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update the record loading...</div>";



if ($query) {



$oldimage_path = $target_path.$image_url;

unlink($oldimage_path);



$url= base64_encode($product_id);



echo "<script type='text/javascript'>window.location = 'product_image.php?product_id=$url'</script>";

}



}





?>

<!DOCTYPE html>

<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>

<meta charset="utf-8" />

<title>Product Images | <?php echo $site_title; ?></title>

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

<span>Product Images</span>

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

<div class="portlet light portlet-fit portlet-form ">

<div class="portlet-title">

<div class="caption">

    <i class="fa fa-cutlery  font-red" aria-hidden="true"></i>

    <span class="caption-subject font-red sbold uppercase">Product Name : <?php echo productDB($product_id);?> </span>

</div>

</div>

<div class="portlet-body">

<!-- BEGIN FORM-->

<div class="col-md-6">

    <table class="table table-bordered">

        <thead>

            <tr>

                <th>#</th>

                <th>Image</th>

                <th>Delete</th>

            </tr>

        </thead>

        <tbody>

        <?php

        $sno = 0;

         $get_model = mysqli_query($connect,"SELECT * FROM `product` where product_id = '$product_id'") or die(mysqli_error());
         $count=mysqli_num_rows($get_model);

        while($get_value = mysqli_fetch_array($get_model)) 

        {

            $sno++;

            $product_image = $get_value['product_image'];

            // $image_url = $get_value['image_url'];

        ?>



            <tr>

                <td><?php echo $sno; ?></td>

                <td class="text-center"><img src="acheivement/<?php echo $product_image; ?>" width="85" height="85" ></td>

                <td>


                    <i class="icon-trash"></i> </a>



                </td>







            </tr>
            


        <?php

        }

        ?>

        </tbody>

    </table>

</div>

<div class="col-md-6">


<?php if($count<4) { ?>
    <form action="" id="form_sample_1" method="post" class="form-horizontal" novalidate="novalidate" enctype="multipart/form-data">

        <div class="form-body">

            

            

            <div class="form-group last">

                <div class="col-md-8">

                    <div class="col-md-12">

                        <input type="hidden" name="line" value="1">

                        <div class="fileinput fileinput-new" data-provides="fileinput">

                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">

                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""> </div>

                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">

                            </div>

                            <div>

                                <span class="btn default btn-file">

                                    <span class="fileinput-new"> Select image </span>

                                    <span class="fileinput-exists"> Change </span>

                                    <input type="file" name="image1">

                                    

                                </span>

                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>

                            </div>

                        </div>

                    </div>

                    <div class="field_wrapper">

                    </div>

                </div>

                <div class="col-md-2">

                    <a href="javascript:void(0);" class="add_button btb btn-success btn-sm" title="Add field"><i class="fa fa-plus"></i></a>

                </div>

            </div>

        </div>

        <div class="form-actions">

            <div class="row">

                <div class="col-md-offset-3 col-md-9">

                    <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">

                    <button type="submit" class="btn green" name="add" value="Create">Submit</button>

                    <button type="reset" value="Reset" class="btn grey-salsa btn-outline">Reset</button>

                </div>

            </div>

        </div>

    </form>
<?php } ?>
</div>



<!-- END FORM-->

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

<!-- repeater -->

<script src="assets/global/plugins/jquery-repeater/jquery.repeater.js" type="text/javascript"></script>

<script src="assets/pages/scripts/form-repeater.min.js" type="text/javascript"></script>

<!-- End repeater -->

<!-- END THEME LAYOUT SCRIPTS -->

<!-- Password Check -->>



<script type="text/javascript">

$(document).ready(function()

{

var maxField = 4;

//Input fields increment limitation

var addButton = $('.add_button');

//Add button selector

var wrapper = $('.field_wrapper');

//Input field wrapper

var q = '1';

$(addButton).click(function(){

//Once add button is clicked

if(q < maxField){

//Check maximum number of input fields

q++;

//Increment field counter

$(wrapper).append('<div><div class="col-md-12"><input type="hidden" value="'+q+'" name="line"><div class="fileinput fileinput-new" data-provides="fileinput"><div class="fileinput-new thumbnail" style="width: 200px; height: 150px;"><img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""> </div><div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div><div><span class="btn default btn-file"><span class="fileinput-new"> Select image </span><span class="fileinput-exists"> Change </span><input type="file" name="image'+q+'"></span><a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a></div></div><div class="field_wrapper"></div><a href="javascript:void(0);" style="float: right;margin-top: -73%;" class="remove_button btb btn-danger btn-sm" title="Remove field"><i class="fa fa-trash-o"></i></a></div></div>');

// Add field html

}

}

);

var x = 1;

//Initial field counter is 1

$(addButton).click(function(){

//Once add button is clicked

if(x < maxField){

//Check maximum number of input fields

x++;

//Increment field counter

$(wrapper).append(fieldHTML);

// Add field html

}

}

);

$(wrapper).on('click', '.remove_button', function(e){

//Once remove button is clicked

e.preventDefault();

$(this).parent('div').remove();

//Remove field html

x--;

//Decrement field counter

}

);

}

);

</script>



</body>



</html>