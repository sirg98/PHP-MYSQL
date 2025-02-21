<?php
session_start();

$id = $_SESSION['id_usuario'];

if (!isset($_SESSION['nombre'])) {
    header("Location: login.php"); 
    exit();
}
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
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .menu-lateral a {
            display: block;
            width: 90%;
            padding: 15px;
            text-decoration: none;
            color: #fff;
            font-size: 1.2rem;
            border-bottom: 1px solid #6A0DAD;
            text-align: center;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .menu-lateral a:hover {
            background-color: #8A2BE2;
        }

        .menu-lateral .main-button {
            background-color: #6A0DAD;
            color: #fff;
            font-size: 1.2rem;
            text-align: center;
            border: none;
            padding: 15px;
            cursor: pointer;
            width: 90%;
            margin: 10px 0;
            border-radius: 5px;
            display: block;
            text-decoration: none;
        }

        .menu-lateral .main-button:hover {
            background-color: #8A2BE2;
        }

        .menu-lateral .logout-button {
            background-color: #28A745; 
            color: #fff;
            font-size: 1.2rem;
            text-align: center;
            border: none;
            padding: 15px;
            cursor: pointer;
            width: 90%;
            margin: 10px 0;
            border-radius: 5px;
            display: block;
            text-decoration: none;
            font-weight: bold;
        }

        .menu-lateral .logout-button:hover {
            background-color: #218838; 
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
            flex-grow: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            text-align: center;
        }

        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
            background-color: #000000;
            border-radius: 10px;
            overflow: hidden;
            color: #FFFFFF;
            border: 1px solid #6a0dad;
        }

        th {
            background-color: #6a0dad;
            color: #ffffff;
            padding: 15px;
            text-align: left;
            font-size: 1rem;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #6a0dad;
            text-align: left;
            color: #FFFFFF;
        }

        tr:nth-child(even) {
            background-color: #1a1a1a;
        }

        tr:hover {
            background-color: #6a0dad;
            color: #ffffff;
        }

        button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            font-size: 1rem;
            background-color: #6a0dad;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #4e087b;
        }

    </style>
</head>
<body>

<div class="menu-lateral">
    <a href="3index.php" class="main-button">🏠 Volver al Inicio</a>
    <a href="añadircoches.php">Añadir Coche</a>
    <a href="borrarcoches.php">Borrar Coche</a>
    <a href="listarcoches.php">Listar Coches</a>
    <a href="editar_usuario.php">Editar Usuario</a>

    <a href="../logout.php" class="logout-button">🚪 Cerrar Sesión</a>
</div>

<div class="main-content">
    <h1>Listado de Coches</h1>
    <?php

    $servername = "localhost";
    $username = "root";
    $password = "rootroot";
    $dbname = "concesionario";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    $sql = "SELECT id_coche, marca, modelo, color, precio FROM coches WHERE propietario = '$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<form action='borrarcoches2.php' method='post'>";
        echo "<table>";
        echo "<tr><th>Seleccionar</th><th>Marca</th><th>Modelo</th><th>Color</th><th>Precio</th></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td><input type='checkbox' name='delete_ids[]' value='" . $row['id_coche'] . "'></td>";
            echo "<td>" . htmlspecialchars($row['marca']) . "</td>";
            echo "<td>" . htmlspecialchars($row['modelo']) . "</td>";
            echo "<td>" . htmlspecialchars($row['color']) . "</td>";
            echo "<td>" . htmlspecialchars($row['precio']) . "</td>";
            echo "</tr>";
        }

        echo "</table><br>";
        echo "<button type='submit'>Eliminar seleccionados</button>";
        echo "</form>";
    } else {
        echo "<h2>No hay coches disponibles</h2>";
    }
    mysqli_close($conn);
    ?>
</div>

</body>
</html>
