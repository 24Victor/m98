<?php
session_start();

if (!isset($_SESSION['usuari'])) {
    echo '
        <script>
            alert("Per favor iniciar sessio");
            window.location = "../index.php";
        </script>
    ';
    header("location: ../index.php");
    session_destroy();
    die();
}
?>


<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Benvingut</title>
</head>
<body>
    <h1>No hem pogut aconseguir-ho, ens donnava error a consultes SQL.</h1>
    <a href="php/tanca_sessio.php">Tanca Sessio</a>
    <script>
        document.querySelector("a[href='php/tanca_sessio.php']").addEventListener("click", function(e) {
            e.preventDefault();
            window.location.href = "../index.php";
        });
    </script>
</body>
</html>
