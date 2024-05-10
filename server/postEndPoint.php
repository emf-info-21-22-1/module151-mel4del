<?php

require_once ('controller/PostManager.php');

$post = new PostManager();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if ((isset($_POST['texte']) && isset($_POST['titre']) && isset($_POST['rubrique']))) {
            echo $post->createPostWithText($_POST['rubrique'], $_POST['titre'], $_POST['texte']);

        }

    }
}


?>