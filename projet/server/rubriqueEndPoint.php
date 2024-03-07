<?php

require_once('controller/RubriqueManager.php');
require_once('controller/SessionManager.php');




$rubrique = new RubriqueManager();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   if (isset($_POST["rubrique"])){
        echo $rubrique->createRubrique($_POST['rubrique']);
   }
}

?>