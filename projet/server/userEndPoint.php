<?php

require_once("controller/SessionManager.php");
require_once("controller/UserManager.php");

$userCtrl = new UserManager();
//POST pour créer user
if (isset($_SERVER['REQUEST_METHOD'])) {
    if ($_SERVER['REQUEST_METHOD'] == $_POST) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $isAdmin = $_POST['isAdmin'];

        echo $userCtrl->createUser($username, $password, $isAdmin);
        
     
    }
}

if (isset($_SERVER['REQUEST_METHOD'])) {
    if ($_SERVER['REQUEST_METHOD'] == $_GET) {
        $username = $_GET['action']['username'];

        return $userCtrl->getUser($username);
    }

}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if ($_GET['action'] == "getAll") {
        http_response_code(200);
        echo $userCtrl->getAll();
    }
}



?>