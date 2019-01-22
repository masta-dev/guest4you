<?php
@session_start();
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
  <title>Guest4you</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/star-rating.css" media="all" type="text/css"/>
    <link rel="stylesheet" href="themes/krajee-fa/theme.css" media="all" type="text/css"/>
    <link rel="stylesheet" href="themes/krajee-svg/theme.css" media="all" type="text/css"/>
    <link rel="stylesheet" href="themes/krajee-uni/theme.css" media="all" type="text/css"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
    <script src="js/star-rating.js" type="text/javascript"></script>
    <script src="themes/krajee-fa/theme.js" type="text/javascript"></script>
    <script src="themes/krajee-svg/theme.js" type="text/javascript"></script>
    <script src="themes/krajee-uni/theme.js" type="text/javascript"></script>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
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
    <script type="text/javascript" src="dist/js/jssor.slider-21.1.5.mini.js"></script>
    <!-- use jssor.slider-21.1.5.debug.js instead for debug -->
    
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body style="background-color:#ecf0f5" class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <header class="main-header">
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
			<?php if(@$_SESSION['id'] != null){?>
			 <li><a class="glyphicon glyphicon-user" href="Monprofil.php"> Profil</a></li>
			<?php }?>
			<?php if(@$_SESSION['id'] == null){?>
            <li><a data-toggle="modal" data-target="#myModal" class="glyphicon glyphicon-log-in" href="#"> Connexion</a></li>
			<?php }if(@$_SESSION['id'] == null){?>
            <li><a data-toggle="modal" data-target="#myModal1" class="glyphicon glyphicon-edit" href="#"> Inscription</a></li>
			<?php }?>
			<?php if(@$_SESSION['id'] != null){?>
			 <li><a class="glyphicon glyphicon-globe" href="profil.php"> Poster une publication</a></li>
			<?php }?>
            <!--<li class="dropdown">
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
            </li>-->
          </ul>
		  <?php if(@$_SESSION['id'] != null){?>
		  <div class="navbar-custom-menu">
		 <ul class="nav navbar-nav">
			  <!-- User Account: style can be found in dropdown.less -->
			  <li class="dropdown user user-menu">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<?php $Afficher = $muser->Afficher_user($_SESSION['id']);?>
				  <img src="avatar/<?php echo $Afficher['img_user'];?>" class="user-image" alt="User Image">
				  <span class="hidden-xs"><?php echo $Afficher['nom']." ".$Afficher['prenom'];?></span>
				</a>
				<ul class="dropdown-menu">
				  <!-- User image -->
				  <li class="user-header">
					<img src="avatar/<?php echo $Afficher['img_user'];?>" class="img-circle" alt="User Image">

					<p>
					  <?php echo $Afficher['nom']." ".$Afficher['prenom'];?>
					  <!--<small>Member since Nov. 2012</small>-->
					</p>
				  </li>
				  <!-- Menu Body -->
				  <!-- Menu Footer-->
				  <li class="user-footer">
					<div class="pull-left">
					  <a href="Myprofil.php" class="btn btn-default btn-flat">Profile</a>
					</div>
					<form action="session.php" method="POST">
					<div class="pull-right">
					  <button type="submit" name="deconnexion" class="glyphicon glyphicon-log-out btn btn-default btn-flat"> Deconnexion</button>
					</div>
					</form>
				  </li>
				</ul>
			  </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
		</div>
		  <?php } ?>
        </div>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  </div>
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
						   if($sexe == 'M')
							{$s = 'homme.jpg';}
							else
							{$s = 'femme.jpg';}
						    $user->setNom($nom);
						    $user->setPrenom($prenom);
							$user->setSexe($sexe);
							$user->setEmail($email);
							$user->setMdp($password);
							$user->setImg_user($s);
							$muser->Ajouter_user($user);
					   }
					?>
  <script>
        jQuery(document).ready(function ($) {
            
            var jssor_1_SlideshowTransitions = [
              {$Duration:1200,x:0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:-0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:-0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:-0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:-0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:0.3,$Cols:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:0.3,$Rows:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:0.3,$Cols:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:-0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:0.3,$Rows:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:-0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,$Delay:20,$Clip:3,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,$Delay:20,$Clip:3,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,$Delay:20,$Clip:12,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,$Delay:20,$Clip:12,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2}
            ];
            
            var jssor_1_options = {
              $AutoPlay: true,
              $SlideshowOptions: {
                $Class: $JssorSlideshowRunner$,
                $Transitions: jssor_1_SlideshowTransitions,
                $TransitionsOrder: 1
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $ThumbnailNavigatorOptions: {
                $Class: $JssorThumbnailNavigator$,
                $Cols: 10,
                $SpacingX: 8,
                $SpacingY: 8,
                $Align: 360
              }
            };
            
            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
            
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 800);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            //responsive code end
        });
    </script>
	<style>
        
        /* jssor slider arrow navigator skin 05 css */
        /*
        .jssora05l                  (normal)
        .jssora05r                  (normal)
        .jssora05l:hover            (normal mouseover)
        .jssora05r:hover            (normal mouseover)
        .jssora05l.jssora05ldn      (mousedown)
        .jssora05r.jssora05rdn      (mousedown)
        */
        .jssora05l, .jssora05r {
            display: block;
            position: absolute;
            /* size of arrow element */
            width: 40px;
            height: 40px;
            cursor: pointer;
            background: url('img/a17.png') no-repeat;
            overflow: hidden;
        }
        .jssora05l { background-position: -10px -40px; }
        .jssora05r { background-position: -70px -40px; }
        .jssora05l:hover { background-position: -130px -40px; }
        .jssora05r:hover { background-position: -190px -40px; }
        .jssora05l.jssora05ldn { background-position: -250px -40px; }
        .jssora05r.jssora05rdn { background-position: -310px -40px; }

        /* jssor slider thumbnail navigator skin 01 css */
        /*
        .jssort01 .p            (normal)
        .jssort01 .p:hover      (normal mouseover)
        .jssort01 .p.pav        (active)
        .jssort01 .p.pdn        (mousedown)
        */
        .jssort01 .p {
            position: absolute;
            top: 0;
            left: 0;
            width: 72px;
            height: 72px;
        }
        
        .jssort01 .t {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }
        
        .jssort01 .w {
            position: absolute;
            top: 0px;
            left: 0px;
            width: 100%;
            height: 100%;
        }
        
        .jssort01 .c {
            position: absolute;
            top: 0px;
            left: 0px;
            width: 68px;
            height: 68px;
            border: #000 2px solid;
            box-sizing: content-box;
            background: url('img/t01.png') -800px -800px no-repeat;
            _background: none;
        }
        
        .jssort01 .pav .c {
            top: 2px;
            _top: 0px;
            left: 2px;
            _left: 0px;
            width: 68px;
            height: 68px;
            border: #000 0px solid;
            _border: #fff 2px solid;
            background-position: 50% 50%;
        }
        
        .jssort01 .p:hover .c {
            top: 0px;
            left: 0px;
            width: 70px;
            height: 70px;
            border: #fff 1px solid;
            background-position: 50% 50%;
        }
        
        .jssort01 .p.pdn .c {
            background-position: 50% 50%;
            width: 68px;
            height: 68px;
            border: #000 2px solid;
        }
        
        * html .jssort01 .c, * html .jssort01 .pdn .c, * html .jssort01 .pav .c {
            /* ie quirks mode adjust */
            width /**/: 72px;
            height /**/: 72px;
        }
        
    </style>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="wrapper">
      <!-- Main content -->
      <section class="content">
	  <ul class="col-md-4 timeline">
				<!-- timeline time label -->
				<li class="time-label">
					<span class="bg-yellow-active">
						Les members
					</span>
				</li>
				<!-- /.timeline-label -->

				<!-- timeline item -->
				<li>
					<!-- timeline icon -->
					<i class="fa fa-user bg-yellow-active"></i>
					<div class="timeline-item">
						
							<div>
								  <!-- small box -->
								  <div class="small-box bg-yellow">
									<div class="inner">
									<?php $count_users = $muser->Count_users();?>
									  <h3><?php echo $count_users ; ?></h3>

									  <p>Des members</p>
									</div>
									<div class="icon">
									  <i class="ion ion-person-add"></i>
									</div>
								  </div>
							</div>
								<!-- ./col -->
						
					</div>
				</li>
				<!-- END timeline item -->
				<!-- timeline time label -->
				<li class="time-label">
					<span class="bg-aqua-active">
						Les meuilleurs publication
					</span>
				</li>
				<!-- /.timeline-label -->

				<!-- timeline item -->
				<li>
					<div class="timeline-item">
						<?php $mpubs = $mp->afficher_les_meuilleurs_publication();
						
						     foreach($mpubs as $user){
						?>
						<!-- timeline time label -->
						<li class="time-label">
						<?php $rating = $mp->afficher_one_average_rating($user['ID_poste']);
						//var_dump($rating);
											  @$rating_number = (float)$rating['rating_number'];
											  @$total_points = (float)$rating['total_points'];
											  @$average = $total_points / $rating_number ;
											  //var_dump($average);
											?>
							<span style="font-size:10px" class="bg-aqua-active">								
							<input type="text" class="kv-uni-star rating-loading" value="<?php echo $average;?>" data-size="xs" title="">							
							</span>
						</li>
						<!-- /.timeline-label -->

						<!-- timeline item -->
						<li>
							<!-- timeline icon -->
							<i class="glyphicon glyphicon-globe bg-aqua-active"></i>
							<div class="timeline-item">
							<div class="box box-widget">
														<div class="box-header with-border">
														  <div class="user-block">
														  <input type="hidden" value="<?php echo $user['ID_poste'];?>"/>
														  <a href="details.php?id=<?php echo $user['ID_poste'];?>">
															<img class="img-circle"  src="avatar/<?php echo $user['img_user'];?>" alt="User Image">
															</a>
															<div style="padding:8px;border-radius:3px;float:right;" class="box-tools bg-blue">A partir de : 
																	<?php echo " ".$user['prix']." Dh";?></span>
																	</span>
															</div>
															<span class="username"><a href="#"><?php echo $user['nom']." ".$user['prenom']?></a></span>
															
															<span class="description"><?php echo $user['nom_ville']?><br/><?php echo $user['date_dajout'];?></span>
															<?php $total_points = (int)$user['total_points'];
															      $rating_number = (int)$user['rating_number'];
																  $average_rating = $total_points / $rating_number ;
															?>
														  </div>
														  <!-- /.box-tools -->
														<!-- /.box-header -->
														<center>
														<div  class="box-body">
														
														  
														 <div class="box-footer box-comments">
														  <?php $img_poster = $user['img_poster'];
														    $img_p = explode(",",$img_poster);
														  ?>
														  <a href="details.php?id=<?php echo $user['ID_poste']?>">
														  <img class="img-responsive pad" src="<?php echo $img_p[0];?>" alt="Photo"/>
													    </a>
																  <div class="box-comment">
																	<div style="position:relative;right:36px;" class="publi comment-text">
																	  <?php echo $user['publication'];?>
																	</div>
																	<!-- /.publication-text -->
																  </div>
																  <!-- /.box-publication -->
														</div>
														<!-- /.box-footer -->
														</div>
														</center>
														 <!-- /.box-footer -->
										</div>
							 <?php }?>
						
					</div>
					</div>
					</li>
				</li>
				<!-- END timeline item -->
			</ul>
	        <ul class="col-md-8 timeline">
				<!-- timeline item -->
				<li>
					<!-- timeline icon -->
					<i class="glyphicon glyphicon-hand-down bg-blue"></i>
					<div class="timeline-item">
							<div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 800px; height: 456px; overflow: hidden; visibility: hidden; background-color: #24262e;">
								<!-- Loading Screen -->
								<div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
									<div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
									<div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
								</div>
								<div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 800px; height: 356px; overflow: hidden;">
									<div data-p="144.50" style="display: none;">
										<img data-u="image" src="img2/slider1.jpg" />
								 
									</div>
									<div data-p="144.50" style="display: none;">
										<img data-u="image" src="img2/03.jpg" />
										<img data-u="thumb" src="img2/thumb-03.jpg" />
									</div>
									<div data-p="144.50" style="display: none;">
										<img data-u="image" src="img2/06.jpg" />
										<img data-u="thumb" src="img2/thumb-06.jpg" />
									</div>
									<div data-p="144.50" style="display: none;">
										<img data-u="image" src="img2/10.jpg" />
										<img data-u="thumb" src="img2/thumb-10.jpg" />
									</div>
									<a data-u="add" href="http://www.jssor.com/demos/image-gallery.slider" style="display:none">Image Gallery</a>
								
								</div>
								<!-- Thumbnail Navigator -->
								<div data-u="thumbnavigator" class="jssort01" style="position:absolute;left:0px;bottom:0px;width:800px;height:100px;" data-autocenter="1">
									<!-- Thumbnail Item Skin Begin -->
									<div data-u="slides" style="cursor: default;">
										<div data-u="prototype" class="p">
											<div class="w">
												<div data-u="thumbnailtemplate" class="t"></div>
											</div>
											<div class="c"></div>
										</div>
									</div>
									<!-- Thumbnail Item Skin End -->
								</div>
								<!-- Arrow Navigator -->
								<span data-u="arrowleft" class="jssora05l" style="top:158px;left:8px;width:40px;height:40px;"></span>
								<span data-u="arrowright" class="jssora05r" style="top:158px;right:8px;width:40px;height:40px;"></span>
						</div>
					  <!-- /.box -->
					</div>
				</li>
				<!-- END timeline item -->
				<!-- timeline time label -->
				<li class="time-label">
					<span class="bg-blue">
						Recherche
					</span>
				</li>
				<!-- /.timeline-label -->

				<!-- timeline item -->
				<li>
					<!-- timeline icon -->
					<i class="glyphicon glyphicon-search bg-blue"></i>
					<div class="timeline-item">
							<div style="position:relative;top:7px;" class="col-md-5" id="hoho">
								<form  method="POST" action="<?php $_SERVER['PHP_SELF']?>">
									<label style="color:#fff;">Pays</label>
												<select id="check_pays" name="check_pays" class="form-control select2" style="width: 100%;">
												<option value="<?php echo $affi_pays = "- choisis une pay -";?>">- choisis une pays -</option>
												<?php $afipay = $mpy->afficher_tous_pays();
															foreach($afipay as $afi){
															?>
												  <option value="<?php echo $afi['id_pays']?>"><?php echo $afi['nom_pays']?></option>
															<?php } ?>
												</select>
												<label style="color:#fff;">ville</label>
												<select name="check_ville" id="check_ville" class="form-control select2" style="width: 100%;">
												  <option value="">- choisis une ville -</option>
												</select>
												
							
							</div>
									<div class="col-md-6 col-md-push-1" style="margin-top:1%;background-color:#3c8dbc; padding:20px;border-radius:5px;">
										<input id="range_1" type="text" name="range_1" value="">
									</div>
									<div style="width:400px;position:relative;top:34px;" class="col-md-5 col-md-push-1">
									   <input style="border-radius:5px;margin-top:1%;" type="submit" value="Rechercher" class="btn btn-primary col-md-12" name="btn_search" />
									</div>
								</form>
					</div>
				</li>
				<!-- END timeline item -->
				 <!-- timeline time label -->
				<li class="time-label">
					<span class="bg-aqua-active">
						Publication
					</span>
				</li>
				<!-- /.timeline-label -->

				<!-- timeline item -->
				<li>
					<div class="timeline-item">
						<!-- La Recherche -->
						<?php 
							if(isset($_POST['btn_search']))
							{
								 $mocle = $_POST['check_ville'];
								 $range = $_POST['range_1'];
								 $arr = explode(";",$range); 
								 $minprix = (int)$arr[0];
								 $maxprix = (int)$arr[1];
								 /*var_dump($mocle);
								  var_dump($mp->Recherche_ville_prix($mocle,$maxprix,$minprix,1,5));*/
					    ?>
						<!-- timeline time label -->
								<?php  
								 $afficherPagination = $mp->Recherche_ville_prix($mocle,$maxprix,$minprix);
											foreach($afficherPagination as $user){
								?>
										<li class="time-label">
											<span class="bg-aqua-active">
											<?php $rating = $mp->afficher_one_average_rating($user['ID_poste']);
											  @$rating_number = (float)$rating['rating_number'];
											  @$total_points = (float)$rating['total_points'];
											  @$average = $total_points / $rating_number ;
											  //var_dump($average);
											?>
												<input type="text" class="kv-uni-star rating-loading" value="<?php echo $average;?>" data-size="xs" title="">
											</span>
										</li>
										<!-- /.timeline-label -->

										<!-- timeline item -->
										<li>
										<!-- timeline icon -->
										<i class="glyphicon glyphicon-globe bg-aqua-active"></i>
										<div class="timeline-item">
										<div class="box box-widget">
														<div class="box-header with-border">
														  <div class="user-block">
														  <input type="hidden" value="<?php echo $user['ID_poste'];?>"/>
														  
															<img class="img-circle"  src="avatar/<?php echo $user['img_user'];?>" alt="User Image">
															<div style="padding:8px;border-radius:3px;float:right;" class="box-tools bg-blue">A partir de :
																	<?php echo " ".$user['prix']." Dh";?></span></span>
															</div>
															
															<span class="username"><a href="#"><?php echo $user['nom']." ".$user['prenom']?></a></span>
															<span class="description"><?php echo $user['nom_ville']?><br/><?php echo $user['date_dajout'];?></span>
															<?php $total_points = (int)$user['total_points'];
															      $rating_number = (int)$user['rating_number'];
																  $average_rating = $total_points / $rating_number ;
															?>
														  </div>
														  <!-- /.box-tools -->
														</div>
														<!-- /.box-header -->
														<center>
														<div  class="box-body">
														 <div class="box-footer box-comments">
														  <?php $img_poster = $user['img_poster'];
														    $img_p = explode(",",$img_poster);
														  ?>
														  <a href="details.php?id=<?php echo $user['ID_poste']?>">
														  <img class="img-responsive pad" src="<?php echo $img_p[0];?>" alt="Photo"/>
													    </a>
																  <div class="box-comment">
																	<div style="position:relative;right:36px;"  class="publi comment-text">
																	  <?php echo $user['publication'];?>
																	</div>
																	<!-- /.publication-text -->
																  </div>
																  <!-- /.box-publication -->
														</div>
														<!-- /.box-footer -->
														</div>
														</center>
														 <!-- /.box-footer -->
										</div>
										</div>
						</li>
															<?php }?>
						
							<?php
							}else{ 
								//code pagination
								$annoncesParPage = 6 ; 
								$annoncesTotales = $mp->afficher_count_all1();
								$annoncesTotalespage = ceil($annoncesTotales/$annoncesParPage);
								//var_dump($annoncesTotales);
								if(isset($_GET['p']) AND !empty($_GET['p']) AND $_GET['p'] > 0 )
								{
									$_GET['p'] = intval($_GET['p']);
									$pageCourante = $_GET['p'];
									$depart = ($pageCourante-1)*$annoncesParPage;
									
							?>
											<?php  $afficherPagination = $mp->afficher_pagination_poste_index($depart,$annoncesParPage);
												foreach($afficherPagination as $user){?>
												<li class="time-label">
												<span class="bg-aqua-active">
														<?php $rating = $mp->afficher_one_average_rating($user['ID_poste']);
														  @$rating_number = (float)$rating['rating_number'];
														  @$total_points = (float)$rating['total_points'];
														  @$average = $total_points / $rating_number ;
														  //var_dump($average);
														?>
												<input type="text" class="kv-uni-star rating-loading" value="<?php echo $average;?>" data-size="xs" title="">
													</span>
												</li>
												<!-- /.timeline-label -->

												<!-- timeline item -->
												<li>
												<!-- timeline icon -->
												<i class="glyphicon glyphicon-globe bg-aqua-active"></i>
												
												<div class="timeline-item">
												
												<div class="box box-widget">
														<div class="box-header with-border">
														  <div class="user-block">
														  <input type="hidden" value="<?php echo $user['ID_poste'];?>"/>
														 
															<img class="img-circle"  src="avatar/<?php echo $user['img_user'];?>" alt="User Image">
															<div style="padding:8px;border-radius:3px;float:right;" class="box-tools bg-blue">A partir de :
																	<?php echo " ".$user['prix']." Dh";?></span></span>
															</div>
															<span class="username"><a href="#"><?php echo $user['nom']." ".$user['prenom']?></a></span>
															<span class="description"><?php echo $user['nom_ville']?><br/><?php echo $user['date_dajout'];?></span>
														  </div>
														  <!-- /.user-block -->
														  <!-- /.box-tools -->
														</div>
														<!-- /.box-header -->
														<center>
														<div  class="box-body"> 
														  <div class="box-footer box-comments">
														  <?php $img_poster = $user['img_poster'];
														    $img_p = explode(",",$img_poster);
														  ?>
														  <a href="details.php?id=<?php echo $user['ID_poste']?>">
														  <img class="img-responsive pad" src="<?php echo $img_p[0];?>" alt="Photo"/>
													    </a>
																  <div class="box-comment">
																	<div style="position:relative;right:36px;"  class="publi comment-text">
																	  <?php echo $user['publication'];?>
																	</div>
																	<!-- /.publication-text -->
																  </div>
																  <!-- /.box-publication -->
														</div>
														<!-- /.box-footer -->
														</div>
														</center>
														 <!-- /.box-footer -->
												</div>
												
												</div>
												
												</li>
															<?php }?>
							<?php }
									else
									{
										if($annoncesTotales >= 1)
										{
										$afficherPagination = $mp->afficher_pagination_poste_index(0,6);
																	foreach( $afficherPagination as $user){
							?>
												<li class="time-label">
												<span class="bg-aqua-active">
														<?php $rating = $mp->afficher_one_average_rating($user['ID_poste']);
														  @$rating_number = (float)$rating['rating_number'];
														  @$total_points = (float)$rating['total_points'];
														  @$average = $total_points / $rating_number ;
														  //var_dump($average);
														?>
												<input type="text" class="kv-uni-star rating-loading" value="<?php echo $average;?>" data-size="xs" title="">
													</span>
												</li>
												<!-- /.timeline-label -->

												<!-- timeline item -->
												<li>
												<!-- timeline icon -->
												<i class="glyphicon glyphicon-globe bg-aqua-active"></i>
												<div class="timeline-item">
												<div class="box box-widget">
														<div class="box-header with-border">
														  <div class="user-block">
														  <input type="hidden" value="<?php echo $user['ID_poste'];?>"/>
														  
															<img class="img-circle"  src="avatar/<?php echo $user['img_user'];?>" alt="User Image">
															<div style="padding:8px;border-radius:3px;float:right;" class="box-tools bg-blue">A partir de :
																	<?php echo " ".$user['prix']." Dh";?></span></span>
															</div>
															<span class="username"><a href="#"><?php echo $user['nom']." ".$user['prenom']?></a></span>
															<span class="description"><?php echo $user['nom_ville']?><br/><?php echo $user['date_dajout'];?></span>
														  </div>
														  <!-- /.user-block -->
														  <!-- /.box-tools -->
														</div>
														<!-- /.box-header -->
														<center>
														<div  class="box-body">
														  
														  <div class="box-footer box-comments">
														  <?php $img_poster = $user['img_poster'];
														    $img_p = explode(",",$img_poster);
														  ?>
														  <a href="details.php?id=<?php echo $user['ID_poste']?>">
														  <img class="img-responsive pad" src="<?php echo $img_p[0];?>" alt="Photo"/>
													    </a>
																  <div class="box-comment">
																	<div style="position:relative;right:36px;" class="publi comment-text">
																	  <?php echo $user['publication'];?>
																	</div>
																	<!-- /.publication-text -->
																  </div>
																  <!-- /.box-publication -->
																</div>
														</div>
														</center>
														 <!-- /.box-footer -->
												</div>
												</div>
												</li>
							<?php }}}}?>										

						<div class="col-md-5 col-md-push-4 timeline-footer">
							<div class="box-footer clearfix">
									  <ul class="pagination pagination-sm no-margin pull-right">
									  <?php 
									     $j = 1 ; ?>
										<li><a href="index.php?p=<?php echo $j++ ; ?>">&laquo; Précedent</a></li>
										<?php
										for($i = 1 ; $i <= @$annoncesTotalespage ; $i++){
											  if($i == @$pageCourante)
										{
											?>
											<li><a style="background-color:#3c8dbc;color:#fff"><?php echo $i; ?></a></li>
										<?php  					
										}
											  else{
												  if($i !=@pageCourante){
														?>
										<li><a href="index.php?p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
										<?php }}}?>
										<li><a href="index.php?p=<?php  echo $j-- ;?>">Suivant &raquo;</a></li>
									  </ul>
									</div>
						</div>
					</div>
				</li>
				<!-- END timeline item -->
			</ul>
      </section>
      <!-- /.content -->
    </div>
	<footer class="main-footer">
    <section id="mainFooter">
		<div class="container">
			<div class="row">
				<div class="col-sm-9">
					<div class="footerWidget">
						<img style="width:50px;"  src="avatar/logota.png" alt="latest Little Neko news" id="footerLogo">
						<p><a href="index.php" title="Little Neko, website template creation">Guestforyou</a> est un site en forme de réseau social conçu pour aboutir au besoins du logement dans différents pays il m’ait a disposition au client différent services qui facilite la recherche d'un logement qui convient le mieux au besoins du client .  </p>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="footerWidget">

						<h3 style="color:#3c8dbc">Guestforyou</h3>
						<address>
							<p> <i class="glyphicon glyphicon-map-marker"></i>77 Rue soltan abde el hamid. N., 29,Bourgogne<br>
								MA 02139-4307 MAROC  CASABLANCA<br>
								<i class="fa fa-phone"></i>&nbsp;06.14.44.68.92 <br>
								<i class="icon-mail-alt"></i>&nbsp;<a href="mailto:little@little-neko.com">Hamza_osse@hotmail.com</a> </p>
							</address>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section id="footerRights">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<p>Copyright © 2016 <a href="index.php" target="blank">Guestforyou</a> / All rights reserved.</p>
					</div>

				</div>
			</div>
		</section>
  </footer>
    <!-- /.container -->
  <!-- /.content-wrapper -->
 
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->

