<?php 

function quitarSessions(){
	
	if(isset($_SESSION['errores'])){
		$_SESSION['errores'] = null;
		$borrado = session_unset($_SESSION['errores']);
	}
	
	if(isset($_SESSION['completado'])){
		$_SESSION['completado'] = null;
		session_unset();
	}

	if(isset($_SESSION['errores-login'])){
		$_SESSION['errores-login'] = null;
		session_unset();
	}
}

//conseguir categorias
function conseguirCategorias(){
	require 'conexion.php';
	try {
		return $conn->query(" SELECT * FROM categorias ");
	} catch (Exception $e) {
		echo "hubo un error". $e->getMessage();
		return false;
	}
}

//conseguir comentarios
function conseguirComentarios($id){
	require 'conexion.php';
	try {
		return $conn->query(" SELECT c.*, u.nombre FROM comentarios c INNER JOIN usuarios u on c.user_id = u.id WHERE c.entrada_id = $id ORDER BY c.comentario_id DESC ");	
	} catch (Exception $e) {
		return "error ". $e->getMessage();
	}
}
//conseguir las entradas

function conseguirEntradas(){
	require 'conexion.php';
	try {
		return $conn->query(" SELECT e.*, c.nombre AS 'categoria', c.id AS 'id_categoria' FROM entradas e INNER JOIN categorias c on e.categoria_id = c.id ORDER BY e.id DESC LIMIT 4 ");
	} catch (Exception $e) {
		echo "error" . $e->getMessage();
		return false;
	}
}

function entradas(){
	require 'conexion.php';
	try {
		return $conn->query("  SELECT e.*, c.nombre AS 'categoria' FROM entradas e INNER JOIN categorias c on e.categoria_id = c.id ORDER BY e.id DESC  ");
	} catch (Exception $e) {
		echo "error" . $e->getMessage();
		return false;
	}
}
//entrada por id
function conseguirEntrada($id){
	require 'conexion.php';
	try {
		return $conn->query("  SELECT e.*, c.*  FROM entradas e INNER JOIN categorias c on e.categoria_id = c.id WHERE e.id = $id ");
	} catch (Exception $e) {
		echo "error" . $e->getMessage();
		return false;
	}
}

function entradasCategorias($id){
	require 'conexion.php';
	try {
		return $conn->query("  SELECT e.*, c.nombre AS 'categoria', c.id AS 'id_categoria' FROM entradas e INNER JOIN categorias c on e.categoria_id = c.id  where e.categoria_id = $id ");
	} catch (Exception $e) {
		echo "error" . $e->getMessage();
		return false;
	}
}

function buscarEntradas($busqueda = null){
	require 'conexion.php';
	if(!empty($busqueda)){
		try {
			return $conn->query("  SELECT e.*, c.nombre AS 'categoria', c.id AS 'id_categoria' FROM entradas e INNER JOIN categorias c on e.categoria_id = c.id WHERE e.titulo LIKE '% $busqueda %' ");
		} catch (Exception $e) {
			echo "error" . $e->getMessage();
			return false;
		}
	}

}