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
                http_response_code(500);
                return 'false';

            } else {
                http_response_code(200);
                return 'true';
            }
        }



        return false;





    }

    public function recupUser($nom): User
    {
        $params = array('nom' => $nom);
        $query = $this->db->selectQuery("SELECT pk_user, nom, mdp, isAdmin FROM t_user WHERE nom=:nom;", $params);
        $user = new User(0, "xxx", "xx", 0);
        foreach ($query as $row) {
            $user = new User($row['pk_user'], $row['nom'], $row['mdp'], $row['isAdmin']);

        }
        return $user;
    }

    public function checkUser($nom, $mdp)
    {
        $params = array('nom' => $nom);
        $query = $this->db->selectQuery("SELECT * FROM t_user WHERE nom=:nom;", $params);
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
        $query = $this->db->selectQuery("select pk_user, nom, mdp, isAdmin from t_user;", null);
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