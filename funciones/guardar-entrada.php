<?php
session_start();
$accion = $_POST['accion'];

if($accion == 'guardar'){

	$titulo = filter_var($_POST['titulo'], FILTER_SANITIZE_STRING);
	$descripcion = filter_var($_POST['descripcion'], FILTER_SANITIZE_STRING);
	$categoria = filter_var($_POST['categoria'], FILTER_SANITIZE_NUMBER_INT);
	$usuario = filter_var($_SESSION['id'], FILTER_SANITIZE_NUMBER_INT);
	// imagenes
	
// 	var_dump($_SESSION);
	if(isset($_FILES['image'])){
		$file = $_FILES['image'];
		$filename = $file['name'];
		$mimetype = $file['type'];

		if($mimetype == 'image/jpg' || $mimetype == 'image/jpeg' || $mimetype == 'image/png' || $mimetype == 'image/gif'){
			if(!is_dir('../img/uploads')){
				mkdir('../img/uploads', 0777, true);
			}

			move_uploaded_file($file['tmp_name'], '../img/uploads/'.$filename);
		}
	}else{

		$respuesta = 'error';
	}
	

	try {
		require 'conexion.php';
		$stmt = $conn->prepare(" INSERT INTO `entradas` (`usuario_id`, `categoria_id`, `titulo`, `descripcion`, `image`, `fecha`) VALUES (?, ?, ?, ?, ?, NOW() ); ");
		$stmt->bind_param("iisss", $usuario, $categoria, $titulo, $descripcion, $filename);
		$stmt->execute();
		if($stmt->affected_rows){
			$respuesta = 'correcto';
		}
		$stmt->close();
		$conn->close();
	} catch (Exception $e) {
		$respuesta = 'error';
	}

	header("Location: ../crear-entrada.php?mensaje=".$respuesta);
}

if($accion == 'actualizar'){

	// session_start();
	$usuario = filter_var($_POST['usuario'], FILTER_SANITIZE_NUMBER_INT);

	if($usuario == $_SESSION['id']){

		$titulo = filter_var($_POST['titulo'], FILTER_SANITIZE_STRING);
		$descripcion = trim(filter_var($_POST['descripcion'], FILTER_SANITIZE_STRING));
		$categoria = filter_var($_POST['categoria'], FILTER_SANITIZE_NUMBER_INT);
		$id = filter_var($_POST['entrada_id'], FILTER_SANITIZE_NUMBER_INT);

		try {
			require 'conexion.php';
			if(isset($_FILES['image'])){

				$file = $_FILES['image'];
				$mimetype = $file['type'];
				$filename = $file['name'];

				if($mimetype == 'image/jpg' || $mimetype == 'image/jpeg' || $mimetype == 'image/png' || $mimetype == 'image/gif'){

					move_uploaded_file($file['tmp_name'], '../img/uploads/'.$filename);

					$stmt = $conn->prepare(" UPDATE entradas SET categoria_id = ?, titulo = ?, descripcion = ?, image = ?, fecha = NOW() WHERE id = ? ");

					$stmt->bind_param("isssi", $categoria, $titulo, $descripcion, $filename, $id);
				}
			}

			if($_FILES['image']['error'] != 0){
				$stmt = $conn->prepare(" UPDATE entradas SET categoria_id = ?, titulo = ?, descripcion = ?, fecha = NOW() WHERE id = ? ");
				$stmt->bind_param("issi", $categoria, $titulo, $descripcion, $id);
			}

			
			$stmt->execute();
			if($stmt->affected_rows){
				$respuesta = 'correcto';
			}
			$stmt->close();
			$conn->close();
		} catch (Exception $e) {
			$respuesta = $e->getMessage();
		}
	}else{
		$respuesta = 'error';
	}
	header("Location: ../crear-entrada.php?id=$id&mensaje=".$respuesta);
	
}