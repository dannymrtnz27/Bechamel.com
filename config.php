<?php
$host = "localhost";
$usuario = "";
$contrasena = "";
$base = "";

$conn = new mysqli($host, $usuario, $contrasena, $base);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
