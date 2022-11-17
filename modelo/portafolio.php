<?php

require_once 'conexion.php';

class Portafolio
{

    public function insertPorafolio($query)
    {
        $conexion = new conexion();

        $conexion->db();
    }
}

$con = new consultas();

$con->insertPorafolio('ff');
