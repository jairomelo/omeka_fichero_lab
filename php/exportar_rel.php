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
      fputcsv($output, array('elemento_sujeto', 'Relación', 'Elemento_objeto'));  
      $query = "SELECT `subject_item_id`,`property_id`,`object_item_id` FROM `omeka_item_relations_relations`";  
      $result = mysqli_query($conn, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
 }  
 ?>  