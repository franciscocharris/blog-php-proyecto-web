<?php 

if(isset($_GET['id'])){
	try {
		require 'conexion.php';
		$comentario_id = $_GET['id']; 
		$stmt = $conn->prepare(" DELETE FROM comentarios WHERE comentario_id = ? ");
		$stmt->bind_param("i", $comentario_id);
		$stmt->execute();
		if($stmt->affected_rows){
			$respuesta = 'correcto';
			header("Location: ../index.php?mensaje=".$respuesta);
		}else{
			$respuesta = 'error';
			header("Location: ../index.php?mensaje=".$respuesta);
		}
	} catch (Exception $e) {
		header("Location: ../index.php?mensaje=".$e->getMessage());
	}
}