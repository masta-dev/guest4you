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
require('../model/dao/beans/commenter.php');
require('../model/metier/metiermanagercommenter.php');
$user = new Utilisateur();
$p = new Poster();
$py = new Pays();
$v = new Ville();
$c = new Commenter();
$muser = new MetierManagerUtilisateur();
$mpy = new MetierManagerPays();
$mp = new MetierManagerPoster();
$mv = new MetierManagerVille();
$mc = new MetierManagerCommenter();
?>
<?php
   @$id = $_GET['id']; 
   if($id !== null){ 
?>
<?php
include_once 'dbConfig.php';
//Fetch rating deatails from database
$query = "SELECT post_id,status,total_points,rating_number, FORMAT((total_points / rating_number),1) as average_rating FROM post_rating WHERE post_id = ".$id." AND status = 1";
$result = $db->query($query);
$ratingRow = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
    
<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Guest4you</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/star-rating.css" media="all" type="text/css"/>
    <link rel="stylesheet" href="themes/krajee-fa/theme.css" media="all" type="text/css"/>
    <link rel="stylesheet" href="themes/krajee-svg/theme.css" media="all" type="text/css"/>
    <link rel="stylesheet" href="themes/krajee-uni/theme.css" media="all" type="text/css"/>
	<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
    <script src="js/star-rating.js" type="text/javascript"></script>
    <script src="themes/krajee-fa/theme.js" type="text/javascript"></script>
    <script src="themes/krajee-svg/theme.js" type="text/javascript"></script>
    <script src="themes/krajee-uni/theme.js" type="text/javascript"></script>
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
<link href="rating.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="rating.js"></script>
<!-- plugin du popup ajax jQuery -->
    <!-- Add jQuery library -->

	<!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="lib/jquery.mousewheel-3.0.6.pack.js"></script>

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="source/jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css?v=2.1.5" media="screen" />

	<!-- Add Button helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
	<script type="text/javascript" src="source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>

	<!-- Add Thumbnail helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
	<script type="text/javascript" src="source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

	<!-- Add Media helper (this is optional) -->
	<script type="text/javascript" src="source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
<!-- /plugin du popup ajax jQuery -->
<!-- start rating -->
<script language="javascript" type="text/javascript">
$(function() {
    $("#rating_star").codexworld_rating_widget({
        starLength: '5',
        initialValue: '',
        callbackFunctionName: 'processRating',
        imageDirectory: 'image/',
        inputAttr: 'postID'
    });
});

function processRating(val, attrVal){
    $.ajax({
        type: 'POST',
        url: 'rating.php',
        data: 'postID='+attrVal+'&ratingPoints='+val,
        dataType: 'json',
        success : function(data) {
            if (data.status == 'ok') {
                $('#avgrat').text(data.average_rating);
                $('#totalrat').text(data.rating_number);
            }else{
                alert("Un problème est survenu, s'il vous plaît essayer à nouveau.");
            }
        }
    });
}
</script>
<!-- Fin start rating-->
<!-- debut Popup ajax jQuery-->

	<script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			$('.fancybox').fancybox();

			/*
			 *  Different effects
			 */

			// Change title type, overlay closing speed
			$(".fancybox-effects-a").fancybox({
				helpers: {
					title : {
						type : 'outside'
					},
					overlay : {
						speedOut : 0
					}
				}
			});

			// Disable opening and closing animations, change title type
			$(".fancybox-effects-b").fancybox({
				openEffect  : 'none',
				closeEffect	: 'none',

				helpers : {
					title : {
						type : 'over'
					}
				}
			});

			// Set custom style, close if clicked, change title type and overlay color
			$(".fancybox-effects-c").fancybox({
				wrapCSS    : 'fancybox-custom',
				closeClick : true,

				openEffect : 'none',

				helpers : {
					title : {
						type : 'inside'
					},
					overlay : {
						css : {
							'background' : 'rgba(238,238,238,0.85)'
						}
					}
				}
			});

			// Remove padding, set opening and closing animations, close if clicked and disable overlay
			$(".fancybox-effects-d").fancybox({
				padding: 0,

				openEffect : 'elastic',
				openSpeed  : 150,

				closeEffect : 'elastic',
				closeSpeed  : 150,

				closeClick : true,

				helpers : {
					overlay : null
				}
			});

			/*
			 *  Button helper. Disable animations, hide close button, change title type and content
			 */

			$('.fancybox-buttons').fancybox({
				openEffect  : 'none',
				closeEffect : 'none',

				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,

				helpers : {
					title : {
						type : 'inside'
					},
					buttons	: {}
				},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
			});


			/*
			 *  Thumbnail helper. Disable animations, hide close button, arrows and slide to next gallery item if clicked
			 */

			$('.fancybox-thumbs').fancybox({
				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,
				arrows    : false,
				nextClick : true,

				helpers : {
					thumbs : {
						width  : 50,
						height : 50
					}
				}
			});

			/*
			 *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
			*/
			$('.fancybox-media')
				.attr('rel', 'media-gallery')
				.fancybox({
					openEffect : 'none',
					closeEffect : 'none',
					prevEffect : 'none',
					nextEffect : 'none',

					arrows : false,
					helpers : {
						media : {},
						buttons : {}
					}
				});

			/*
			 *  Open manually
			 */

			$("#fancybox-manual-a").click(function() {
				$.fancybox.open('1_b.jpg');
			});

			$("#fancybox-manual-b").click(function() {
				$.fancybox.open({
					href : 'iframe.html',
					type : 'iframe',
					padding : 5
				});
			});

			$("#fancybox-manual-c").click(function() {
				$.fancybox.open([
					{
						href : '1_b.jpg',
						title : 'My title'
					}, {
						href : '2_b.jpg',
						title : '2nd title'
					}, {
						href : '3_b.jpg'
					}
				], {
					helpers : {
						thumbs : {
							width: 75,
							height: 50
						}
					}
				});
			});


		});
	</script>
