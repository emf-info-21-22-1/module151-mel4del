<?php
require_once ("worker/Connexion.php");
require_once ("beans/User.php");

class UserDBManager
{
    private $db;
    private $user;

    public function __construct()
    {
        $this->db = Connexion::getInstance();
        $this->user = new User(0, "xxx", "xxx", 0);
    }

    public function addUser($nom, $mdp, $isAdmin)
    {
        if (!empty($nom) && !empty($mdp)) {

            $hashedMdp = password_hash($mdp, PASSWORD_DEFAULT);
            $params = array('nom' => $nom, 'passwd' => $hashedMdp, 'isAdmin' => $isAdmin);
            try {
                $sql = $this->db->executeQuery("INSERT INTO T_user (nom, mdp, isAdmin) VALUES (:nom, :passwd, :isAdmin);", $params);
            } catch (Exception $e) {
                echo "Erreur : " . $e->message;
            }


            if ($sql) {
                http_response_code(200);
                return true;
            } else {
                http_response_code(500);
                return false;
            }
        }


        return false;
    }

    public function recupUser($nom): User
    {
        $params = array('nom' => $nom);
        $query = $this->db->selectQuery("SELECT pk_user, nom, mdp, isAdmin FROM T_user WHERE nom=:nom;", $params);
        $user = new User(0, "xxx", "xx", 0);
        foreach ($query as $row) {

            $user = new User($row['pk_user'], $row['nom'], $row['mdp'], $row['isAdmin']);
            if ($user->getNom() == $nom) {
                return $user;
            }
        }
        return $user;
    }

    public function checkUser($nom, $mdp)
    {
        $params = array('nom' => $nom);
        $query = $this->db->selectQuery("SELECT * FROM T_user WHERE nom=:nom;", $params);
        if (count($query) > 0) {

            $passwordFromDB = $query[0]['mdp'];
            if (password_verify($mdp, $passwordFromDB)) {
                $result = "ok";
            } else {


                $result = "pas ok";
            }
            return $result;
        }
    }
    public function getAll()
    {
        //retourne une liste de messages
        $query = $this->db->selectQuery("SELECT pk_user, nom, mdp, isAdmin FROM T_user;", null);
        $usersList = array();
        foreach ($query as $row) {
            $user = new User($row['pk_user'], $row['nom'], $row['mdp'], $row['isAdmin']);
            $usersList[] = $user;
        }
        http_response_code(200);
        return $usersList;
    }

    public function countUser()
    {

        http_response_code(200);
        return count($this->getAll());
    }

    public function checkAdmin($nom, $mdp)
    {
        $params = array('nom' => $nom);
        $query = $this->db->selectQuery("SELECT * FROM T_user WHERE nom=:nom;", $params);
        if (count($query) > 0) {

            $passwordFromDB = $query[0]['mdp'];
            if (password_verify($mdp, $passwordFromDB)) {


            } else {


                $result = "pas ok";
            }
            if ($query[0]['isAdmin']) {
                $result = "ok";
            } else {
                $result = "not Admin";
            }
            return $result;
        }
    }
}
