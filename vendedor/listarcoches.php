<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['nombre'])) {
    header("Location: login.php");
    exit();
}

$conn = mysqli_connect("localhost", "root", "rootroot", "concesionario");

if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

$sql = "SELECT * FROM Coches
        WHERE propietario = ?";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Coches</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: url('../img/deportivo.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #FFFFFF;
            margin: 0;
            padding: 0;
            display: flex;
            min-height: 100vh;
        }

        .menu-lateral {
            background-color: #1D1D1D;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            padding-top: 20px;
            z-index: 1000;
            border-right: 2px solid #6A0DAD;
        }

        .menu-lateral a {
            display: block;
            padding: 15px;
            text-decoration: none;
            color: #fff;
            font-size: 1.2rem;
            border-bottom: 1px solid #6A0DAD;
        }

        .menu-lateral a:hover {
            background-color: #8A2BE2;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
            flex-grow: 1;
            width: calc(100% - 250px);
        }

        h1 {
            text-align: center;
            color: #FFFFFF;
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            background-color: rgba(0, 0, 0, 0.8);
            border-radius: 10px;
            overflow: hidden;
            color: #FFFFFF;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        th {
            background-color: #6A0DAD;
            color: white;
            padding: 15px;
            text-align: left;
            font-size: 1rem;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #444;
            text-align: left;
        }

        tr:nth-child(even) {
            background-color: #111111;
        }

        tr:hover {
            background-color: #6A0DAD;
            color: #FFFFFF;
        }

        img {
            border-radius: 5px;
            width: 100px;
        }

        p {
            text-align: center;
            font-size: 1.2rem;
            color: #BBBBBB;
        }

        @media (max-width: 768px) {
            .menu-lateral {
                width: 200px;
            }

            .main-content {
                margin-left: 200px;
            }

            table {
                width: 100%;
            }
        }
    </style>
</head>
<body>

    <div class="menu-lateral">
        <a href="añadircoches.html">Añadir Coche</a>
        <a href="borrarcoches.php">Borrar Coche</a>
        <a href="listarcoches.php">Listar Coches</a>
    </div>

    <div class="main-content">
        <h1>Listado de coches</h1>

        <?php
        if (mysqli_num_rows($result) > 0) {
            echo "<table>";
            echo "<tr>
                <th>Id</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Color</th>
                <th>Precio</th>
                <th>Alquilado</th>
                <th>Foto</th>
            </tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                    <td>{$row['id_coche']}</td>
                    <td>{$row['marca']}</td>
                    <td>{$row['modelo']}</td>
                    <td>{$row['color']}</td>
                    <td>{$row['precio']}</td>
                    <td>{$row['alquilado']}</td>
                    <td><img src='../img/{$row['foto']}'></td>
                </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No hay coches disponibles.</p>";
        }

        mysqli_close($conn);
        ?>
    </div>

</body>
</html>
