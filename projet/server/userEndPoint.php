<?php
header("Access-Control-Allow-Origin:    http://localhost:8081/server");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Authorization");



require_once("controller/SessionManager.php");
require_once("controller/UserManager.php");

$userCtrl = new UserManager();
//POST pour créer user

if ($_SERVER['REQUEST_METHOD'] == 'POST') {



}

if (isset($_SERVER['REQUEST_METHOD'])) {
    if ($_SERVER['REQUEST_METHOD'] == $_GET) {
        $username = $_GET['action']['username'];
        return $userCtrl->getUser($username);
    }

}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ((isset($_POST['username']) && isset($_POST['password']) && isset($_POST['isAdmin']))) {
        echo $userCtrl->createUser($_POST['username'], $_POST['password'], $_POST['isAdmin']);
      
    } else if((isset($_POST['usernameChk']) && isset($_POST['passwordChk']))){
        echo $userCtrl->register($_POST['usernameChk'], $_POST['passwordChk']);

    }elseif ((isset($_POST['disconnect']))) {
        echo $userCtrl->disconnect($_POST['disconnect']);
    }

    }







?>