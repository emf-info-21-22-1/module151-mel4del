<?php
$bdd = new PDO('mysql:host=localhost;dbname=nomDB', 'root', 'pwd');
$reponse = "SELECT titre from jeux_video";

$titre = titre;
while ($titre != null) {
	echo $titre;



}
$reponse->closeCursor();
?>