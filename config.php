<?php
$host = "localhost";
$usuario = "dannymrtnz";
$contrasena = "Kahize15xD";
$base = "bechamel";

$conn = new mysqli($host, $usuario, $contrasena, $base);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
