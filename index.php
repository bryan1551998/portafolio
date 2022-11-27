<?php

$page = '';

if (isset($_GET['page'])) {
    $page = $_GET['page'];
}

switch ($page) {
    case 'login':

        header('Location:views/login.php');
        break;

    case 'register':
        require_once("modelo/user.php");

        if (!empty($_POST['userLogin']) and !empty($_POST['passwordLogin'])) {

            $user = new User();
            $user->createUser($_POST['userLogin'], $_POST['passwordLogin']);
        } else {
            header('Location:views/register.php?error=campos');
        }

        break;

    default:

        header('Location:views/login.php');

        break;
}
