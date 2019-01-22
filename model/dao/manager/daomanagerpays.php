<?php
/*require('../beans/pays.php');
require('../singleton/singletonconnexion.php');*/
class DaoManagerPays
{
	private $con ; 
	private $pdo ; 
	public function __construct()
	{
		$this->con = new SingletonConnexion();
		$this->pdo = $this->con->getPdo();
	}
	public function ajouter_pays($py)
	{
		$sql = "INSERT INTO `pays`(`nom_pays`) VALUES (:nom_pays)";
		$query = $this->pdo->prepare($sql);
		$query->execute(
		        array(
				    ':nom_pays' => $py->getNom_pays(),
				)
		);
		if($query)
			echo "l'insertion a etaiat fait avec susses";
		else
			echo "erreur dans l'insertion";
	}
	public function afficher_tous_pays()
	{
		$sql = "SELECT * FROM `pays`";
		$query = $this->pdo->prepare($sql);
		$query->execute();
		return $query->fetchAll();
	}
	public function afficher_pays($id_pays)
	{
		$sql = "SELECT * FROM `pays` WHERE `id_pays` = '$id_pays'";
		$query = $this->pdo->prepare($sql);
		$query->execute();
		return $query->fetchAll();
	}
	
}
/*$mp = new DaoManagerPays();
var_dump($mp->afficher_pays_par_ville());*/
//var_dump($mp->afficher_pays(3));
//$py = new Pays();
//var_dump($mp->afficher_tous_pays());
//$py->setNom_pays('Maroc');
//$mp->ajouter_pays($py);
?>