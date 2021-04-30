<?php
$dbhost = "localhost";
$dbuser="root";
$dbpass="";
$dbname="tempo_store";

$conexion = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$conexion) {

	die("No hay conexion con la base de datos " .mysqli_connect_error());
}
$usuario = $_POST["usuario"];
$contraseña = $_POST["contraseña"];

$query = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usu_correo ='".$usuario."' and usu_contraseña = '".$contraseña."'");

$num = mysqli_num_rows($query);

if ($num == 1) {
	header("Location: inicio.php");
		
}else if ($num == 0) {
	header("Location: index.html");
}


?>