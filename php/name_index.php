<?php

include('config.php');

$sql = "SELECT * FROM `omeka_element_texts` WHERE `element_id` = 238 ORDER BY `text` ASC";
$result = $conn->query($sql);

//resultados
echo nl2br ("Listado de nombres: \n <br />");

if ($result->num_rows > 0) {
     // extraer datos de cada columna
     while($row = $result->fetch_assoc()) {
         echo " * <a href='/items/show/".$row ['record_id']."' target='blank'>".$row  ['text']."</a> <br />";
     }
} else {
     echo "0 results";
}

$conn->close();
?>