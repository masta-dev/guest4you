<nav style="border-bottom:1px solid #2980b9;" class="navbar navbar-fixed-top navbar-default">
				<div class="container-fluid">
				  <div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					  <span class="sr-only">Toggle navigation</span>
					  <span class="icon-bar"></span>
					  <span class="icon-bar"></span>
					  <span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" style="color:#0000ff;font-style:italic;transition:2s" href="index.php">GUEST4YOU</a>
					<!--<div class="container">
					<div class="row">
					<div class="col-xs-5">
					<li style="margin-top:7px;"><input type="text" id="recherche" class="form-control" placeholder="Recherche .."  autofocus></li>
					<div style="padding-right:5px;">
					<li style="position:absolute;top:7px;right:-35px;"><button style="padding:9px;" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button></li>
					</div>
					</div>
					 </div>
					 </div>-->
				  </div>
				  <div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
					   <li><a data-toggle="modal" data-target="#myModal1"><span class="glyphicon glyphicon-pencil"></span><?php echo " ";?>Modifier Profil</a></li>
					<?php if($_SESSION['email'] == 'hamza_osse@hotmail.com' || $_SESSION['email'] == 'mamoun@gmail.com'){?>
					<li><a href="Admin.php"><span class="glyphicon glyphicon-user"></span><?php echo " ";?>Administration</a></li>
					<?php }?>
					<li role="presentation"><a href="#"><span class="
                   glyphicon glyphicon-envelope"></span><?php echo " ";?>Messages<?php echo " ";?><span class="badge">3</span></a></li>
					<li><a href="amis.php"><span class="glyphicon glyphicon-list"></span><?php echo " ";?>La list des Amis</a></li>
					   <li><a href="voter.php"><span class="glyphicon glyphicon-star-empty"></span><?php echo " ";?>Vote</a></li>
					   <li><a onclick="getAJAX('notifipost.php')"><span class="glyphicon glyphicon-eye-open"><span><?php echo " ";?>Notification</a></li>
					   <li><a href="listhebergeur.php"><span class="glyphicon glyphicon-search"></span><?php echo " ";?>Chercher Hebergeur Et des Heberger</a></li>
					  <li><a data-toggle="modal" data-target="#myModal"><span class="
                   glyphicon glyphicon-off"></span><?php echo " ";?>Deconnexion</a></li>
					</ul>
				  </div><!--/.nav-collapse -->
				</div><!--/.container-fluid -->
			  </nav>