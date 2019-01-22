<?php
//require('../beans/image.php');
//require('../singleton/singletonconnexion.php');
class DaoManagerImage
{
	private $con ; 
	private $pdo ; 
	
	public function __construct()
	{
		$this->con = new SingletonConnexion();
		$this->pdo = $this->con->getPdo(); 
	}
	public function ajouter_image($image,$id_poste)
	{
		$sql = "INSERT INTO `image`(`ID_poste`, `nom_images`) VALUES (:ID_poste,:nom_images)";
		$query = $this->pdo->prepare($sql);
		$query->execute(
		       array(
				  ':ID_poste' => $id_poste,
				  ':nom_images' => $image->getNom_image(),
			   )
		);
		/*if($query)
			echo "l'insertion a etait fait";
		else
			echo "erreur d'insertion ..";*/
	}
}
$mimage = new DaoManagerImage();
/*$image = new image();
$image->setNom_image("bonjour tous le monde");
$mimage->ajouter_image($image,161);*/
?>