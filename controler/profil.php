<?php
require('../model/dao/beans/utilisateur.php');
require('../model/dao/beans/commenter.php');
require('../model/dao/beans/image.php');
require('../model/metier/metiermanagerutilisateur.php');
require('../model/dao/singleton/singletonconnexion.php');
require('../model/dao/beans/poster.php');
require('../model/metier/metiermanagerposter.php');
require('../model/dao/beans/ville.php');
require('../model/metier/metiermanagerville.php');
require('../model/dao/beans/pays.php');
require('../model/metier/metiermanagerpays.php');
require('../model/metier/metiermanagercommenter.php');
require('../model/metier/metiermanagerimage.php');
$user = new Utilisateur();
$p = new Poster();
$py = new Pays();
$v = new Ville();
$c = new Commenter();
$image = new Image();
$muser = new MetierManagerUtilisateur();
$mpy = new MetierManagerPays();
$mp = new MetierManagerPoster();
$mv = new MetierManagerVille();
$mc = new MetierManagerCommenter();
$mimage = new MetierManagerImage();
@session_start();
if($_SESSION['email'] && $_SESSION['password']){
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<title><?php echo "Publication | ".$_SESSION['nom']." ".$_SESSION['prenom'];?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"/>
   <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="css/star-rating.css" media="all" type="text/css"/>
    <link rel="stylesheet" href="themes/krajee-fa/theme.css" media="all" type="text/css"/>
    <link rel="stylesheet" href="themes/krajee-svg/theme.css" media="all" type="text/css"/>
    <link rel="stylesheet" href="themes/krajee-uni/theme.css" media="all" type="text/css"/>
	<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
    <script src="js/star-rating.js" type="text/javascript"></script>
    <script src="themes/krajee-fa/theme.js" type="text/javascript"></script>
    <script src="themes/krajee-svg/theme.js" type="text/javascript"></script>
    <script src="themes/krajee-uni/theme.js" type="text/javascript"></script>
	<script type="text/javascript" src="jquery.form.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		$('#images').on('change',function(){
			$('#multiple_upload_form').ajaxForm({
				target:'#images_preview',
				beforeSubmit:function(e){
					$('.uploading').show();
				},
				success:function(e){
					$('.uploading').hide();
				},
				error:function(e){
				}
			}).submit();
		});
	});
	</script>
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"/>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css"/>
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"/>
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css"/>
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css"/>
  <!-- bootstrap wysihtml5 - text editor -->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body  class="hold-transition  skin-blue sidebar-mini">
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
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- commenter: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-comments-o"></i>
              <?php 
			       $row_com = $mc->conter_les_commenters($_SESSION['id']);
			  ?>
              <span class="label label-success"><?php echo $row_com;?></span>
            </a>
            <ul class="dropdown-menu">
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
				<?php $afficher_commenter = $mc->afficher_les_commenters($_SESSION['id']);
				    foreach($afficher_commenter as $com){
				?>
                  <li><!-- start message -->
                    <a href="details.php?id=<?php echo $com['ID_poste'];?>">
                      <div class="pull-left">
                        <img src="avatar/<?php echo $com['img_user'];?>" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        <?php echo $com['nom']." ".$com['prenom'];
						   $commente = $com['date_dajout'];
							$comme = explode(",",$commente);
						?>
                        <small><i class="fa fa-clock-o"></i><?php echo $comme[2];?></small>
                      </h4>
                      <p style="white-space: nowrap;width: 100%;overflow: hidden;text-overflow: ellipsis;"><?php echo $com['context'];?></p>
                    </a>
                  </li>
					<?php }?>
                  <!-- end message -->
                </ul>
              </li>
              <!--<li class="footer"><a href="#">See All Messages</a></li>-->
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
                <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
			  <?php $afiCount = $mp->count_poste($_SESSION['id']);?>
              <span class="label label-warning"><?php echo $afiCount;?></span>
            </a>
            <ul class="dropdown-menu">
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
				<?php $notifications = $mp->afficher_tous_poste($_SESSION['id']);
				   foreach($notifications as $notification){
				?>
                  <li><!-- start message -->
                    <a href="details.php?id=<?php echo $notification['ID_poste'];?>">
                      <div class="pull-left">
                        <img src="avatar/<?php echo $notification['img_user'];?>" class="img-circle" alt="User Image">
                      </div>
                      <h4>
					  <?php $notif_img = $notification['img_poster'];
					        $img_n = explode(",",$notif_img);
					  ?>
                        <img width="150" src="<?php echo $img_n[0] ; ?>"/>
						<?php 
						    $not = $notification['date_dajout'];
							$notif = explode(",",$not);
						?>
                        <small><?php echo " ".$notif[2];?></small>
                      </h4>
                      <p style="white-space:nowrap;;width: 100%;overflow: hidden;text-overflow: ellipsis;"><?php echo $notification['publication'];?></p>
					  <p style="color:#000;font-size:11px;float:right;"><?php echo $notification['nom_ville'];?></p>
                    </a>
                  </li>
				   <?php }?>
                </ul>
              </li>
              <!--<li class="footer"><a href="#">See All Messages</a></li>-->
            </ul>
          </li>   
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
                  <a href="Monprofil.php" class="btn btn-default btn-flat">Profile</a>
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
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
		<?php $Afficher = $muser->Afficher_user($_SESSION['id']);?>
          <img src="avatar/<?php echo $Afficher['img_user'];?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $Afficher['nom']." ".$Afficher['prenom'];?></p>
        </div>
      </div>
       <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
		<li>
          <a href="index.php">
            <i class="glyphicon glyphicon-home"></i> <span>Acceuille</span>
          </a>
        </li>
		<li class="treeview">
          <a href="">
            <i class="glyphicon glyphicon-user"></i> <span>Gestion du profil</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="Monprofil.php"><i class="fa fa-user"></i>Profil</a></li>
            <!--<li><a href="chercherProfil.php"><i class="glyphicon glyphicon-search"></i>Rechecher des profils</a></li>-->
          </ul>
        </li>
		<!--<li>
          <a href="../mailbox/mailbox.html">
            <i class="fa fa-envelope"></i> <span>Chat</span>
            <small class="label pull-right bg-primary">12</small>
          </a>
        </li>-->
        <!--<li class="treeview">
          <a href="">
            <i class="glyphicon glyphicon-exclamation-sign"></i> <span>Problème</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="signalerProbleme.php"><i class="glyphicon glyphicon-remove-sign"></i>Signaler un problème</a></li>
            <li><a href="aider.php"><i class="glyphicon glyphicon-question-sign"></i>Aider</a></li>
          </ul>
        </li>-->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="row">
	     <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
			<?php $Afficher = $muser->Afficher_user($_SESSION['id']);?>
              <img class="profile-user-img img-responsive img-circle" src="avatar/<?php echo $Afficher['img_user'];?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $Afficher['nom']." ".$Afficher['prenom'];?></h3>

              <!--<p class="text-muted text-center">Les etoiles</p>-->

              <!--<ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                 <b class="glyphicon glyphicon-user">Amis</b><a class="pull-right">13,287</a>
                </li>
              </ul>-->

              <a href="Monprofil.php" class="btn btn-primary btn-block"><b>Profile</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- A propos Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">A propros</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Adresse</strong>

              <p class="text-muted">
                <?php echo $Afficher['adresse'];?>
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Géolocalisation</strong>


              <hr>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
	    <div class="col-md-9">
		<ul class="timeline">

				<!-- timeline time label -->
				<li class="time-label">
					<span class="bg-blue">
						Poster votre publication
					</span>
				</li>
				<!-- /.timeline-label -->

				<!-- timeline item -->
				<li>
					<!-- timeline icon -->
					<i class="glyphicon glyphicon-flag bg-blue"></i>
					<div class="timeline-item">
						<div class="timeline-body">	
						<form method="post" id="formChat" name="multiple_upload_form" id="multiple_upload_form" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'];?>" class="form-signin">
							<div class="box-body pad">
							    <input type="hidden" class="form-control" value="<?php echo $_SESSION['nom']." ".$_SESSION['prenom'];?>"  name="user" />
								<textarea class="textarea" name="contenu" placeholder="Exprimer vous" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
								<br/><br/>
								<center>
								<div>
								<input type="text" name="prix" placeholder="Entrez votre prix" class="form-control" style="width: 50%;" />
								<label>Pays</label>
									<select id="check_pays"  name="check_pays" class="form-control select2" style="width: 50%;">
									<option>- choisis une pays -</option>
									<?php $afipay = $mpy->afficher_tous_pays();
												foreach($afipay as $afi){
												?>
									  <option value="<?php echo $afi['id_pays']?>"><?php echo $afi['nom_pays']?></option>
												<?php } ?>
									</select>
									<label>ville</label>
									<select name="check_ville" id="check_ville" class="form-control select2" style="width: 50%;">
									  <option value="">- choisis une ville -</option>
									</select>
									<br/>
									<div id="locationField">
									  <input id="autocomplete" style="width: 50%;" name="adressepost"  placeholder="Enter your address"
											 onFocus="geolocate()" class="form-control" type="text"></input>
									</div>
									</div>
									</center>
									<br/>
									<div class="col-push-md-6">
								<button style="margin-left:2em;" name="Publier" type="submit" class="btn btn-primary">Publier</button>
								<input type="hidden" name="image_form_submit" value="1"/>
									<label>Choisir maximum 4 photos du publication</label>
									<input type="file" class="col-xs-3 btn btn-default" name="images[]" id="images" multiple >
							    </div>
							</div>  
						  </div>
						</form>
						</div>
				</li>
				<!-- END timeline item -->
				<?php
										if(isset($_POST['Publier']))
										{
											    $nom = $_POST['user'];
												$area = $_POST['contenu'];
												$prix = $_POST['prix'];
												$ville = $_POST['check_ville'];
												$adresse_post = $_POST['adressepost'];
												$date = date("F j, Y, g:i a");			
												if($_POST['image_form_submit'] == 1)
												{
													$images_arr = array();
													foreach($_FILES['images']['name'] as $key=>$val){
														$image_name = $_FILES['images']['name'][$key];
														$tmp_name 	= $_FILES['images']['tmp_name'][$key];
														$size 		= $_FILES['images']['size'][$key];
														$type 		= $_FILES['images']['type'][$key];
														$error 		= $_FILES['images']['error'][$key];
														
														############ Remove comments if you want to upload and stored images into the "uploads/" folder #############
														
														$target_dir = "uploads/";
														$target_file = $target_dir.$_FILES['images']['name'][$key];
														if(move_uploaded_file($_FILES['images']['tmp_name'][$key],$target_file)){
															$images_arr[] = $target_file;
														}
														
														//display images without stored
														@$extra_info = getimagesize($_FILES['images']['tmp_name'][$key]);
													}
													?>
														<!-- timeline item -->
														<li>
														  <i class="fa fa-camera bg-purple"></i>

														  <div class="timeline-item">
															<div class="timeline-body">
															<?php //Generate images view
															/*$userpost = $mp->afficher_poste_user($_SESSION['id']);
															var_dump($userpost);*/
															if(!empty($images_arr)){ $count=0;
																foreach($images_arr as $image_src){ $count++?>
															  <img src="<?php echo $image_src; ?>" width="209" class="margin" alt="">
															<?php
															  @$photo .= $image_src.",";
															  @$images = substr($photo, 0, -1);
															  //var_dump($photo);
															  //var_dump($photo);
															}}?>  
															</div>
														  </div>
														</li>
														<!-- END timeline item -->
														
											<?php
												}
											if($area)
											{
												$p->setId_ville($ville);
												$p->setId($_SESSION['id']);
												$p->setPublication($area);
												$p->setPrix($prix);
												$p->setDate_dajout($date);
												$p->setImg_poster($images);
												$p->setAdresse_post($adresse_post);
												$mp->ajouter_poste($p);
											}
										}
