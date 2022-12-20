<?php
require_once("modelo/user.php");
require_once("modelo/portafolio.php");
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

    public static function cerrarSesion()
    {
        session_start();
        session_unset();
        session_destroy();
        header('Location:' . URL);
    }

    public static function guardarFichero($nobreFichero, $fichero)
    {

        if ($fichero['contentFile']['size'] > 0) {

            //Donde se Guardara el fichero
            $target_dir =  "upload/" . $fichero["contentFile"]["name"];

            // Obtener EXTENSION del archivo
            $imageFileType = strtolower(pathinfo($target_dir, PATHINFO_EXTENSION));

            // Comprobar si EXISTE el archivo
            if (file_exists($target_dir)) {

                header('Location:views/project.php?error=existe');
            } else {
                if ($imageFileType == 'png' or $imageFileType == 'jpg') {

                    // Guardar el ARCHIVO
                    move_uploaded_file($fichero['contentFile']['tmp_name'], $target_dir);

                    //BD save
                    $portafolio = new Portafolio();
                    $portafolio->insertPortafolio($nobreFichero, $target_dir);

                    header('Location:views/project.php?error=sucess');
                } else {

                    //No tiene la extension correcta
                    header('Location:views/project.php?error=extension');
                }
            }
        } else {
            //Archivo vacio
            header('Location:views/project.php?error=empty');
        }
    }
}
