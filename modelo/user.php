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

    public   function createUser($user, $pssw)
    {
        try {

            #Obtener conexion
            $this->getConexion();

            #SQL
            $queryInsert = "INSERT INTO " . $this->tabla .  "(user, passwd) VALUES (?, ?);";
            $querySearch = "SELECT * FROM " . $this->tabla . " WHERE user=?;";

            #Preparar SQL
            $smt1 = $this->conexionModel->prepare($querySearch);
            $smt1->execute([$user]);

            if (empty($smt1->fetchAll())) {
                #Preparar SQL
                $smt2 = $this->conexionModel->prepare($queryInsert);

                #Ejecutar SQL
                $smt2->execute([$user, $pssw]);
            } else {
                echo 'Usuario existe';
            }
        } catch (PDOException $e) {

            #Notificar error
            echo 'Erorr Conexion: ' . $e->getMessage();
            exit();
        } finally {

            #Cerrar conexion
            $smt1 = null;
            $smt2 = null;
        }
    }
}
