<?php 
class Image
{
	private $id_image ; 
	private $id_poste ; 
	private $nom_image; 
	
	public function getId_image()
	{
		return $this->id_image ; 
	}
	public function setId_image($id_image)
	{
		$this->id_image = $id_image ; 
	}
	public function getId_poste()
	{
		return $this->id_poste ; 
	}
	public function setId_poste($id_poste)
	{
		$this->id_poste = $id_poste ; 
	}
	public function getNom_image()
	{
		return $this->nom_image ; 
	}
	public function setNom_image($nom_image)
	{
		$this->nom_image = $nom_image ; 
	}
	
}

?>