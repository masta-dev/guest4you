<?php
//require('../dao/beans/image.php');
//require('../dao/singleton/singletonconnexion.php');
require('../model/dao/manager/daomanagerimage.php');
class MetierManagerImage
{
	private $dao ; 
	public function __construct()
	{
		$this->dao = new DaoManagerImage();
	}
	public function ajouter_Image($image,$id_poste)
	{
	    $this->dao->ajouter_Image($image,$id_poste);
	}
}
?>