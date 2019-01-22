<?php
require('../model/dao/beans/utilisateur.php');
require('../model/metier/metiermanagerutilisateur.php');
require('../model/dao/singleton/singletonconnexion.php');
require('../model/dao/beans/poster.php');
require('../model/metier/metiermanagerposter.php');
require('../model/dao/beans/ville.php');
require('../model/metier/metiermanagerville.php');
require('../model/dao/beans/pays.php');
require('../model/metier/metiermanagerpays.php');
$user = new Utilisateur();
$p = new Poster();
$py = new Pays();
$v = new Ville();
$muser = new MetierManagerUtilisateur();
$mpy = new MetierManagerPays();
$mp = new MetierManagerPoster();
$mv = new MetierManagerVille();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>test</title>
  </head>
  <body>
    <div>
	   <form method='post' action='<?php echo $_SERVER['PHP_SELF'];?>'>
	   <table>
	   <tr>
	     <td><label>  pays </label></td>
	     <td>
		   <select onclick='AJAX()' name='pays'>
		   <?php $afipay = $mv->afficher_ville_par_pays();
		    foreach($afipay as $afi){
			?>
		      <option  value="<?php echo $afi['id_pays'];?>"><?php echo $afi['nom_pays'];?></option>
			<?php } 
			?>
		   </select>
		 </td>
	     <td>
		   <label> ville </label>
		 </td>
	     <td>
			<select>
			<?php $afip = $mv->afficher_ville_par_pays();
			   foreach($afip as $afi){
			?>
			   <option value="<?php echo $afi['id_ville'];?>"><?php echo $afi['nom_ville'];?></option>
			   <?php }?>
			</select>
		 </td>
		</tr> 
	   </table>
	   </form>
	</div>
  </body>
</html>