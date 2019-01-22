<?php
require('../model/dao/beans/utilisateur.php');
require('../model/dao/beans/commenter.php');
require('../model/metier/metiermanagerutilisateur.php');
require('../model/dao/singleton/singletonconnexion.php');
require('../model/dao/beans/poster.php');
require('../model/metier/metiermanagerposter.php');
require('../model/dao/beans/ville.php');
require('../model/metier/metiermanagerville.php');
require('../model/dao/beans/pays.php');
require('../model/metier/metiermanagerpays.php');
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
session_start();
if($_SESSION['email'] && $_SESSION['password']){
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php echo "Profile | ".$_SESSION['nom']." ".$_SESSION['prenom'];?></title>
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
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">
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
          <!-- Messages: style can be found in dropdown.less-->
         
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
              <li class="header">Vous avez <?php echo $row_com;?> commentaires</li>
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
          <a href="#">
            <i class="glyphicon glyphicon-user"></i> <span>Gestion du profil</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="Monprofil.php"><i class="fa fa-user"></i>Profil</a></li>
            <!--<li><a href="#"><i class="glyphicon glyphicon-search"></i>Rechecher des profils</a></li>-->
          </ul>
        </li>
		<li>
          <a href="profil.php">
            <i class="glyphicon glyphicon-globe"></i> <span>Poster une publication</span>
          </a>
        </li>
		<!--<li>
          <a href="../mailbox/mailbox.html">
            <i class="fa fa-envelope"></i> <span>Chat</span>
            <small class="label pull-right bg-primary">12</small>
          </a>
        </li>-->
        <!--<li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-exclamation-sign"></i> <span>Problème</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="glyphicon glyphicon-remove-sign"></i>Signaler un problème</a></li>
            <li><a href="#"><i class="glyphicon glyphicon-question-sign"></i>Aider</a></li>
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

              <!--<p class="text-muted text-center">Les etoiles</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                 
                </li>
              </ul>-->
			  <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
              <input type="file" name="img" class="btn btn-primary btn-block"/>
			  <button type="submit" name="photop" class="btn btn-primary btn-block">Changer la photo</button>
			  </form>
			  <?php 
							if(isset($_POST['photop']))
									{		
										$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
										$ext = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
										if (in_array($ext,$extensions_valides)){
											
											$tmp_file = $_FILES['img']['tmp_name'];
											$unikifier = md5( uniqid('H', 5) );
											$file_name = $unikifier.'.'.$ext;
											$destination_rep='avatar/';
											$photo=$file_name;
											move_uploaded_file($tmp_file, $destination_rep.$file_name);
											$muser->Modifier_img_user($photo,$_SESSION['id']);
										}
									}
				?>
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
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
			 <div class="col-md-9">
                 <ul class="timeline">

				<!-- timeline time label -->
				<li class="time-label">
					<span class="bg-aqua-active">
						Modification du profil
					</span>
				</li>
				<!-- /.timeline-label -->

				<!-- timeline item -->
				<li>
					<!-- timeline icon -->
					<i class="glyphicon glyphicon-pencil bg-aqua-active"></i>
					<div class="timeline-item">
							 
						<div class="timeline-body">
							 <div class="nav-tabs-custom">
										<ul class="nav nav-tabs">
										  <li class="active">
										  <a href="#settings" data-toggle="tab" class="btn btn-app"><i class="fa fa-edit"></i> Modification du profil</a>
										  </li>
										  <li>
										  <a href="#settingsadresse" data-toggle="tab" class="btn btn-app"><i class="fa fa-edit"></i> Entrez votre abdresse</a>
										  </li>
										</ul>
										<div class="tab-content">
										  <!-- /.tab-pane -->
										  
										  <!-- /.tab-pane -->

										  <div class="tab-pane active" id="settings">
											<form method="POST" action="<?php $_SERVER['PHP_SELF'];?>" class="form-horizontal">
											<?php $afficher = $muser->Afficher_user($_SESSION['id'])?>
											<input type="hidden" name="id" value="<?php echo $afficher['id'];?>" class="form-control" id="inputName" placeholder="Nom">
											  <div class="form-group">
												<label for="inputName" class="col-sm-2 control-label">Nom</label>

												<div class="col-sm-10">
												  <input type="text" name="nom" value="<?php echo $afficher['nom'];?>" class="form-control" id="inputName" placeholder="Nom">
												</div>
											  </div>
											  <div class="form-group">
												<label for="inputName" class="col-sm-2 control-label">Prenom</label>

												<div class="col-sm-10">
												  <input type="text" name="prenom" value="<?php echo $afficher['prenom'];?>" class="form-control" id="inputName" placeholder="Prenom">
												</div>
											  </div>
											  <div class="form-group">
												<label for="inputEmail" class="col-sm-2 control-label">Email</label>

												<div class="col-sm-10">
												  <input type="email" value="<?php echo $afficher['email'];?>" name="email" class="form-control" id="inputEmail" placeholder="Email">
												</div>
											  </div>
											  <div class="form-group">
												<label for="inputName" class="col-sm-2 control-label">Mote de passe</label>

												<div class="col-sm-10">
												  <input type="text" value="<?php echo $afficher['mdp'];?>" name="passe" class="form-control" id="inputName" placeholder="Mote de passe">
												</div>
											  </div>
											  <div class="form-group">
												<div class="col-sm-offset-2 col-sm-10">
												  <button type="submit" name="modifier" class="glyphicon glyphicon-pencil btn btn-info"> Modifier</button>
												</div>
											  </div>
											</form>
											<?php 
												if(isset($_POST['modifier']))
												{
													$id = $_POST['id'];
													$nom = $_POST['nom'];
													$prenom = $_POST['prenom'];
													$email = $_POST['email'];
													$passe = $_POST['passe'];
													$user->setId($id);
													$user->setNom($nom);
													$user->setPrenom($prenom);  
													$user->setEmail($email);
													$user->setMdp($passe);
													$muser->Modifier_user($user);
												}
											?>
										  </div>
										  <div class="tab-pane" id="settingsadresse">
											<form method="POST" action="<?php $_SERVER['PHP_SELF'];?>" class="form-horizontal">
												<div id="locationField">
												  <textarea id="autocomplete" name="adresse" class="form-control" placeholder="Entrez Votre addresse..."
														 onFocus="geolocate()" type="text"></textarea>
														 <br/>
														 <input type="submit" class="btn btn-info" value="Validez" name="m_valider"/>
												</div>
											</form>
											<?php
												 if(isset($_POST['m_valider']))
												 {
													 $adresse = $_POST['adresse'];
													 $muser->Modifier_adresse($adresse,$_SESSION['id']);
												 }
											?>
										  </div>
										  <!-- /.tab-pane -->
										</div>
										<!-- /.tab-content -->
									  </div>
									  <!-- /.nav-tabs-custom -->
						</div>
					</div>
				</li>
				<!-- END timeline item -->
				<!-- timeline time label -->
				<li class="time-label">
					<span class="bg-green">
						Géolocalisation
					</span>
				</li>
				<!-- /.timeline-label -->

				<!-- timeline item -->
				<li>
					<!-- timeline icon -->
					<i class="glyphicon glyphicon-map-marker bg-green"></i>
					<div class="timeline-item">

						<div class="timeline-body">
							<?php 
							  $Affichers = $muser->Afficher_user($_SESSION['id']);
							  ?>
								 <iframe class="hidden-xs" width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.it/maps?q=<?php if(empty($Affichers['adresse'])){echo "casablanca";}else{echo $Affichers['adresse'] ;} ?>&output=embed"></iframe>
						</div>
					</div>
				</li>
			</ul>
			</div>
		
             <!-- /.box-footer -->
          </div>
            <!-- /.modal-content -->
       			
			
          </div>
          <!-- /.modal-dialog -->
		  <!-- /.box -->
		  
		  <div>
			  		
           </div>			 
      <!-- /.row -->
        </div>
          
    </section>
    <!-- /.content -->
  </div>
</div>
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDQwR8suRcDgDNVo2KvugyrPQfm5IfOpM8&libraries=places&callback=initAutocomplete"
        async defer></script>
<!-- jQuery 2.2.0 -->
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
<?php }else header('location:index.php');?>
