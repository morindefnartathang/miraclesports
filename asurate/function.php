<?php

//for generating error report
//ini_set('display_errors', 1);
//error_reporting(E_ALL);

include 'include/config.php';
$status = $_GET['msg'];
if(!isset($_SESSION['CMSadmin']))
{
  header("Location: index.php");
}

$Admin = $_SESSION['CMSadmin'];

 		$SESS_Admin = mysqli_query($connect,"SELECT * from admin where admin_id ='$Admin'") or die(mysqli_error());
        while($FETCH_session_Admin = mysqli_fetch_array($SESS_Admin)) {
		$Admin_admin_id = $FETCH_session_Admin['admin_id'];
		$Admin_adminUser = $FETCH_session_Admin['adminUser'];
		$Admin_adminPassword = $FETCH_session_Admin['adminPassword'];
		$Admin_adminEmail = $FETCH_session_Admin['adminEmail'];
		$site_title = $FETCH_session_Admin['site_title'];
		$user_level = $FETCH_session_Admin['user_level'];
 	

      }
                
/*************************************
      GET PAGENAME
*************************************/
function curPageName() {
 return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
}

function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}

$currentpage = curPageName();

$randno = md5(time());


//current page
if($currentpage == 'home.php')
{
	$home = 'active open';
	$activeid1= '<span class="selected"></span>';
}
if($currentpage == 'tournament_list.php')
{
	$tournament_list = 'active open';
	$activeid1= '<span class="selected"></span>';
}

//current page
if($currentpage == 'reg_users.php')
{
	$reg_users = 'active open';
	$reg_users1 = '<span class="selected"></span>';
}


// organic_menu
	else if($currentpage == 'organic_menu.php') {
	$organic_menu = ' active open';
	$buyer_menu_arrow_open = ' open';
	$buyer_menu_display = ' style="display: block;"';
}

// sub_menu

	else if($currentpage == 'sub_menu.php') {
	$sub_menu = ' active open';
	$buyer_menu_arrow_open = ' open';
	$buyer_menu_display = ' style="display: block;"';
}

// productlist
	else if($currentpage == 'productlist.php' || $currentpage == 'productAdd.php' || $currentpage == 'productEdit.php' || $currentpage == 'product_image.php') {
	$productlist = ' active open';
	$productlist_arrow_open = ' open';
	$productlist_display = ' style="display: block;"';
}

// setting
	else if($currentpage == 'setting.php') {
	$setting = ' active open';
}


// ordered_customer
	else if($currentpage == 'ordered_customer.php') {
	$ordered_customer = ' active open';
}



// pincode
	else if($currentpage == 'pincode_price.php') {
	$pincode_price = ' active open';
}


//========================================== website settings =====================================================//

// ********************* About Us ****************** //

	else if($currentpage == 'add_aboutus.php') {

	$add_aboutus = ' active open';

	$add_aboutus_arrow_open = ' open';

	$add_aboutus_display = ' style="display: block;"';

}


// ********************* Terms ****************** //

	else if($currentpage == 'add_terms.php') {

	$add_terms = ' active open';

	$add_terms_arrow_open = ' open';

	$add_terms_display = ' style="display: block;"';

}


// ********************* Privacy Policy ****************** //

	else if($currentpage == 'add_privacy.php') {

	$add_privacy = ' active open';

	$add_privacy_arrow_open = ' open';

	$add_privacy_display = ' style="display: block;"';

}


// ********************* Add Contact ****************** //

	else if($currentpage == 'contact_add.php') {

	$add_contact = ' active open';

	$add_contact_arrow_open = ' open';

	$add_contact_display = ' style="display: block;"';

}


// ********************* Social Media ****************** //

	else if($currentpage == 'socialmedia.php') {

	$socialmedia = ' active open';

	$socialmedia_arrow_open = ' open';

	$socialmedia_display = ' style="display: block;"';

}


// ********************* Add Blog ****************** //

	else if($currentpage == 'add_blog.php') {

	$add_blog = ' active open';

	$add_blog_arrow_open = ' open';

	$add_blog_display = ' style="display: block;"';

}

//**************** Slider**********************//

else if($currentpage == 'slider.php') {

	$add_slider = ' active open';

	$add_slider_arrow_open = ' open';

	$add_slider_display = ' style="display: block;"';

}

// Select Category Menu Data base
function CategoryDB($organic_menu_id)
{
	 global $connect;
	$get_buyer = mysqli_query($connect,"SELECT * FROM `organic_menu` where organic_menu_id = '$organic_menu_id'") or die(mysqli_error());
	while($get_buyer_menu = mysqli_fetch_array($get_buyer)) 
	{
	                return $get_buyer_menu['organic_menu'];                        
	}
}

// Select productDB Data base
function productDB($product_id)
{
	 global $connect;
	$get_product = mysqli_query($connect,"SELECT * FROM `product` where product_id = '$product_id'") or die(mysqli_error());
	while($get_product_details = mysqli_fetch_array($get_product)) 
	{
	                return $get_product_details['product_name'];                        
	}
}

function billingDB($billing_id)
{
	 global $connect;
	$get_billing = mysqli_query($connect,"SELECT * FROM `billing_details` where billing_id = '$billing_id'") or die(mysqli_error());
	while($get_billing_details = mysqli_fetch_array($get_billing)) 
	{
	                return $get_billing_details['billing_name'];                        
	}
}

function registeredDB($registered_users_id)
{
	 global $connect;
	$get_registered_users = mysqli_query($connect,"SELECT * FROM `registered_users` where registered_users_id = '$registered_users_id'") or die(mysqli_error());
	while($get_registered_users_details = mysqli_fetch_array($get_registered_users)) 
	{
	                return $get_registered_users_details['user_name'];                        
	}
}


// Set timezone to IST
date_default_timezone_set('Asia/Kolkata');
?>