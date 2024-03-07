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
    public function createUser($nom, $mdp, $isAdmin): string
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
            return json_encode(array('success' => true, 'message' => 'Connexion possible', 'Userlogin' => $nom, 'UserMdp' => $mdp));
            
        } else {
            return json_encode(array('erreur' => false, 'message' => 'Connexion Impossible', 'Userlogin' => $nom, 'UserMdp' => $mdp, "mauvais mot de passe"));
        }
    }

    public function getAll()
    {

        $listeMessage = $this->userDB->getAll();
        return json_encode(array("user" => $listeMessage));

    }



}
?>