<?php
/*require('../beans/ville.php');
require('../singleton/singletonconnexion.php');*/
class DaoManagerVille
{
	private $con ; 
	private $pdo ; 
	
	public function __construct()
	{
		$this->con = new SingletonConnexion();
		$this->pdo = $this->con->getPdo(); 
	}
	public function ajouter_ville($v)
	{
		$sql = "INSERT INTO `ville`(`id_pays`, `nom_ville`) VALUES (:id_pays,:nom_ville)";
		$query = $this->pdo->prepare($sql);
		$query->execute(
		       array(
				  ':id_pays' => $v->getId_pays(),
				  ':nom_ville' => $v->getNom_ville(),
			   )
		);
		/*if($query)
			echo "l'insertion a etait fait";
		else
			echo "erreur d'insertion ..";*/
	}
	public function afficher_ville_par_pays($pays)
	{
		$sql = "SELECT * FROM `pays` INNER JOIN `ville` ON ville.id_pays = pays.id_pays WHERE pays.id_pays = '$pays'";
		$query = $this->pdo->prepare($sql);
		$query->execute();
		return $query->fetchAll();
	}
	
}
/*$dv = new DaoManagerVille();
var_dump($dv->afficher_ville_par_pays());*/
/*$v = new Ville();
$v->setId_pays(2);
$v->setNom_ville('casablanca');
$dv->ajouter_poste($v);*/
?>