<?php 
include'admin/admin/include/config.php';
include'session.php';
?>



<!DOCTYPE html>
<html lang="en" class="h-100">
	
<!-- Mirrored from www.gambolthemes.net/html-items/barren-html/disable-demo-link/explore_events.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Oct 2025 13:21:26 GMT -->
<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, shrink-to-fit=9">
		<meta name="description" content="Gambolthemes">
		<meta name="author" content="Gambolthemes">		
		<title>Barren - Simple Online Event Ticketing System</title>
		
		<!-- Favicon Icon -->
		<link rel="icon" type="image/png" href="images/fav.png">
		
		<!-- Stylesheets -->
		<link rel="preconnect" href="https://fonts.googleapis.com/">
		<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
		<link href='vendor/unicons-2.0.1/css/unicons.css' rel='stylesheet'>
		<link href="css/styles.css" rel="stylesheet">
		<link href="css/responsive.css" rel="stylesheet">
		<link href="css/night-mode.css" rel="stylesheet">
		
		<!-- Vendor Stylesheets -->
		<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
		<link href="vendor/OwlCarousel/assets/owl.carousel.css" rel="stylesheet">
		<link href="vendor/OwlCarousel/assets/owl.theme.default.min.css" rel="stylesheet">
		<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">		
		
	</head>

<body class="d-flex flex-column h-100">
	<!-- Header Start-->
	<?php include "header.php";?>
	<!-- Header End-->
	<!-- Body Start-->
	<div class="wrapper">
		<div class="hero-banner events">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-xl-8 col-lg-8 col-md-10">
						<div class="hero-banner-content">
							<h2>Discover Events For All The Things You Love</h2>
							<div class="search-form main-form">
								<div class="row g-3">
									<div class="col-lg-5 col-md-12">
										<div class="form-group">
											<select class="selectpicker" data-width="100%" data-size="5" data-live-search="true">
												<option value="01" selected>All</option>
												<option value="02">Arts</option>
												<option value="03">Business</option>
												<option value="04">Coaching and Consulting</option>
												<option value="05">Community and Culture</option>
												<option value="06">Education and Training</option>
												<option value="07">Family and Friends</option>
												<!-- <option value="08">Fashion and Beauty</option>
												<option value="09">Film and Entertainment</option>
												<option value="10">Food and Drink</option>
												<option value="11">Free</option>
												<option value="12">Health and Wellbeing</option>
												<option value="13">Hobbies and Interest</option>
												<option value="14">Music and Theater</option>
												<option value="15">Religion and Spirituality</option>
												<option value="16">Science and Technology</option>
												<option value="17">Sports and Fitness</option>
												<option value="18">Travel and Outdoor</option>
												<option value="19">Visual Arts</option> -->
											</select>
										</div>
									</div>
									<!-- <div class="col-lg-2 col-md-12">
										<a href="#" class="main-btn btn-hover w-100">Find</a>
									</div> -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="explore-events p-80">
			<div class="container">
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12">
						<div class="event-filter-items">
							<div class="featured-controls">
								<!-- <div class="filter-tag">
									<a href="explore_events_by_date.html" class="active">All</a>
									<a href="explore_events_by_date.html">Today</a>
									<a href="explore_events_by_date.html">Tomorrow</a>
									<a href="explore_events_by_date.html">This Week</a>
									<a href="explore_events_by_date.html">This Weekend</a>
									<a href="explore_events_by_date.html">Next Week</a>
									<a href="explore_events_by_date.html">Next Weekend</a>
									<a href="explore_events_by_date.html">This Month</a>
									<a href="explore_events_by_date.html">Next Month</a>
									<a href="explore_events_by_date.html">This Year</a>
									<a href="explore_events_by_date.html">Next Year</a>
								</div> -->
								<div class="row" data-ref="event-filter-content">
								    <?php 
								    $today=date('Y-m-d H:i:s');
								    // echo "SELECT * FROM  `product` where start_time>='$today'";
								    $getEvents=mysqli_query($connect,"SELECT * FROM  `product` where start_time>='$today'");
								    while($fetchEvent=mysqli_fetch_array($getEvents)){
								        // SELECT `product_id`, `product_description`, `product_image`, `name`, `title`, `date`, `start_time`, `end_time`, `venue`, `fees`, `organizer`, `created_date` FROM `product` WHERE 1

								        $event_id=$fetchEvent['product_id'];
								        $product_description=$fetchEvent['product_description'];
								        $product_image=$fetchEvent['product_image'];
								        $name=$fetchEvent['name'];
								        $title=$fetchEvent['title'];
								        $date=$fetchEvent['date'];
								        $start_time=$fetchEvent['start_time'];
								        $end_time=$fetchEvent['end_time'];
								        $venue=$fetchEvent['venue'];
								        $fees=$fetchEvent['fees'];
								        $organizer=$fetchEvent['organizer'];
								        $created_date=$fetchEvent['created_date'];
								        ?>
								        
								        
									<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mix arts concert workshops volunteer sports health_Wellness" data-ref="mixitup-target">
										<div class="main-card mt-4">
											<div class="event-thumbnail">
												<a href="venue_event_detail_view.php?event_id=<?php echo $event_id;?>" class="thumbnail-img">
													<img src="admin/admin/acheivement/<?php echo $product_image;?>" alt="">
												</a>
												<span class="bookmark-icon" title="Bookmark"></span>
											</div>
											<div class="event-content">
												<a href="venue_event_detail_view.php?event_id=<?php echo $event_id;?>" class="event-title"><?php echo $name;?></a>
												<div class="duration-price-remaining">
													<span class="duration-price">Rs <?php echo $fees;?>*</span>
													<span class="remaining"></span>
												</div>
											</div>
										
<div class="event-footer">
  <div class="event-timing">
    <div class="publish-date">
      <?php
        $eventDate = date("d M", strtotime($date));
        $eventDay  = date("D", strtotime($date));
        $eventStartTime = date("h:i A", strtotime($start_time));
        $eventEndTime   = date("h:i A", strtotime($end_time));
      ?>
      <span><i class="fa-solid fa-calendar-day me-2"></i><?php echo $eventDate; ?></span>
      <span class="dot"><i class="fa-solid fa-circle"></i></span>
      <span><?php echo $eventDay . ', ' . $eventStartTime; ?></span>
    </div>
    <span class="publish-time">
      <i class="fa-solid fa-clock me-2"></i>
      <?php echo $eventStartTime . ' - ' . $eventEndTime; ?>
    </span>
  </div>
</div>
										</div>
									</div>
								     <?php   
								    }
								    
								    ?>
									
								</div>
									</div>
								</div>
								<!-- <div class="browse-btn">
									<a href="#" class="main-btn btn-hover ">See More</a>
								</div> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Body End-->
	<!-- Footer Start-->
	<?php include "footer.php";?>
	<!-- Footer End-->
	
	
	<script src="js/jquery.min.html"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.html"></script>
	<script src="vendor/OwlCarousel/owl.carousel.html"></script>
	<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.html"></script>	
	<script src="vendor/mixitup/dist/mixitup.min.html"></script>
	<script src="js/custom.html"></script>
	<script src="js/night-mode.html"></script>
	<script>	
		var containerEl = document.querySelector('[data-ref~="event-filter-content"]');

		var mixer = mixitup(containerEl, {
			selectors: {
				target: '[data-ref~="mixitup-target"]'
			}
		});
	</script>
</body>

<!-- Mirrored from www.gambolthemes.net/html-items/barren-html/disable-demo-link/explore_events.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Oct 2025 13:21:26 GMT -->
</html>