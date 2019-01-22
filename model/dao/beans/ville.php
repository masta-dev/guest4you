<?php
class Ville
{
	private $id_ville ; 
	private $id_pays ; 
	private $nom_ville ; 
	
	public function getId_ville()
   {
	 return $this->id_ville;	
   }
   public function setId_ville($id_ville)
   {
	   $this->id_ville = $id_ville ; 
   }
   public function getId_pays()
   {
	  return $this->id_pays ;
   }
   public function setId_pays($id_pays)
   {
	   $this->id_pays = $id_pays ; 
   }
   public function getNom_ville()
   {
	   return $this->nom_ville ; 
   }
   public function setNom_ville($nom_ville)
   {
	   $this->nom_ville = $nom_ville ;
   }
}

?>