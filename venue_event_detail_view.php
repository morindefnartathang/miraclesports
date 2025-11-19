<?php include'admin/admin/include/config.php'; 

include'session.php';
$EventId=$_GET['event_id'];

// SELECT `product_id`, `product_description`, `product_image`, `name`, `title`, `date`, `start_time`, `end_time`, `venue`, `fees`, `organizer`, `created_date` FROM `product` WHERE 1

$getEvent=mysqli_query($connect,"SELECT * FROM product WHERE product_id='$EventId'");
$fetchEvent=mysqli_fetch_array($getEvent);


$product_id=$fetchEvent['product_id'];
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




<!DOCTYPE html>
<html lang="en" class="h-100">
	
<!-- Mirrored from www.gambolthemes.net/html-items/barren-html/disable-demo-link/venue_event_detail_view.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Oct 2025 13:21:26 GMT -->
<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, shrink-to-fit=9">
		<meta name="description" content="Gambolthemes">
		<meta name="author" content="Gambolthemes">		
  <title>Miracle Sports</title>
		
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
		<div class="breadcrumb-block">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-10">
						<div class="barren-breadcrumb">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item"><a href="explore_events.php">Explore Events</a></li>
									<li class="breadcrumb-item active" aria-current="page">Venue Event Detail View</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="event-dt-block p-80">
			<div class="container">
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12">
						<div class="event-top-dts">
						<?php

// Convert to timestamp
$timestamp = strtotime($start_time);

// Format month (short form like Jan, Feb, Mar, etc.)
$month = date("M", $timestamp);

// Format day (numeric)
$day = date("d", $timestamp);
?>

<div class="event-top-date">
    <span class="event-month"><?= $month ?></span>
    <span class="event-date"><?= $day ?></span>
</div>

<?php
// Example values (you’ll replace with your DB values)
$event_title = $title;
$event_start = $start_time; 
$event_end = $end_time; 

// Convert to timestamps
$start_time = strtotime($event_start);
$end_time = strtotime($event_end);

// Calculate duration in hours (rounded)
$duration_hours = round(($end_time - $start_time) / 3600, 1);

// Format start time
$formatted_start = date("D, M j, Y g:i A", $start_time);

// Build readable title (optional)
$event_day = date("l", $start_time);
$event_month = date("F", $start_time);
$event_date = date("jS", $start_time);
$event_year = date("Y", $start_time);
$event_time = date("gA", $start_time);

$event_full_title = "$event_title $event_day $event_month $event_date $event_year at $event_time";
?>

<div class="event-top-dt">
  <h3 class="event-main-title"><?= $event_full_title ?></h3>
  <div class="event-top-info-status">
    <span class="event-type-name"><i class="fa-solid fa-location-dot"></i><?= htmlspecialchars($venue) ?></span>
    <span class="event-type-name details-hr">
      Starts on <span class="ev-event-date"><?= $formatted_start ?></span>
    </span>
    <span class="event-type-name details-hr"><?= $duration_hours ?>h</span>
  </div>
