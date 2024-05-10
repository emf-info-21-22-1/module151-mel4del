<?php
require_once("worker/RubriqueDBManager.php");
class RubriqueManager
{
    private $rubriqueDB;
    private $sessionManager;

    public function __construct()
    {
        $this->rubriqueDB = new RubriqueDBManager();
        $this->sessionManager = SessionManager::getInstance();

    }

    public function createRubrique($nom)
    {
        $currentUserName = $this->sessionManager->get("username");
        if (($currentUserName)==!null) {
        $this->rubriqueDB->addRubrique($nom);
        
        $resultat = "la rubrique a été créée";
        $status = "Ok";
        return json_encode(array("status" => $status, "info" => $resultat));
        }else{
            $resultat = "la rubrique ne peut pas être créé lorsque l'utilisateur est déconnecté";
            $status = "NOT";
            return json_encode(array("status" => $status, "info" => $resultat));
        }
    }



    private function managePostRequest($data)
    {
        switch ($data) {
            case 'rubrique':
                $this->rubriqueDB->addRubrique($data);
        }
    }

}

?>