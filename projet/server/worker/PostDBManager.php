<?php
require_once('worker/Connexion.php');
class PostDBManager
{
    private $connexion;

    public function __construct()
    {
        $this->connexion = new Connexion();
    }
    //permet de créer un post
    public function createPost($rubrique, $user, $titre, $image, $texte)
    {
        $params = [$rubrique, $user, $titre, $image, $texte];
        $query = "insert into t_post (fk_rubrique, fk_user, titre, image, texte) values (?, ?, ?, ?, ?)";
        $this->connexion->executeQuery($query, $params);
    }
}
