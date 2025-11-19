<?php
session_start();
include_once 'function.php';
$toady = date("d-m-Y");
$from  = '';
$to    = '';
if (isset($_GET['report_search']) == 'Search') {
    $from     = $_GET['from'];
    $to       = $_GET['to'];
    $Fromdate   = (empty($from)) ? '' : date("Y-m-d", strtotime($from));
    $Todate     = (empty($to)) ? date("Y-m-d", strtotime($from. "+1 days")) : date("Y-m-d", strtotime($to. "+1 days"));
    // ********************************************************************************************
    if ($Fromdate != "") {
        if ($Todate != "") {
            $cond .= "  function_date BETWEEN '" . $Fromdate . "' AND '" . $Todate . "'";
        } else {
            $cond .= "  function_date BETWEEN '" . $Fromdate . "' AND '" . $Fromdate . "'";
        }
    }
}
// echo $cond;
if ($_POST['update_remark'] == 'Update2') {
    $remark_cus           = $_POST['remark_cus'];
    $catering_customer_id = $_POST['catering_customer_id'];
    // echo "UPDATE catering_customer  SET  `remark_cus` = '$remark_cus' where  catering_customer_id='$catering_customer_id' ";
    // die('hi');
    mysqli_query($connect, "UPDATE catering_customer  SET  `remark_cus` = '$remark_cus' where  catering_customer_id='$catering_customer_id' ") or die(mysqli_error($connect));
    echo "<script type='text/javascript'>window.location = 'invoice.php?msg=updated&action=list'</script>";
    
}
if ($_POST['update_page'] == 'Update') {
    // die('hi');
    $session_id           = $_POST['session_id'];
    $catering_customer_id = $_POST['catering_customer_id'];
    $workers_type         = $_POST['workers_type'];
    $food_iems_array      = array(
        4,
        5,
        6,
        7,
        8,
        21,
        79,
        109,
        110,
        111,
        112,
        113,
        114,
        115,
        116,
        117,
        118,
        119,
        120,
        121,
        122
    );
    for ($i = 0; $i <= 20; $i++) {
        $get_catfood = mysqli_query($connect, "SELECT * FROM `cart_catering` Where food_item_id ='$food_item_id' and session_id='$session_id'  ") or die(mysqli_error());
        while ($Fetch_dis = mysqli_fetch_array($get_catfood)) {
            $food_item_id = $Fetch_dis['food_item_id'];
            
            // echo "SELECT `$workers_type`AS 'disposable'  FROM `food_items` Where food_item_id ='$food_item_id'  ";
            // die();
            $get_up = mysqli_query($connect, "SELECT `$workers_type`AS 'disposable'  FROM `food_items` Where food_item_id ='$food_item_id'  ") or die(mysqli_error());
            while ($Fetch_dis = mysqli_fetch_array($get_up)) {
                $disposable = $Fetch_dis['disposable'];
                // echo "UPDATE cart_catering  SET  `disposable` = '$disposable' where session_id = '$session_id' and food_item_id='$food_item_id' ";
                // die();
                mysqli_query($connect, "UPDATE cart_catering  SET  `disposable` = '$disposable' where session_id = '$session_id' and food_item_id='$food_item_id' ") or die(mysqli_error());
            }
        }
    }
    mysqli_query($connect, "UPDATE catering_customer  SET  `worker_active` = '1' where  catering_customer_id='$catering_customer_id' ") or die(mysqli_error());
    
    echo "<script type='text/javascript'>window.location = 'invoice.php?msg=updated&action=list'</script>";
}
if ($_GET['action'] == 'delete') {
    $session_id = $_GET['session_id'];
    mysqli_query($connect, "UPDATE cart_catering  SET  `deleted` = '0' where session_id = '$session_id'") or die(mysqli_error());
    $query = mysqli_query($connect, "UPDATE catering_customer  SET  `deleted` = '0' where session_id = '$session_id'") or die(mysqli_error());
    echo "<div style='width: 350px; text-align: center; margin: 20% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we Upadating the record loading...</div>";
    if ($query) {
        echo "<script type='text/javascript'>window.location = 'invoice.php?msg=deleted&action=list'</script>";
    }
}



