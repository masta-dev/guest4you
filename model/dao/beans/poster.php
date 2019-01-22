<?php
class Poster
{
	private $id_poste ; 
	private $id_ville ; 
	private $id ; 
	private $publication ; 
	private $date_dajout ; 
	private $prix ;
	private $adresse_post ; 
	private $img_poster ; 
	public function getId_poste()
	{
		return $this->id_poste ; 
	}
	public function setId_poste($id_poste)
	{
		$this->id_poste = $id_poste ; 
	}
	public function getId_ville()
	{
		return $this->id_ville ; 
	}
	public function setId_ville($id_ville)
	{
		return $this->id_ville = $id_ville ; 
	}
	public function getId()
	{
		return $this->id ; 
	}
	public function setId($id)
	{
	   $this->id = $id ; 
	}
	public function getPublication()
	{
		return $this->publication ; 
	}
	public function setPublication($publication)
	{
		$this->publication = $publication ;
	}
	public function getPrix()
	{
		return $this->prix ; 
	}
	public function setPrix($prix)
	{
		$this->prix = $prix ;
	}
	public function getDate_dajout()
	{
		return $this->date_dajout ;
	}
	public function setDate_dajout($date_dajout)
	{
		$this->date_dajout = $date_dajout ; 
	}
	public function getAdresse_post()
	{
		return $this->adresse_post;
	}
	public function setAdresse_post($adresse_post)
	{
		$this->adresse_post = $adresse_post ; 
	}
	public function getImg_poster()
	{
		return $this->img_poster ;
	}
	public function setImg_poster($img_poster)
	{
		$this->img_poster = $img_poster ;
	}
}
/*$p = new Poster();
echo $p->getId();*/
?>