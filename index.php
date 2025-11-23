<?php include "admin/admin/include/config.php"; ?>

<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Correct viewport for responsive behaviour -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Miracle Sports - Event booking and ticketing">
    <meta name="author" content="Miracle Sports">
    <title>Miracle Sports</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="images/fav.png">

    <!-- Fonts & Styles -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">

    <!-- Vendor CSS -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="vendor/OwlCarousel/assets/owl.carousel.css" rel="stylesheet">
    <link href="vendor/OwlCarousel/assets/owl.theme.default.min.css" rel="stylesheet">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">

    <!-- Project CSS -->
    <link href="css/styles.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/night-mode.css" rel="stylesheet">
</head>

<body class="d-flex flex-column h-100">

    <!-- Header -->
    <?php include "header.php"; ?>

    <!-- Main content -->
    <div class="wrapper">

        <!-- Hero -->
        <div class="hero-banner">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-9 col-md-10 text-center">
                        <div class="hero-banner-content">
                            <h2>The Easiest and Most Powerful Online Event Booking and Ticketing System</h2>
                            <p>Barren is an all-in-one event ticketing platform for event organisers, promoters, and managers. Easily create, promote and manage your events of any type and size.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Explore Events -->
        <section class="explore-events p-80">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="main-title">
                            <h3>Explore Events</h3>
                        </div>
                    </div>
                </div>


                <div class="row" data-ref="event-filter-content">
                    <?php
                    // Fetch upcoming events only
                    $today = date('Y-m-d H:i:s');
                    $getEvents = mysqli_query($connect, "SELECT * FROM `product` WHERE start_time >= '$today' ORDER BY start_time ASC");

                    while ($fetchEvent = mysqli_fetch_assoc($getEvents)) {
                        // sanitize and cast values for output
                        $event_id = (int) $fetchEvent['product_id'];
                        $product_image = htmlspecialchars($fetchEvent['product_image'], ENT_QUOTES);
                        $name = htmlspecialchars($fetchEvent['name'], ENT_QUOTES);
                        $title = htmlspecialchars($fetchEvent['title'] ?? '', ENT_QUOTES);
                        $date = $fetchEvent['date'];
                        $start_time = $fetchEvent['start_time'];
                        $end_time = $fetchEvent['end_time'];
                        $venue = htmlspecialchars($fetchEvent['venue'] ?? '', ENT_QUOTES);
                        $fees = htmlspecialchars($fetchEvent['fees'], ENT_QUOTES);

                        // format dates for display
                        $eventDate = date("d M", strtotime($date));
                        $eventDay = date("D", strtotime($date));
                        $eventStartTime = date("h:i A", strtotime($start_time));
                        $eventEndTime = date("h:i A", strtotime($end_time));
                    ?>

                    <article class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-4" role="article">
                        <div class="main-card">

                            <div class="event-thumbnail">
                                <a href="venue_event_detail_view.php?event_id=<?php echo $event_id; ?>" class="thumbnail-img" aria-label="View details for <?php echo $name; ?>">
                                    <img src="admin/admin/acheivement/<?php echo $product_image; ?>" alt="<?php echo $name; ?>" loading="lazy">
                                </a>
                                <button class="bookmark-icon" title="Bookmark"></button>
                            </div>

                            <div class="event-content">
                                <a href="venue_event_detail_view.php?event_id=<?php echo $event_id; ?>" class="event-title"><?php echo $name; ?></a>
                                <div class="duration-price-remaining">
                                    <span class="duration-price">Rs <?php echo $fees; ?>*</span>
                                    <span class="remaining" aria-hidden="true"></span>
                                </div>
                            </div>

                            <footer class="event-footer">
                                <div class="event-timing">
                                    <div class="publish-date">
                                        <span><i class="fa-solid fa-calendar-day me-2" aria-hidden="true"></i><?php echo $eventDate; ?></span>
                                        <span class="dot" aria-hidden="true"><i class="fa-solid fa-circle"></i></span>
                                        <span><?php echo $eventDay . ', ' . $eventStartTime; ?></span>
                                    </div>
                                    <span class="publish-time"><i class="fa-solid fa-clock me-2" aria-hidden="true"></i><?php echo $eventStartTime . ' - ' . $eventEndTime; ?></span>
                                </div>
                            </footer>

                        </div>
                    </article>

                    <?php

                    } // end while
                    ?>

                </div> <!-- /.row -->

            </div> <!-- /.container -->
        </section>

    </div> <!-- /.wrapper -->

    <!-- Footer -->
    <?php include "footer.php"; ?>

    <!-- Scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/owl.carousel.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/night-mode.js"></script>

</body>
</html>