?>
<!DOCTYPE html>
<html lang="en">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <head>
        <meta charset="utf-8" />
        <title>Invoice | <?php echo $site_title; ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content=""  name="description" />
        <meta content=""  name="author" />
        <link rel="shortcut icon" type="image/x-icon" href="assets/favicon.ico">
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
        
        <link href="assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/layouts/customer.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- Date Picker -->
        <link rel="stylesheet" href="assets/datepicker/jquery-ui.css">
        <link rel="stylesheet" href="assets/datepicker/style.css">
        <script src="assets/datepicker/jquery-1.12.4.js"></script>
        <script src="assets/datepicker/jquery-ui.js"></script>
        <script src="assets/datepicker/datepicker.js"></script>
        <!-- Emd Date picker -->
        <script>
        $( function() {
        $( "#datepicker" ).datepicker({
        dateFormat: 'dd-mm-yy'
        }
        );
        }
        );
        </script>
        <script>
        $( function() {
        $( "#datepicker2" ).datepicker({
        dateFormat: 'dd-mm-yy'
        }
        );
        }
        );
        </script>
        <style type="text/css">
        .Cart-list{
        padding: 5px 15px;
        margin-bottom: -1px;
        width: 250px;
        }
        .dt-buttons {
        display: none;
        }
        .table-overflow {
        overflow-x: scroll;
        }
        .span{
        padding: 7px 7px 7px 0px;
        }
        .label{
        padding: 0px 7px;
        }
        #status { padding:10px; background:#88C4FF; color:#000; font-weight:bold; font-size:12px; margin-bottom:10px; display:none; width:100%; }
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
                        <!-- <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li><a href="index.php">Home</a><i class="fa fa-circle"></i></li>
                                <li><span>Invoice</span></li>
                            </ul>
                            <div class="page-toolbar">
                            </div>
                        </div> -->
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
                        <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet box green">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-globe">
                                            </i>Invoice
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <form class="form-inline" action="" method="get">
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label"><b>Function Range</b></label>
                                                        <div class="col-md-8">
                                                            <div class="input-daterange input-group" data-plugin-datepicker data-plugin-options='{"format": "dd-mm-yyyy"}'>
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-calendar"></i>
                                                                </span>
                                                                <input autocomplete="off" type="text" name="from" id="datepicker" class="form-control" readonly="readonly" value="<?php echo $from = ($_GET['report_search'] == 'All') ? '' : $from ;?>">
                                                                <span class="input-group-addon">to</span>
                                                                <input autocomplete="off" type="text" name="to" id="datepicker2" class="form-control" readonly="readonly" 
                                                                value="<?php echo $to = ($_GET['report_search'] == 'All') ? '' : $to ;?>"> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix visible-xs mb-sm"></div>
                                                    <button type="submit" class="btn btn-success" name="report_search" value="Search">Search</button>
                                                    <button type="submit" class="btn btn-warning" name="report_search" value="All">All Invoice</button>
                                                </form>
                                            </div>
                                        </div>
                                        <hr>
                                        <table class="table table-striped table-bordered table-hover" id="sample_2">
                                            <thead>
                                                <tr class="">
                                                    <th> S.NO </th>
                                                    <th>Function Date</th>
                                                    <th> Invoice No</th>
                                                    <th> Name / Tel</th>
                                                    <td>Remark</td>
                                                    <th>Site</th>
                                                    <th>Modify</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $sno        = 0;
                                                    $today_date = date('Y-m-d');
                                                    // $get_catering = mysqli_query($connect,"SELECT * FROM `catering_customer` Where `orderStatus` = 'yes' and deleted ='1' and order_date_time BETWEEN '2016-01-01' AND '$today_date' ORDER BY function_date DESC") or die(mysqli_error($connect));

                                                    if ($_GET['report_search'] == 'All') {
                                                        $invoice_sql = "SELECT catering_customer_id, session_id, guest, salutation, name, cname, email, phone, mobile, fax, bill_address, postalcode, delivery_address, delivery_postalcode, delivery_type_id, function_date, function_time, function_time2, Special_instruction, modeby, about, invoice_no, order_success, remark, workers_type, workers_type, remark_cus, worker_active,site_map FROM `catering_customer` Where `orderStatus` = 'yes' and deleted ='1' ORDER BY function_date DESC";
                                                    } elseif ($_GET['report_search'] == 'Search') {
                                                        $invoice_sql = "SELECT catering_customer_id, session_id, guest, salutation, name, cname, email, phone, mobile, fax, bill_address, postalcode, delivery_address, delivery_postalcode, delivery_type_id, function_date, function_time, function_time2, Special_instruction, modeby, about, invoice_no, order_success, remark, workers_type, workers_type, remark_cus, worker_active,site_map FROM `catering_customer` Where ($cond) and `orderStatus` = 'yes' and deleted ='1' ORDER BY function_date DESC";
                                                        
                                                    } else {
                                                        $invoice_sql = "SELECT catering_customer_id, session_id, guest, salutation, name, cname, email, phone, mobile, fax, bill_address, postalcode, delivery_address, delivery_postalcode, delivery_type_id, function_date, function_time, function_time2, Special_instruction, modeby, about, invoice_no, order_success, remark, workers_type, workers_type, remark_cus, worker_active,site_map FROM `catering_customer` Where `orderStatus` = 'yes' and deleted ='1' ORDER BY function_date DESC limit 0,50";
                                                    }
                                                    // echo $invoice_sql;
                                                    $get_catering = mysqli_query($connect, $invoice_sql) or die(mysqli_error($connect));
                                                    while ($Fetch_cust = mysqli_fetch_array($get_catering)) {
                                                        $sno++;
                                                        $catering_customer_id = $Fetch_cust['catering_customer_id'];
                                                        $session_id           = $Fetch_cust['session_id'];
                                                        $guest                = $Fetch_cust['guest'];
                                                        $salutation           = $Fetch_cust['salutation'];
                                                        $cust_name            = $Fetch_cust['name'];
                                                        $cname                = $Fetch_cust['cname'];
                                                        $email                = $Fetch_cust['email'];
                                                        $phone                = $Fetch_cust['phone'];
                                                        $mobile               = $Fetch_cust['mobile'];
                                                        $fax                  = $Fetch_cust['fax'];
                                                        $bill_address         = $Fetch_cust['bill_address'];
                                                        $postalcode           = $Fetch_cust['postalcode'];
                                                        $yes                  = $Fetch_cust['yes'];
                                                        $delivery_address     = $Fetch_cust['delivery_address'];
                                                        $delivery_postalcode  = $Fetch_cust['delivery_postalcode'];
                                                        $delivery_type_id        = $Fetch_cust['delivery_type_id'];
                                                        $Function_date        = $Fetch_cust['function_date'];
                                                        $function_date        = date("d-m-Y", strtotime($Function_date));
                                                        $function_time        = $Fetch_cust['function_time'];
                                                        $function_time2       = $Fetch_cust['function_time2'];
                                                        $Special_instruction  = $Fetch_cust['Special_instruction'];
                                                        $modeby               = $Fetch_cust['modeby'];
                                                        $about                = $Fetch_cust['about'];
                                                        $invoice_no           = $Fetch_cust['invoice_no'];
                                                        $order_success        = $Fetch_cust['order_success'];
                                                        $remark               = $Fetch_cust['remark'];
                                                        $workers_type         = $Fetch_cust['workers_type'];
                                                        $W_type               = $Fetch_cust['workers_type'];
                                                        $remark_cus           = $Fetch_cust['remark_cus'];
                                                        $worker_active        = $Fetch_cust['worker_active'];
                                                        $site_map               = $Fetch_cust['site_map'];



                                                        $Get__Order = mysqli_query($connect, "SELECT *, COUNT(*) AS total_food_count FROM `cart_catering` WHERE `session_id` = '$session_id'") or die(mysqli_error());
                                                        $fetch_Order      = mysqli_fetch_array($Get__Order);
                                                        $cart_catering_id = $fetch_Order['cart_catering_id'];
                                                        $total_food_count = $fetch_Order['total_food_count'];
                                                        $created          = date("d-m-Y", strtotime($fetch_Order['created']));
                                                ?>
                                                <tr>
                                                    <td><?php echo $sno;?> </td>
                                                    <td style="<?php echo Status_color($order_success);?>"><?php echo $function_date;?> </td>
                                                    <td><?php echo $invoice_no;?> </td>
                                                    <td><?php echo $salutation.' '.$cust_name;?> / <?php echo $phone;?> </td>
                                                    <td>  <a class="btn btn-success btn-xs" data-toggle="modal" href="#Remark<?php echo $catering_customer_id; ?>">
                                                        <i class="fa fa-pencil" aria-hidden="true">
                                                        </i> Remarks
                                                    </a></td>
                                                    <td <?php echo siteMap($site_map);?>><?php echo siteMapName($site_map);?> </td>
                                                    <td>
                                                        <a class="btn btn-danger  btn-xs"  href="<?php echo InvoicePage($site_map);?>?ID=<?php echo base64_encode($session_id) ?>&from=<?php echo $from;?>&to=<?php echo $to;?>">
                                                            <i class="fa fa-print" aria-hidden="true">
                                                            </i> Invoice
                                                        </a>
                                                        
                                                        <a class="btn btn-success  btn-xs"  href="<?php echo MailPage($site_map);?>?session=<?php echo base64_encode($session_id) ?>&from=<?php echo $from;?>&to=<?php echo $to;?> " target="_blank">
                                                            <i class="fa fa-envelope" aria-hidden="true">
                                                            </i> E-Mail
                                                        </a>
                                                        
                                                        <a class="btn btn-info  btn-xs"  href="cart_catering_edit.php?ID=<?php echo base64_encode($session_id) ?>&from=<?php echo $from;?>&to=<?php echo $to;?>">
                                                            <i class="fa fa-pencil" aria-hidden="true">
                                                            </i> Edit
                                                        </a>
                                                        <a class="btn btn-warning  btn-xs"  href="cart_catering_view.php?ID=<?php echo base64_encode($session_id); ?>&from=<?php echo $from;?>&to=<?php echo $to;?>">
                                                            <i class="fa fa-eye" aria-hidden="true">
                                                            </i> View Order
                                                        </a>
                                                        <a class="btn btn-xs red"  onClick="delete_menu('invoice.php?action=delete&session_id=<?php echo $session_id; ?>')" href="javascript:;">
                                                            <i class="fa fa-trash">
                                                            </i> Delete
                                                        </a>
                                                        <a class="btn btn-danger  btn-xs"  href="print_food.php?ID=<?php echo base64_encode($session_id) ?>&from=<?php echo $from;?>&to=<?php echo $to;?>" >
                                                            <i class="fa fa-print" aria-hidden="true">
                                                            </i>Food tag
                                                        </a>
                                                        <?php
                                                        if ($worker_active==1) {?>
                                                        <a class="btn btn-success btn-xs" data-toggle="modal" href="#Dl_type<?php echo $catering_customer_id; ?>" style=" background-color: gray;">
                                                            <i class="fa fa-pencil" aria-hidden="true">
                                                            </i> Workers
                                                        </a>
                                                        <?php
                                                        }else{ ?>
                                                        <a class="btn btn-success btn-xs" data-toggle="modal" href="#Dl_type<?php echo $catering_customer_id; ?>" >
                                                            <i class="fa fa-pencil" aria-hidden="true">
                                                            </i> Workers
                                                        </a>
                                                        
                                                        <?php
                                                        }
                                                        ?>
                                                        
                                                    </td>
                                                    
                                                    <div class="modal fade" id="Dl_type<?php echo $catering_customer_id; ?>" tabindex="-1" role="basic" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                    <h4 class="modal-title" style="color: #111">
                                                                    <b><?php echo $delivery_type_id;?></b>
                                                                    </h4>
                                                                </div>
                                                                <form action="" id="form_sample_1" method="post" class="form-horizontal" novalidate="novalidate" enctype="multipart/form-data">
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-body">
                                                                                    <div class="form-group">
                                                                                        <select  class="form-control select2" style="width: 100%" aria-hidden="true" name="new_type"  tabindex="6">
                                                                                            
                                                                                            <option value=" "><?php echo DTYPE($delivery_type_id);?></option>
                                                                                            
                                                                                        </select>
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                                
                                                                                
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <input type="hidden" name="session_id" value="<?php echo $session_id;?>">
                                                                        <input type="hidden" name="workers_type" value="<?php echo $workers_type;?>">
                                                                        <input type="hidden" name="catering_customer_id" value="<?php echo $catering_customer_id;?>">
                                                                        <button type="submit" class="btn dark" name="update_page" value="Update">Update</button>
                                                                        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <!-- /.modal-content -->
                                                        </div>
                                                        <!-- /.modal-dialog -->
                                                    </div>
                                                    <div class="modal fade" id="Remark<?php echo $catering_customer_id; ?>" tabindex="-1" role="basic" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                    <h4 class="modal-title" style="color: #111">
                                                                    <b><?php echo $cust_name;?></b>
                                                                    </h4>
                                                                </div>
                                                                <form action="" id="form_sample_1" method="post" class="form-horizontal" novalidate="novalidate" enctype="multipart/form-data">
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-body">
                                                                                    <div class="form-group">
                                                                                        <textarea rows="4" cols="50" name="remark_cus" >
                                                                                        <?php echo $remark_cus;?>
                                                                                        </textarea>
                                                                                        
                                                                                    </div>
                                                                                    
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            
                                                                            <input type="hidden" name="catering_customer_id" value="<?php echo $catering_customer_id;?>">
                                                                            <button type="submit" class="btn dark" name="update_remark" value="Update2">Update</button>
                                                                            <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <!-- /.modal-content -->
                                                            </div>
                                                            <!-- /.modal-dialog -->
                                                        </div>
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
                        </div>
                        <script type="text/javascript">
                        $('.confirmation').on('click', function () {
                        return confirm('Are you sure?');
                        });
                        $('.delconfirmation').on('click', function () {
                        return confirm('Are you sure?');
                        });
                        </script>
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
        </body>
    </html>