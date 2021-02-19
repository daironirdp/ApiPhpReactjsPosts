<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//The tweets content could be deleted

require_once './Conexion.php';

if (isset($_POST["id"])) {

    extract($_POST);
    if (is_numeric($id)) {
        $conexion = new Conexion();
        $sql = "Delete from posts where id=$id";
        $resultado = $conexion->ejecutarConsulta($sql);

        $conexion->CerrarConexion();
        if ($resultado != false) {

            echo json_encode(array('response' => 'success'));
        } else {
            echo json_encode(array('response' => 'error', 'result' => 'Could not delete that tweet'));
        }
    } else {
        echo json_encode(array('response' => 'error', 'result' => 'It is something wrong with the id'));
    }
} else {
    echo json_encode(array('response' => 'error', 'result' => 'Invalid activity'));
}
