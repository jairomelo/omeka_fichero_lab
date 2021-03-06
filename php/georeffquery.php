
<?php

include('config.php');

// conectar con db
$conn = mysqli_connect($servername, $username, $password, $dbname);
// check connection
if ($conn->connect_error) {
     die(":\ Falló la conexión: " . $conn->connect_error);
} 

//datos a seleccionar
// sql query: SELECT * FROM `omeka_locations` WHERE...
$sql = "SELECT * FROM `omeka_locations`, `omeka_element_texts` WHERE omeka_element_texts.record_type = \"item\" AND omeka_element_texts.element_id = 50 AND omeka_locations.item_id = omeka_element_texts.record_id";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Exportar tabla relaciones de elementos</title>
</head>
<body>
<form method="post" action="exportar_geo_savecsv.php">
	<input type="submit" name="export" value="Exportar CSV" />
</form>
<table>
	<tr>
		<th>Título</th>
		<th>Dirección</th>
		<th>Latitud</th>
		<th>Longitud</th>
	</tr>
	<?php 
	while($row = mysqli_fetch_array($result))
	{
		?>
		<tr>
			<td><?php echo $row["text"]; ?></td>
			<td><?php echo $row["address"]; ?></td>
			<td><?php echo $row["latitude"]; ?></td>
			<td><?php echo $row["longitude"]; ?></td>
		</tr>
	<?php
	}
	?>
</table>


</body>
</html>

