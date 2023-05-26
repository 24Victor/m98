<?php
session_start();

include 'connexio.php';
$correu = $_POST['correu'];
$contrasenya = $_POST['contrasenya'];
$contrasenya = hash('sha512', $contrasenya);

// Validació del login
$validacio_login = mysqli_query($conexio, "SELECT * FROM users WHERE email='$correu' and passw='$contrasenya'");

if (mysqli_num_rows($validacio_login) > 0) {
    $_SESSION['usuari'] = $correu;

    // Obtenir el rol des de la base de dades
    $rol_query = mysqli_query($conexio, "SELECT rol FROM users WHERE email='$correu' and passw='$contrasenya'");
    $row = mysqli_fetch_assoc($rol_query);
    $rol = $row['rol'];

    if ($rol == 0) {
        header("Location: alumnat.php"); // Redirigeix a la pàgina alumnat.php
        exit(); 
    } elseif ($rol == 1) {
        header("Location: professorat.php"); // Redirigeix a la pàgina professorat.php
        exit(); 
    } else {
        // Si el rol no és 0 ni 1, pots mostrar un missatge d'error o redirigir a una pàgina predeterminada
        header("Location: error.php"); 
        exit(); // Assegura't que l'script s'atura després de la redirecció
    }
} else {
    //fem un else que si no fa el if el else fara un echo on ens sortira un missatge de alerta, i ens tornara a la pagina de login
    echo '
        <script>
            alert("Usuari no existeix, verifica les dades introduïdes.");
            window.location = "../index.php";
        </script>
    ';
    exit;
}
?>
