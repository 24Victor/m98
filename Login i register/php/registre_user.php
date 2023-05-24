<?php

    include 'connexio.php';

    $nom_complet = $_POST['nom_complet'];
    $cognom1 = $_POST['cognom1'];
    $cognom2 = $_POST['cognom2'];
    $correu = $_POST['correu'];
    $classe = $_POST['classe'];
    $contrasenya = $_POST['contrasenya'];
    $rol = $_POST['rol'];
    $usuari = $_POST['usuari'];

    $query = "INSERT INTO users(id, nom, cognom1, cognom2, email, grupClasse, passw, rol, username)
              VALUES('$nom_complet', '$cognom1', '$cognom2', '$correu', '$classe', '$contrasenya', '$rol', '$usuari')";
    
    $executar = mysqli_query($conexio, $query);



?>