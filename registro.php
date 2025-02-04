<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validar y limpiar datos de entrada
    $nombre = trim($_POST['nombre']);
    $apellido = trim($_POST['apellido']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $telefono = trim($_POST['telefono']);
    $edad = intval($_POST['edad']);
    $dui = trim($_POST['dui']);
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);

    if ($email === false) {
        die("Correo electrónico no válido.");
    }

    // Preparar la consulta SQL
    $sql = "INSERT INTO usuarios (nombre, apellido, telefono, correo, password_hash, dui, edad) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Error al preparar la consulta: " . $conn->error);
    }

    $stmt->bind_param("ssssssi", $nombre, $apellido, $telefono, $email, $contrasena, $dui, $edad);

    if ($stmt->execute()) {
        echo "Registro exitoso. <a href='login.php'>Inicia sesión aquí</a>.";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Cerrar la consulta y la conexión
    $stmt->close();
    $conn->close();
}
?>


<!doctype html>
<html lang="ES">
<head>
    <title>Registro</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css?v=1.0.1">
</head>
<body>
    <div class="contenedorRegistro">
        <h1>Registro</h1>
        <form method="POST" class="form">
            <label for="nombre_usuario">Nombre de usuario:</label>
            <input type="user" name="user_name" required>
            <br>
            <label for="apellido_usuario">Apellido de usuario:</label>
            <input type="lastname" name="user_lastname" required>
            <br>
            <label for="email">Correo electrónico:</label>
            <input type="email" name="email" required>
            <br>
            <label for="telefono">Teléfono:</label>
            <input type="phone" name="phone" required>
            <br>
            <label for="dui">DUI:</label>
            <input type="id" name="id" required>
            <br>
            <label for="contrasena">Contraseña:</label>
            <input type="password" name="contrasena" required>
            <br>
            <button type="submit">Registrarse</button>
        </form>
    </div>
</body>
</html>
