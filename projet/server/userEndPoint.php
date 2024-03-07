<?php

require_once("controller/SessionManager.php");
require_once("controller/UserManager.php");

$userCtrl = new UserManager();
//POST pour créer user

if ($_SERVER['REQUEST_METHOD'] == 'POST') {



}

if (isset($_SERVER['REQUEST_METHOD'])) {
    if ($_SERVER['REQUEST_METHOD'] == $_GET) {
        $username = $_GET['action']['username'];
        http_response_code(200);
        return $userCtrl->getUser($username);
    }

}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ((isset($_POST['username']) && isset($_POST['password']) && isset($_POST['isAdmin']))) {
        echo $userCtrl->createUser($_POST['username'], $_POST['password'], $_POST['isAdmin']);
        http_response_code(200);
    } else {
        echo $userCtrl->checkUser($_POST['usernameChk'], $_POST['passwordChk']);
    }

}





?>