<?php

//Por favor, diligencie la siguiente información:

$servername = "localhost";
$username = "xxxx";
$password = "xxxx";
$dbname = "xxxx";

//Conectar al servidor
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Comprobar conexión
if (!$conn) {
    die("Fallo en la conexión: " . mysqli_connect_error());
}

// Definir ruta absoluta

define('RAIZ_APLICACION', dirname(__FILE__))

?>