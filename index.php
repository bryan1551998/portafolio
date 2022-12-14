<?php
require_once("controller/controller.php");

$page = '';

if (isset($_GET['page'])) {
    $page = $_GET['page'];
}

switch ($page) {

    case 'login':

        header('Location:views/login.php');
        break;

    case 'loginUser':

        Controller::loginUser($_POST['userLogin'], $_POST['passwordLogin']);
        break;

    case 'register':

        Controller::registerUser($_POST['userLogin'], $_POST['passwordLogin']);
        break;

    case 'cerrarSesion':

        Controller::cerrarSesion();
        break;

    case 'guardarFichero':

        Controller::guardarFichero($_POST['nameProject'], $_FILES);
        break;

    default:

        header('Location:views/login.php');
        break;
}