</div>
						</div>
					</div>
					<div class="col-xl-8 col-lg-7 col-md-12">
						<div class="main-event-dt">
							<div class="event-img">
								<img src="images/event-imgs/big-2.html" alt="">		
							</div>
							<div class="share-save-btns dropdown">
								<button class="sv-btn me-2"><i class="fa-regular fa-bookmark me-2"></i>Save</button>
								<button class="sv-btn" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-share-nodes me-2"></i>Share</button>
								<ul class="dropdown-menu">
									<li><a class="dropdown-item" href="#"><i class="fa-brands fa-facebook me-3"></i>Facebook</a></li>
									<li><a class="dropdown-item" href="#"><i class="fa-brands fa-twitter me-3"></i>Twitter</a></li>
									<li><a class="dropdown-item" href="#"><i class="fa-brands fa-linkedin-in me-3"></i>LinkedIn</a></li>
									<li><a class="dropdown-item" href="#"><i class="fa-regular fa-envelope me-3"></i>Email</a></li>
								</ul>
							</div>
							<div class="main-event-content">
								<h4>About This Event</h4>
								<p>
								 <?php echo $product_description;?>  
								 </p>
								<!--<p>In malesuada luctus libero sed gravida. Suspendisse nunc est, maximus vel viverra nec, suscipit non massa. Maecenas efficitur vestibulum pellentesque. Ut finibus ullamcorper congue. Sed ut libero sit amet lorem venenatis facilisis. Mauris egestas tortor vel massa auctor, eget gravida mauris cursus. Etiam elementum semper fermentum. Suspendisse potenti. Morbi lobortis leo urna, non laoreet enim ultricies id. Integer id felis nec sapien consectetur porttitor. Proin tempor mauris in odio iaculis semper. Cras ultricies nulla et dui viverra, eu convallis orci fermentum.</p>-->
							</div>							
						</div>
					</div>
					<div class="col-xl-4 col-lg-5 col-md-12">
						<div class="main-card event-right-dt">
							<div class="bp-title">
								<h4>Event Details</h4>
							</div>
						<div class="time-left">
  <div class="countdown" 
       id="event-countdown"
       data-target-ms="<?= strtotime($event_start) * 1000 ?>">  <!-- embed start time in ms -->
    <div class="countdown-item">
      <span id="day">00</span>days
    </div>
    <div class="countdown-item">
      <span id="hour">00</span>Hours
    </div>
    <div class="countdown-item">
      <span id="minute">00</span>Minutes
    </div>
    <div class="countdown-item">
      <span id="second">00</span>Seconds
    </div>
  </div>
  <div id="countdown-status" style="margin-top:.5rem;"></div>
