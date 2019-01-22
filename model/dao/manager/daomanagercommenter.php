<?php
//require('../beans/commenter.php');
//require('../singleton/singletonconnexion.php');
class DaoManagerCommenter
{
	private $con ; 
	private $pdo ; 
	
	public function __construct()
	{
		$this->con = new SingletonConnexion();
		$this->pdo = $this->con->getPdo(); 
	}
	public function ajouter_commenter($c)
	{
		$sql = "INSERT INTO `commente`( `id_user`, `context`,`id_poste` , `id_user_com`, `date_commente`) VALUES (:id_user,:context,:id_poste,:id_user_com,:date_commente)";
		$query = $this->pdo->prepare($sql);
		$query->execute(
		       array(
				  ':id_user' => $c->getId_user(),
				  ':context' => $c->getContext(),
				  ':id_poste' => $c->getId_poste(),
				  ':id_user_com' => $c->getId_user_com(),
			      ':date_commente' => $c->getDate_commenter(), 
			   )
		);
		/*if($query)
			echo "l'insertion a etait fait";
		else
			echo "erreur d'insertion ..";*/
	}
	public function afficher_tous_Commenter($id)
	{
		$sql = "SELECT * FROM `commente` INNER JOIN `poste` ON commente.id_poste = poste.ID_poste INNER JOIN `utilisateur` ON utilisateur.id = commente.id_user WHERE commente.id_poste = '$id'";
		$query = $this->pdo->prepare($sql);
		$query->execute();
		return $query->fetchAll();
	}
	public function afficher_les_commenters($id)
	{
		$sql = "SELECT * FROM `commente` INNER JOIN `poste` ON commente.id_poste = poste.ID_poste INNER JOIN `utilisateur` ON utilisateur.id = commente.id_user WHERE commente.id_user_com = '$id' AND commente.id_user <> '$id' ORDER BY id_commente DESC LIMIT 8";
		$query = $this->pdo->prepare($sql);
		$query->execute();
		return $query->fetchAll();
	}
	public function conter_les_commenters($id)
	{
		$sql = "SELECT * FROM `commente` INNER JOIN `poste` ON commente.id_poste = poste.ID_poste INNER JOIN `utilisateur` ON utilisateur.id = commente.id_user WHERE commente.id_user_com = '$id' AND commente.id_user <> '$id' ORDER BY id_commente DESC LIMIT 8";
		$query = $this->pdo->prepare($sql);
		$query->execute();
		return $query->rowCount();
	}
}
/*$mc = new DaoManagerCommenter();
var_dump($mc->afficher_les_commenters(31));*/
/*$c = new Commenter();
$c->setContext("bonjour tous le monde je m applle hamza bouzekri");
$c->setId_user(31);
$c->setId_poste(161);
$c->setDate_commenter("2016/1/4");
if($mc->ajouter_commenter($c))
{
	echo "passe";
}*/
/*$p = new Poster();
$p->setId_poste(67);
$p->setId_ville(2);
//$p->setId(11);
$p->setPrix(50000);
$p->setPublication('fffffffffffffffffffffffffffff  monde');
$p->setDate_dajout('1666-2-1');
$mp->modifier_poste($p);*/
//$mp->ajouter_poste($p);
//var_dump($mp->Recherche_ville_prix('Casablanca',500000000,1,0,5));
//var_dump($mp->dernier_8_poste());
//var_dump($mp->afficher_poste_user(11));
//var_dump($mp->count_poste());
//$afi = $mp->afficher_pagination_poste(20,2);
//$afi = $mp->afficher_pagination_poste_index($depart,$fin);
/*$afi = $mp->afficher_count_all();
var_dump($afi);*/
?>