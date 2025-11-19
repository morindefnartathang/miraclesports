<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

session_start();
include 'include/config.php';




// // ========================== Reference No =========================================================

$booking_id = $_GET["id"];
// echo "SELECT * FROM `order_cart_add` where order_cart_add_id = '$booking_id'";
    $get_booking = mysqli_query($connect,"SELECT * FROM `order_cart_add` where order_cart_add_id = '$booking_id'") or die(mysqli_error($connect));

    while($fetch_booking = mysqli_fetch_array($get_booking))
        {
            $order_cart_add_id    = $fetch_booking['order_cart_add_id'];
$order_cart_id        = $fetch_booking['order_cart_id'];
$payment              = $fetch_booking['payment'];
$billing_id           = $fetch_booking['billing_id'];
$order_date           = date("d-m-Y", strtotime($fetch_booking['order_date']));
$total                = $fetch_booking['total'];
$order_no             = $fetch_booking['order_no'];                                                              
$shipping_price       = $fetch_booking['shipping_price'];
$registered_users_id  = $fetch_booking['registered_users_id'];
$shipped_status       = $fetch_booking['shipped_status'];
$session_id = $fetch_booking['session_id'];    
  
$get_billing = mysqli_query($connect,"SELECT * FROM billing_details where billing_id = '$billing_id' ") or die(mysqli_error($connect));

while($get_billing_value = mysqli_fetch_array($get_billing))
{
$billing_id      =  $get_billing_value['billing_id'];
$billing_name    =  $get_billing_value['billing_name'];
$billing_email   =  $get_billing_value['billing_email'];
$billing_phone   =  $get_billing_value['billing_phone'];
$billing_address =  $get_billing_value['billing_address'];
$billing_notes   =  $get_billing_value['billing_notes'];
$billing_pincode =  $get_billing_value['billing_pincode'];
}

        }
// *******************************************************************  Quote ********************************************************************

$html = "
<html>
    <head>
        <style>
        body {
        font-family: sans-serif;
        font-size: 9pt;
        }
        p {
        margin: 0pt;
        }
        
        td {
        vertical-align: top;
        }
        
        table thead td {
        background-color: #EEEEEE;
        text-align: center;
        border: 0.1mm solid #000000;
        font-variant: small-caps;
        }
        </style>
    </head>
    <body>
        <htmlpageheader name='myheader'>
            <table width='100%'>
            <tr>
                    <th></th>
                    <th></th>
                </tr>
             
                <tr>
                <td></td>
                </tr>
                <br />     <br />     <br />     <br />
                <tr>
                    <td width=''>
                        <table width='100%'>
                            <tr>
                                <td width='45%'>To</td>
                                <td width='5%'> : </td>
                                <td width='50%'> ".$billing_name." </td>
                            </tr>
                                <tr>
                                <td width='45%'>Tel / Phone</td>
                                <td width='5%'> : </td>
                                <td width='80%'>".$billing_phone."</td>
                            </tr>
                              <tr>
                                <td width='45%'>Email</td>
                                <td width='5%'> : </td>
                                <td width='80%'>".$billing_pincode."</td>
                            </tr>
                            <tr>
                                <td width='45%'>Address</td>
                                <td width='5%'> : </td>
                                <td width='80%'> ".$billing_address." - ".$billing_pincode."</td>
                            </tr>
                        
                       
                            
                        </table>
                    </td>
                    <td width=''>
                        <table width='100%'>
                            <tr>
                                <td width='40%'>Order Date</td>
                                <td width='10%'> : </td>
                                <td width='50%'> ".$order_date." </td>
                            </tr>
                            <tr>
                                <td width='40%'>Order no</td>
                                <td width='10%'> : </td>
                                <td width='50%'><b> ".$order_no."</b></td>
                            </tr>
                              <tr>
                                <td width='40%'>Payment:</td>
                                <td width='10%'> : </td>
                                <td width='50%'><b> ".$payment."</b></td>
                            </tr>
                            
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan='2' style='border-top: 1px solid #ccc;padding:10px'>
                        <p style='margin-top:18px'> Dear <b>".$billing_name."  </p>
                     <br />
                       
                        <p>Thank you for your order.</p>
                    </td>
                </tr>               
            </table>";


     $html.= "<table width='100%' style='margin-bottom: 15px;max-height: 250px; page-break-inside: avoid;overflow: wrap' autosize='1'>
                <tr>
                    <th width='15%' align='left' style='font-size: 12pt;'> s.no </th>
                    <th valign='top' width='35%' align='left' style='font-size: 12pt;'>Product name</th>
                    <th valign='top' width='25%' align='left' style='font-size: 12pt;'> Qty</th>
                    <th width='25%' align='left' style='font-size: 12pt;'> Total </th>
                </tr>
                ";
    
    $html.= "</table>";
    
                      $sno = 0;        
                    //   echo "SELECT * FROM order_cart where session_id = '$session_id'";
