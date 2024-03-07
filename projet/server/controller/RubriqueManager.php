<?php
require_once("worker/RubriqueDBManager.php");
class RubriqueManager
{
    private $rubriqueDB;


    public function __construct()
    {
        $this->rubriqueDB = new RubriqueDBManager();
    }

    public function createRubrique($nom)
    {
        $this->rubriqueDB->addRubrique($nom);
     
        $resultat ="ok";
        $status = "la rubrique a bien été ajouté à la DB";
        return json_encode(array("status"=>$status,"info"=>$resultat));
    }



    private function managePostRequest($data)
    {
        switch ($data) {
            case 'rubrique':
                $this->rubriqueDB->addRubrique($data);
        }
    }

    private function manageGetRequest()
    {
        // Gérer la requête GET ici
    }
}

?>