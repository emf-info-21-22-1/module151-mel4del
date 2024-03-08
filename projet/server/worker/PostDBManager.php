<?php
require_once('worker/Connexion.php');
require_once('beans/Post.php');
class PostDBManager
{
    private $connexion;

    public function __construct()
    {
        $this->connexion = new Connexion();
    }
    //permet de créer un post
    public function createPost($user,$rubrique, $titre, $image, $texte): bool
    {
        $nbPost = $this->countPost();

        $params = array('id' => $nbPost + 1, 'rubrique' => $rubrique, 'user' => $user, 'titre' => $titre, 'image' => $image, 'texte' => $texte);
        $query = "INSERT INTO t_post (pk_post, fk_rubrique, fk_user, titre, image, texte) VALUES (:id, :rubrique, :user, :titre, :image, :texte);";
        $result = Connexion::getInstance()->executeQuery($query, $params);
        
        return $result;
    }




    public function countPost()
    {
        $query = Connexion::getInstance()->selectQuery("SELECT * FROM t_post;", null);
        $postListe = array();
        foreach ($query as $row) {
            $post = new Post($row['pk_post'], $row['texte'], $row['titre'], $row['image'], $row['fk_user'], $row['fk_rubrique']);
            $postListe[] = $post;
          
        }
        return count($postListe);
    }
}
