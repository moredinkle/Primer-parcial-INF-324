<style>
body{font-family: "Lato", sans-serif}
</style>


<body>
<p>Agregar docente</p>
	<form method="POST" action="<?=base_url()?>index.php/Lectura2/guardar">
				
		<br><label for="ci">CI</label>
		<input type="text" name="ci" id="ci"/><br>

		<label for="nombre_completo" />Nombre completo</label>
		<input type="text" name="nombre_completo" id="nombre_completo"/><br>

		<label for="fecha_nacimiento">Fecha Nacimiento</label>
		<input type ="text" name="fecha_nacimiento" id="fecha_nacimiento"/><br>
		
		<label for="departamento">Departamento</label>
		<input type ="text" name="departamento" id="departamento"/><br>
		
		<input type ="hidden" name="rol" id="rol" value="docente"/><br>

		<input type="submit" name="guardar" value="Guardar"/>
	</form>
</body>