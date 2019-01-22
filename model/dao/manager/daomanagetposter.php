<?php
//require('../beans/poster.php');
//require('../singleton/singletonconnexion.php');
class DaoManagerPoster
{
	private $con ; 
	private $pdo ; 
	
	public function __construct()
	{
		$this->con = new SingletonConnexion();
		$this->pdo = $this->con->getPdo(); 
	}
	public function ajouter_poste($p)
	{
		$sql = "INSERT INTO `poste`(`id_ville`, `id`, `publication`, `prix`, `date_dajout`, `adresse_post` , `img_poster`) VALUES (:id_ville,:id,:publication,:prix,:date_dajout,:adresse_post,:img_poster)";
		$query = $this->pdo->prepare($sql);
		$query->execute(
		       array(
				  ':id_ville' => $p->getId_ville(),
				  ':id' => $p->getId(),
			      ':publication' => $p->getPublication(), 
				  ':prix' => $p->getPrix(),
			      ':date_dajout' => $p->getDate_dajout(),
                  ':adresse_post'  => $p->getAdresse_post(),				  
				  ':img_poster' => $p->getImg_poster(),
			   )
		);
		/*if($query)
			echo "l'insertion a etait fait";
		else
			echo "erreur d'insertion ..";*/
	}
	public function Recherche_ville_prix($mocle,$maxprix,$minprix)
	{
		$sql = "SELECT * FROM `poste` INNER JOIN `ville` ON poste.id_ville = ville.id_ville INNER JOIN `utilisateur` ON poste.id = utilisateur.id INNER JOIN `post_rating` ON poste.ID_poste = post_rating.post_id WHERE poste.ac_ref = 1 AND  nom_ville LIKE '%$mocle%' AND  prix <= '$maxprix' AND prix >= '$minprix'" ;
		$query = $this->pdo->prepare($sql);
		$query->execute();
		return $query->fetchAll();
	}
	public function dernier_8_poste()
	{
		$sql = "SELECT * FROM `poste` INNER JOIN `ville` ON poste.id_ville = ville.id_ville INNER JOIN `utilisateur` ON poste.id = utilisateur.id ORDER BY `id_poste` DESC LIMIT 8";
		$query = $this->pdo->prepare($sql);
		$query->execute();
		return $query->fetchAll();
	}
	public function afficher_poste_user($id)
	{
		$sql = "SELECT * FROM `poste` INNER JOIN `ville` ON poste.id_ville = ville.id_ville INNER JOIN `utilisateur` ON poste.id = utilisateur.id WHERE utilisateur.id = '$id'";
		$query = $this->pdo->prepare($sql);
		$query->execute();
		return $query->fetch();
	}
	public function afficher_poste_poste($poste)
	{
		$sql = "SELECT * FROM `poste` INNER JOIN `ville` ON poste.id_ville = ville.id_ville INNER JOIN `utilisateur` ON poste.id = utilisateur.id WHERE poste.ID_poste = '$poste'";
		$query = $this->pdo->prepare($sql);
		$query->execute();
		return $query->fetch();
	}
	public function afficher_One_poste($id_poster)
	{
		$sql = "SELECT * FROM `poste` INNER JOIN `ville` ON poste.id_ville = ville.id_ville INNER JOIN `utilisateur` ON poste.id = utilisateur.id  WHERE `ID_poste` = '$id_poster'";
		$query = $this->pdo->prepare($sql);
		$query->execute();
		return $query->fetch();
	}
	public function supprimer_poste($id_poster)
	{
		$sql = "DELETE FROM `poste` WHERE `ID_poste` = '$id_poster'";
		$query = $this->pdo->prepare($sql);
		$query->execute();
	}
	public function count_poste($id)
	{
		$sql = "SELECT * FROM `poste` INNER JOIN `utilisateur` ON poste.id = utilisateur.id WHERE utilisateur.id <> '$id' ORDER BY `id_poste` DESC ";
		$query = $this->pdo->prepare($sql);
		$query->execute();
	    return $query->rowCount();
	}
	public function afficher_tous_poste($id)
	{
		$sql = "SELECT * FROM `poste` INNER JOIN `ville` ON poste.id_ville = ville.id_ville INNER JOIN `utilisateur` ON poste.id = utilisateur.id WHERE utilisateur.id <> '$id' ORDER BY `id_poste` DESC LIMIT 8";
		$query = $this->pdo->prepare($sql);
		$query->execute();
		return $query->fetchAll();
	}
	public function modifier_poste($p)
	{
	    $id_poste = $p->getId_poste();
	    $ville = $p->getId_ville();
	    $publication = $p->getPublication();
	    $prix = $p->getPrix();
	    $date_dajout = $p->getDate_dajout();
		$sql = "UPDATE `poste` SET `id_ville`='$ville',`publication`='$publication',`prix`='$prix',`date_dajout`='$date_dajout' WHERE `id_poste` = '$id_poste'";
		$query = $this->pdo->prepare($sql);
		$query->execute();
		/*if($query) echo "la modification a etait bien fait";
		else echo "erreur de la modification";*/
	}
	public function Afficher_tous()
	{
		$sql = "SELECT * FROM `poste` INNER JOIN `ville` ON poste.id_ville = ville.id_ville INNER JOIN `utilisateur` ON poste.id = utilisateur.id ";
		$query = $this->pdo->prepare($sql);
		$query->execute();
		return $query->fetchAll();
	}
	public function p_count()
	{
		$sql = "SELECT * FROM `poste` INNER JOIN `utilisateur` ON poste.id = utilisateur.id";
		$query = $this->pdo->prepare($sql);
		$query->execute();
	    return $query->rowCount();
	}
	public function afficher_pagination_poste($depart,$fin)
	{
		$sql = "SELECT * FROM `poste` INNER JOIN `ville` ON poste.id_ville = ville.id_ville INNER JOIN `utilisateur` ON poste.id = utilisateur.id ORDER BY `id_poste` DESC LIMIT ".$depart.",".$fin."";
		$sql = "SELECT * FROM `poste` INNER JOIN `ville` ON poste.id_ville = ville.id_ville INNER JOIN `utilisateur` ON poste.id = utilisateur.id ORDER BY `id_poste` DESC LIMIT ".$depart.",".$fin."";
		$query = $this->pdo->prepare($sql);
		$query->execute();
		return $query->fetchAll();
	}
	public function afficher_pagination_poste_user1($id,$depart,$fin)
	{
		$sql = "SELECT * FROM `poste` INNER JOIN `ville` ON poste.id_ville = ville.id_ville INNER JOIN `utilisateur` ON poste.id = utilisateur.id INNER JOIN `post_rating` ON IF poste.ID_poste = post_rating.post_id WHERE utilisateur.id = ".$id." ORDER BY `id_poste` DESC LIMIT ".$depart.",".$fin."";
		$query = $this->pdo->prepare($sql);
		$query->execute();
		return $query->fetchAll();
	}
	public function afficher_pagination_poste_user($id,$depart,$fin)
	{
		$sql = "SELECT * FROM `poste` INNER JOIN `ville` ON poste.id_ville = ville.id_ville INNER JOIN `utilisateur` ON poste.id = utilisateur.id WHERE utilisateur.id = ".$id." ORDER BY `id_poste` DESC LIMIT ".$depart.",".$fin."";
		$query = $this->pdo->prepare($sql);
		$query->execute();
		return $query->fetchAll();
	}
	public function afficher_pagination_poste_index($depart,$fin)
	{
		$sql = "SELECT * FROM `poste` INNER JOIN `ville` ON poste.id_ville = ville.id_ville INNER JOIN `utilisateur` ON poste.id = utilisateur.id WHERE poste.ac_ref = 1 ORDER BY `id_poste` DESC LIMIT ".$depart.",".$fin."";
		$query = $this->pdo->prepare($sql);
		$query->execute();
		return $query->fetchAll();
	}
	public function afficher_count_user($id)
	{
		$sql = "SELECT * FROM `poste` INNER JOIN `ville` ON poste.id_ville = ville.id_ville INNER JOIN `utilisateur` ON poste.id = utilisateur.id WHERE utilisateur.id = ".$id."";
	    $query = $this->pdo->prepare($sql);
		$query->execute();
		return $query->rowCount();
	}
	public function afficher_count_all()
	{
		$sql = "SELECT * FROM `poste` INNER JOIN `ville` ON poste.id_ville = ville.id_ville INNER JOIN `utilisateur` ON poste.id = utilisateur.id ";
	    $query = $this->pdo->prepare($sql);
		$query->execute();
		return $query->rowCount();
	}
	public function afficher_count_all1()
	{
		$sql = "SELECT * FROM `poste` INNER JOIN `ville` ON poste.id_ville = ville.id_ville INNER JOIN `utilisateur` ON poste.id = utilisateur.id WHERE poste.ac_ref = 1";
	    $query = $this->pdo->prepare($sql);
		$query->execute();
		return $query->rowCount();
	}
	public function afficher_one_average_rating($id_poste)
	{
		$sql = "SELECT * FROM `post_rating` WHERE `post_id` = '$id_poste'";
		$query = $this->pdo->prepare($sql);
		$query->execute();
		return $query->fetch();
	}
	public function afficher_les_meuilleurs_publication()
	{
		$sql = "SELECT * FROM `poste` INNER JOIN `ville` ON poste.id_ville = ville.id_ville INNER JOIN `utilisateur` ON poste.id = utilisateur.id INNER JOIN `post_rating` ON post_rating.post_id = poste.ID_poste WHERE poste.ac_ref = 1 ORDER BY `rating_number` DESC LIMIT 7";
		$query = $this->pdo->prepare($sql);
		$query->execute();
		return $query->fetchAll();
	}
}
$mp = new DaoManagerPoster();
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