<?php 
include "estilo.inc.php";
require_once "conexion.inc.php";
session_start();
 ?>

<title>FCPN</title>

<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-red w3-card w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large w3-white">Principal</a>
    <a href="./informatica/index.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Informatica</a>
    <a href="./estadistica/index.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Estadistica</a>
    <a href="./fisica/index.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Fisica</a>
	<a href="notas.php" class="w3-bar-item w3-button w3-padding-large">Notas</a>
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
<header class="w3-container w3-red w3-center" style="padding:128px 16px">
  <h1 class="w3-margin w3-xxxlarge">Universidad Mayor de San Andres</h1>
  <p class="w3-xlarge">Facultad de Ciencias Puras y Naturales</p>
</header>

<!-- First Grid -->
<div class="w3-row-padding w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-twothird">
      <h1>Carreras</h1>
      <h5 class="w3-padding-32">La Facultad Ciencias Puras y Naturales tiene 6 carreras: Informatica, Fisica, Estadistica, Biologia, Quimica y Matemática.</h5>

      
    </div>

    <div class="w3-third w3-center">
      <img style="width:100;heigth:100;" src="índice.png"/>
    </div>
  </div>
</div>





<?php include "pie.inc.php"; ?>