</div>
<script>
(function () {
  const container = document.getElementById('event-countdown');
  if (!container) return;

  const targetMs = Number(container.getAttribute('data-target-ms')); // event start (ms)
  const dayEl = document.getElementById('day');
  const hourEl = document.getElementById('hour');
  const minEl = document.getElementById('minute');
  const secEl = document.getElementById('second');
  const statusEl = document.getElementById('countdown-status');

  function pad(n) { return String(n).padStart(2, '0'); }

  function tick() {
    const now = Date.now();
    let diff = targetMs - now;

    if (diff <= 0) {
      // Event has started (or passed)
      dayEl.textContent = '00';
      hourEl.textContent = '00';
      minEl.textContent = '00';
      secEl.textContent = '00';
      if (statusEl) statusEl.textContent = 'The event has started!';
      clearInterval(timer);
      return;
    }

    const d = Math.floor(diff / 86400000); // 24*60*60*1000
    diff -= d * 86400000;

    const h = Math.floor(diff / 3600000);  // 60*60*1000
    diff -= h * 3600000;

    const m = Math.floor(diff / 60000);    // 60*1000
    diff -= m * 60000;

    const s = Math.floor(diff / 1000);

    dayEl.textContent = pad(d);
    hourEl.textContent = pad(h);
    minEl.textContent = pad(m);
    secEl.textContent = pad(s);

    if (statusEl) statusEl.textContent = '';
  }

  // Kick off immediately, then every second
  tick();
  const timer = setInterval(tick, 1000);
})();
</script>

							<div class="event-dt-right-group mt-5">
								<div class="event-dt-right-icon">
									<i class="fa-solid fa-circle-user"></i>
								</div>
								<div class="event-dt-right-content">
									<h4>Organised by</h4>
									<h5><?php echo $organizer;?></h5>
									<!--<a href="attendee_profile_view.html">View Profile</a>-->
								</div>
							</div>
							<div class="event-dt-right-group">
								<div class="event-dt-right-icon">
									<i class="fa-solid fa-calendar-day"></i>
								</div>
								<div class="event-dt-right-content">
									<h4>Date and Time</h4>
									<h5><?php echo $formatted_start;?></h5>
									<!--<div class="add-to-calendar">-->
									<!--	<a href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">-->
									<!--		<i class="fa-regular fa-calendar-days me-3"></i>Add to Calendar-->
									<!--	</a>-->
									<!--	<ul class="dropdown-menu">-->
									<!--		<li><a class="dropdown-item" href="#"><i class="fa-brands fa-windows me-3"></i>Outlook</a></li>-->
									<!--		<li><a class="dropdown-item" href="#"><i class="fa-brands fa-apple me-3"></i>Apple</a></li>-->
									<!--		<li><a class="dropdown-item" href="#"><i class="fa-brands fa-google me-3"></i>Google</a></li>-->
									<!--		<li><a class="dropdown-item" href="#"><i class="fa-brands fa-yahoo me-3"></i>Yahoo</a></li>-->
									<!--	</ul>-->
									<!--</div>-->
								</div>
							</div>
							<div class="event-dt-right-group">
								<div class="event-dt-right-icon">
									<i class="fa-solid fa-location-dot"></i>
								</div>
								<div class="event-dt-right-content">
									<h4>Location</h4>
									<h5 class="mb-0"><?php echo $venue;?></h5>
									<!--<a href="#"><i class="fa-solid fa-location-dot me-2"></i>View Map</a>-->
								</div>
							</div>
							<div class="select-tickets-block">
								<div class="select-ticket-action">
									<div class="ticket-price">Rs <?php echo $fees;?></div>
								</div>
							
							</div>
							<div class="booking-btn">
								<a href="checkout.php?event_id=<?php echo $EventId;?>" class="main-btn btn-hover w-100">Book Now</a>
							</div>
						</div>
					</div>
					<div class="col-xl-12 col-lg-12 col-md-12">
						<div class="more-events">
							<div class="main-title position-relative">
								<h3>More Events</h3>
								<a href="explore_events.php" class="view-all-link">Browse All<i class="fa-solid fa-right-long ms-2"></i></a>
							</div>
							<div class="owl-carousel moreEvents-slider owl-theme">
								<div class="item">
									<div class="main-card mt-4">
										<div class="event-thumbnail">
											<a href="venue_event_detail_view.php" class="thumbnail-img">
												<img src="images/event-imgs/img-1.jpg" alt="">
											</a>
											<span class="bookmark-icon" title="Bookmark"></span>
										</div>
										<div class="event-content">
											<a href="venue_event_detail_view.php" class="event-title">A New Way Of Life</a>
											<div class="duration-price-remaining">
												<span class="duration-price">AUD $100.00*</span>
												<span class="remaining"></span>
											</div>
										</div>
										<div class="event-footer">
											<div class="event-timing">
												<div class="publish-date">
													<span><i class="fa-solid fa-calendar-day me-2"></i>15 Apr</span>
													<span class="dot"><i class="fa-solid fa-circle"></i></span>
													<span>Fri, 3.45 PM</span>
												</div>
												<span class="publish-time"><i class="fa-solid fa-clock me-2"></i>1h</span>
											</div>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="main-card mt-4">
										<div class="event-thumbnail">
											<a href="online_event_detail_view.php" class="thumbnail-img">
												<img src="images/event-imgs/img-2.jpg" alt="">
											</a>
											<span class="bookmark-icon" title="Bookmark"></span>
										</div>
										<div class="event-content">
											<a href="online_event_detail_view.php" class="event-title">Earrings Workshop with Bronwyn David</a>
											<div class="duration-price-remaining">
												<span class="duration-price">AUD $75.00*</span>
												<span class="remaining"><i class="fa-solid fa-ticket fa-rotate-90"></i>6 Remaining</span>
											</div>
										</div>
										<div class="event-footer">
											<div class="event-timing">
												<div class="publish-date">
													<span><i class="fa-solid fa-calendar-day me-2"></i>30 Apr</span>
													<span class="dot"><i class="fa-solid fa-circle"></i></span>
													<span>Sat, 11.20 PM</span>
												</div>
												<span class="publish-time"><i class="fa-solid fa-clock me-2"></i>2h</span>
											</div>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="main-card mt-4">
										<div class="event-thumbnail">
											<a href="venue_event_detail_view.php" class="thumbnail-img">
												<img src="images/event-imgs/img-3.jpg" alt="">
											</a>
											<span class="bookmark-icon" title="Bookmark"></span>
										</div>
										<div class="event-content">
											<a href="venue_event_detail_view.php" class="event-title">Spring Showcase Saturday April 30th 2022 at 7pm</a>
											<div class="duration-price-remaining">
												<span class="duration-price">Free*</span>
												<span class="remaining"></span>
											</div>
										</div>
										<div class="event-footer">
											<div class="event-timing">
												<div class="publish-date">
													<span><i class="fa-solid fa-calendar-day me-2"></i>1 May</span>
													<span class="dot"><i class="fa-solid fa-circle"></i></span>
													<span>Sun, 4.30 PM</span>
												</div>
												<span class="publish-time"><i class="fa-solid fa-clock me-2"></i>3h</span>
											</div>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="main-card mt-4">
										<div class="event-thumbnail">
											<a href="online_event_detail_view.php" class="thumbnail-img">
												<img src="images/event-imgs/img-4.jpg" alt="">
											</a>
											<span class="bookmark-icon" title="Bookmark"></span>
										</div>
										<div class="event-content">
											<a href="online_event_detail_view.php" class="event-title">Shutter Life</a>
											<div class="duration-price-remaining">
												<span class="duration-price">AUD $85.00</span>
												<span class="remaining"><i class="fa-solid fa-ticket fa-rotate-90"></i>7 Remaining</span>
											</div>
										</div>
										<div class="event-footer">
											<div class="event-timing">
												<div class="publish-date">
													<span><i class="fa-solid fa-calendar-day me-2"></i>1 May</span>
													<span class="dot"><i class="fa-solid fa-circle"></i></span>
													<span>Sun, 5.30 PM</span>
												</div>
												<span class="publish-time"><i class="fa-solid fa-clock me-2"></i>1h</span>
											</div>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="main-card mt-4">
										<div class="event-thumbnail">
											<a href="venue_event_detail_view.php" class="thumbnail-img">
												<img src="images/event-imgs/img-5.jpg" alt="">
											</a>
											<span class="bookmark-icon" title="Bookmark"></span>
										</div>
										<div class="event-content">
											<a href="venue_event_detail_view.php" class="event-title">Friday Night Dinner at The Old Station May 27 2022</a>
											<div class="duration-price-remaining">
												<span class="duration-price">AUD $41.50*</span>
												<span class="remaining"></span>
											</div>
										</div>
										<div class="event-footer">
											<div class="event-timing">
												<div class="publish-date">
													<span><i class="fa-solid fa-calendar-day me-2"></i>27 May</span>
													<span class="dot"><i class="fa-solid fa-circle"></i></span>
													<span>Fri, 12.00 PM</span>
												</div>
												<span class="publish-time"><i class="fa-solid fa-clock me-2"></i>5h</span>
											</div>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="main-card mt-4">
										<div class="event-thumbnail">
											<a href="venue_event_detail_view.php" class="thumbnail-img">
												<img src="images/event-imgs/img-6.jpg" alt="">
											</a>
											<span class="bookmark-icon" title="Bookmark"></span>
										</div>
										<div class="event-content">
											<a href="venue_event_detail_view.php" class="event-title">Step Up Open Mic Show</a>
											<div class="duration-price-remaining">
												<span class="duration-price">AUD $200.00*</span>
												<span class="remaining"></span>
											</div>
										</div>
										<div class="event-footer">
											<div class="event-timing">
												<div class="publish-date">
													<span><i class="fa-solid fa-calendar-day me-2"></i>30 Jun</span>
													<span class="dot"><i class="fa-solid fa-circle"></i></span>
													<span>Thu, 4.30 PM</span>
												</div>
												<span class="publish-time"><i class="fa-solid fa-clock me-2"></i>1h</span>
											</div>
										</div>
									</div>
								</div>
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
	<script src="js/custom.html"></script>
	<script src="js/timer.html"></script>
	<script src="js/night-mode.html"></script>
</body>

<!-- Mirrored from www.gambolthemes.net/html-items/barren-html/disable-demo-link/venue_event_detail_view.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Oct 2025 13:21:27 GMT -->
</html>