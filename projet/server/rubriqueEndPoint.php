<?php

require_once('controller/RubriqueManager.php');
require_once('controller/SessionManager.php');




$rubrique = new RubriqueManager();


if (isset($_POST['exemple']) == 'nom') {
    $rubrique->createRubrique($nom);
}

?>