?>
			</ul>
		</div>
			<!-- /.col -->
				<div class="col-md-3 col-sm-6 col-xs-12">
				  <div class="info-box">
					<span class="info-box-icon bg-yellow"><i class="fa fa-star-o"></i></span>

					<div class="info-box-content">
					  <span class="info-box-text">Les votes</span>
					  <span class="info-box-number">93,139</span>
					</div>
					<!-- /.info-box-content -->
				  </div>
				  <!-- /.info-box -->
				</div>
				<!-- /.col -->
			<ul class="col-md-9 timeline">
				<li class="time-label">
				<span class="bg-aqua-active">
					Votre Publication
				</span>
				</li>
				<!-- /.timeline-label -->

				<!-- timeline item -->
				<li>
						<div class="timeline-item">
							<?php 
								//code pagination
								$annoncesParPage = 5 ; 
								$annoncesTotales = $mp->afficher_count_user($_SESSION['id']);
								$annoncesTotalespage = ceil($annoncesTotales/$annoncesParPage);
								//var_dump($annoncesTotales);
								if(isset($_GET['p']) AND !empty($_GET['p']) AND $_GET['p'] > 0 )
								{
									$_GET['p'] = intval($_GET['p']);
									$pageCourante = $_GET['p'];
									$depart = ($pageCourante-1)*$annoncesParPage;
									?>
									  <!-- Box Comment -->
									<?php  $afficherPagination = $mp->afficher_pagination_poste_user($_SESSION['id'],$depart,$annoncesParPage);
										foreach($afficherPagination as $user){?>
										<!-- timeline time label -->
									<li class="time-label">
									<?php $rating = $mp->afficher_one_average_rating($user['ID_poste']);
									      @$rating_number = (float)$rating['rating_number'];
										  @$total_points = (float)$rating['total_points'];
										  @$average = $total_points / $rating_number ;
										  //var_dump($average);
									?>
										<span class="bg-aqua-active">
											<input type="text" class="kv-uni-star rating-loading" value="<?php echo (float)$average;?>" data-size="xs" title="">
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
											<img class="img-circle" src="avatar/<?php echo $user['img_user'];?>" alt="User Image">
											<span class="username"><a href="#"><?php echo $user['nom']." ".$user['prenom']?></a></span>
											<span class="description"><?php echo $user['nom_ville']?> - <?php echo $user['date_dajout'];?></span>
										  </div>
										  <!-- /.user-block -->
										  <div style="padding:8px;border-radius:3px;float:right;" class="box-tools bg-blue">
													<?php echo $user['prix']." Dh";?></span></span>
											</div>
										  <!-- /.box-tools -->
										</div>
										<!-- /.box-header -->
										<center>
										<div class="box-body">
										<?php 
											$img_poster = $user['img_poster'];
											  $img = explode(",",$img_poster);
										  ?>
										  <a href="details.php?id=<?php echo $user['ID_poste'];?>"><img class="col-md-12 img-responsive pad" src="<?php echo $img[0];?>" alt="Photo"></a>

										<div class="box-footer box-comments">
														  <span style="float:left" class="glyphicon glyphicon-flag"></span>
																  <div class="box-comment">
																	<div style="position:relative;right:36px;" class="publi comment-text">
																	  <?php echo $user['publication'];?>
																	</div>
																	<!-- /.publication-text -->
																  </div>
																  <!-- /.box-publication -->
										</div>
										<hr/>				
										  <a style="float:left;" data-toggle="modal" data-target="#myModalmofif" href=""><i class="glyphicon glyphicon-pencil"></i> Modifier</a>
										  <a style="float:right;" href="suppri.php?id=<?php echo $user['ID_poste'];?>"><i class="glyphicon glyphicon-trash"></i> supprimer</a>
										</div>
										</center>
										 <!-- /.box-footer -->
									  </div>
									  </div>
									 </li>
									   <?php }?>
									  <!-- /.nav-tabs-custom -->
									<?php
								}
								else
								{
									if($annoncesTotales >= 1)
									{
										?>
									  <!-- Box Comment -->
									<?php  $afficherPagination = $mp->afficher_pagination_poste_user($_SESSION['id'],0,5);
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
												<img class="img-circle" src="avatar/<?php echo $user['img_user'];?>" alt="User Image">
												<span class="username"><a href="#"><?php echo $user['nom']." ".$user['prenom']?></a></span>
												<span class="description"><?php echo $user['nom_ville']?> - <?php echo $user['date_dajout']?></span>
											</div>
										  <!-- /.user-block -->
											<div style="padding:8px;border-radius:3px;float:right;" class="box-tools bg-blue">
													<?php echo $user['prix']." Dh";?></span></span>
											</div>
										  <!-- /.box-tools -->
										</div>
										<!-- /.box-header -->
										<center>
										<div class="box-body">
										<?php $img_poster = $user['img_poster'];
										  $img = explode(",",$img_poster);
										?>
												<a href="details.php?id=<?php echo $user['ID_poste'];?>"><img class="col-md-12 img-responsive pad" src="<?php echo $img[0]?>" alt="Photo"></a>

												<div class="box-footer box-comments">
														  <span style="float:left" class="glyphicon glyphicon-flag"></span>
																  <div class="box-comment">
																	<div style="position:relative;right:36px;" class="publi comment-text">
																	  <?php echo $user['publication'];?>
																	</div>
																	<!-- /.publication-text -->
																  </div>
																  <!-- /.box-publication -->
												</div>
												<hr/>
												<a style="float:left;" href="modifiercommenter.php"><i class="glyphicon glyphicon-pencil"></i> Modifier</a>
												<a style="float:right;" href="suppri.php?id=<?php echo $user['ID_poste'];?>"><i class="glyphicon glyphicon-trash"></i> supprimer</a>
										</div>
										</center>
										 <!-- /.box-footer -->
									  </div>
									  </div>
									</li>
									   <?php }?>
										<!-- /.modal-content -->
									  <!-- /.box -->
										<?php
									}
								}
							?>			
									<!-- /.col -->
						</div>
							<div class="timeline-footer">
								<div class="box-footer clearfix">
								  <ul class="pagination pagination-sm no-margin pull-right">
								  <?php $j = 1 ;?>
									<li><a href="profil.php?p=<?php echo $j++ ;?>">précedent</a></li>
									<?php for($i = 1 ; $i <= $annoncesTotalespage ; $i++){
										  if($i == @$pageCourante)
									{
										?>
										<li><a style="background-color:#3c8dbc;color:#fff"><?php echo $i; ?></a></li>
									<?php  					
									}
										  else{
											  if($i !=@pageCourante){
													?>
									<li><a href="profil.php?p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
									<?php }}}?>
									<?php $j >= $annoncesTotalespage;?>
									<li><a href="profil.php?p=<?php echo $j--;?>">suivant</a></li>
								  </ul>
								</div>
							</div>
				</li>	
				<!-- END timeline item -->
			</ul>
			</div>
			
      <!-- /.row -->
    </section>
	</div>
    <!-- /.content -->
