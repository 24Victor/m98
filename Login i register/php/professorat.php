<?php
session_start();

if (!isset($_SESSION['usuari'])) {
    header("Location: ../index.php");
    session_destroy();
    die();
}

// Establim la connexió amb la base de dades (suposant que ja tenim la connexió)
include 'connexio.php';
// Consulta per obtenir la llista de portàtils per a cada aula
$queryPortatils = "SELECT aula, portatils FROM professorat";
$resultPortatils = mysqli_query($conexio, $queryPortatils);

// Consulta per obtenir la llista de discs durs en incidència
$queryDiscsIncidencia = "SELECT aula, discs_incidencia FROM professorat WHERE discs_incidencia > 0";
$resultDiscsIncidencia = mysqli_query($conexio, $queryDiscsIncidencia);

// Recorrem els resultats i mostrem les llistes
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
        <h1>Pàgina Professorat</h1>
    </header>

    <h2>Llistat dels portàtils per aula:</h2>
    <table>
        <tr>
            <th>Aula</th>
            <th>Portàtils</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($resultPortatils)): ?>
        <tr>
            <td><?php echo $row['aula']; ?></td>
            <td><?php echo $row['portatils']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>

    <h2>Llista dels discs durs en incidència:</h2>
    <table>
        <tr>
            <th>Aula</th>
            <th>Discs en incidència</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($resultDiscsIncidencia)): ?>
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