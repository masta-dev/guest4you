<?php
$bbd = new PDO('mysql:host=localhost;dbname=gst4y','root','');
$bbd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$bbd->exec('SET NAMES utf8');




?>