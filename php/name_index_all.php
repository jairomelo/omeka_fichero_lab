<?php

include('config.php');

// conectar con db
$conn = new mysqli($servername, $username, $password, $dbname);
// check connection
if ($conn->connect_error) {
     die(":\ Falló la conexión: " . $conn->connect_error);
}

$sql = "SELECT * FROM `omeka_element_texts` WHERE `element_id` =39 OR `element_id` =232 OR `element_id`=234 OR `element_id`=235 OR `element_id`=238 OR `element_id`=240 OR `element_id`=241 OR `element_id`=242 OR `element_id`=250 ORDER BY `text` ASC";
$result = $conn->query($sql);

echo nl2br (" \n <br />");

//resultados
echo nl2br ("<b>Listado de nombres</b>: <br /> Los nombres que finalizan con un * son personajes favorecidos con un indulto<br />Entre corchetes el número del item que contiene el nombre \n <br /><br />Total de resultados:");

//imprime la cantidad de resultados (filas) antes de la lista de nombres.
if ($result) {
	$row_cnt = mysqli_num_rows($result);
	echo "$row_cnt <br /><br />";
}

if ($result->num_rows > 0) {
     // extraer datos de cada columna
     while($row = $result->fetch_assoc()) {
         echo " • <a href='http://localhost/fichero/items/show/".$row ['record_id']."' target='blank'>".$row  ['text']." >> [" .$row ['record_id']."]</a> <br />";
     }
} else {
     echo "0 results";
}


$conn->close();
?>