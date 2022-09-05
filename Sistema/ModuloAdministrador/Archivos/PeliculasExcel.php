<?php
	header('Content-type:application/vnd.ms-excel; charset=UTF-8"');
	header('Content-Disposition: attachment; filename=Peliculas.xls');

include("../../../conexion.php");
header('Content-Type: text/html; charset=UTF-8');
?>

<?php

	$query = "SELECT * FROM PELICULA";
	$result = mysqli_query($con, $query);
?>

<table>
<caption>Lista de peliculas</caption>
	<tr>
		<th style="background-color: #46D900">Titulo</th>
        <th style="background-color: #46D900">Idioma</th>
        <th style="background-color: #46D900">Fecha</th>
		<th style="background-color: #46D900">Duración</th>
	</tr>
	<?php
		while ($row=mysqli_fetch_assoc($result)) {
			?>
				<tr>
					<td><?php echo $row['nom_pelicula']; ?></td>
					<td><?php echo $row['idioma_pelicula']; ?></td>
					<td><?php echo $row['fecha_pelicula']; ?></td>
					<td><?php echo $row['duracion_pelicula']; ?></td>
				</tr>	

			<?php
		}

	?>
</table>