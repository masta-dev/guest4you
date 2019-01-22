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
	        <title><?php echo "pagination";?></title>
	  </head>
	  <body>
<?php 
//code pagination
$annoncesParPage = 5 ; 
$annoncesTotales = $mp->p_count();
$annoncesTotalespage = ceil($annoncesTotales/$annoncesParPage);
//var_dump($annoncesTotales);
if(isset($_GET['p']) AND !empty($_GET['p']) AND $_GET['p'] > 0 )
{
	$_GET['p'] = intval($_GET['p']);
	$pageCourante = $_GET['p'];
}
else
{
	$pageCourante = 1;
}
$depart = ($pageCourante-1)*$annoncesParPage;
$afficherPagination = $mp->afficher_pagination_poste($depart,$annoncesParPage);
foreach($afficherPagination as $pagination){
?>
<p><?php echo $pagination['nom']." ".$pagination['prenom'];?></p>
<img width="50" src="avatar/<?php echo $pagination['img_poster'];?>" alt="img" />
<p><?php echo $pagination['publication']?></p><hr/>
<?php }
?>
<center>
      <div>
	    <?php for($i = 1 ; $i<=$annoncesTotalespage ; $i++){
			if($i == $pageCourante)
			{ 
					echo '<span style="color:blue">'.$i.'</span>';
			}
			else{
		 ?>
				<a href="test.php?p=<?php echo $i?>"><?php echo $i;?></a>
		<?php }}?>
	  </div>
</center>
	  </body>
</html>