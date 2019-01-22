<?php
//require('../dao/beans/utilisateur.php');
//require('../dao/singleton/singletonconnexion.php');
require('../model/dao/manager/daomanagerutilisateur.php');
class MetierManagerUtilisateur
{
	private $dao ; 
	public function __construct()
	{
		$this->dao = new DaoManagerUtilisateur();
	}
	public function Ajouter_user($user)
	{
	    $this->dao->Ajouter_user($user);
	}
	public function Modifier_user($user)
	{
		$this->dao->Modifier_user($user);
	}
	public function Afficher_user($id)
	{
		return $this->dao->Afficher_user($id);
	}
	public function Afficher_tous()
	{
		return $this->dao->Afficher_tous();
	}
	public function Afficher_email_password($email,$password)
	{
		return $this->dao->Afficher_email_password($email,$password);
	}
	public function Supprimer_user($id)
	{
		$this->dao->Supprimer_user($id);
	}
	public function Supprimer_tous()
	{
		$this->dao->Supprimer_tous();
	}
	public function Afficher_tous_user($id)
	{
		return $this->dao->Afficher_tous_user($id);
	}
	public function Modifier_img_user($img,$id)
	{
		return $this->dao->Modifier_img_user($img,$id);
	}
	public function Modifier_adresse($adresse,$id)
	{
		return $this->dao->Modifier_adresse($adresse,$id);
	}
	public function Count_users()
	{
		return $this->dao->Count_users();
	}
}
//$Muser = new MetierManagerUser();
/*$user = new Utilisateur();
$user->setId(5);
$user->setNom('bouzekri');
$user->setPrenom('khra khra');
$user->setSexe('H');
$user->setAdresse('Rue soltan ade el hamide borgogne casablanca');
$user->setEmail('loubna@hotmail.com');
$user->setMdp('loubna');
$user->setImg_user('loubna.jpg');
$Muser->Modifier_user($user);*/
//var_dump($Muser->Afficher_tous());
//$Muser->Supprimer_tous();
?>