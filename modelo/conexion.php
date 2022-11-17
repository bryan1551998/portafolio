<?php
class Conexion
{

    #Atributos de la conexion
    private $host = 'localhost';
    private $dbname = 'bd_php_develoteca';
    private $dbpassword = '';
    private $dbusername = 'root';
    private $conexion;

    public function __construct()
    {
        try {

            #Crear conexion
            $this->conexion = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->dbusername, $this->dbpassword);

            #Error Exeption
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            echo 'Succes';
        } catch (Exception $e) {

            #Notificar error
            echo 'Erorr Conexion: ' . $e->getMessage();
            exit();
        }
    }
}
