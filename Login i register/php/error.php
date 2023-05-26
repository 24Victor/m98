<?php
session_start();

// Verificar si l'usuari té una sessió activa
if (!isset($_SESSION['usuari'])) {
    header("Location: ../index.php"); // Redirigir a la pàgina d'inici de sessió si no hi ha sessió activa
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

    <a href="php/tanca_sessio.php" class="logout-link">Tanca Sessió</a>
    <script>
        document.querySelector("a[href='php/tanca_sessio.php']").addEventListener("click", function(e) {
            e.preventDefault();
            window.location.href = "../index.php";
        });
    </script>
</body>
</html>
