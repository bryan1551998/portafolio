<?php
require_once("modelo/user.php");

class Controller
{

    public static function registerUser($user, $psswd)
    {
        if (!empty($_POST['userLogin']) and !empty($_POST['passwordLogin'])) {
            $userObject = new User();
            $userObject->createUser($user, $psswd);
        } else {
            header('Location:views/registro.php?error=campos');
        }
    }

    public static function loginUser($user, $psswd)
    {
        $userObject = new User();
        $userObject->userLogin($user, $psswd);
    }
}
