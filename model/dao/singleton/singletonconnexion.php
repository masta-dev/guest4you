<?php
class SingletonConnexion
{
	private $host = 'mysql:host=localhost;dbname=gst4y';
	private $user = 'root';
	private $mdp = '';
	private $pdo ; 
	public function getPdo()
	{
		try
		{
			$this->pdo = new PDO($this->host,$this->user,$this->mdp);
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			/*if($this->pdo)
				echo "passer";
			else
				echo "n'as pas passer";*/
		}catch(PDOExeption $e)
		{
			die("il y'a une erreur ".$e->getMessage());
		}
		return $this->pdo ; 
	} 
}
/*$con = new SingletonConnexion();
$con->getPdo();*/
?>