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
    //Encriptar contrasenya
    $contrasenya = hash('sha512', $contrasenya);

    $query = "INSERT INTO users(nom, cognom1, cognom2, email, grupClasse, passw, rol, username)
              VALUES('$nom_complet', '$cognom1', '$cognom2', '$correu', '$classe', '$contrasenya', $rol, '$usuari')";

    //verificar que el correu no es repetixque a la base de dades
    $verificar_correu = mysqli_query($conexio, "SELECT * FROM users WHERE email='$correu' ");

    if(mysqli_num_rows($verificar_correu) > 0){
        echo '
            <script>
                alert("Este correu ja esta registrat, intenta amb un altre correu");
                window.location = "../index.php";
                </script>
            ';
            exit();
    }

    //verificar que el usuari no es repetixque a la base de dades
    $verificar_usuari = mysqli_query($conexio, "SELECT * FROM users WHERE username='$usuari' ");

    if(mysqli_num_rows($verificar_usuari) > 0){
        echo '
            <script>
                alert("Este usuari ja esta registrat, intenta amb un altre usuari");
                window.location = "../index.php";
            </script>
            ';
            exit();
        }
    $executar = mysqli_query($conexio, $query);

    if($executar){ 
        echo '
            <script> 
                alert("Usuari almaçenat exitosament"); 
                window.location = "../index.php"; 
            </script>
            ';
    }else{
        echo ' 
            <script> 
                alert("Intenta-ho de nou, usuari no trobat");
                window.location = "../index.php"; 
            </script> 
            ';
        } 
        mysqli_close($conexio);   
?>