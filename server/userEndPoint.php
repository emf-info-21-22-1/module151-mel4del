<?php
header("Access-Control-Allow-Origin:    http://delatenam01.emf-informatique.ch/151/client");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Authorization");



require_once ("controller/SessionManager.php");
require_once ("controller/UserManager.php");

$userCtrl = new UserManager();
//POST pour créer user


if (isset($_SERVER['REQUEST_METHOD'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        switch ($_GET['action']) {
            case 'getAll':
                echo $userCtrl->getAll();
        }

    }

}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    switch ($_POST['action']) {
        case 'add':
            if ((isset($_POST['username']) && isset($_POST['password']) && isset($_POST['isAdmin']))) {
                echo $userCtrl->createUser($_POST['username'], $_POST['password'], $_POST['isAdmin']);
                break;
            }
        case 'login':
            if ((isset($_POST['usernameChk']) && isset($_POST['passwordChk']))) {
                echo $userCtrl->login($_POST['usernameChk'], $_POST['passwordChk']);
                break;
            }
        case 'disconnect':
            echo "salut";
            echo $userCtrl->disconnect($_POST['nom']);
            break;

        case 'admin':
            if ((isset($_POST['usernameChk']) && isset($_POST['passwordChk']))) {
                echo $userCtrl->admin($_POST['usernameChk'], $_POST['passwordChk']);
            }
    }


}




?>