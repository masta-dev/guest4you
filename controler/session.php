<?php
require('../model/dao/singleton/singletonconnexion.php');
require('../model/metier/metiermanagerutilisateur.php');
$muser = new MetierManagerUtilisateur();
if(isset($_POST['Connexion'])){
{
   $email = $_POST['email'];
   $password = $_POST['password'];
}
if(isset($email,$password)){
$session = $muser->Afficher_email_password($email,$password);
if ($session) 
{
session_start ();
$_SESSION['id'] = $session['id'];
$_SESSION['nom'] = $session['nom'];
$_SESSION['prenom'] = $session['prenom'];
$_SESSION['sexe'] = $session['sexe'];
//$_SESSION['ville'] = $session['nom_ville'];
//$_SESSION['date_naissance'] = $session['date_naissance'];
$_SESSION['adresse'] = $session['adresse'];
$_SESSION['email'] = $email;
$_SESSION['password'] = $password; 
//$_SESSION['type'] = $session['type'];
//$_SESSION['tel'] = $session['tel'];
header('location:profil.php?p=1');
}
else{
header('location:index.php');
}
}else "erreur les champs";
}
if(isset($_POST['deconnexion']))
{
	session_start ();
	if(session_unset()) echo "true";else echo "false";
	if(session_destroy()) echo " true";else echo "false";
	header('location:index.php');
}
?>
</body>
</html>