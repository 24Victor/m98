<?php
    session_start();

    include 'connexio.php';
    $correu = $_POST['correu'];
    $contrasenya = $_POST['contrasenya'];
    $contrasenya = hash('sha512', $contrasenya);

    echo $contrasenya;
    die();
    
    $validacio_login = mysqli_query($conexio, "SELECT * FROM user WHERE correu='$correu' and contrasenya='$contrasenya'");

    if(mysqli_num_rows($validacio_login) > 0){
        $_SESSION['usuari'] = $correu;
        //redirigim a la pagina php, si es logeja
        header("location: main.php");
        exit;
        }else{
            echo '
                <script>
                    alert("Usuari no existix, verifica les dades introduides.");
                    window.location = "../index.php";
                </script>
                ';
            exit;
        }
?>