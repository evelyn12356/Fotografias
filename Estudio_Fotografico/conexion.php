<?php
$servidor = "localhost"; 
$usuario = "root"; 
$clave = ""; 
$baseDatos = "fotos"; 

$enlace = new mysqli($servidor, $usuario, $clave, $baseDatos);

if ($enlace->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}
?>