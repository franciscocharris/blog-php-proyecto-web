<?php

if(isset($_POST)){

	if(!empty($_POST['nombre'])){

		$nombre = isset($_POST['nombre']) ?  filter_var($_POST['nombre'], FILTER_SANITIZE_STRING) : false;

	try {
		include 'conexion.php';
		$stmt = $conn->prepare(" INSERT INTO categorias (nombre) VALUES (?) ");
		$stmt->bind_param("s", $nombre);
		$stmt->execute();
		$respuesta = "correcto";

		$stmt->close();
		$conn->close();
	} catch (Exception $e) {
		$respuesta =  $e->getMessage();
	}

	header("Location: ../index.php?mensaje=".$respuesta);
	}
}