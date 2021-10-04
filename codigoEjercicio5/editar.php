<style>
body{font-family: "Lato", sans-serif}
</style>


<body>
<p>Agregar docente</p>
	<form method="POST" action="<?=base_url()?>index.php/Lectura2/editarPersona/<?=$ci?>">
				
		<br><label for="ci">CI</label>
		<input type="text" name="ci" id="ci" value="<?=$ci?>"/><br>

		<label for="nombre_completo" />Nombre completo</label>
		<input type="text" name="nombre_completo" id="nombre_completo" value="<?=$nombre_completo?>"/><br>

		<label for="fecha_nacimiento">Fecha Nacimiento</label>
		<input type ="text" name="fecha_nacimiento" id="fecha_nacimiento" value="<?=$fecha_nacimiento?>"/><br>
		
		<label for="departamento">Departamento</label>
		<input type ="text" name="departamento" id="departamento" value="<?=$departamento?>"/><br>
		
		<input type ="hidden" name="rol" id="rol" value="docente"/><br>

		<input type="submit" name="editar" id="editar" value="Guardar edición"/>
	</form>
</body>