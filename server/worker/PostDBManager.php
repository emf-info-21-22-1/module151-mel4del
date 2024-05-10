<?php
require_once ('worker/Connexion.php');
require_once ('beans/Post.php');
require_once ('worker/RubriqueDBManager.php');


class PostDBManager
{
    private $connexion;
    private $rubriqueManager;
    public function __construct()
    {
        $this->rubriqueManager = new RubriqueDBManager();
        $this->connexion = Connexion::getInstance();
    }
    //permet de créer un post
    public function createPost($user, $rubrique, $titre, $texte): bool
    {
        if ($this->rubriqueManager->checkRubrique($rubrique)) {

        } else {
            $this->rubriqueManager->addRubrique($rubrique);
        }
        $id = $this->rubriqueManager->findRubriqueID($rubrique);
        $params = array('rubrique' => $id, 'user' => $user, 'titre' => $titre, 'texte' => $texte);
        $query = "INSERT INTO T_post (texte, titre , fk_user,  fk_rubrique) VALUES (:texte, :titre, :user, :rubrique);";
        $result = Connexion::getInstance()->executeQuery($query, $params);

        return $result;
    }


}