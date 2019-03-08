
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
$sql = "SELECT `subject_item_id`,`property_id`,`object_item_id` FROM `omeka_item_relations_relations`";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Exportar tabla relaciones de elementos</title>
</head>
<body>
<form method="post" action="exportar_rel.php">
	<input type="submit" name="export" value="Exportar CSV" />
</form>
<table>
	<tr>
		<th>Elemento sujeto</th>
		<th>Relación</th>
		<th>Elemento objeto</th>
	</tr>
	<?php 
	while($row = mysqli_fetch_array($result))
	{
		?>
		<tr>
			<td><?php echo $row["subject_item_id"]; ?></td>
			<td><?php echo $row["property_id"]; ?></td>
			<td><?php echo $row["object_item_id"]; ?></td>
		</tr>
	<?php
	}
	?>
</table>


</body>
</html>

