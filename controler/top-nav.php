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
  <title>AdminLTE 2 | Top Navigation</title>
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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="index.php" class="navbar-brand"><b style="margin-top:20px;"><img style="width:50px" src="avatar/guest.png" alt="dsads"/></b></a>
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
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
                <li class="divider"></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
        </div>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
	
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Main content -->
      <section class="content">
	  <!--connexion-->
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog" role="document">
						<div class="modal-content">
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
              <div class="col-md-pull-1 col-md-8">
          <div class="box box-solid">
            <!-- /.box-header -->
            <div class="box-body">
              <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                  <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                </ol>
                <div class="carousel-inner">
                  <div class="item active">
                    <img src="img/slider1.jpg" alt="First slide">

                    <div class="carousel-caption">
                      Bienvenu sur Guest4you
                    </div>
                  </div>
                  <div class="item">
                    <img src="img/slider2.jpg" alt="Second slide">

                    <div class="carousel-caption">
                     
                    </div>
                  </div>
                  <div class="item">
                    <img src="img/slider3.jpg" alt="Third slide">

                    <div class="carousel-caption">
                     
                    </div>
                  </div>
				  <div class="item">
                    <img src="img/slider4.jpg" alt="Third slide">

                    <div class="carousel-caption">
                      
                    </div>
                  </div>
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                  <span class="fa fa-angle-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                  <span class="fa fa-angle-right"></span>
                </a>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <b>Version</b> 2.3.3
      </div>
      <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
      reserved.
    </div>
    <!-- /.container -->
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
