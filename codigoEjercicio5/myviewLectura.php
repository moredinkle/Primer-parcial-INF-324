<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include 'estilo.inc.php';
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>INF 324</title>
	<style type="text/css">
	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}
	</style>
</head>
<body>
	<h1>Docentes</h1>
	<h3>Facultad Ciencias Puras y Naturales</h3>
	<table>
		<tr>
			<th>CI</th>
			<th>Nombre Completo</th>
			<th>Fecha Nacimiento</th>
			<th>Departamento</th>
			<th>Rol</th>
			<th>Operaciones</th>
		</tr>
		<?php
			foreach($personas as $persona){
				echo '<tr>';
				echo '<td>'.$persona->ci.'</td>';
				echo '<td>'.$persona->nombre_completo.'</td>';
				echo '<td>'.$persona->fecha_nacimiento.'</td>';
				echo '<td>'.$persona->departamento.'</td>';
				echo '<td>'.$persona->rol.'</td>';
				echo "<td>";
				echo "<a href=".base_url()."index.php/Lectura2/editar/".$persona->ci.">Editar</a>";
				echo " - ";
				echo "<a href=".base_url()."index.php/Lectura2/eliminar/".$persona->ci.">Eliminar</a>";
				echo "</td>";
				echo'<tr/>';
			}
		?> 
	</table>
	<a href="<?=base_url()?>index.php/Lectura2/agregar">Agregar</a>
	</form>
</body>
</html>