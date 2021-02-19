<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//readind the tweeds
require_once './Conexion.php';

$conexion = new Conexion();
$sql = "Select * from posts";
$resultado = $conexion->devolverResultados($sql);
$conexion->CerrarConexion();

echo json_encode(array('response' => 'success', 'result' => $resultado));
