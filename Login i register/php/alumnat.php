<?php
session_start();

if (!isset($_SESSION['usuari'])) {
    echo '
        <script>
            alert("Per favor iniciar sessió");
            window.location = "../index.php";
        </script>
    ';
    header("location: ../index.php");
    session_destroy();
    die();
}

// Establir la conexió a la base de dades
include 'connexio.php';
// Consulta per a obtenir el llistat de portàtils per cada aula en l'alumnat
$queryPortatilsAlumnat = "SELECT aula, portatils FROM alumnat";
$resultPortatilsAlumnat = mysqli_query($conexio, $queryPortatilsAlumnat);

//Consulta per obtenir l'estat del disc al professorat 
$queryEstatDiscsProfessorat = "SELECT aula, discs_incidencia FROM professorat";
$resultEstatDiscsProfessorat = mysqli_query($conexio, $queryEstatDiscsProfessorat);

// Recorrer els resultats i mostrar els llistats
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: black;
            color: white;
            text-align: center;
            padding: 20px;
        }

        h1, h2 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        .logout-link {
            display: block;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Pàgina Alumnat</h1>
    </header>

    <h2>Estat del seu ordinador:</h2>
    <table>
        <tr>
            <th>Aula</th>
            <th>Portàtils</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($resultPortatilsAlumnat)): ?>
        <tr>
            <td><?php echo $row['aula']; ?></td>
            <td><?php echo $row['portatils']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>

    <h2>Estat del seu disc:</h2>
    <table>
        <tr>
            <th>Aula</th>
            <th>Discs en incidència</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($resultEstatDiscsProfessorat)): ?>
        <tr>
            <td><?php echo $row['aula']; ?></td>
            <td><?php echo $row['discs_incidencia']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
    
    <a href="php/tanca_sessio.php" class="logout-link">Tanca Sessió</a>
    <script>
        document.querySelector("a[href='php/tanca_sessio.php']").addEventListener("click", function(e) {
            e.preventDefault();
            window.location.href = "../index.php";
        });
    </script>
</body>
</html>
