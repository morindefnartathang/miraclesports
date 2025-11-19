<?php                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 $x182b3fd0 = 408;?><?php
  include_once 'function.php';
  $session_id = $session_id;
?>

<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Privacy And Policy || <?php echo $site_title ?></title>
<link rel="icon" type="image/vnd.microsoft.icon" href="images/fav_icon.png">
<!-- Fixed Header -->
<link rel="stylesheet" type="text/css" href="css/fixed_header.css">
<!-- Bootstrap stylesheet -->
<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
<!-- crousel css -->
<link href="js/owl-carousel/owl.carousel.css" rel="stylesheet" type="text/css" />
<!--bootstrap select-->
<link href="js/dist/css/bootstrap-select.css" rel="stylesheet" type="text/css" />
<!-- font -->
<link href="https://fonts.googleapis.com/css?family=Fira+Sans:300,400,500,600,700,800,900" rel="stylesheet">
<!-- font-awesome -->
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="css/ele-style.css" rel="stylesheet" type="text/css"/>
<!-- stylesheet -->
<link href="css/style.css" rel="stylesheet" type="text/css"/>

<link href="css/social_icon.css" rel="stylesheet" type="text/css"/>

</head>
<body>
<div class="top-container"> <!-- Needs This For Fixed Header .top-container -->
<!--top start here -->
<?php include 'top.php'; ?>
<!--top end here -->

</div>

<div class="header" id="myHeader">  <!-- Needs This For Fixed Header #myHeader -->
<!-- header start here-->
<?php include 'header.php'; ?>
<!-- header end here -->
</div>

<!-- Social Icons -->
<?php include 'social_icon.php'; ?>
<!-- End Social Icons -->


<div class="content"> <!-- Needs This For Fixed Header .content -->
<!-- bread-crumb start here -->
<div class="bread-crumb">
	<img src="images/top-banner.jpg" class="img-responsive" alt="banner-top" title="banner-top">
	<div class="container">
		<div class="matter">
			<h2><span>Naga</span> <span style="color: #f89633;">Ayurveda</span></h2>
			<ul class="list-inline">
				<li>
					<a href="index.php">HOME</a>
				</li>
				<li>
					<a href="privacy.php">Privacy And Policy</a>
				</li>
			</ul>
		</div>
	</div>
</div>
<!-- bread-crumb end here -->

<!-- organic start here -->
<div class="organic">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 commontop text-center">
				<h4>
					<i class="icon_star_alt"></i>
					<i class="icon_star_alt"></i>
					<i class="icon_star_alt"></i> 
					Welcome to <span style="color: #add038;"> Naga </span> <span style="color: #f89633;">Ayurveda</span>
					<i class="icon_star_alt"></i>
					<i class="icon_star_alt"></i>
					<i class="icon_star_alt"></i>
				</h4>
				<!-- <p>Pellentesque sed posuere nisi. Nunc nec looreet mauris. Etiam valutpat ligula eu lacus varius scelerisque. Morbi fringilla euismod semper.</p> -->
			</div>
			<div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
				                              <?php
                               
                               $get_privacy_edit = mysqli_query($connect,"SELECT * FROM `privacy`") or die(mysqli_error());
                                                while($get_edit = mysqli_fetch_array($get_privacy_edit)) 
                                                {
                                                    $sno++;
                                                    $privacy_id = $get_edit['privacy_id'];
                                                    $privacy = $get_edit['privacy'];
                                }
                               ?>
<!-- 				<p class="des">Traditional Vaidhiyars, descendants of Raja vaidhyars of Vijayanagara kingdom, migrated into Tamilnadu. </p>
				<p class="des2">
					<i class="icon_quotations first"></i>Hereditary Vaidhyar Family Known famously as Naga Ayurveda Vaidhyashala in the 20th Century in Tamilnadu. <i class="icon_quotations last"></i></p>

				<p class="des">Now in a mission to serve the needy and promote the Ancient medical system to masses, culminated into a Firm manufacturing Ayurvedic Products.</p> -->
				<p><?php echo $privacy; ?></p>
			</div>
			<div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
				<img src="images/about-image.jpg" class="img-responsive" alt="banner" title="banner" />
			</div>
		</div>
	</div>
</div>
<!-- organic end here -->



<!-- chooseus start here -->

<!-- chooseus end here -->
</div>




<!-- footer start here -->
<?php include 'footer.php'; ?>
<!-- footer end here -->

<!-- Fixed Header -->
<script src="js/fixed_header.js"></script>
<!-- jquery -->
<script src="js/jquery.2.1.1.min.js"></script>
<!-- bootstrap js -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!--bootstrap select-->
<script src="js/dist/js/bootstrap-select.js"></script>
<!--internal js-->
<script src="js/internal.js"></script>
<!-- owlcarousel js -->
<script src="js/owl-carousel/owl.carousel.min.js"></script>
</body>
</html>