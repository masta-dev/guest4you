<?php
class Pays
{
	private $id_pays ; 
	private $nom_pays ; 
	public function getId_pays()
	{
		return $this->id_pays ; 
	}
	public function setId_pays($id_pays)
	{
		$this->id_pays = $id_pays ; 
	}
	public function getNom_pays()
	{
		return $this->nom_pays ; 
	}
	public function setNom_pays($nom_pays)
	{
		$this->nom_pays = $nom_pays ; 
	}
}
?>