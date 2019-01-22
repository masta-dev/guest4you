<?php
//require('../beans/utilisateur.php');
//require('../singleton/singletonconnexion.php');
class DaoManagerUtilisateur
{
	private $pdo ;
    private $con ; 	
    public function __construct()
	{
		$this->con = new SingletonConnexion();
		$this->pdo = $this->con->getPdo() ; 
	}
	public function Ajouter_user($user)
	{
		$sql = "INSERT INTO `utilisateur`(`nom`, `prenom`, `sexe`, `email`, `mdp`,`img_user`) VALUES (:nom,:prenom,:sexe ,:email,:mdp,:img_user)";
		$query = $this->pdo->prepare($sql);
		$query->execute(
		      array(
					     ":nom" => $user->getNom(),
					     ":prenom" => $user->getPrenom(),
					     ":sexe" => $user->getSexe(),
					     ":email" => $user->getEmail(),
					     ":mdp" => $user->getMdp(),
						 ":img_user" => $user->getImg_user(),					 
			      )  
			  );
		/*if($query)
			echo "l'insertion a etait bien passer";
		else
			echo "erreur d'insertion ";*/
	}
	public function Modifier_user($user)
	{
		$id = $user->getId();
		$nom = $user->getNom();
		$prenom = $user->getPrenom(); 
		$email = $user->getEmail();
		$mdp = $user->getMdp();
		$sql = "UPDATE `utilisateur` SET `nom`= '$nom',`prenom`='$prenom',`email`='$email',`mdp`='$mdp' WHERE `id` = '$id'";
		$query = $this->pdo->prepare($sql);
		$query->execute();
		/*if($query)
			echo "la modification a etait bien fait";
		else
			echo "erreur de la modification";*/
	}
	public function Afficher_user($id)
	{
		$sql = "SELECT * FROM `utilisateur` WHERE `id` = '$id'";
		$query = $this->pdo->prepare($sql);
		$query->execute();
		return $query->fetch();
	}
	public function Afficher_tous()
	{
		$sql = "SELECT * FROM `utilisateur`";
		$query = $this->pdo->prepare($sql);
		$query->execute();
		return $query->fetchAll();
	}
	public function Afficher_email_password($email,$password)
	{
		$sql = "SELECT * FROM `utilisateur` WHERE `email` = '$email' AND `mdp` = '$password'";
		$query = $this->pdo->prepare($sql);
		$query->execute();
		return $query->fetch();
	}
	public function Supprimer_user($id)
	{
		$sql = "DELETE FROM `utilisateur` WHERE `id` = '$id'";
		$query = $this->pdo->prepare($sql);
		$query->execute();
	}
	public function Supprimer_tous()
	{
		$sql = "DELETE FROM `utilisateur`";
		$query = $this->pdo->prepare($sql);
		$query->execute();
	}
	public function Afficher_tous_user($id)
	{
		$sql = "SELECT * FROM `utilisateur` WHERE `id` = '$id'";
		$query = $this->pdo->prepare($sql);
		$query->execute();
		return $query->fetchAll();
	}
	public function Modifier_img_user($img,$id)
	{
		$sql = "UPDATE `utilisateur` SET `img_user` = '$img' WHERE `id` = '$id'";
		$query = $this->pdo->prepare($sql);
		$query->execute();
	}
	public function Modifier_adresse($adresse,$id)
	{
		$sql = "UPDATE `utilisateur` SET `adresse` = '$adresse' WHERE `id` = '$id'";
		$query = $this->pdo->prepare($sql);
		$query->execute();
	}
    public function Count_users()
	{
		$sql = "SELECT * FROM `utilisateur`";
		$query = $this->pdo->prepare($sql);
		$query->execute();
		return $query->RowCount();
	} 
	
}
//$mUser = new DaoManagerUtilisateur();
//$user = new Utilisateur();
//$user->setId(1);
/*$user->setNom('bouzekri');
$user->setPrenom('loubna');
$user->setSexe('H');
$user->setAdresse('Rue soltan ade el hamide borgogne casablanca');
$user->setEmail('loubna@hotmail.com');
$user->setMdp('loubna');
$user->setImg_user('loubna.jpg');
$mUser->Ajouter_user($user);*/
//var_dump($mUser->Afficher_user(1));
//var_dump($mUser->Afficher_tous());
//$mUser->Supprimer_tous();
//var_dump($mUser->Afficher_email_password('hamzaB@gmail.com','hamza123'));
?>