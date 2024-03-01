<?php
require_once('Connexion.php');
class CommentaireDBManager
{
    private $connexion;
    public function addCommentaire($user, $commentaire)
    {
       $this->connexion->selectQuery("insert into t_commentaire VALUES (0, texte, fk_user)", $commentaire, $user);

    }
}
