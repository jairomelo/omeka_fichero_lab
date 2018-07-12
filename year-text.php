<?php

include('config.php');

// conectar con db
$conn = new mysqli($servername, $username, $password, $dbname);
// check connection
if ($conn->connect_error) {
     die(":\ Falló la conexión: " . $conn->connect_error);
} 

//datos a seleccionar
// sql query: SELECT * FROM `omeka_locations` WHERE...
$sql = "SELECT * FROM `omeka_element_texts` WHERE omeka_element_texts.record_type = \"item\" AND omeka_element_texts.element_id = 1";
$result = $conn->query($sql);

//resultados

if ($result->num_rows > 0) {
     // extraer datos de cada columna
     while($row = $result->fetch_assoc()) {
         echo "<br> Título: ". $row["text"]. " Dirección: ". $row["address"]. " - Latitud: ". $row["latitude"]. " Longitud: " . $row["longitude"] . "<br>";
     }
} else {
     echo "0 results";
}

$conn->close();
?>

<a href="csv.php" title="export as csv">Export as CSV</a>