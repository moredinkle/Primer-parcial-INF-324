<style>
{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}

body {
    margin: 50px auto;
    text-align: center;
    width: 800px;
}

header {
    font-size: 2rem;
    font-family: 'Lato';
}

h1{
    font-size: 1.3rem;
    font-family: 'Lato';
}


label {
    width: 150px;
    display: inline-block;
    text-align: left;
    font-size: 1.5rem;
    font-family: 'Lato';
}

input {
    border: 2px solid #ccc;
    font-size: 1.5rem;
    font-weight: 100;
    font-family: 'Lato';
    padding: 10px;
}

form {
    margin: 25px auto;
    padding: 20px;
    border: 5px solid #ccc;
    width: 500px;
    background: #eee;
}

div.form-element {
    margin: 20px 0;
}

button {
    padding: 10px;
    font-size: 1.5rem;
    font-family: 'Lato';
    font-weight: 100;
    background: #1837AA;
    color: white;
    border: none;
}

p.success,
p.error {
    color: white;
    font-family: lato;
    background: yellowgreen;
    display: inline-block;
    padding: 2px 10px;
}

p.error {
    background: orangered;
}
</style>

<?php
	
	$alert = '';
	if(!empty($_POST['username']) && !empty($_POST['password']))
	
	{
		require_once "conexion.inc.php";
		$user = $_POST['username'];
		$cont = $_POST['password'];
		
		$query = mysqli_query($conn, "SELECT * FROM USUARIO WHERE username = '$user' and password = '$cont'");
		$res = mysqli_num_rows($query);
		
		if($res > 0)
		{
			$data = mysqli_fetch_array($query);
			session_start();
			$_SESSION['active'] = true;
			$_SESSION['iduser'] = $data['username'];
			$_SESSION['ciuser'] = $data['ci'];
			
			header('location: index.php');
		}
	}	
	
?>



<title>Ingresar FCPN</title>
<header>Facultad de Ciencias Puras y Naturales</header>
<h1>Universidad Mayor de San Andres </h1>

<form method="post" action="" name="signup-form">
    <div class="form-element">
        <label>Usuario</label>
        <input type="username" name="username" required />
    </div>
    <div class="form-element">
        <label>Contraseña</label>
        <input type="password" name="password" required />
    </div>
    <button type="submit" name="ingresar" value="ingresar">Ingresar</button>
	
</form>