<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//for posttweets it will accept a POST request of tweet text
require_once './Conexion.php';
if (isset($_POST["tweet"])) {
    extract($_POST);
    if (mb_strlen(trim($tweet)) > 0) {
        $tweet = trim($tweet);
        $tweet = addslashes($tweet);
        //if (!is_numeric($tweet)) {
        $conexion = new Conexion();
        $sql = "Insert into posts (tweet,time) values('$tweet','" . date("y-m-d") . "');";
        $resultado = $conexion->ejecutarConsulta($sql);
        $resultado=$conexion->devolverResultados("select id from posts order by id desc limit 1");
        $valor=$resultado[0];
        $conexion->CerrarConexion();
        //} else {
        //    $resultado = false;
        // }

        if ($resultado != false) {

            echo json_encode(array('response' => 'success', "date" => date("y-m-d"), "result" => $valor));
        } else {
            echo json_encode(array('response' => 'error1', 'result' => 'Could not save your tweet'));
        }
    } else {
        echo json_encode(array('response' => 'error2', 'result' => 'Please write something before posting'));
    }
} else {
    echo json_encode(array('response' => 'error3', 'result' => 'Invalid activity'));
}
