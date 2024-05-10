<?php

require_once("controller/CommentaireManager.php");
require_once("controller/SessionManager.php");



$commentaire = new CommentaireManager();





$commentaire->createCommentaire($_POST['exemple']);





?>