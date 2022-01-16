<?php 

if(isset($_POST['submit'])){
	if(!empty($_POST['nombre']) && !empty($_POST['apellidos']) && 
		!empty($_POST['email']) && !empty($_POST['password'])){

		//iniciar session
		if(!isset($_SESSION)){
			session_start();
		}

		//recojer los datos del formulario y con el operador ternario comprobar que exista y asignarle el valor
		$nombre = isset($_POST['nombre']) ?  filter_var($_POST['nombre'], FILTER_SANITIZE_STRING) : false;
		$apellidos = isset($_POST['apellidos']) ?  filter_var($_POST['apellidos'], FILTER_SANITIZE_STRING) : false;
		$email = isset($_POST['email']) ?  filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING) : false;
		$password = isset($_POST['password']) ?  filter_var($_POST['password'], FILTER_SANITIZE_STRING) : false;

		$costo = array(
			'cost' => 10
		);
		$password_hash = password_hash($password, PASSWORD_BCRYPT, $costo);

		try {
			include 'conexion.php';
			$stmt = $conn->prepare(" INSERT INTO usuarios (nombre, apellidos, email, password, fecha) VALUES (?, ?, ?, ?, NOW() ) ");
			$stmt->bind_param("ssss", $nombre, $apellidos, $email, $password_hash);
			$stmt->execute();
			$respuesta = 'correcto';

			$stmt->close();
			$conn->close();
		} catch (Exception $e) {
			$respuesta = 'error '. $e->getMessage();
		}

		header('Location: ../index.php?mensaje='.$respuesta);
	}
}