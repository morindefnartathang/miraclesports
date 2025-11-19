<?php
session_start();
include_once 'function.php';
if (!empty($_GET['ID']))
{
$url = $_GET['ID'];
$sno =0;
$get_bank = mysql_query("select * from invoice where invoice_id='$url'") or die(mysql_error());
while($get_value = mysql_fetch_array($get_bank))
{
$sno++;
$invoice_ids = $get_value['invoice_id'];
$invoice_no = $get_value['invoice_no'];
$buyer = $get_value['buyer'];
$GST_Cust = $get_value['GST_Cust'];
$state = $get_value['state'];
$grand_total = $get_value['grand_total'];
$newDate = $get_value['date'];
$user_id = $get_value['user_id'];
$date = date("d-m-Y", strtotime($newDate));

$cgst = $grand_total * 0.05;
$sgst = $grand_total * 0.05;

}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title><?php if($site_title == '') { echo  "Administrator Panel"; } else { echo $site_title; } ?> || Shop Setting</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport" />
<meta content="Preview page of Metronic Admin Theme #1 for invoice sample" name="description" />
<meta content="" name="author" />
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
<link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
<link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
<link href="assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
<link href="assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
<link href="assets/pages/css/invoice.min.css" rel="stylesheet" type="text/css" />
<link href="assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
<link href="assets/layouts/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
<link href="assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="favicon.ico" />
<script type="text/JavaScript">     
window.print();       
</script>
</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
<div class="page-wrapper">
<?php include("header.php");?>
<div class="clearfix"> </div>
<div class="page-container">
<?php include("menu.php");?>
<div class="page-content-wrapper">
<div class="page-content">
<div class="page-bar">
<ul class="page-breadcrumb">
<li>
<a href="#">Home</a>
<i class="fa fa-circle"></i>
</li>
<li>
<span>Invoice</span>
</li>
</ul>
<a class="btn btn-sm red hidden-print margin-bottom-5 pull-right" onclick="javascript:window.print();"> Print
<i class="fa fa-print"></i>
</a>

<a class="btn btn-sm blue hidden-print margin-bottom-5 pull-right" href="invoiceadd.php" > Billing
<i class="fa fa-info-circle"></i>
</a>


</div>

<div class="invoice" style="margin-top: -20px">
<div class="row invoice-logo">
	<div class="col-xs-12 text-center bold"> <h5 style="font-size: 14px"><strong> Trichy Online Store</strong></h5> </div>
<div class="col-xs-12 text-center bold"> <h5 style="font-size: 12px"><strong>Cash Receipt</strong></h5> </div>
<div class="col-xs-4 invoice-logo-space">
<img src="assets/utsav_logo.png" class="img-responsive" width="200px" alt=""> </div>
<div class="col-xs-8" style="padding: 0px">
<h5 style="    margin-top: -2px;font-size: 14px;    line-height: 1.5;"><strong>Trichy Online Store</strong>
<br>
<span style="font-size: 12px;font-weight: bold;    line-height: 1.5;">No.1,Cholan Salai,<br>Selvanagar Extension,<br>Ponnagar Post,Trichy,<br>Tamil Nadu-620 001,India.</span> &nbsp;&nbsp;  <span style="font-size: 9px;font-weight: bold;    line-height: 1.5;">GSTIN:No.33BGPPS6336D1Z7</span>
<!-- <br> -->
<!-- <span style="font-size: 9px;font-weight: bold;    line-height: 1.5;">தொலைபேசி : 0427 6540202 , மின் அஞ்சல : aavinslm@gmail.com</span> -->

</h5>
</div>
</div>
<div class="row" style="margin-top: -17px;margin-bottom: 0px;position: absolute;">
<div class="col-xs-12" style="margin: 0px;">
<span style="font-size: 14px;font-weight: bold;">Phone no : +91 94896869482.</span>
</div>
</div>

<div class="row" style="margin-top: -31px;margin-bottom: 0px;position: absolute;">
<div class="col-xs-12" style="margin: 0px;">
<span style="font-size: 9px;font-weight: bold;">Bill by: 
    <?php
        if(empty($user_id)){
echo "Admin";
}else{
echo UserDB($user_id);
}

    ?>
</span>
</div>
</div>





<div class="row" style="margin-top: 5px;">
<div class="col-xs-6">
<p class="text-left" style="margin: 0;font-size: 10px;"><strong>NO :<?php echo $invoice_no; ?></strong></p>
</div>
<div class="col-xs-6">
<p class="text-right" style="margin: 0;font-size: 10px;"><strong><?php echo $date;?> / <?php echo $time = date("h:i A",strtotime($newDate));?></strong></p>
</div> 
</div>

<div class="row">
<div class="col-xs-12">
<table class="table table-striped table-hover">
<thead>
<tr>
<th style=""> Sno </th>
<th style=""> Product Name </th>
<th style="width: 15%"> Price </th>
<th style="width: 15%"> GST(%) </th>
<th style="width: 15%"> Disc(%) </th>

<th style="width: 16%;text-align: right;"> <p style="text-align: right;margin: 0">Total(&#8377;)</p> </th>
</tr>
</thead>
<tbody>
<?php
$sno=0;;
$get_invoiceAdd = mysql_query("select * from invoiceadd where invoice_id ='$invoice_ids'") or die(mysql_error());
$count = mysql_num_rows($get_invoiceAdd);
while($FetchIn = mysql_fetch_array($get_invoiceAdd))
{
$sno++;
$product_id = $FetchIn['product_id'];
$product_code = $FetchIn['product_code'];
$product_name = $FetchIn['product_name'];
$qty = $FetchIn['qty'];
$price = $FetchIn['price'];
$total = $FetchIn['total'];
$discount = $FetchIn['discount'];

$cates = mysql_query("select * from product where product_id ='$product_id'") or die(mysql_error());
$row = mysql_fetch_assoc($cates);
$GST_Price = $row['GST_Price'];
$GST_Percentage = $row['GST_Percentage'];                                            
$Billing_Price = $row['Billing_Price'];
$basic_price = $row['basic_price'];

$sum_GST_Price += $GST_Price*$qty;
$sum_basic_price += $basic_price*$qty;

$gstwithout = $grand_total - $sum_GST_Price;

$totalm = $qty*$basic_price;
?>
<tr>
<td> <?php echo $sno; ?> </td>
<td> <?php echo $product_name; ?> </td>
<td> <?php echo $qty; ?> X <?php echo $basic_price; ?> </td>

<th style="width: 15%"> <?php echo $GST_Percentage; ?></th>

<td> <?php if($discount!=''){echo $discount;}else { echo "0";}?> </td>

<td> <p  style="margin: 0;font-size: 10px;text-align: right;"><?php echo number_format($totalm, 2, '.', ''); ?></p> </td>
</tr>
<?php
}
?>
<tr>
<td class="text-right" colspan="5"><strong>Total :</strong></td>
<td style="text-align: right;"> 
<p style="text-align: right;margin: 0"><strong  style="margin: 0;font-size: 10px;"><?php echo  number_format($gstwithout, 2, '.', '');  ?> </strong> </p>
</td>
</tr>
<tr>
<td class="text-right" colspan="5"><strong>CGST :</strong></td>
<td style="text-align: right;"> 
<p style="text-align: right;margin: 0"><strong  style="margin: 0;font-size: 10px;"><?php echo $sum_GST_Price/2;  ?> </strong> </p>
</td>
</tr>
<tr>
<td class="text-right" colspan="5"><strong>SGST :</strong></td>
<td style="text-align: right;"> 
<p style="text-align: right;margin: 0"><strong  style="margin: 0;font-size: 10px;"><?php echo $sum_GST_Price/2;  ?> </strong> </p>
</td>
</tr>
<tr>
<td class="text-right" colspan="5"><strong>Grand Total :</strong></td>
<td style="text-align: right;"> 
<p style="text-align: right;margin: 0"><strong  style="margin: 0;font-size: 10px;"><?php echo  number_format($grand_total, 2, '.', '');  ?> </strong> </p>
</td>
</tr>

</tbody>
</table>
<div class="col-xs-12 text-center">
<h5><strong>Thank You. Welcome Again.....</strong></h5>
</div>
<br>
<br>
<br>
<br>
</div>
</div>
<div class="row">

<div class="col-xs-8 invoice-block">

<br>
<a class="btn btn-lg blue hidden-print margin-bottom-5" onclick="javascript:window.print();"> Print
<i class="fa fa-print"></i>
</a>

</div>
</div>
</div>
</div>
</div>
<a href="javascript:;" class="page-quick-sidebar-toggler">
<i class="icon-login"></i>
</a>

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
<script src="assets/global/scripts/app.min.js" type="text/javascript"></script>
<script src="assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
<script src="assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
<script src="assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
<script src="assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
<script>
$(document).ready(function()
{
$('#clickmewow').click(function()
{
$('#radio1003').attr('checked', 'checked');
});
})
</script>
</body>
</html>