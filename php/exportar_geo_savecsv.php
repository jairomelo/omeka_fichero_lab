<?php

include('config.php');
      //export.php  
 if(isset($_POST["export"]))  
 {  
      $conn = mysqli_connect($servername, $username, $password, $dbname);
		// check connection
		if ($conn->connect_error) {
		     die(":\ Falló la conexión: " . $conn->connect_error);
		}
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=data.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('Título', 'Dirección', 'Latitud', 'Longitud'));  
      $query = "SELECT * FROM `omeka_locations`, `omeka_element_texts` WHERE omeka_element_texts.record_type = \"item\" AND omeka_element_texts.element_id = 50 AND omeka_locations.item_id = omeka_element_texts.record_id";  
      $result = mysqli_query($conn, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
 }  
 ?>  