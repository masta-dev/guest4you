<?php
//require('../dao/beans/commenter.php');
//require('../dao/singleton/singletonconnexion.php');
require('../model/dao/manager/daomanagercommenter.php');
class MetierManagerCommenter
{
	private $dao ; 
	public function __construct()
	{
		$this->dao = new DaoManagerCommenter();
	}
	public function ajouter_commenter($c)
	{
	    $this->dao->ajouter_commenter($c);
	}
	public function afficher_tous_Commenter($id)
	{
		return $this->dao->afficher_tous_Commenter($id);
	}
	public function afficher_les_commenters($id)
	{
		return $this->dao->afficher_les_commenters($id);
	}
	public function conter_les_commenters($id)
	{
		return $this->dao->conter_les_commenters($id);
	}
}