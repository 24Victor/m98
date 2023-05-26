<?php
    session_start();

    if(isset($_SESSION['usuari'])){
        session_destroy();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login I Registre</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">

<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/estilos.css">
</head>
<body>
    
    <main>

        <div class="contenedor_tot">

            <div class="caixa_trasera">
                <div class="caixa_trasera-login">
                    <h3>Ja tens un compte?</h3>
                    <p>Inicia sessió per a entrar a la pàgina</p>
                    <button id="boto_inici-sessio">Iniciar sessio</button>
                </div>
                <div class="caixa_trasera-register">
                    <h3>Encara no tens un compte?</h3>
                    <p>Registrat per a iniciar sessio</p>
                    <button id="boto_register">Registrarse</button>
                </div>
            </div>
            <!--Formulari de login i registre-->
            <!--Login-->
            <div class="contenedor_login-register">
                <form action="php/login_usuari.php" method="POST" class="formulari_login">
                    <h2>Iniciar sessio</h2>
                    <input type="text" placeholder="Correu Electronic" name="correu">
                    <input type="password" placeholder="Contrasenya" name="contrasenya">
                    <button>Entrar</button>
                </form>
                <!--Registre-->
                <form action="php/registre_user.php" method="POST" class="formulari_register">
                    <h2>Registrarse</h2>
                    <input type="text" placeholder="Nom" name="nom_complet">
                    <input type="text" placeholder="Cognom1" name="cognom1">
                    <input type="text" placeholder="Cognom2" name="cognom2">
                    <input type="text" placeholder="Correu Electronic" name="correu">
                    <input type="text" placeholder="A quina classe pertanys?" name="classe">
                    <input type="password" placeholder="Contrasenya" name="contrasenya">
                    <input type="text" placeholder="rol" name="rol">
                    <input type="text" placeholder="Nom d'usuari" name="usuari">
                    
                    
                    <button>Registrarse</button>
                </form>
            </div>

        </div>

    </main>
    <script src="assets/js/script.js"></script>
</body>
</html>
