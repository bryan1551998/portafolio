<?php

require_once 'conexion.php';

class User
{

    #Atributos
    private $tabla = 'user';
    private $conexionModel;

    #Constructor
    public function __construct()
    {
    }

    #Obtener la conexion
    public function getConexion()
    {
        #Crear objeto conexion
        $dbObject = new Conexion();

        #Guardar conexion
        $this->conexionModel = $dbObject->conexion;
    }

    public function createUser($user, $pssw)
    {
        #Encriptar contraseña
        $pssw = password_hash($pssw, PASSWORD_BCRYPT);
        try {

            #Obtener conexion
            $this->getConexion();

            #SQL
            $queryInsert = "INSERT INTO " . $this->tabla .  "(user, passwd) VALUES (?, ?);";
            $querySearch = "SELECT * FROM " . $this->tabla . " WHERE user=?;";

            #Preparar SQL
            $smt1 = $this->conexionModel->prepare($querySearch);
            $smt1->execute([$user]);

            #Comprobar Si el usuario existe
            if (empty($smt1->fetchAll())) {
                #Preparar SQL
                $smt2 = $this->conexionModel->prepare($queryInsert);

                #Ejecutar SQL
                $smt2->execute([$user, $pssw]);

                #Redirect Usuario existe
                header('Location:views/registro.php?error=sucess');
            } else {
                #Redirect Usuario ya existe 
                header('Location:views/registro.php?error=existe');
            }
        } catch (PDOException $e) {

            #Notificar error
            echo 'Erorr en crear USER: ' . $e->getMessage();
            exit();
        } finally {

            #Cerrar conexion
            $smt1 = null;
            $smt2 = null;
        }
    }

    public function userLogin($user, $pssw)
    {

        try {
            #Obtener conexion
            $this->getConexion();

            #SQL
            $query1 = "SELECT passwd FROM " . $this->tabla .  " WHERE user=?;";

            #Preparar SQL
            $smt1 = $this->conexionModel->prepare($query1);
            $smt1->execute([$user]);

            #Guardar resultado
            $result = $smt1->fetchAll();

            #Comprobar SI el usuario existe
            if (!empty($result)) {

                #Obtener contraseña
                $passHash = $result[0]['passwd'];

                #Verificar si la contraseña es correcta
                if (password_verify($pssw, $passHash)) {
                    session_start();
                    $_SESSION["userSession"] = $user;
                    header('Location:views/project.php');
                } else {
                    header('Location:views/login.php?error=campos');
                }
            } else {
                header('Location:views/login.php?error=existe');
            }
        } catch (PDOException $e) {

            #Notificar error
            echo 'Erorr en hacer LOGIN: ' . $e->getMessage();
            exit();
        } finally {

            #Crerrar sesion
            $smt1 = null;
        }
    }
}
