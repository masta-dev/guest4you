<?php
require('../model/dao/beans/utilisateur.php');
require('../model/metier/metiermanagerutilisateur.php');
require('../model/dao/singleton/singletonconnexion.php');
require('../model/dao/beans/poster.php');
require('../model/metier/metiermanagerposter.php');
require('../model/dao/beans/ville.php');
require('../model/metier/metiermanagerville.php');
require('../model/dao/beans/pays.php');
require('../model/metier/metiermanagerpays.php');
$user = new Utilisateur();
$p = new Poster();
$py = new Pays();
$v = new Ville();
$muser = new MetierManagerUtilisateur();
$mpy = new MetierManagerPays();
$mp = new MetierManagerPoster();
$mv = new MetierManagerVille();
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Guest4you</title>
<!---css--->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!---css--->
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
					<nav class="fixednavbar navbar navbar-default">
					<!---Brand and toggle get grouped for better mobile display--->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>				  
							<div class="navbar-brand">
								<h1><a href="index.php"><span><span><span>Guest</span><span style="font-style:italic">4</span>You</a></h1>
							</div>
						</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav">
								<li class="active"><a href="index.php">Accueille<span class="sr-only">(current)</span></a></li>
									<!--<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages<span class="caret"></span></a>
											<ul class="dropdown-menu">
												<li><a href="about.html">About</a></li>
												<li><a href="services.html">Services</a></li>
												<li><a href="agents.html">Agents</a></li>
												<li><a href="forrent.html">For Rent</a></li>
												<li><a href="forsale.html">For Sale</a></li>
												<li><a href="pricing.html">Pricing</a></li>
												<li><a href="faqs.html">FAQs</a></li>
												<li><a href="idxpress.html">IDXpress</a></li>
												<li><a href="terms.html">Terms of Use</a></li>
												<li><a href="privacy.html">Privacy Policy</a></li>
											</ul>
									</li>-->
									<!--<li class="dropdown ">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Property<span class="caret"></span></a>
											<ul class="dropdown-menu">
												<li><a href="defaultvariation.html">Default – Variation</a></li>
												<li><a href="agentinsidebarvariation.html">Agent in Sidebar - Variation</a></li>
												<li><a href="galleryvariation.html">Gallery - Variation</a></li>
											</ul>
									</li>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gallery <span class="caret"></span></a>
											<ul class="dropdown-menu">
												<li><a href="2columnsgallery.html">2 Columns Gallery</a></li>
												<li><a href="3columnsgallery.html">3 Columns Gallery</a></li>
												<li><a href="4columnsgallery.html">4 Columns Gallery</a></li>
											</ul>
									</li>-->
								<!--<li><a href="blog.html">Blog</a></li>
								<li><a href="codes.html">Codes</a></li>
								<li><a href="contact.html">Contact</a></li>-->
							</ul>
							<div class="clearfix"></div>
						</div>
					</nav>
				</div>
			</div>
			<div class="slider">
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
		<!---header--->
		<!---banner--->
	<div class="content">
		<div class="place-section">
			<div class="container">
				<div class="place-grids">
				<form class="form-group" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
					<div class="col-md-2 place-grid">
						<h5>Pays</h5>
						<select id='pays' class="sel">
						<?php $afipay = $mpy->afficher_tous_pays();
							foreach($afipay as $afi){
							?>
							  <option  value="<?php echo $afi['id_pays'];?>"><?php echo $afi['nom_pays'];?></option>
							<?php } 
							?>
						</select>
					</div>
					<div class="col-md-2 place-grid">
					<h5>Ville</h5>
					<select name="ville" id="ville" class="sel">
						<option value="">Choisis le ville</option>
						</select>
					</div>
					<div class="col-md-3 place-grid">
					<h5>Prix</h5>
					<input name="prix" placeholder="Prix...DH" type="text"class="sel" required="required" />
					</div>
					<div class="col-md-4 search">
						<input name="search" type="submit" value="Recherche">
					</form>
					</div>
				</div>
			</div>
		</div>
		<hr>
				<div class="container">
					<div class="offer-grids">
						<div class="col-md-12 col-md-push-0 offer-grid">
						<?php 
						if(isset($_POST['search'])){
						    $ville = $_POST['ville'];
							$prix = $_POST['prix'];
						?>
						<?php $postes = $mp->Recherche_ville_prix($ville,$prix);
						   foreach($postes as $poste){
						?>
							<div class="offer-grid1">
							    <div class="request-left">
									<img style="width:10%"  class="img-circle" src="avatar/<?php echo $poste['img_user'];?>" alt=""/>
								</div>
                                 <br/>
								<h4><a href="single.html"><?php echo $poste['nom']." ".$poste['prenom']?></a></h4>
								<div class="offer1">
									<div class="offer-left">
										<a href="single.html" class="mask"><img style="height:400px;" src="avatar/<?php echo $poste['img_poster'];?>" class="img-responsive zoom-img" alt=""/></a>
									</div>
									<div class="offer-right">
										<h5><label><?php echo $poste['prix']?></label> Dh Par Mois - <span><?php echo $poste['nom_ville'];?></<?php echo $poste['nom_ville'];?></span></h5>
										<p><?php echo $poste['publication'];?></p>
										<p><?php echo $poste['adresse'];?></p>
										<a href="single.html"class="button1">Plus de details</a>
									</div>
										<div class="clearfix"></div>
										
								</div>
							</div>
							<br/>
							<br/>
						<?php }}else{?>
					<div class="offer-grids">
					<?php $afichers = $mp->dernier_8_poste();
						   foreach($afichers as $aficher){
						    ?>
						<div class="col-md-12 offer-grid">
						
						<div class="offer-grid1">
							
							<div class="request-left">
									<img style="width:10%"  class="img-circle" src="avatar/<?php echo $aficher['img_user'];?>" alt=""/>
								</div>
								<h4><a href="single.html"><?php echo $aficher['nom']." ".$aficher['prenom'];?></a></h4>
								<div class="offer1">
									<div class="offer-left">
										<a href="single.html" class="mask"><img style="height:400px;" src="avatar/<?php echo $aficher['img_poster']?>" class="img-responsive zoom-img" alt=""/></a>
									</div>
									<div class="offer-right">
										<h5><label><?php echo $aficher['prix']?></label> Dh Par Mois - <span><?php echo $aficher['nom_ville'];?></span></h5>
										<p><?php echo $aficher['publication'];?></p>
										<a href="single.html"class="button1">Plus de details</a>
									</div>
										<div class="clearfix"></div>
								</div>
								
								<div class="clearfix"></div>
							</div>
						</div>
						
						   <?php }?>
						<br/><br/>
					</div>
						<?php
						}?>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
	</div>				
					<!---footer--->
					<div class="footer-section">
						<div class="container">
							<div class="footer-grids">
								<div class="col-md-3 footer-grid">
                                 <br/>
									<h4>Pays</h4>
									<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
								</div>
								<div class="col-md-3 footer-grid">
									<h4>Ville</h4>
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
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
						<div class="modal-body real-spa">
							<div class="login-grids">
								<div class="login">
									
									<div class="login-right">
										<form>
											<h3>Login</h3>
											<input type="text" value="Enter your Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter your Email';}" required="">	
											<input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">	
											<h4><a href="#">Forgot password</a> / <a href="#">Create new password</a></h4>
											<div class="single-bottom">
												<input type="checkbox"  id="brand" value="">
												<label for="brand"><span></span>Remember Me.</label>
											</div>
											<input type="submit" value="Login Now" >
										</form>
									</div>
																
								</div>
								<p>By logging in you agree to our <a href="#">Terms</a> and <a href="#">Conditions</a> and <a href="#">Privacy Policy</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- //login -->
			<!-- Register -->
			<div class="modal fade" id="myModal1" tabindex="-1" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
						<div class="modal-body real-spa">
							<div class="login-grids">
								<div class="login">
									<div class="login-right">
										<form>
											<h3>Register </h3>
											<input type="text" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
											<input type="text" value="Mobile number" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Mobile number';}" required="">
											<input type="text" value="Email id" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email id';}" required="">	
											<input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">	
											
											<input type="submit" value="Register Now" >
										</form>
									</div>
									<div class="clearfix"></div>								
								</div>
								<p>By logging in you agree to our <a href="#">Terms</a> and <a href="#">Conditions</a> and <a href="#">Privacy Policy</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- //Register -->
			<script>
			    $(document).ready(function(){
					$('#pays').change(function(){
						var code = $(this).val();
						var data = 'code='+code ;
						$.ajax({
							type : 'POST',
							url : 'ville.php',
							data : data ,
							cache : false ,
							success : function(html)
							{
								$('#ville').html(html);
							}
						})
					});
				});
			</script>
</body>
</html>