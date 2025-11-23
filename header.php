
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
      integrity="sha512-SnH5…"
      crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="css/styles.css" rel="stylesheet">
<?php 
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<header class="header">
    <nav class="navbar navbar-expand-lg bg-barren barren-head fixed-top">
        <div class="container">

            <!-- Mobile Menu Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar">
                <span class="navbar-toggler-icon">
                    <i class="fa-solid fa-bars"></i>
                </span>
            </button>

            <!-- Logo -->
            <a class="navbar-brand d-flex align-items-center" href="index.php">
                <div class="res-main-logo d-lg-none">
                    <img src="images/miraclesports.png" alt="Miracle Sports">
                </div>
                <div class="main-logo d-none d-lg-block" id="logo">
                    <img src="images/miraclesports.png" alt="Miracle Sports">
                    <img class="logo-inverse" src="images/dark-logo.svg" alt="">
                </div>
            </a>

            <!-- Sidebar Menu -->
            <div class="offcanvas offcanvas-start" id="offcanvasNavbar">
                <div class="offcanvas-header">
                    <div class="offcanvas-logo">
                        <img src="images/miraclesports.png" alt="">
                    </div>
                    <button type="button" class="close-btn" data-bs-dismiss="offcanvas">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>

                <div class="offcanvas-body">
                        <ul class="navbar-nav ms-auto">

                            <li class="nav-item">
                                <a class="nav-link <?php echo ($currentPage == 'index.php') ? 'active' : ''; ?>" href="index.php">Home</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link <?php echo ($currentPage == 'about_us.php') ? 'active' : ''; ?>" href="about_us.php">About</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link <?php echo ($currentPage == 'explore_events.php') ? 'active' : ''; ?>" href="explore_events.php">Event</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link <?php echo ($currentPage == 'contact_us.php') ? 'active' : ''; ?>" href="contact_us.php">Contacts</a>
                            </li>

                        </ul>
            </div>

            </div>

        </div>
    </nav>
</header>
