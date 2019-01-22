<?php
class commenter
{
	private $id_commenter ; 
	private $id_user ; 
	private $context ; 
	private $id_poste;
	private $date_commenter ; 
	private $id_user_com ;
	public function getId_commenter()
	{
		return $this->id_commenter ; 
	}
	public function setId_commenter($id_commenter)
	{
		$this->id_commenter = $id_commenter ; 
	}
	public function getId_user()
	{
		return $this->id_user ; 
	}
	public function setId_user($id_user)
	{
		$this->id_user = $id_user ; 
	}
	public function getContext()
	{
		return $this->context ; 
	}
	public function setContext($context)
	{
		$this->context = $context ; 
	}
	public function getId_poste()
	{
		return $this->id_poste ; 
	}
	public function setId_poste($id_poste)
	{
		$this->id_poste = $id_poste ; 
	}
	public function getId_user_com()
	{
		return $this->id_user_com ; 
	}
	public function setId_user_com($id_user_com)
	{
		$this->id_user_com = $id_user_com ; 
	}
	public function getDate_commenter()
	{
		return $this->date_commenter ; 
	}
	public function setDate_commenter($date_commenter)
	{
		$this->date_commenter = $date_commenter ; 
	}
}
?>