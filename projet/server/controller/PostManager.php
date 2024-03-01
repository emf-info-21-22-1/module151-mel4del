<?php
require_once("worker/PostDBManager.php");

class PostManager
{
    private $dbManager = null;

    public function __construct()
    {
        $this->dbManager = new PostDBManager();
    }

    public function typePost($type)
    {
        if ($type->texte == null) {
            $this->createPostWithoutText($type->user, $type->rubrique, $type->titre, $type->image);
        } else {
            $this->createPostWithText($type->user, $type->rubrique, $type->titre, $type->image, $type->texte);
        }
    }

    private function createPostWithoutText($user, $rubrique, $titre, $image)
    {
        $this->dbManager->createPost($user, $rubrique, $titre, $image, null);
    }

    private function createPostWithText($user, $rubrique, $titre, $image, $texte)
    {
        $this->dbManager->createPost($user, $rubrique, $titre, $image, $texte);
    }
}
?>


