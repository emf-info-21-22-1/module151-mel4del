<?php
require_once('Connexion.php');
require_once('beans/Rubrique.php');
class RubriqueDBManager
{

    public $connexion = null;
    public $rubrique;

    public function __construct()
    {
        $this->connexion = new Connexion();
        $this->rubrique = new Rubrique(0, "xxx");
    }
    public function addRubrique($rubrique)
    {
        $nbUser = $this->countRubrique();

        $query = "INSERT INTO t_rubrique (pk_rubrique, nom) VALUES (:id, :rubrique);";
        $params = array('id' => $nbUser+1, 'rubrique' => $rubrique);
        $result = $this->connexion->executeQuery($query, $params);

        return $result;
    }

    // public function recupUser($user_id)
    // {
    //     $query = "SELECT nom from t_rubrique";
    //     $params = array($user_id);
    //     $result = $this->connexion->selectQuery($query, $params);
    //     return $result;
    // }

    public function countRubrique()
    {
        $query = $this->connexion->selectQuery("SELECT* FROM t_rubrique;", null);
        $usersList = array();
        foreach ($query as $row) {
            $user = new Rubrique($row['pk_rubrique'], $row['nom']);
            $usersList[] = $user;
            // echo count($usersList);

        }
        return count($usersList);
    }
}