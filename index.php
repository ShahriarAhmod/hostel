<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Hostel website - Home page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="" />
	<meta name="author" content="http://code4berry.com" />
	<!-- css --> 
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="materialize/css/materialize.min.css" media="screen,projection" />
	<link href="css/bootstrap.min.css" rel="stylesheet" />
	<link href="css/fancybox/jquery.fancybox.css" rel="stylesheet"> 
	<link href="css/flexslider.css" rel="stylesheet" /> 
	<link rel="stylesheet" type="text/css" href="css/zoomslider.css" />
	<link href="css/style.css" rel="stylesheet" />
</head>
<body>
	<div id="wrapper" class="home-page"> 
		
		<!-- start header -->
		<?php include('includes/header.php') ?>
		<!-- end header -->
		<section id="banner">
			<!-- Slider -->
			<div id="slider" data-zs-src='["img/photos/bg_7.jpg", "img/photos/bg_2.jpg", "img/photos/bg_6.jpg"]' >
			</div>
			<!-- end slider --> 
		</section>  
		<section class="projects">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="aligncenter"><h2 class="aligncenter">Our Featured Hostels</h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt eius magni provident, <br/>doloribus omnis minus ovident, doloribus omnis minus temporibus perferendis nesciunt..</div>
						<br/>
					</div>
				</div>

				<div class="row service-v1 margin-bottom-40">
					<div class="col-md-4 md-margin-bottom-40">
						<div class="card small">
							<div class="card-image">
								<img class="img-responsive" src="img/bg_1.jpg" alt="">   
							</div>
							<div class="card-content"> 
								<p>
									<h4>Berry Hostel</h4>
									<h5>England</h5>
									<a href="hosteluser" class="btn btn-details">Book</a>
								</p>
							</div>
						</div>        
					</div>
					<div class="col-md-4 md-margin-bottom-40">
						<div class="card small">
							<div class="card-image">
								<img class="img-responsive" src="img/bg_9.jpg" alt="">   
							</div>
							<div class="card-content">
								<p>
									<h4>Orange Hostel</h4>
									<h5>England</h5>
									<a href="hosteluser" class="btn btn-details">Book</a>
								</p>
							</div>
						</div>        
					</div>
					<div class="col-md-4 md-margin-bottom-40">
						<div class="card small">
							<div class="card-image">
								<img class="img-responsive" src="img/bg_12.jpg" alt="">  
							</div>
							<div class="card-content">
								<p>
									<h4>Apple Hostel</h4>
									<h5>England</h5>
									<a href="hosteluser" class="btn btn-details">Book</a>
								</p>
							</div>
						</div>        
					</div> 
				</div>
			</div>
		</section>

		<section class="section-padding gray-bg">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="section-title text-center">
							<h2>Our Students</h2>
							<p>Curabitur aliquet quam id dui posuere blandit. Donec sollicitudin molestie malesuada Pellentesque <br>ipsum id orci porta dapibus. Vivamus suscipit tortor eget felis porttitor volutpat.</p>
						</div>
					</div>
				</div>
				<div class="row">

					<div class="col-md-6 col-sm-6">
						<div class="about-image">
							<img src="img/bg_6.jpg" alt="About Images">
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="about-text">
							<h3>About Us</h3>
							<p>Grids is a responsive Multipurpose Template. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur aliquet quam id dui posuere blandit. Donec sollicitudin molestie malesuada. Pellentesque in ipsum id orci porta dapibus. Vivamus suscipit tortor eget felis porttitor volutpat.</p>
							<p>Grids is a responsive Multipurpose Template. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur aliquet quam id dui posuere blandit. Donec sollicitudin molestie malesuada. Pellentesque in ipsum id orci porta dapibus. Vivamus suscipit tortor eget felis porttitor volutpat.</p>
							<a href="about.php" class="btn btn-primary waves-effect waves-dark">Learn More</a>
						</div>
					</div>
				</div>
			</div>
		</section>	  


		<?php include('includes/footer.php') ?>
	</div>
	<a href="#" class="scrollup waves-effect waves-dark"><i class="fa fa-angle-up HillSide"></i></a>
	<script src="js/jquery.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="materialize/js/materialize.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.fancybox.pack.js"></script>
	<script src="js/jquery.fancybox-media.js"></script>  
	<script src="js/jquery.flexslider.js"></script>
	<script src="js/animate.js"></script>
	<!-- Vendor Scripts -->
	<script src="js/modernizr.custom.js"></script>
	<script src="js/jquery.zoomslider.min.js"></script>
	<script src="js/jquery.isotope.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/animate.js"></script> 
	<script src="js/custom.js"></script>
</body>
</html>