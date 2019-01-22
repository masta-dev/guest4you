<!DOCTYPE HTML>
<html>
<head>
<title>Real Space a Real Estates and Builders Category Flat Bootstrap Responsive Website Template | Home :: w3layouts </title>
<!---css--->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!---css--->
<!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="plugins/ionslider/ion.rangeSlider.css">
  <!-- ion slider Nice -->
  <link rel="stylesheet" href="plugins/ionslider/ion.rangeSlider.skinNice.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!--your style index-->
  <link rel="stylesheet" href="dist/css/skins/index.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script type="text/javascript" src="dist/js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="dist/js/jssor.slider-21.1.5.mini.js"></script>
    <!-- use jssor.slider-21.1.5.debug.js instead for debug -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Real Space Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!---js--->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<!---js--->
<!---fonts-->
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=PT+Sans:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
<!---fonts-->
<script src="js/responsiveslides.min.js"></script>
	 <script>
		$(function () {
		  $("#slider").responsiveSlides({
			auto:true,
			nav: false,
			speed: 500,
			namespace: "callbacks",
			pager:true,
		  });
		});
	</script>
<link href="css/owl.carousel.css" rel="stylesheet">
<script src="js/owl.carousel.js"></script>
	<script>
		$(document).ready(function() {
		$("#owl-demo").owlCarousel({
			items : 1,
			lazyLoad : true,
			autoPlay : true,
			navigation : false,
			navigationText :  false,
			pagination : true,
		});
		});
	</script>

</head>
<body>
		<!---header--->
			<div class="header-section">
				<div class="container">
					<nav class="navbar navbar-static-top">
					  <div class="container">
						<div class="navbar-header">
						  <a href="index.php" class="navbar-brand"><b><img style="width:50px; margin-top:-14px ;"  src="avatar/logota.png" alt="dsads"/></b></a>
						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						
						<!-- /.navbar-collapse -->
						<!-- Navbar Right Menu -->
						<div class="navbar-custom-menu">
						   <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
						  <ul class="nav navbar-nav">
							<li class="active"><a class="glyphicon glyphicon-home" href="#"> Acceuille <span class="sr-only">(current)</span></a></li>
							<li><a data-toggle="modal" data-target="#myModal" class="glyphicon glyphicon-log-in" href="#"> Connexion</a></li>
							<li><a data-toggle="modal" data-target="#myModal1" class="glyphicon glyphicon-edit" href="#"> Inscription</a></li>
						  </ul>
						</div>
						</div>
						<!-- /.navbar-custom-menu -->
					  </div>
					  <!-- /.container-fluid -->
					</nav>
				</div>
			</div>
		<!---header--->
		<!---banner--->
		<div class="slider">
			<div class="callbacks_container">
				<ul class="rslides" id="slider">
					<div class="slid banner1">
					</div>
					<div class="slid banner2">	
					</div>
					<div class="slid banner3">	
					</div>
				</ul>
			</div>
		</div>
