<?php 
require('config.php');
$req = $bbd->prepare('SELECT * FROM `poste` WHERE lu = 0');
$req->execute();

echo $req->rowCount();

?>