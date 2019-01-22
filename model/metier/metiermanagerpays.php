<?php
//require('../dao/beans/pays.php');
require('../model/dao/manager/daomanagerpays.php');
//require('../dao/singleton/singletonconnexion.php');
class MetierManagerPays
{
	private $dao;
	public function __construct()
	{
		$this->dao = new DaoManagerPays();
	}
	public function ajouter_pays($py)
	{
		$this->dao->ajouter_pays($py);
	}
	public function afficher_tous_pays()
	{
		return $this->dao->afficher_tous_pays();
	}
	public function afficher_pays($id_pays)
	{
		return $this->dao->afficher_pays($id_pays);
	}
}
//$mp = new MetierManagerPays();
//var_dump($mp->afficher_tous_pays());
//var_dump($mp->afficher_pays(3));
//$py = new Pays();
//$py->setNom_pays('kongo');
//$mp->ajouter_pays($py);
?>