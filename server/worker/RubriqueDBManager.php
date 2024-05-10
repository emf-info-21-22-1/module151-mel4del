<?php
require_once ('Connexion.php');
require_once ('beans/Rubrique.php');
class RubriqueDBManager
{

    public $connexion = null;
    public $rubrique;

    public function __construct()
    {
        $this->connexion = Connexion::getInstance();
        $this->rubrique = new Rubrique(0, "xxx");
    }
    public function addRubrique($rubrique)
    {
        $nbUser = $this->countRubrique();

        $params = array('nom' => $rubrique);
        $query = "INSERT INTO t_rubrique (nom) VALUES (:nom)";
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

    public function checkRubrique($rubrique)
    {
        $params = array('nom' => $rubrique);
        $query = $this->connexion->selectQuery("SELECT * FROM t_rubrique WHERE nom=:nom;", $params);
        if (count($query) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function findRubriqueID($rubrique)
    {
        $params = array('nom' => $rubrique);
        echo $rubrique;
        $query = $this->connexion->selectQuery("SELECT pk_rubrique FROM t_rubrique WHERE nom=:nom;", $params);
        foreach ($query as $row) {
            $id = $row['pk_rubrique'];
            return $id;
        }
    }
}