<!-- /Fin Popup ajax jQuery-->
<style type="text/css">
    .overall-rating{font-size: 14px;margin-top: 5px;color: #8e8d8d;}
</style>
</head>
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
            <li class="active"><a class="glyphicon glyphicon-home" href="index.php"> Acceuille <span class="sr-only">(current)</span></a></li>
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
					
  </div>
  <?php $afficher_One_poste = $mp->afficher_One_poste($id);
  ///var_dump($afficher_One_poste);
  ?>
  
  <div style="margin-top:20px;" class="col-md-7">
  <ul class="timeline">
   <!-- timeline item -->
            <li>
              <i class="fa fa-user bg-aqua"></i>
                   
              <div class="timeline-item">
                 <div>
          <!-- Widget: user widget style 1 -->
		  <?php $p_user = $mp->afficher_poste_poste($id);?>
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
                <iframe width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.it/maps?q=<?php if(empty($p_user['adresse'])){echo "casablanca";}else{echo $p_user['adresse'] ;} ?>&output=embed"></iframe>   				
            <div style="float:right" class="widget-user-image">
              <img class="img-circle" src="avatar/<?php echo $p_user['img_user'];?>" alt="User Avatar">
            </div>
            <div class="box-footer bg-aqua">
			<div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><i class="glyphicon glyphicon-user"></i><?php echo " ".$p_user['nom']." ".$p_user['prenom'];?></h5>
                    <span class="description-text"><?php echo $p_user['nom_ville'];?></span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">Adresse</h5>
                    <span class="description-text"><i class="glyphicon glyphicon-map-marker"><?php echo " ".$p_user['adresse'];?></i></span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header">Prix</h5>
                    <span class="description-text"><?php echo $p_user['prix']." Dh";?></span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
        <!-- /.col -->
              </div>
            </li>
            <!-- END timeline item -->
    <!-- timeline item -->
    <li>
	<i class="fa fa-camera bg-purple"></i>
        <div class="timeline-item">
            <div class="timeline-body">
                <div class="embed-responsive embed-responsive-16by9">
					<p>
					   <?php $img_poster = $afficher_One_poste['img_poster'];
					        $img = explode(",",$img_poster);
							//var_dump(count($img));
							for($i = 0 ; $i < count($img) ; $i++){
								//var_dump($img[1]);
					   ?>
						<a class="fancybox-thumbs" data-fancybox-group="thumb" href="<?php echo $img[$i]?>"><img src="<?php echo $img[$i];?>" alt="" /></a>
							<?php }?>
					</p>
                  </div>
            </div>
        </div>
    </li>
    <!-- END timeline item -->
			<li>
			<i class="fa fa-comments bg-aqua"></i>
			   <div class="timeline-item">
			<div class="box-footer box-comments">
			<?php $afficher_commenters = $mc->afficher_tous_Commenter($id);
			   foreach($afficher_commenters as $commenter){
			?> 
              <div class="box-comment">
                <!-- User image -->
                <img class="img-circle img-sm" src="avatar/<?php echo $commenter['img_user']?>" alt="User Image">

                <div class="comment-text">
                      <span class="username">
                        <?php echo $commenter['nom']." ".$commenter['prenom'];?>
                        <span class="text-muted pull-right"><?php echo $commenter['date_commente'];?></span>
                      </span><!-- /.username -->
                  <?php echo $commenter['context'];?>
                </div>
                <!-- /.comment-text -->
              </div>
              <!-- /.box-comment -->
			  <?php }?>
            </div>
            <!-- /.box-footer -->
            <div class="box-footer">
			<?php $afuser = $muser->Afficher_user(@$_SESSION['id']); ?>
              <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
			  <?php if(@$_SESSION['id'] != null){?>
                <img class="img-responsive img-circle img-sm" src="avatar/<?php echo $afuser['img_user']?>" alt="Alt Text">
			  <?php }?>
                <!-- .img-push is used to add margin to elements next to floating images -->
                <div class="img-push">
                  <input required name="context" <?php if(@$_SESSION['id'] == null){?>disabled<?php }?> type="text" class="form-control input-sm" placeholder="Postez votre commentaire...">
                </div>
              </form>
            </div>
            <!-- /.box-footer -->
            
          </div>
		  
          <!-- /.box (chat box) -->
			</li>
			<?php 
			
			   $poste_user = $mp->afficher_poste_poste($id);
		     if(isset($_POST['context']))
			 {
			       $date = date("F j, Y, g:i a");
				   $arr = explode(",",$date);
				   $id_user = $_SESSION['id'];
				   $context = $_POST['context'];
				   $c->setContext($context);
				   $c->setId_user($id_user);
				   $c->setId_poste($id);
				   $c->setId_user_com($poste_user['id']);
				   $c->setDate_commenter($date);
				   $mc->ajouter_commenter($c);
			 }
		  ?>
		   <!-- timeline item -->
	    <?php 
		     if(@$_SESSION['id'] == null)
			 {
				?>
						<!-- timeline item -->
						<li>
							<!-- timeline icon -->
							<i class="icon fa fa-warning bg-yellow"></i>
							<div class="timeline-item">
								<div class="timeline-body">
									<div class="alert alert-warning alert-dismissible">
									<h4><i class="icon fa fa-warning"></i> Alert !</h4>
									Pour poster un commentaire il faut obligatoirement authentifier.
								  </div>
								</div>
							</div>
						</li>
					<!-- END timeline item -->
                <?php				
			 }
		?>
    <!-- END timeline item -->
</ul>
</div>
<div style="margin-top:20px;" class="col-md-5">
   <ul class="timeline">

    <!-- timeline time label -->
    <li class="time-label">
        <span class="bg-red">
            <?php  $date = $afficher_One_poste['date_dajout'];
			$r_dat = explode(",",$date);
			echo $r_dat[0]." / ".$r_dat[1];
			?>
        </span>
    </li>
    <!-- /.timeline-label -->

    <!-- timeline item -->
    <li>
        <!-- timeline icon -->
        <i class="glyphicon glyphicon-paperclip bg-blue"></i>
        <div class="timeline-item">
            <span class="time"><i class="fa fa-clock-o"></i> <?php echo $r_dat[2];?></span>
            <div class="timeline-body">
                <?php echo $afficher_One_poste['publication'];?>
            </div>

            <div style="float:right;" class="timeline-footer">
              <a class="btn btn-primary btn-xs" href="#bottom"><?php echo "A partir de : ".$afficher_One_poste['prix']." Dh";?></a>
            </div>
        </div>
    </li>
    <!-- END timeline item -->

  <!-- timeline item -->
    <li>
        <!-- timeline icon -->
        <i class="glyphicon glyphicon-star-empty bg-yellow"></i>
        <div class="timeline-item">
            <span class="time"><i class="fa fa-clock-o"></i> <?php echo $r_dat[2];?></span>
            <div class="timeline-body">
                <input style="margin-top:500px;" name="rating" value="<?php echo (float)$average;?>" id="rating_star" type="hidden" postID="<?php echo $id; ?>" />
            </div>    
            <div class="bg-yellow timeline-footer">
			    
                <div class="overall-rating">
				<span style="float:right;" id="totalrat"><i style="padding:5px;border-radius:5px;" class="glyphicon glyphicon-star-empty bg-yellow"><?php echo " ".$ratingRow['rating_number']; ?></span></i>
				<input type="text" class="kv-uni-star rating-loading" value="<?php echo (float)$average;?>" data-size="xs" title="">
				</div>
            </div>
        </div>
    </li>
    <!-- END timeline item -->
    <!-- timeline item -->
    <li>
        <!-- timeline icon -->
        <i class="glyphicon glyphicon-map-marker bg-green"></i>
        <div style="padding-bottom:10%;" class="timeline-item">   
            <div class="timeline-body">
			    <div class="embed-responsive embed-responsive-16by9">
                <iframe  style="border-radius:5px;border-top:5px solid #3c8dbc;border-bottom:5px solid #3c8dbc;" width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.it/maps?q=<?php if(empty($afficher_One_poste['adresse_post'])){echo "casablanca";}else{echo $afficher_One_poste['adresse_post'] ;} ?>&output=embed"></iframe>
				</div>
            </div>

            <div class="timeline-footer">
			    <div>
				<span style="float:right;" id="totalrat"><i style="padding:5px;border-radius:5px;" class="glyphicon glyphicon-map-marker bg-green"><?php echo " ".$afficher_One_poste['adresse_post']; ?></span></i></span></div>
            </div>
            </div>
        </div>
    </li>
    <!-- END timeline item -->
</ul>
                  
</div>
<div class="col-md-5">
    <!--<h1>CodexWorld - Programming blog</h1>-->
    
    <!--<div class="overall-rating">(Average Rating <span id="avgrat"><?php echo $ratingRow['average_rating']; ?></span>
Based on <span id="totalrat"><?php echo $ratingRow['rating_number']; ?></span>  rating)</span></div>
    <p>Learn PHP, MySQL, JavaScript, jQuery, Ajax, WordPress, Drupal, CodeIgniter, CakePHP, Web Development with CodexWorld tutorials.</p>
	</div>-->
	 <!-- Chat box -->
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
</body>
</html>
   <?php }else require("404.php");?>