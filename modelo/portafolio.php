<?php

require_once 'conexion.php';

class Portafolio
{
    #Atributos
    private $table = 'portafolio';
    private $conexionModel;

    #Constructor
    public function __construct()
    {
    }

    #Obeter conexion
    public function getConexion()
    {
        #Crear objeto conexion
        $dbObject = new Conexion();

        #Guardar conexion
        $this->conexionModel = $dbObject->conexion;
    }

    #Obtener todos los portafolios
    public function getPortafolio()
    {
        try {

            #Obtener conexion
            $this->getConexion();

            #SQL
            $quey = 'SELECT * FROM ' . $this->table;

            #Preparar SQL
            $smt = $this->conexionModel->prepare($quey);

            #Ejecutar SQL
            $smt->execute();

            #Resultado
            return $smt->fetchAll();
        } catch (PDOException  $e) {

            #Notificar error
            echo 'Erorr Conexion: ' . $e->getMessage();
            exit();
        } finally {

            #Cerrar conexion
            $smt = null;
        }
    }

    #Insert 
    public function insertPortafolio($nobreFichero, $target_dir)
    {
        try {

            #Obtener conexion
            $this->getConexion();

            #SQL
            $quey = 'INSERT INTO ' . $this->table . " (nombre,ruta) VALUES ('" . $nobreFichero . "','" . $target_dir . "');";

            #Preparar SQL
            $smt = $this->conexionModel->prepare($quey);

            #Ejecutar SQL
            $smt->execute();

            // #Resultado
            // return $smt->fetchAll();
        } catch (PDOException  $e) {

            #Notificar error
            echo 'Erorr Conexion: ' . $e->getMessage();
            exit();
        } finally {

            #Cerrar conexion
            $smt = null;
        }
    }
}
