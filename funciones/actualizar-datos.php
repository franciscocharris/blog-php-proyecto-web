<?php 

$accion = $_POST['accion'];

if($accion === 'actualizar'){

	$nombre = $_POST['nombre'];
	$apellidos = $_POST['apellidos'];
	$email = $_POST['email'];
	$id = $_POST['id'];

	try {
		include 'conexion.php';
		$stmt = $conn->prepare(" UPDATE usuarios SET nombre = ?, apellidos = ?, email = ?, fecha = NOW() WHERE id = ? ");
		$stmt->bind_param("sssi", $nombre, $apellidos, $email, $id);
		$stmt->execute();
		if($stmt->affected_rows){
			$respuesta = array(
				'respuesta' => 'correcto',
				'id' => $stmt->insert_id
			);
		}
		$stmt->close();
		$conn->close();
	} catch (Exception $e) {
		$respuesta = array(
			'respuesta' => "error",
			'mensaje' =>  $e->getMessage()
		);
	}

	echo json_encode($respuesta);
}