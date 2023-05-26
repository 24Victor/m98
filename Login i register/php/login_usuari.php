<?php
session_start();

include 'connexio.php';
$correu = $_POST['correu'];
$contrasenya = $_POST['contrasenya'];
$contrasenya = hash('sha512', $contrasenya);

$validacio_login = mysqli_query($conexio, "SELECT * FROM users WHERE email='$correu' and passw='$contrasenya'");

if (mysqli_num_rows($validacio_login) > 0) {
    $_SESSION['usuari'] = $correu;

    // Obtener el rol desde la base de datos
    $rol_query = mysqli_query($conexio, "SELECT rol FROM users WHERE email='$correu' and passw='$contrasenya'");
    $row = mysqli_fetch_assoc($rol_query);
    $rol = $row['rol'];

    if ($rol == 0) {
        header("Location: alumnat.php"); // Redirige a la página de alumnos
        exit(); // Asegura que el script se detenga después de la redirección
    } elseif ($rol == 1) {
        header("Location: professorat.php"); // Redirige a la página de profesores
        exit(); // Asegura que el script se detenga después de la redirección
    } else {
        // Si el rol no es 0 ni 1, puedes mostrar un mensaje de error o redirigir a una página predeterminada
        header("Location: error.php"); // Redirige a una página de error
        exit(); // Asegura que el script se detenga después de la redirección
    }
    } else {
    echo '
        <script>
            alert("Usuari no existix, verifica les dades introduides.");
            window.location = "../index.php";
        </script>
    ';
    exit;
    }
?>
