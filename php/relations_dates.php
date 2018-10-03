<?php

include('config.php');

// esquema de la tabla

echo "<table style='border: solid 1px black;'>";
  echo "<tr>
  <th>id registro</th>
  <th>#id del sujeto</th>
  <th>código de la relación</th>
  <th>#id del objeto</th>
  <th>id del elemento</th>
  <th>tipo de elemento</th>
  <th>código del elemento fecha</th>
  <th>error :p</th>
  <th>fecha del elemento</th>
  </tr>";

// script para construir la tabla

class TableRows extends RecursiveIteratorIterator { 
     function __construct($it) { 
         parent::__construct($it, self::LEAVES_ONLY); 
     }

     function current() {
         return "<td style='width: 150px; border: 1px solid black;'>" . parent::current(). "</td>";
     }

     function beginChildren() { 
         echo "<tr>"; 
     } 

     function endChildren() { 
         echo "</tr>" . "\n";
     } 
}

// conectar a mysql y hacer la búsqueda

try {
     $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $stmt = $conn->prepare("SELECT * FROM `omeka_item_relations_relations`, `omeka_element_texts` WHERE omeka_element_texts.record_type = \"item\" AND omeka_element_texts.element_id = 40 AND omeka_item_relations_relations.object_item_id = omeka_element_texts.record_id"); 
     $stmt->execute();

     // set the resulting array to associative
     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

     
     foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
         echo $v;
     }
}
catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";

?>