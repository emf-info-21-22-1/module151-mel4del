<?php
require_once("./worker/UserDBManager.php");
class UserManager
{

    private $userDB;
    private $sessionManager;
    public function __construct()
    {
        $this->userDB = new UserDBManager();
        $this->sessionManager = new SessionManager();

    }
    public function createUser($nom, $mdp, $isAdmin): bool
    {

        $result = $this->userDB->addUser($nom, $mdp, $isAdmin);
        if ($result==true) {
            $resultat ="ok";
            $status = "l'user a bien été ajouté à la DB";
            return json_encode(array("status"=>$status,"info"=>$resultat));
        }else{
    
            return json_encode(array("status"=>false,"info"=>"custom"));
        }
    }

    public function getUser($nom)
    {
        return $this->userDB->recupUser($nom);

    }
    public function checkUser($nom, $mdp): string
    {

        $result = $this->userDB->checkUser($nom, $mdp);
        if ($result == "ok") {
            return "ok";
        } else {
            return "pas ok";
        }
    }

    public function getAll()
    {

        $listeMessage = $this->userDB->getAll();
        return json_encode(array("user" => $listeMessage));

    }



}
?>