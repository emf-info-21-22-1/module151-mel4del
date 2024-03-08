<?php
require_once('Connexion.php');
class CommentaireDBManager
{
    private $connexion;
    public function addCommentaire($user, $commentaire)
    {
        $nbComment = "";
        $params = array('pk_commentaire' => $nbComment, 'utilisateur' => $user, 'contenu' => $commentaire);
        $this->connexion->selectQuery("INSERT INTO t_commentaire VALUES (0, :contenu, :utilisateur)", $params);

    }
}
