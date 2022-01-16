<?php 

if(isset($_POST)){
	if(!empty($_POST['contenido'])){
		$user_id = (int)$_POST['user_id'];
		$entrada_id = (int) $_POST['entrada_id'];
		$contenido = $_POST['contenido'];

		try {
			require 'conexion.php';
			$stmt = $conn->prepare(" INSERT INTO comentarios (contenido, user_id, entrada_id) VALUES (?,?,?) ");
			$stmt->bind_param("sii", $contenido, $user_id, $entrada_id);
			$stmt->execute();

			if($stmt->affected_rows){
				$respuesta = "correcto";
				header("Location: ../post.php?id=".$entrada_id.'&mensage='.$respuesta);
			}else{
				$respuesta = "hubo un error";
				header("Location: ../post.php?id=".$entrada_id.'&mensage='.$respuesta);
			}
			
			$stmt->close();
			$conn->close();
		} catch (Exception $e) {
			$respuesta = "hubo un error";
			header("Location: ../post.php?id=".$entrada_id.'&mensage='.$e->getMessage());
		}
	}
}