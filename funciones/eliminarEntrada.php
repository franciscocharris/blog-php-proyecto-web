<?php 
require 'conexion.php';

// session_start();
$objetivo = $_POST['objetivo'];

if($objetivo == 'comentarios'){

	if(isset($_SESSION['usuario']) && isset($_POST)){

		$entrada_id = $_POST['id'];
		$usuario_id = $_SESSION['id'];

		try {
			$stmt = $conn->prepare(" DELETE FROM comentarios where entrada_id = ? ");
			$stmt->bind_param("i", $entrada_id);
			$stmt->execute();
			if($stmt->affected_rows){
				$respuesta = array(
					'respuesta' => 'correcto'
				);
			}else{
				$respuesta = array(
					'respuesta' => 'correcto'
				);
			}
			$stmt->close();
		} catch (Exception $e) {
			$respuesta = array(
				'respuesta' => 'error',
				'mensaje' => $e->getMessage()
			);
		}

		echo json_encode($respuesta);

		// $sql2 = " DELETE  FROM entradas where usuario_id = $usuario_id  and id = $entrada_id ";

		// // $conn->query($sql);
		// $conn->query($sql2);


		// // echo $sql;
	}
}

if($objetivo == 'entrada'){
	if(isset($_SESSION['usuario']) && isset($_POST)){

		$entrada_id = $_POST['id'];
		$usuario_id = $_SESSION['id'];

		try {
			$stmt = $conn->prepare("  DELETE  FROM entradas where usuario_id = ?  and id = ? ");
			$stmt->bind_param('ii', $usuario_id, $entrada_id);
			$stmt->execute();
			if($stmt->affected_rows){
				$respuesta = array(
					'respuesta' => 'correcto'
				);
			}else{
				$respuesta = array(
					'respuesta' => 'error',
					'mensaje' => $stmt->error,
					'error' => $stmt->error_list
				);
			}
			$stmt->close();
			$conn->close();
		} catch (Exception $e) {
			$respuesta = array(
				'respuesta' => 'error',
				'mensaje' => $e->getMessage()
			);
		}

		echo json_encode($respuesta);
	}
}


// header("Location: ../index.php?mensaje=correcto");