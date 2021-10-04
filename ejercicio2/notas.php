<?php 
	include "estilo.inc.php"; 
	include "conexion.inc.php";
	session_start();
	$query = mysqli_query($conn, "SELECT * FROM PERSONA WHERE CI=".$_SESSION["ciuser"]);
	$data = mysqli_fetch_array($query);
	$res = mysqli_num_rows($query);
	
	$sql="select * from nota WHERE CI=".$_SESSION["ciuser"];
	$resultado=mysqli_query($conn, $sql);
	
	$_SESSION['nombreu'] = $data['nombre_completo'];
	$_SESSION['rolu'] = $data['rol'];
	$_SESSION['departamentou'] = $data['departamento'];
	$_SESSION['fechanu'] = $data['fecha_naciminto'];
?>

<title>Notas FCPN</title>
<style>
header {
  text-transform: capitalize;
}
</style>

<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-red w3-card w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="index.php" class="w3-bar-item w3-button w3-padding-large w3-white">Principal</a>
    <a href="./informatica/index.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Informatica</a>
    <a href="./estadistica/index.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Estadistica</a>
    <a href="./fisica/index.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Fisica</a>
	<a href="#" class="w3-bar-item w3-button w3-padding-large">Notas</a>
	<a href="salir.php" class="w3-bar-item w3-button w3-padding-large">Salir</a>
  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
    <a href="./informatica/index.php" class="w3-bar-item w3-button w3-padding-large">Informatica</a>
    <a href="./estadistica/index.php" class="w3-bar-item w3-button w3-padding-large">Estadistica</a>
    <a href="./fisica/index.php" class="w3-bar-item w3-button w3-padding-large">Fisica</a>
	<a href="notas.php" class="w3-bar-item w3-button w3-padding-large">Notas</a>
	<a href="salir.php" class="w3-bar-item w3-button w3-padding-large">Salir</a>
  </div>
</div>

<!-- Header -->
<header style="padding:30px 10px">
  <p class="w3-xlarge"> <br> <?php print_r( $_SESSION['nombreu'] ); ?> </br> <?php print_r( $_SESSION['rolu'] ); ?> </p>
</header>

<?php
if($_SESSION['rolu'] == 'estudiante'){
	echo "<table border='1'>";
		echo "<tr>";
			echo "<th>CI</th>";
			echo "<th>Sigla</th>";
			echo "<th>Nota 1</th>";
			echo "<th>Nota 2</th>";
			echo "<th>Nota 3</th>";
			echo "<th>Nota Final</th>";
		echo "</tr>";
		
			while($fila=mysqli_fetch_array($resultado)) {
				echo "<tr>";
				echo "<td>".$fila["ci"]."</td>";
				echo "<td>$fila[sigla]</td>";
				echo "<td>".$fila['nota1']."</td>";
				echo "<td>".$fila['nota2']."</td>";
				echo "<td>".$fila['nota3']."</td>";
				echo "<td>".$fila['notafinal']."</td>";
				echo "</tr>";
			}
				
	echo "</table>";
}
else {
	
	$cons="SELECT pe.departamento, avg(nota.notafinal) as Promedio". 
		   " FROM nota, persona pe WHERE nota.ci = pe.ci".
		   " GROUP BY pe.departamento". 
		   " order by pe.departamento;";
	$prom = mysqli_query($conn, $cons);
	$p2 = mysqli_query($conn, $cons);
	$res = mysqli_num_rows($prom);
	
	
	
	echo "<table border='1'>";
		echo "<tr>";
		while($fila=mysqli_fetch_array($prom)) {
			echo "<th>".$fila['departamento']."</th>";
		}
		echo "</tr>";
		
		echo "<tr>";
		while($fila=mysqli_fetch_array($p2)) {	
			echo "<td>".$fila['Promedio']."</td>";
		}
		echo "</tr>";
		
	echo "</table>";
	
}


include "pie.inc.php"; ?>