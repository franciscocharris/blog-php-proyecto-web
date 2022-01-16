<?php 
//iniciar la session y la conexion a bd
require_once 'conexion.php';
//recojer los datos del formulario
if(isset($_POST['entrar'])){
	$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
	$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
	try {
		$stmt = $conn->prepare(" SELECT id, nombre, apellidos, email, password  from usuarios where email = ? ");
		$stmt->bind_param("s", $email);
		$stmt->execute();
		$stmt->bind_result($id, $nombre, $apellidos, $email, $password_hash);
		$stmt->fetch();
		if($nombre){
			if(password_verify($password, $password_hash)){
				if(!isset($_SESSION)){ 
                   session_start(); 
                } 
				$_SESSION['usuario'] = $nombre;
				$_SESSION['apellidos'] = $apellidos;
				$_SESSION['email'] = $email;
				$_SESSION['id'] = $id;
			}
		}else if(!isset($nombre) || !password_verify($password, $password_hash)){
			session_start();
			$_SESSION['errores-login'] = "Login incorrecto";
		}
		header("Location: ../index.php");
	} catch (Exception $e) {
		$_SESSION['errores'] = "Hubo un Error". $e->getMessage();
		header("Location: ../index.php");
	}
}