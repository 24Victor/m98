<?php
session_start();

// Verificar si el usuario tiene una sesión activa
if (!isset($_SESSION['usuari'])) {
    header("Location: ../index.php"); // Redirigir a la página de inicio de sesión si no hay sesión activa
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Error</title>
</head>
<body>
    <h1>Error de Rol</h1>
    <p>No tens permisos per a accedir a aquesta pagina.</p>
</body>
</html>