<!---banner--->
	<div class="content">
		<div class="place-section">
			<div class="container">
				<h2>find your place</h2>
				<div id="hoho"  class="col-md-push-1 col-md-4">
		   
				<label style="color:#fff;">Pays</label>
									<select id="check_pays" name="check_pays" class="form-control select2" style="width: 100%;">
									
									  <option value=""></option>
												
									</select>
									<label style="color:#fff;">ville</label>
									<select name="check_ville" id="check_ville" class="form-control select2" style="width: 100%;">
									  <option value="">- choisis une ville -</option>
									</select>
									
				
			 </div>
				<div class="place-grids">
					 <div style="border:2px solid #fff;margin-top:1%;background-color:#3c8dbc; padding:20px;border-radius:10px;" class="col-md-push-3 col-md-5">
					 <input id="range_1" type="text" name="range_1" value="">
					 </div>
					 <div class="col-md-push-7 col-md-12">
				   <input style="border:2px solid #fff;margin-top:1%;" type="submit" value="Rechercher" class="col-md-push-1 col-md-4 btn btn-primary" name="btn_search" />
					</div>
				</div>	 	
			</div>
		</div>
			<div class="friend-agent">
				<div class="container">
					<div class="friend-grids">
						<div class="col-md-4 friend-grid">
							<img src="images/p.png">
							<h4>Search From Anywhere</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel.</p>
						</div>
						<div class="col-md-4 friend-grid">
							<img src="images/p1.png">
							<h4>Friendly Agents</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel.</p>
						</div>
						<div class="col-md-4 friend-grid">
							<img src="images/p2.png">
							<h4>Buy or Rent</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel.</p>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<div class="offering">
				<div class="container">
					<h3>We are Offering the Best Real Estate Deals</h3>
					<div class="offer-grids">
						<div class="col-md-6 offer-grid">
							<div class="offer-grid1">
								<h4><a href="single.html">Villa In Hialeah, Dade County</a></h4>
								<div class="offer1">
									<div class="offer-left">
										<a href="single.html" class="mask"><img src="images/p3.jpg" class="img-responsive zoom-img" alt=""/></a>
									</div>
									<div class="offer-right">
										<h5><label>$</label> 7,500 Per Month - <span>Single Family Home</span></h5>
										<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh…</p>
										<a href="single.html"class="button1">more details</a>
									</div>
										<div class="clearfix"></div>
								</div>
							</div>
						</div>
							<div class="col-md-6 offer-grid">
								<div class="offer-grid1">
									<h4><a href="single.html">401 Biscayne Boulevard, Miami</a></h4>
									<div class="offer1">
										<div class="offer-left">
											<a href="single.html" class="mask"><img src="images/p4.jpg" class="img-responsive zoom-img" alt=""/></a>
									</div>
										<div class="offer-right">
											<h5><label>$</label> 3,250 Per Month - <span>Condominium</span></h5>
											<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh…</p>
											<a href="single.html"class="button1">more details</a>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						<div class="clearfix"></div>
					</div>
					<div class="offer-grids">
						<div class="col-md-6 offer-grid">
							<div class="offer-grid1">
								<h4><a href="single.html">3895 NW 107th Ave</a></h4>
								<div class="offer1">
									<div class="offer-left">
										<a href="single.html" class="mask"><img src="images/p5.jpg" class="img-responsive zoom-img" alt=""/></a>
									</div>
									<div class="offer-right">
										<h5><label>$</label> 5,200 Per Month - <span>Office</span></h5>
										<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh…</p>
										<a href="single.html"class="button1">more details</a>
									</div>
										<div class="clearfix"></div>
								</div>
							</div>
						</div>
							<div class="col-md-6 offer-grid">
								<div class="offer-grid1">
									<h4><a href="single.html">1400 Anastasia Avenue, Coral</a></h4>
									<div class="offer1">
										<div class="offer-left">
											<a href="single.html" class="mask"><img src="images/p6.jpg" class="img-responsive zoom-img" alt=""/></a>
									</div>
										<div class="offer-right">
											<h5><label>$</label> 525,000 - <span>Villa</span></h5>
											<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh…</p>
											<a href="single.html"class="button1">more details</a>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						<div class="clearfix"></div>
					</div>
					<div class="offer-grids">
						<div class="col-md-6 offer-grid">
							<div class="offer-grid1">
								<h4><a href="#">12 Apartments Of Type A</a></h4>
								<div class="offer1">
									<div class="offer-left">
										<a href="single.html" class="mask"><img src="images/p7.jpg" class="img-responsive zoom-img" alt=""/></a>
									</div>
									<div class="offer-right">
										<h5><label>$</label> 3,200 Per Month - <span>Apartment</span></h5>
										<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh…</p>
										<a href="single.html"class="button1">more details</a>
									</div>
										<div class="clearfix"></div>
								</div>
							</div>
						</div>
							<div class="col-md-6 offer-grid">
								<div class="offer-grid1">
									<h4><a href="single.html">20 Apartments Of Type B</a></h4>
									<div class="offer1">
										<div class="offer-left">
											<a href="single.html" class="mask"><img src="images/p8.jpg" class="img-responsive zoom-img" alt=""/></a>
									</div>
										<div class="offer-right">
											<h5><label>$</label> 4,200 Per Month - <span>Apartment</span></h5>
											<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh…</p>
											<a href="single.html"class="button1">more details</a>	
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<!---Featured Properties--->
				<div class="feature-section">
					<div class="container">
						<h3>Featured Properties</h3>
						<div class="feature-grids">
							<div class="col-md-3 feature-grid">
								<img src="images/f1.jpg" class="img-responsive" alt="/">
								<h5>Villa in Hialeah, Dade</h5>
								<p>Lorem ipsum dolor sit amet, consectetuer  elit,… <a href="#">Know More</a></p>
								<span>$2,500 Per Month</span>
							</div>
							<div class="col-md-3 feature-grid">
								<img src="images/f2.jpg" class="img-responsive" alt="/">
								<h5>401 Biscayne Boulevard</h5>
								<p>Lorem ipsum dolor sit amet, consectetuer  elit,… <a href="#">Know More</a></p>
								<span>$7,500 Per Month</span>
							</div>
							<div class="col-md-3 feature-grid">
								<img src="images/f3.jpg" class="img-responsive" alt="/">
								<h5>154 Southwest  Terra</h5>
								<p>Lorem ipsum dolor sit amet, consectetuer  elit,… <a href="#">Know More</a></p>
								<span>$9,500 Per Month</span>
							</div>
							<div class="col-md-3 feature-grid">
								<img src="images/f4.jpg" class="img-responsive" alt="/">
								<h5>Florida 5, Pinecrest, FL</h5>
								<p>Lorem ipsum dolor sit amet, consectetuer  elit,… <a href="#">Know More</a></p>
								<span>$5,500 Per Month</span>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			<!---Featured Properties--->
			<div class="membership">
				<div class="container">
					<h3>Membership Plans</h3>
					<div class="membership-grids">
						<div class="col-md-4 membership-grid">
								<h4>Personal</h4>
							<div class="membership1">
								<h5>9.99 <span>USD</span></h5>
								<h6>/ 1 month</h6>
								<ul class="member">
									<li>10 Listings</li>
									<li>2 Featured Listings</li>
								</ul>
							</div>
						</div>
						<div class="col-md-4 membership-grid">
								<h4>Professional</h4>
							<div class="membership1">
								<h5>49.99 <span>USD</span></h5>
								<h6>/ 6 month</h6>
								<ul class="member">
									<li>40 Listings</li>
									<li>10 Featured Listings</li>
								</ul>
							</div>
						</div>
						<div class="col-md-4 membership-grid">
								<h4>Bussiness</h4>
							<div class="membership1">
								<h5>99.99 <span>USD</span></h5>
								<h6>/ 1 year</h6>
								<ul class="member">
									<li>Unlimited Listings</li>
									<li>20 Featured Listings</li>
								</ul>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<!---testimonials--->
					<div class="testimonials">
						<div class="container">
							<h3>testimonial</h3>
							<span></span>
							<div id="owl-demo" class="owl-carousel">
								<div class="item">
									<div class="col-md-2 testmonial-img">
										<img src="images/t1.png" class="img-responsive" alt=""/>
									</div>
									<div class="col-md-10 testmonial-text">
										<p>Lorem ipsum dolor sit amet, offendit volutpat sea ex, at omnium scripta pro, at omnium scripta pro, ei mea oratio malorum forensibus. ei mea oratio malorum forensibus. Sed ei omnes laoreet posidonium ei mea oratio malorum forensibus.</p>
										<h4><a href="#">Michael Feng</a></h4>
									</div>
									<div class="clearfix"> </div>
								</div>
								<div class="item">
									<div class="col-md-2 testmonial-img">
										<img src="images/t2.png" class="img-responsive" alt=""/>
									</div>
									<div class="col-md-10 testmonial-text">
										<p>Lorem ipsum dolor sit amet, offendit volutpat sea ex, at omnium scripta pro, at omnium scripta pro, ei mea oratio malorum forensibus. ei mea oratio malorum forensibus. Sed ei omnes laoreet posidonium ei mea oratio malorum forensibus.</p>
										<h4><a href="#">Stacy Barron</a></h4>
									</div>
									<div class="clearfix"> </div>
								</div>
								<div class="item">
									<div class="col-md-2 testmonial-img">
										<img src="images/t3.png" class="img-responsive" alt=""/>
									</div>
									<div class="col-md-10 testmonial-text">
										<p>Lorem ipsum dolor sit amet, offendit volutpat sea ex, at omnium scripta pro, at omnium scripta pro, ei mea oratio malorum forensibus. ei mea oratio malorum forensibus. Sed ei omnes laoreet posidonium ei mea oratio malorum forensibus.</p>
										<h4><a href="#">Johnson </a></h4>
									</div>
									<div class="clearfix"> </div>
								</div>
							</div>
						</div>
					</div>
					<!---testmonials--->
	</div>				
					<!---footer--->
					<div class="footer-section">
						<div class="container">
							<div class="footer-grids">
								<div class="col-md-3 footer-grid">
									<h4>About Real Homes</h4>
									<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
								</div>
								<div class="col-md-3 footer-grid">
									<h4>Recent Posts</h4>
									<ul>
										<li><a href="#">Lorem Post With Image Format</a></li>
										<li><a href="#">Example Video Blog Post</a></li>
										<li><a href="#">Example Post With Gallery Post </a></li>
										<li><a href="#">Example Video Blog Post</a></li>
										<li><a href="#">Lorem Post With Image Format</a></li>
										<li><a href="#">Example Video Blog Post</a></li>
									</ul>
								</div>
								<div class="col-md-3 footer-grid">
									<h4>Useful links</h4>
									<ul>
										<li><a href="terms.html">Terms of Use</a></li>
										<li><a href="privacy.html">Privacy Policy</a></li>
										<li><a href="contact.html">Contact Support </a></li>
										<li><a href="agents.html"> All Agents</a></li>
										<li><a href="blog.html">Blog</a></li>
										<li><a href="faqs.html">FAQs</a></li>
									</ul>
								</div>
								<div class="col-md-3 footer-grid">
									<h4>Get In Touch</h4>
									<p>8901 Marmora Road</p>
									<p>Glasgow, DO4 89GR.</p>
									<p>Freephone : +1 234 567 890</p>
									<p>Telephone : +1 234 567 890</p>
									<p>FAX : + 1 234 567 890</p>
									<p>E-mail : <a href="mailto:example@mail.com"> example@mail.com</a></p>
								</div>
							<div class="clearfix"> </div>
							</div>
							
						</div>
					</div>
					<!---footer--->
					<!--copy-->
					<div class="copy-section">
						<div class="container">
							<p>&copy; 2016 Real Space. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
						</div>
					</div>
				<!--copy-->
