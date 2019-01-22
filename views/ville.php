<?php
require('index.php');
if(isset($_POST['code']))
{
	$id = $_POST['code'];
	$mv = new MetierManagerVille();
	$villes = $mv->afficher_ville_par_pays($id);
	foreach($villes as $ville)
	{
		if($ville == null)
		{
			echo "<option value='Casablanca'><Casablanca/option>";
		}
		else{
		?>
		<option value="<?php echo $ville['nom_ville']?>"><?php echo $ville['nom_ville']?></option>
		<?php
		}
	}
}
else
	echo "erreur";
?>