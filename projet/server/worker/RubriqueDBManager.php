<?php
require_once('Connexion.php');
class RubriqueDBManager
{

    public $connexion =null;

    public function __construct()
    {
        $this->connexion = new Connexion();
    }
    public function addRubrique($rubrique)
    {
        $query="insert into t_rubrique (nom) VALUES (?);";
        $params = array($rubrique);
        $result = $this->connexion->executeQuery($query,$params);

        return $result;
    }

    public function recupUser($user_id){
        $query= "SELECT nom from t_rubrique";
        $params = array($user_id);
        $result = $this->connexion->selectQuery($query,$params);
        return $result;
    }
}