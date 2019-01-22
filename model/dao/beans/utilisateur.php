<?php
class Utilisateur{
	private $id ; 
	private $nom ; 
	private $prenom ; 
	private $sexe ; 
	private $adresse ; 
	private $email ; 
	private $mdp ; 
	private $img_user ; 
	public function getId()
	{
		return $this->id ; 
	}
	public function setId($id)
	{
		$this->id = $id ; 
	}
	public function getNom()
	{
		return $this->nom ; 
	}
	public function setNom($nom)
	{
		return $this->nom = $nom ; 
	}
	public function getPrenom()
	{
		return $this->prenom ; 
	}
	public function setPrenom($prenom)
	{
	   $this->prenom = $prenom ; 
	}
	public function getSexe()
	{
		return $this->sexe ; 
	}
	public function setSexe($sexe)
	{
		$this->sexe = $sexe ;
	}
	public function getAdresse()
	{
		return $this->adresse ;
	}
	public function setAdresse($adresse)
	{
		$this->adresse = $adresse ; 
	}
	public function getEmail()
	{
		return $this->email ;
	}
	public function setEmail($email)
	{
		$this->email = $email ;
	}
	public function getMdp()
	{
		return $this->mdp ;
	}
	public function setMdp($mdp)
	{
		$this->mdp = $mdp ; 
	}
	public function getImg_user()
	{
		return $this->img_user;
	}
	public function setImg_user($img_user)
	{
		$this->img_user = $img_user ; 
	}
	public function Afficher()
	{
		return " L'identifient est :  ".$this->id." Le nom est : ".$this->nom." Le prenom est :".$this->prenom." Le sexe est : ".$this->sexe." L'adresse est : ".$this->adresse." L'email est : ".$this->email." le mote de passe est : ".$this->mdp." "." l'image utilisateur est : ".$this->img_user ; 
	}
}

/*$user = new Utilisateur();
$user->setId(1);
$user->setNom('bouzekri');
$user->setPrenom('Hamza');
$user->setSexe('H');
$user->setAdresse('rue soltan ade el hamid maison 29 borgogne anfa');
$user->setEmail('Hamza_osse@hotmail.com');
$user->setMdp('hamza123');
$user->setImg_user('hamza.jpg');
echo $user->getId()." ";
echo $user->getNom()." ";
echo $user->getPrenom()." ";
echo $user->getSexe()." ";
echo $user->getAdresse()." ";
echo $user->getMdp()." ";
echo $user->getImg_user()." ";
echo $user->getEmail()." ";*/

?>