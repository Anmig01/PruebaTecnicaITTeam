<!DOCTYPE html>
<html>
<head lang="es">
	<!-- Metadatos -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- BootStrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="./estilosCSS/index.css">
	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inder&family=Monoton&family=Share+Tech+Mono&display=swap" rel="stylesheet">

	<title>Pruebas_PHP</title>
</head>
<body>
	<div class="container-fluid justify-content-center align-items-center header">
		<div class="row">
			<h1 class="col">Bucador de imágenes</h1>
		</div>
	</div>
	<div class="container d-flex flex-column justify-content-center align-items-center">
		<div class="row d-flex flex-nowrap  align-items-center">
			<input type="text" name="buscar" id="buscar" class="col-12" placeholder="imágenes a buscar">

			<div class="dropdown desplegable">
				<button class="btn btn-secondary dropdown-toggle dropdown-toggle-split btn-desplegable" type="button" data-bs-toggle="dropdown" aria-expanded="false" id="btnDrop">
			    	categoria
			  	</button>
			  	<ul class="dropdown-menu dropdown-menu-dark">
				    <li><a class="dropdown-item" onclick="textCategory(this)" href="#">science</a></li>
				    <li><a class="dropdown-item" onclick="textCategory(this)" href="#">education</a></li>
				    <li><a class="dropdown-item" onclick="textCategory(this)" href="#">people</a></li>
				    <li><a class="dropdown-item" onclick="textCategory(this)" href="#">feeling</a></li>
				    <li><a class="dropdown-item" onclick="textCategory(this)" href="#">computer</a></li>
				    <li><a class="dropdown-item" onclick="textCategory(this)" href="#">buildings</a></li>
			  	</ul>
			</div>

		</div>
		<div class="row">
			<button type="button" class="btn btn-primary col" onclick="cargarImagenes()">Buscar</button>
		</div>
	</div>


	<div class="container">
		<div class="row">
			<div class="col-12 row" id="listadoImagenes">
				<!--ACA VAN LAS IMAGENES-->
			</div>
		</div>

	</div>


	<div class="error" id="msj-error"></div>


	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

<script src="./scriptsJS/index.js"></script>

<!--
<?php
	//include "pruebaAPI_pixabay.php";
?>
-->
</html>