$get_prjjoduct = mysqli_query($connect,"SELECT * FROM order_cart where session_id = '$session_id'") or die(mysqli_error());
while($get_vaklue = mysqli_fetch_array($get_prjjoduct)) 
{
$session_id=$get_vaklue['session_id'];
$product_id=$get_vaklue['product_id'];
$quantity=$get_vaklue['quantity'];
$order_price=$get_vaklue['order_price'];
$total_cost += $order_price;
           $sno++;
              $get_products = mysqli_query($connect,"SELECT * FROM product where product_id = '$product_id'  ") or die(mysqli_error());
                         
                            while($get_detaissls = mysqli_fetch_array($get_products))
                            {
                       
                            $product_id            = $get_detaissls['product_id'];
                            $organic_menu_id       = $get_detaissls['organic_menu_id'];
                            $product_name          = $get_detaissls['product_name'];
                            $product_description   = $get_detaissls['product_description'];
                            $product_price         = $get_detaissls['product_price'];
                            $product_image         = $get_detaissls['product_image'];
                            $status                = $get_detaissls['status'];
                            }
  
    
    $html.= "<table width='100%' style='margin-bottom: 15px;max-height: 250px; page-break-inside: avoid;overflow: wrap' autosize='1'>
                <tr>
                    <th width='15%' align='left' style='font-size: 9pt;'>".$sno." </th>
                    <th valign='top' width='35%' align='left' style='font-size: 9pt;'>".$product_name."</th>
                    <th valign='top' width='25%' align='left' style='font-size: 9pt;'> ".$quantity." </th>
                    <th width='25%' align='left' style='font-size: 9pt;'>Rs. ".$total_cost."</th>
                </tr>
                ";
    
    $html.= "</table>";
}




// ***********************************************************
                        //The Quotation is valid for 7 days.''
                        //Order Confirmation through official LPO only.'

                       // Any change in specifications will change in pricing.
    
    //

    //**********************************************************************************************************************
    // ************************************************ Price is inclusive of Logistics / Distribution Charges
    //  Price is proposed for the Full Quantity per annum and same price is applicale quaterly quantities too.
    //  The Quaterly Quantities as mentioned in the tender form is also mentioned in the quotation in the category special instruction

    //*********************************************************************************************************************************
    
              $html.= " <br /><b>
                      
                         </b>
                        <br />";
                        
$html.= "
            <table width='100%'>
            <tr>Payment Terms :  d</tr>
                <tr>
                    <td colspan='4'>
                        <b>
                         For Enquiries Contact : (+91) - 8428819336 
                        <br />
                      

                        <br />
                   
                             <br />
                      
                        </b>
                        <br />

             
                        <br />
                       Thank you for purchase with Omsiga.
                    </td>
                </tr>
                <tr>
                    <td colspan='4'>
                        <div style='float:left;width:50px;'>
                            Best Regards,
                            <br />
                            <br />
                            For <b>OMSIGA </b>
                        </div>
                        <br />
                        <br />
            
                    </td>
                </tr>
            </table>";
$html.= "
        </body>
    </html>
    ";

// echo $html;
// exit();

define('_MPDF_PATH', 'mpdf/');
include ("mpdf/mpdf.php");

// require('mpdf/mpdf.php');

$mpdf = new mPDF('a', 'a5', '', '', 20, 15, 30, 25, 10, 10);
$mpdf->SetProtection(array(
    'print'
));
$mpdf->SetTitle("$order_no");
$mpdf->SetWatermarkText("OMSIGA");
$mpdf->SetAuthor("OMSIGA.");
$mpdf->showWatermarkText = true;
$mpdf->watermark_font = 'DejaVuSansCondensed';
$mpdf->shrink_tables_to_fit = 1;
$mpdf->watermarkTextAlpha = 0.1;
$mpdf->SetDisplayMode('fullpage');
$mpdf->SetHTMLHeader('
    <table width="100%">
        <tr>
            <td width="100%"><img src="../images/logo2.png" width="150"></td>
        </tr>
         <tr>
                <td></td>
         </tr>
           <tr>
                <td></td>
         </tr>
    </table>
    ');
$mpdf->SetHTMLFooter('
    <div style="font-size: 9pt; text-align: right; padding-top: 3mm; ">Page {PAGENO} of {nb}</div>
    <div style="border-top: 1px solid #2e3192; font-size: 9pt; text-align: center; padding-top: 1mm;color:#2e3192; ">

        <br />
omsiga.in, Salem
    </div>
    ');
    ob_clean();
flush();
$mpdf->WriteHTML($html);
$mpdf->Output('', "I");



?>
