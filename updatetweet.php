<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//The tweets content could be updated

require_once './Conexion.php';

if (isset($_POST["tweet"]) && isset($_POST["id"])) {

    extract($_POST);
    if (mb_strlen(trim($tweet)) > 0 && is_numeric($id)) {
        $tweet = trim($tweet);
        $tweet = addslashes($tweet);
        $conexion = new Conexion();
        $sql = "Update posts set tweet='$tweet',time='" . date("y-m-d") . "' where id=$id";
        $resultado = $conexion->ejecutarConsulta($sql);
        $conexion->CerrarConexion();
        if ($resultado != false) {

            echo json_encode(array('response' => 'success',"result"=> date("y-m-d")));
        } else {
            echo json_encode(array('response' => 'error', 'result' => 'Could not udate that tweet'));
        }
    } else {
        echo json_encode(array('response' => 'error', 'result' => 'Please write something before posting'));
    }
} else {
    echo json_encode(array('response' => 'error', 'result' => 'Invalid activity'));
}