</div>
<!-- jQuery 2.2.0 -->
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script>
			    $(document).ready(function(){
					$('#check_pays').change(function(){
						var code = $(this).val();
						var data = 'code='+code ;
						$.ajax({
							type : 'POST',
							url : 'ville.php',
							data : data ,
							cache : false ,
							success : function(html)
							{
								$('#check_ville').html(html);
							}
						})
					});
				});
				$(document).ready(function(){
					$('#check_pays1').change(function(){
						var code = $(this).val();
						var data = 'code='+code ;
						$.ajax({
							type : 'POST',
							url : 'ville.php',
							data : data ,
							cache : false ,
							success : function(html)
							{
								$('#check_ville1').html(html);
							}
						})
					});
				});
</script>
<script>
      // This example displays an address form, using the autocomplete feature
      // of the Google Places API to help users fill in the information.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      var placeSearch, autocomplete;
      var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
      };

      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
      }

      function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
          document.getElementById(component).value = '';
          document.getElementById(component).disabled = false;
        }

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
          var addressType = place.address_components[i].types[0];
          if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
          }
        }
      }

      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }
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

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDQwR8suRcDgDNVo2KvugyrPQfm5IfOpM8&libraries=places&callback=initAutocomplete"
        async defer></script>
</body>
</html>
<?php }else header('location:index.php');?>
