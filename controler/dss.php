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
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body style="background-color:#ccc" class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b><img style="width:50px" src="avatar/guest.png" alt="dsads"/></b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b><img style="width:50px" src="avatar/guest.png" alt="dsads"/></b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <div class="navbar-custom-menu">
	  <ul class="nav navbar-nav">
              <li class="active"><a href="./">Acceuille<span class="sr-only">(current)</span></a></li>
            </ul>
        <ul class="nav navbar-nav">
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <b data-toggle="modal" data-target="#myModal1">Connexion</b>
            </a>
          </li>
		  <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <b data-toggle="modal" data-target="#myModal">Insciption</b>
            </a>
          </li>
		  </ul>
		  
      </div>
    </nav>
  </header>
             <!--slider-->
					
						<div class="row">
						<div class="col-xs-12">
						<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					  <!-- Indicators -->
					  <ol class="carousel-indicators">
						<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
						<li data-target="#carousel-example-generic" data-slide-to="1"></li>
						<li data-target="#carousel-example-generic" data-slide-to="2"></li>
						<li data-target="#carousel-example-generic" data-slide-to="3"></li>
					  </ol>
					  <!-- Wrapper for slides -->
					  <div  class="carousel-inner" role="listbox">
						<div class="item active">
						  <img src="img/slider1.jpg" alt="image1">
						  <div class="carousel-caption hidden-xs">
						  </div>
						</div>
						<div class="item">
						  <img src="img/slider2.jpg" alt="image1">
						  <div class="carousel-caption hidden-xs">
						  </div>
						</div>
						 <div class="item">
						  <img src="img/slider3.jpg" alt="image1">
						  <div class="carousel-caption hidden-xs">
						  </div>
						</div>
						 <div class="item">
						  <img src="img/slider4.jpg" alt="image1">
						  <div class="carousel-caption hidden-xs">
						  </div>
						</div>
						
					  </div>

					  <!-- Controls -->
					  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					  </a>
					  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					  </a>
					</div>
					</div>
				</div>

			 <!--end Slider-->
  <!--connexion-->
					<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog" role="document">
						<div class="modal-content">
						<form method="post" class="form-horizontal" action="session.php">
						  <div class="modal-body">
							  <!-- /.login-logo -->
							  <div class="login-box-body">
								<p class="login-box-msg">Connexion</p>

								<form action="session.php" method="post">
								  <div class="form-group has-feedback">
									<input type="email" class="form-control" name="email" placeholder="Email">
									<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
								  </div>
								  <div class="form-group has-feedback">
									<input type="password" name="password" class="form-control" placeholder="Password">
									<span class="glyphicon glyphicon-lock form-control-feedback"></span>
								  </div>
								  <div class="row">
									<div class="col-xs-8">
									  <div class="checkbox icheck">
										<label>
										  <input type="checkbox"> Remember Me
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
								  <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
									Facebook</a>
								  <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
									Google+</a>
								</div>
								<!-- /.social-auth-links -->

								<a href="#">I forgot my password</a><br>
								<a href="register.html" class="text-center">Register a new membership</a>

								</div>
								</div>
							</div>
						</div>
					</div>
  	<!--inscription-->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog" role="document">
						<div class="modal-content">
						<form method="POST" action="<?php $_SERVER['PHP_SELF']?>" >
						  <div class="modal-body">	
                              <!--Insciption-->
							     <div class="register-box-body">
										<p class="login-box-msg">Insciption</p>
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
											  <div class="radio">
												<label>
												  <input type="radio" name="r" id="optionsRadios1" value="M" checked>
												  Homme
												</label>
											  </div>
											  <div class="radio">
												<label>
												  <input type="radio" name="r" id="optionsRadios2" value="F">
												  Femme
												</label>
											  </div>
											</div>
											</center>
										  <div class="form-group has-feedback">
											<input type="email" class="form-control" name="mail" placeholder="Email">
											<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
										  </div>
										  <div class="form-group has-feedback">
											<input type="password" name="passe" class="form-control" placeholder="Password">
											<span class="glyphicon glyphicon-lock form-control-feedback"></span>
										  </div>
										   <div class="form-group">
											  <textarea class="form-control" name="adresse" rows="3" placeholder="Enter votre adresse..."></textarea>
											</div>
										  <div class="row">
											<div class="col-xs-8">
											  <div class="checkbox icheck">
												<label>
												  <input type="checkbox"> I agree to the <a href="#">terms</a>
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
										  <p>- OR -</p>
										  <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
											Facebook</a>
										  <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
											Google+</a>
										</div>

										<a href="login.html" class="text-center">I already have a membership</a>
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
						   $adresse = $_POST['adresse'];
						    $user->setNom($nom);
						    $user->setPrenom($prenom);
							$user->setSexe($sexe);
							$user->setAdresse($adresse);
							$user->setEmail($email);
							$user->setMdp($password);
							$muser->Ajouter_user($user);
					   }
					?>
<!-- jQuery 2.2.0 -->
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
