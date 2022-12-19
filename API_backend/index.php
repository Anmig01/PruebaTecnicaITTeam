<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<h2>Formulario para Crear</h2>
	<form action="index.php" method="POST">
		<label for="nombre">nombre</label>
		<input type="text" name="nombre">
		<br/>
		<label for="apellido">apellido</label>
		<input type="text" name="apellido">
		<br/>
		<label for="edad">edad</label>
		<input type="text" name="edad">
		<br/>
		<label for="foto">foto</label>
		<input type="text" name="foto">
		<br/>
		<label for="tipo_de_documento">tipo de documento</label>
		<input type="text" name="tipo_de_documento">
		<br/>
		<input type="submit" name="Agregar" value="Agregar">
	</form>
	<br/>
	<h2>Formulario para Actualizar por ID</h2>
	<form action="index.php" method="POST">
		<label for="id">ID</label>
		<input type="text" name="id">
		<br/>
		<label for="colToUpdate">Parametro a actualizar</label>
		<input type="text" name="colToUpdate">
		<br/>
		<label for="varToUpdate">Nuevo valor</label>
		<input type="text" name="varToUpdate">
		<br/>
		<input type="submit" name="Actualizar" value="Actualizar">
		<input type="submit" name="Borrar" value="Borrar">
	</form>
	<br/>

</body>
</html>

<?php
	include_once "./Controller/Api/UserController.php";
	$api = new UserController();


	if(isset($_GET['id']))
	{
		echo "id";
		$id = $_GET['id'];
		$api->getById($id);
	}
	else if(isset($_POST["Agregar"]))
	{
		echo "post";
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$edad = $_POST['edad'];
		$foto = $_POST['foto'];
		$tipo_de_documento = $_POST['tipo_de_documento'];

		$api->CreateUser($nombre,$apellido,$edad,$foto,$tipo_de_documento);
	}
	else if(isset($_POST["Actualizar"]))
	{
		echo "post1";
		$id = $_POST['id'];
		$colToUpdate = $_POST['colToUpdate'];
		$varToUpdate = $_POST['varToUpdate'];

		$api->UpdateById($id,$colToUpdate,$varToUpdate);
	}
	else if(isset($_POST["Borrar"]))
	{
		$ids = $_POST['id'];
		echo $ids;
		$id = $_POST['id'];
		$api -> DelById($id);
	}
	else{
		echo "all";
		$api->getAll();	
	}
	
?>