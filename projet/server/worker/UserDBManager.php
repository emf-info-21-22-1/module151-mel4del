<?php
require_once("worker/Connexion.php");
require_once("beans/User.php");

class UserDBManager
{
    private $db;

    public function __construct()
    {
        $this->db = new Connexion();
    }

    public function addUser($nom, $mdp, $isAdmin): bool
    {
        if (empty($nom) || empty($mdp) || empty($isAdmin)) {
            return false;
        }
        $hashedMdp = password_hash($mdp, PASSWORD_DEFAULT);

       
        $sql = $this->db->executeQuery("insert into t_user (nom, mdp, isAdmin) VALUES (?, ?, ?);", array($nom, $mdp, $isAdmin));

        //oui == 1 non ==0
        $count = $sql->rowCount();
        if ($count > 0) {
            return true;
        } else {
            return false;
        }




    }

    public function recupUser($nom): string
    {
        $query = $this->db->selectQuery("select pk_user, nom, mdp, isAdmin from t_user", $nom);
        $user = array();
        foreach ($query as $row) {
            $user = new User($row->pk_user, $row->name, $row->mdp, $row->isAdmin);
            return $user;

        }
    }

    public function checkUser($nom, $mdp): string
    {
        $query = $this->db->selectQuery('select nom, mdp from t_user', $nom);
        if ($row = !null) {
            foreach ($query as $row) {
                if ($row->mdp == $mdp) {
                    return "ok";
                } else {
                    return "erreur";
                }


            }

        } else {
            return "pas de user";
        }
    }
    public function getAll()
    {
        //retourne une liste de messages
        $query = $this->db->selectQuery("select pk_user, nom, mdp, isAdmin from t_user;", null);
        $messagesList = array();
        foreach ($query as $row) {
            $message = new User($row['pk_user'], $row['nom'], $row['mdp'], $row['isAdmin']);
            $messagesList[] = $message;
        }
        return $messagesList;
    }
}
?>