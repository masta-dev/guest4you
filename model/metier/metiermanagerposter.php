<?php
/*require('../dao/beans/poster.php');
require('../dao/singleton/singletonconnexion.php');*/
require('../model/dao/manager/daomanagetposter.php');
class MetierManagerPoster
{
	private $dao ; 
	public function __construct()
	{
		$this->dao = new DaoManagerPoster();
	}
	public function ajouter_poste($p)
	{
	    $this->dao->ajouter_poste($p);
	}
	public function Recherche_ville_prix($mocle,$maxprix,$minprix)
	{
		return $this->dao->Recherche_ville_prix($mocle,$maxprix,$minprix);
	}
	public function dernier_8_poste()
	{
		return $this->dao->dernier_8_poste();
	}
	public function afficher_poste_user($id)
	{
		return $this->dao->afficher_poste_user($id);
	}
	public function afficher_One_poste($id_poster)
	{
		return $this->dao->afficher_One_poste($id_poster);
	}
	public function supprimer_poste($id_poster)
	{
		return $this->dao->supprimer_poste($id_poster);
	}
	public function count_poste($id)
	{
		return $this->dao->count_poste($id);
	}
	public function afficher_tous_poste($id)
	{
		return $this->dao->afficher_tous_poste($id);
	}
	public function modifier_poste($p)
	{
		return $this->dao->modifier_poste($p);
	}
	public function Afficher_tous()
	{
		return $this->dao->Afficher_tous();
	}
	public function p_count()
	{
		return $this->dao->p_count();
	}
	public function afficher_pagination_poste($depart,$fin)
	{
		return $this->dao->afficher_pagination_poste($depart,$fin);
	}
	public function afficher_pagination_poste_user1($id,$depart,$fin)
	{
		return $this->dao->afficher_pagination_poste_user1($id,$depart,$fin);
	}
	public function afficher_pagination_poste_user($id,$depart,$fin)
	{
		return $this->dao->afficher_pagination_poste_user($id,$depart,$fin);
	}
	public function afficher_pagination_poste_index($depart,$fin)
	{
		return $this->dao->afficher_pagination_poste_index($depart,$fin);
	}
	public function afficher_count_user($id)
	{
		return $this->dao->afficher_count_user($id);
	}
	public function afficher_count_all()
	{
		return $this->dao->afficher_count_all();
	}
	public function afficher_poste_poste($poste)
	{
		return $this->dao->afficher_poste_poste($poste);
	}
	public function afficher_one_average_rating($id_poste)
	{
		return $this->dao->afficher_one_average_rating($id_poste);
	}
	public function afficher_les_meuilleurs_publication()
	{
		return $this->dao->afficher_les_meuilleurs_publication();
	}
	public function afficher_count_all1()
	{
		return $this->dao->afficher_count_all1();
	}
	public function les_postes()
	{
		return $this->dao->les_postes();
	}
}
//$mp = new MetierManagerPoster();
/*$p = new Poster();
$p->setId_ville(2);
$p->setId(11);
$p->setPublication('tfooo pour tous le monde');
$p->setDate_dajout('1995-12-2');
$mp->ajouter_poste($p);*/
//var_dump($mp->Recherche_ville_prix('aga',2500));
?>