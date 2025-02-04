<?php
session_start();

// Verificar si el usuario no está autenticado
if (empty($_SESSION['usuario'])) {
    // Redirigir al usuario a la página de inicio de sesión
    header("Location: login.php");
    exit;
}

// Si se desea mostrar el nombre del usuario en esta página, puedes usar:
// echo "Bienvenido, " . htmlspecialchars($_SESSION['usuario'], ENT_QUOTES, 'UTF-8');
?>

<!doctype html>
<html lang="ES">
<head>
    <title>Bienvenida</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css?v=1.0.1">
</head>
<body>
    <div class="bienvenida">
        <h1>Bienvenido, <?php echo $_SESSION['usuario']; ?>!</h1>
        <a href="logout.php">Cerrar sesión</a>
    </div>
</body>
</html>