<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>

<script src="plugins/ionslider/ion.rangeSlider.min.js"></script>
<!-- Bootstrap slider -->
<script src="plugins/bootstrap-slider/bootstrap-slider.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script>
          $(document).ready(function(){
					$('#check_pays').change(function(){
						var code = $(this).val();
						var data = 'code='+code ;
						$.ajax({
							type : 'POST',
							url : 'villeIndex.php',
							data : data ,
							cache : false ,
							success : function(html)
							{
								$('#check_ville').html(html);
							}
						})
					});
				});
</script>

<script>
   $(function () {
    /* BOOTSTRAP SLIDER */
    $('.slider').slider();

    /* ION SLIDER */
    $("#range_1").ionRangeSlider({
      min: 0,
      max: 20000,
      from: 0,
      to: 20000,
      type: 'double',
      step: 1,
      prefix: "Dh ",
      prettify: false,
      hasGrid: true
    });
	 $('#slideSearch').fadeIn(1600);
   });
</script>
<script>
    $(document).on('ready', function () {
        $('.kv-uni-star').rating({
            theme: 'krajee-uni',
            filledStar: '&#x2605;',
            emptyStar: '&#x2606;'
        });
        $('.kv-uni-rook').rating({
            theme: 'krajee-uni',
            defaultCaption: '{rating} rooks',
            starCaptions: function (rating) {
                return rating == 1 ? 'One rook' : rating + ' rooks';
            },
            filledStar: '&#9820;',
            emptyStar: '&#9814;'
        });

        $('.rating,.kv-gly-star,.kv-gly-heart,.kv-uni-star,.kv-uni-rook,.kv-fa,.kv-fa-heart,.kv-svg,.kv-svg-heart').on(
                'change', function () {
                    console.log('Rating selected: ' + $(this).val());
                });
    });
</script>
</body>
</html>
