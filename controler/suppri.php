<?php 
require('../model/dao/singleton/singletonconnexion.php');
require('../model/metier/metiermanagerposter.php');
$id_poster = $_GET['id'];
$mp = new MetierManagerPoster();
$afficheruser = $mp->afficher_One_poste($id_poster);
if($id_poster == $afficheruser['ID_poste'])
{
	$mp->supprimer_poste($id_poster);
	echo "la suppression a etait fait";
	header('location:profil.php');
}
else
	echo "false";
?>