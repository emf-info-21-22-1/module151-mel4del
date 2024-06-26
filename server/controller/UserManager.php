<?php
require_once ("./worker/UserDBManager.php");
class UserManager
{

    private $userDB;
    private $sessionManager;
    public function __construct()
    {
        $this->userDB = new UserDBManager();
        $this->sessionManager = SessionManager::getInstance();
    }
    public function createUser($nom, $mdp, $isAdmin)
    {

        $doublon = $this->getUser($nom);
        if ($doublon->getNom() !== $nom) {
            $result = $this->userDB->addUser($nom, $mdp, $isAdmin);
            if ($result == true) {
                $userConnected = $this->userDB->recupUser($nom);
                $this->sessionManager->set('username', $userConnected->getNom());
                $this->sessionManager->set('pk', $userConnected->getId());
                $this->sessionManager->set('right', $userConnected->isAdmin());
                $this->sessionManager->set('logged', true);
                http_response_code(200);
                return json_encode(array('success' => true, 'message' => 'utilisateur ajoute'));
            } else {
                http_response_code(500);
                return json_encode(array('erreur' => true, 'message' => 'Connexion Impossible', 'Userlogin' => $nom, 'UserMdp' => $mdp, "il y a un probleme"));
            }
        } else {
            http_response_code(401);
            return json_encode(array('erreur' => true, 'message' => 'Connexion Impossible', 'Userlogin' => $nom, 'UserMdp' => $mdp, "l'utilisateur existe déjà"));
        }
    }

    public function getUser($nom): User
    {

        return $this->userDB->recupUser($nom);
    }
    public function login($nom, $mdp)
    {
        $result = $this->userDB->checkUser($nom, $mdp);
        if ($result == "ok") {
            $userConnected = $this->userDB->recupUser($nom);
            $this->sessionManager->set('username', $userConnected->getNom());
            $this->sessionManager->set('pk', $userConnected->getId());
            $this->sessionManager->set('right', $userConnected->isAdmin());
            $this->sessionManager->set('logged', true);
            http_response_code(200);
            return json_encode(array('success' => true, 'message' => 'Connexion possible', 'Userlogin' => $nom, 'UserMdp' => $mdp));
        } else {
            http_response_code(401);
            return json_encode(array('erreur' => true, 'message' => 'Connexion Impossible', 'Userlogin' => $nom, 'UserMdp' => $mdp, "mauvais username ou mauvais mot de passe"));
        }
    }

    public function getAll()
    {

        $listeMessage = $this->userDB->getAll();
        return json_encode(array("user" => $listeMessage));
    }

    public function disconnect($nom)
    {
        if ($this->sessionManager->get('username') == $nom) {
            if ($this->sessionManager->get('logged') == true) {
                $this->sessionManager->set('logged', false);
                $this->sessionManager->clear();
                return json_encode(array('success' => true, 'message' => 'Deconnexion reussie'));
            } else {
            }
        } else {
            return json_encode(array('error' => true, 'message' => "Deconnexion echoue. Il n'y a pas d'utilisateur connecte"));
        }
    }

    public function admin($nom, $password)
    {
        $result = $this->userDB->checkAdmin($nom, $password);
        if ($result == "ok") {
            $userConnected = $this->userDB->recupUser($nom);
            $this->sessionManager->set('username', $userConnected->getNom());
            $this->sessionManager->set('pk', $userConnected->getId());
            $this->sessionManager->set('right', $userConnected->isAdmin());
            $this->sessionManager->set('logged', true);
            http_response_code(200);
            return json_encode(array('success' => true, 'message' => 'Connexion possible'));
        } else {
            http_response_code(401);
            return json_encode(array('erreur' => true, 'message' => 'Connexion Impossible', "mauvais username ou mauvais mot de passe"));
        }
    }
}