<!-- login -->
			<!--connexion-->
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog" role="document">
						<div class="modal-content">
						<form method="post" class="form-horizontal" action="session.php">
						  <div class="modal-body">
							  <!-- /.login-logo -->
							  <div class="login-box-body">
								<p class="login-box-msg"><center><h2>Connexion</h2></center></p>

								<form action="session.php" method="post">
								  <div class="form-group has-feedback">
									<input type="email" class="form-control" name="email" placeholder="Email">
									<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
								  </div>
								  <div class="form-group has-feedback">
									<input type="password" name="password" class="form-control" placeholder="Mot de Passe">
									<span class="glyphicon glyphicon-lock form-control-feedback"></span>
								  </div>
								  <div class="row">
									<div class="col-xs-8">
									  <div class="checkbox icheck">
										<label>
										  <input type="checkbox"> Se souvenir de moi
										</label>
									  </div>
									</div>
									<!-- /.col -->
									<div class="col-xs-4">
									  <button type="submit" name="Connexion" class="btn btn-primary btn-block btn-flat">Connexion</button>
									</div>
									<!-- /.col -->
								  </div>
								</form>

								<div class="social-auth-links text-center">
								  <p>- Ou -</p>
								  <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Se connecter avec compte
									Facebook</a>
								  <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Se connecter avec compte
									Google+</a>
								</div>
								<!-- /.social-auth-links -->

								<a href="#">Mot de Passe oublié</a><br>
								<a href="register.html" class="text-center">Enregistrer un nouveau membre</a>

								</div>
								</div>
							</div>
						</div>
					</div>
					  	<!--inscription-->
                    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog" role="document">
						<div class="modal-content">
						  <div class="modal-body">	
                              <!--Insciption-->
							     <div class="register-box-body">
										<p class="login-box-msg"><center><h2>Insciption</h2></center></p>
										<form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" role="form">
										  <div class="form-group has-feedback">
											<input type="text" name="nom" class="form-control" placeholder="nom...">
											<span class="glyphicon glyphicon-user form-control-feedback"></span>
										  </div>
										  <div class="form-group has-feedback">
											<input type="text" name="prenom" class="form-control" placeholder="prenom...">
											<span class="glyphicon glyphicon-user form-control-feedback"></span>
										  </div>
										  <center>
											<div class="form-group">
											  <div class="radio" style="float:left;">
												<label>
												  <input type="radio" name="r" id="optionsRadios1" value="M" checked>
												  Homme
												</label>
													&nbsp;
												<label >
												  <input type="radio" name="r" id="optionsRadios2" value="F">
												  Femme
												</label>
											  </div>
											</div>
											</center>
										  <div class="form-group has-feedback">
											<input type="email" class="form-control" name="mail" placeholder="Email">
											<span style="margin-top:40px;"class="glyphicon glyphicon-envelope form-control-feedback"></span>
										  </div>
										  <div class="form-group has-feedback">
											<input type="password" name="passe" class="form-control" placeholder="Mot de Passe">
											<span class="glyphicon glyphicon-lock form-control-feedback"></span>
										  </div>
										  <div class="row">
											<div class="col-xs-8">
											  <div class="checkbox icheck">
												<label>
												  <input type="checkbox"> J'accepte les <a href="#"> terms</a>
												</label>
											  </div>
											</div>
											<!-- /.col -->
											<div class="col-xs-4">
											  <button type="submit" name="inscription" class="btn btn-primary btn-block btn-flat">Insciption</button>
											</div>
											<!-- /.col -->
										  </div>
										</form>

										<div class="social-auth-links text-center">
										  <p>- OU -</p>
										  <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Se connecter avec un compte
											Facebook</a>
										  <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Se connecter avec un compte
											Google+</a>
										</div>

										<a href="login.html" class="text-center">Je suis dèja membre</a>
									  </div>
                             <!--fin register-->							  
						</div>
						</div>
					</div>
					</div>
					<?php 
					   if(isset($_POST['inscription']))
					   {
						   $nom = $_POST['nom'];
						   $prenom = $_POST['prenom'];
						   $sexe = $_POST['r'];
						   $email = $_POST['mail'];
						   $password = $_POST['passe'];
						    $user->setNom($nom);
						    $user->setPrenom($prenom);
							$user->setSexe($sexe);
							$user->setEmail($email);
							$user->setMdp($password);
							$muser->Ajouter_user($user);
					   }
					?>
			<!--  registre -->
<script src="plugins/ionslider/ion.rangeSlider.min.js"></script>
<script>
   $(function () {
   
    /* ION SLIDER */
    $("#range_1").ionRangeSlider({
      min: 0,
      max: 200000,
      from: 0,
      to: 200000,
      type: 'double',
      step: 1,
      prefix: "Dh ",
      prettify: false,
      hasGrid: true
    });
	 $('#slideSearch').fadeIn(1600);
   });
</script>
			
</body>
</html>