<?php
//require('../dao/beans/ville.php');
require('../model/dao/manager/daomanagerville.php');
//require('../dao/singleton/singletonconnexion.php');
class MetierManagerVille
{
	private $dao ; 
	
	public function __construct()
    {
		$this->dao = new DaoManagerVille();
	}	
	public function ajouter_ville($v)
	{
		$this->dao->ajouter_ville($v);
	}
	public function afficher_ville_par_pays($pays)
	{
		return $this->dao->afficher_ville_par_pays($pays);
	}
}
//$mv = new MetierManagerVille(); 
/*$v = new Ville();
$v->setId_pays(2);
$v->setNom_ville('9a9w9awe');
$mv->ajouter_ville($v);*/
//var_dump($mv->afficher_ville_par_pays());
//var_dump($mv->afficher_ville_par_pays(2));
?>