<?php


header('Access-Control-Allow-Origin: *');

require_once('Wrk/configConnexion.php');
require_once('Beans/Equipe.php');
require_once('Beans/Joueur.php');
require_once('Wrk/Connexion.php');
require_once('Ctrl/Ctrl.php');


$ctrl = new Ctrl();

if ($_GET['action'] == 'equipe') {
	$ctrl->getEquipe();
}

if ($_GET['action'] == 'joueur') {
	if (isset($_GET['equipeId'])) {
		$ctrl->getJoueur($_GET['equipeId']);
	}
}




