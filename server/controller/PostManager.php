<?php
require_once("worker/PostDBManager.php");
require_once("SessionManager.php");

class PostManager
{
    private $dbManager = null;
    private $sessionManager = null;
    public function __construct()
    {
        $this->dbManager = new PostDBManager();
        $this->sessionManager = SessionManager::getInstance();

    }



    // public function createPostWithoutText($rubrique, $titre, $image)
    // {

    //     $currentUserName = $this->sessionManager->get("username");
    //     if (($currentUserName) ==! null) {
    //         $refUser = $this->sessionManager->get("pk");
    //         $result = $this->dbManager->createPost($refUser, $rubrique, $titre, $image, null);
    //         if ($result === true) {
    //             http_response_code(200);
    //             return json_encode(array('success' => true, 'message' => 'post publié'));
    //         } else {
    //             http_response_code(401);
    //             return json_encode(array('success' => "erreur", 'message' => "problème avec la publication du post"));
    //         }
    //     } else {
    //         $infos = "Aucun utilisateur connecté, impossible de publier la publication";
    //         $status = false;
    //         http_response_code(401);
    //         return json_encode(array('success' => $status, 'message' => $infos));
    //     }
    // }

    public function createPostWithText($rubrique, $titre, $texte)
    {
        $currentUserName = $this->sessionManager->get("username");
        if (($currentUserName) ==! null) {
            $refUser = $this->sessionManager->get("pk");
            $result = $this->dbManager->createPost($refUser, $rubrique, $titre, $texte);
            if ($result === true) {
                http_response_code(200);
                return json_encode(array('success' => true, 'message' => 'post publié'));
            } else {
                http_response_code(401);
                return json_encode(array('success' => "erreur", 'message' => "problème avec la publication du post"));
            }
        } else {
            $infos = "Aucun utilisateur connecté, impossible de publier la publication";
            $status = false;
            http_response_code(401);
            return json_encode(array('success' => $status, 'message' => $infos));
        }
    }
}

?>