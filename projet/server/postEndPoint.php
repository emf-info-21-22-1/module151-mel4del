<?php

require_once('controller/PostManager.php');

$post = new PostManager();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if ((isset($_POST['texte']) && isset($_POST['titre']) && isset($_POST['image']) && isset($_POST['fk_rubrique']))) {
            echo $post->createPostWithoutText($_POST['fk_rubrique'], $_POST['titre'], $_POST['image'], $_POST['texte']);
        } elseif (isset($_POST['titre']) && isset($_POST['image'])  && isset($_POST['fk_rubrique'])) {
            echo $post->createPostWithoutText($_POST['fk_rubrique'], $_POST['titre'], $_POST['image']);
        }

    }
}


?>