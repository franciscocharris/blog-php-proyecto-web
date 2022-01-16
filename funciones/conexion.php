<?php
//conexion

$conn = new mysqli('mysql-franciscocharrisweb.alwaysdata.net', '254147', '1francisco2345', 'franciscocharrisweb_blogadsi56');

if($conn->connect_error){
	echo $conn->connect_error;
}

$conn->query("SET NAMES 'utf8'");

if(!isset($_SESSION)){
	session_start();
}