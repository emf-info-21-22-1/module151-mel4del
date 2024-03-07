<?php
require_once("worker/Connexion.php");
require_once("beans/User.php");

class UserDBManager
{
    private $db;
    private $user;

    public function __construct()
    {
        $this->db = new Connexion();
        $this->user = new User(0, "xxx", "xxx", 0);
    }

    public function addUser($nom, $mdp, $isAdmin)
    {


        if (empty($nom) || empty($mdp) || empty($isAdmin)) {

            $hashedMdp = password_hash($mdp, PASSWORD_DEFAULT);
            $nbUser = $this->countUser();
            //        echo $nbUser;
            $params = array('id' => $nbUser + 1, 'nom' => $nom, 'password' => $hashedMdp, 'isAdmin' => $isAdmin);
            $sql = Connexion::getInstance()->executeQuery("INSERT INTO t_user (pk_user, nom, mdp, isAdmin) VALUES (:id, :nom, :password, :isAdmin);", $params);




            if ($sql == false) {
                return 'false';
            } else {
                return 'true';
            }
        }



        return false;





    }

    public function recupUser($nom): string
    {
        $query = $this->db->selectQuery("SELECT pk_user, nom, mdp, isAdmin FROM t_user", $nom);
        $user = array();
        foreach ($query as $row) {
            $user = new User($row->pk_user, $row->name, $row->mdp, $row->isAdmin);
            return $user;

        }
    }

    public function checkUser($nom, $mdp)
    {
        $params = array('nom' => $nom);
        echo $nom;
        $query = $this->db->selectQuery("SELECT * FROM t_user WHERE nom=:nom;", $params);

        $mdpDB = "";
        echo count($query);

        foreach ($query as $row) {
            echo $row['mdp'];
            if ($row['mdp']) {

                $this->user->setMdp($row['mdp']);
                $mdpDB = $this->user->getmdp();
            }

            if (password_verify($mdp, $mdpDB)) {
                $result = "ok";
            } else {


                $result = "ok";



            }
            return $result;


        }
    }
    public function getAll()
    {
        //retourne une liste de messages
        $query = $this->db->selectQuery("select pk_user, nom, mdp, isAdmin from t_user;", null);
        $usersList = array();
        foreach ($query as $row) {
            $user = new User($row['pk_user'], $row['nom'], $row['mdp'], $row['isAdmin']);
            $usersList[] = $user;
        }
        return $usersList;
    }

    public function countUser()
    {
        $query = $this->db->selectQuery("SELECT pk_user, nom, mdp, isAdmin FROM t_user;", null);
        $usersList = array();
        foreach ($query as $row) {
            $user = new User($row['pk_user'], $row['nom'], $row['mdp'], $row['isAdmin']);
            $usersList[] = $user;
            // echo count($usersList);

        }
        return count($usersList);
    }
}
?>