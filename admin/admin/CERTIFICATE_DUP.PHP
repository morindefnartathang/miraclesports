<?php
session_start();
include_once 'function.php';

// Define font file path
$font = __DIR__ . "/arial.ttf"; 

// Automatically download Arial alternative if missing
if (!file_exists($font)) {
    $fontUrl = "https://github.com/google/fonts/raw/main/apache/roboto/Roboto-Bold.ttf"; // Using Roboto Bold
    file_put_contents($font, file_get_contents($fontUrl));
}

// Verify if font was successfully downloaded
if (!file_exists($font)) {
    die("Error: Font file could not be downloaded!");
}

if (isset($_POST['username'])) {
    $name = strtoupper($_POST['username']); // Convert to uppercase for better readability

    // Load certificate template (Change to imagecreatefrompng if your template is PNG)
    $image = imagecreatefromjpeg("rookie.jpg");

    // Define text color (Black)
    $textColor = imagecolorallocate($image, 0, 0, 0);

    // Set font size and position
    $fontSize = 60;  // Increased font size
    $angle = 0;

    // Calculate text box size to center align the name
    $bbox = imagettfbbox($fontSize, $angle, $font, $name);
    $textWidth = abs($bbox[2] - $bbox[0]);  // Calculate width
    $textHeight = abs($bbox[7] - $bbox[1]); // Calculate height

    // Define certificate width & height
    $imageWidth = imagesx($image);
    $imageHeight = imagesy($image);

    // Center position for the text
    $x = ($imageWidth - $textWidth) / 2;  // Center horizontally
    $y = ($imageHeight / 2) + ($textHeight / 4); // Adjust vertical alignment

    // Add text to image
    imagettftext($image, $fontSize, $angle, $x, $y, $textColor, $font, $name);

    // Save the new certificate
    $outputFile = "generated_certificate.jpg";
    imagejpeg($image, $outputFile);
    imagedestroy($image);

    // Provide download link
    $downloadLink = '<a href="'.$outputFile.'" download>Click here to download your certificate</a>';
}
?>



<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Dash Board | <?php echo $site_title; ?></title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1" name="viewport" />
		<meta content="Preview page of Metronic Admin Theme #1 for statistics, charts, recent events and reports" name="description" />
		<meta content="" name="author" />
		<!-- BEGIN GLOBAL MANDATORY STYLES -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">     <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css" />
		<link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		<link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
		<link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
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
		<link href="assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />	    <!-- END PAGE LEVEL PLUGINS -->
	 <style>

        .certificate {
            width: 100%;
        }
        .name-field {
            position: absolute;
            top: 50%;  /* Adjust this for exact positioning */
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 28px;
            font-weight: bold;
            text-align: center;
            width: 300px;
            background: transparent;
            border: none;
            outline: none;
            color: black;
            cursor: text;
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
			<div class="clearfix">
			</div>
			<!-- END HEADER & CONTENT DIVIDER -->
			<!-- BEGIN CONTAINER -->
			<div class="page-container">
				<!-- BEGIN SIDEBAR -->
				<div class="page-sidebar-wrapper">
					<!-- BEGIN SIDEBAR -->
					<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
					<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
					
					<?php include("menu.php");?>
					<!-- END SIDEBAR -->
					</div>			    <!-- END SIDEBAR -->
					<!-- BEGIN CONTENT -->
					<div class="page-content-wrapper">
						<!-- BEGIN CONTENT BODY -->
						<div class="page-content">
							<!-- END THEME PANEL -->
							<!-- BEGIN PAGE BAR -->
							<div class="page-bar">
								<ul class="page-breadcrumb">
									<li>
										<a href="index.php">Home
										</a>
										<i class="fa fa-circle">
										</i>
									</li>
									<li>
										<span>Certificate
										</span>
									</li>
								</ul>
								<div class="page-toolbar">
									<div id="dashboard-report-range" class="pull-right tooltips btn btn-sm" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
										<i class="icon-calendar">
										</i>&nbsp;
										<span class="thin uppercase hidden-xs">
										</span>&nbsp;
										<i class="fa fa-angle-down">
										</i>
									</div>
								</div>
							</div>
							<!-- END PAGE BAR -->
							<div class="portlet light bordered">
								<div class="portlet-title">
									<div class="caption">
										<i class="icon-social-dribbble font-blue-sharp">
										</i>
										<span class="caption-subject font-blue-sharp bold uppercase"><?php echo $site_title; ?>
									</div>
								</div>
							<h2>Enter Your Name for the Certificate</h2>
                        <form action="" method="POST">
                            <input type="text" name="username" required placeholder="Enter Name">
                            <button type="submit">Generate Certificate</button>
                        </form>
                        
                        <?php
                        if (isset($downloadLink)) {
                            echo "<h3>Your Certificate is Ready</h3>";
                            echo '<img src="'.$outputFile.'" width="600">';
                            echo "<br><br>" . $downloadLink;
                        }
                        ?>
							</div>
							<!--  -->
							
							

						<!-- END CONTENT BODY -->
					</div>
					<!-- END CONTENT -->
					<!-- END QUICK SIDEBAR -->
				</div>
				<!-- END CONTAINER -->
				<!-- BEGIN FOOTER -->
				<?php include("footer.php");?>			  <!-- END FOOTER -->
				</div>
				<!-- BEGIN QUICK NAV -->
				<div class="quick-nav-overlay">
				</div>
				<!-- END QUICK NAV -->>zz
				<!-- BEGIN CORE PLUGINS -->
				<script src="assets/global/plugins/jquery.min.js" type="text/javascript">
				</script>
				<script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript">
				</script>
				<script src="assets/global/plugins/js.cookie.min.js" type="text/javascript">
				</script>
				<script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript">
				</script>
				<script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript">
				</script>
				<script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript">
				</script>
				<!-- END CORE PLUGINS -->
				<!-- BEGIN PAGE LEVEL PLUGINS -->
				<script src="assets/global/scripts/datatable.js" type="text/javascript">
				</script>
				<script src="assets/global/plugins/datatables/datatables.min.js" type="text/javascript">
				</script>
				<script src="assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript">
				</script>
				<!-- END PAGE LEVEL PLUGINS -->
				<!-- BEGIN THEME GLOBAL SCRIPTS -->
				<script src="assets/global/scripts/app.min.js" type="text/javascript">
				</script>
				<!-- END THEME GLOBAL SCRIPTS -->
				<!-- BEGIN PAGE LEVEL SCRIPTS -->
				<script src="assets/pages/scripts/table-datatables-colreorder.min.js" type="text/javascript">
				</script>
				<!-- END PAGE LEVEL SCRIPTS -->
				<!-- BEGIN THEME LAYOUT SCRIPTS -->
				<script src="assets/layouts/layout/scripts/layout.min.js" type="text/javascript">
				</script>
				<script src="assets/layouts/layout/scripts/demo.min.js" type="text/javascript">
				</script>
				<script src="assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript">
				</script>
				<script src="assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript">
				</script>
				<!-- END THEME LAYOUT SCRIPTS -->
				<!-- Google Code for Universal Analytics -->
			</body>
		</html>