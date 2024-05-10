<?php
require_once("worker/CommentaireDBManager.php");
class CommentaireManager
{
    private $commentaireDB;
    public function __construct()
    {
        $this->commentaireDB = new CommentaireDBManager();
    }

    public function createCommentaire($id){
        $this->commentaireDB->addCommentaire($id->user, $id->commentaire);
    }
}

?>