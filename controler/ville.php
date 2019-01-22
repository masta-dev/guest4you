<?php
require('profil.php');
if(isset($_POST['code']))
{
	$id = $_POST['code'];
	$mv = new MetierManagerVille();
	$villes = $mv->afficher_ville_par_pays($id);
	foreach($villes as $ville)
	{		?>
		<option value="<?php echo $ville['id_ville']?>"><?php echo $ville['nom_ville']?></option>
		<?php
	}
}
else
	echo "erreur";
?>