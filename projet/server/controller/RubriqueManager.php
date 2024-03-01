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