<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_SESSION['nombre'])) {
    header("Location: login.php");
    exit();
}

$conn = mysqli_connect("localhost", "root", "rootroot", "concesionario");

if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

$id_usuario = $_SESSION['id_usuario'];
$id_coche = $_GET['id_coche'] ?? '';

$sql_usuario = "SELECT nombre, apellidos, saldo FROM usuarios WHERE id_usuario = '$id_usuario'";
$result_usuario = mysqli_query($conn, $sql_usuario);
$usuario = mysqli_fetch_assoc($result_usuario);

$sql_coche = "SELECT * FROM Coches WHERE id_coche = '$id_coche'";
$result_coche = mysqli_query($conn, $sql_coche);
$coche = mysqli_fetch_assoc($result_coche);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Coche</title>
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

        .menu-lateral .logout-button:hover {
            background-color: #218838;
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

        .mensaje {
            text-align: center;
            font-size: 1.2rem;
            color: #FF4747;
            font-weight: bold;
            margin-top: 20px;
        }

        .boton-alquilar {
            display: block;
            width: 200px;
            margin: 20px auto;
            padding: 15px;
            background-color: #28A745;
            color: white;
            text-align: center;
            text-decoration: none;
            font-size: 1.2rem;
            border-radius: 5px;
            font-weight: bold;
        }

        .boton-alquilar:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

<div class="menu-lateral">
    <a href="4index.php" class="main-button">🏠 Volver al Inicio</a>
    <a href="listarcoches.php">Listar Coches</a>
    <a href="mis_coches.php">Mis Coches</a> 
    <a href="editar_usuario.php">Editar Usuario</a>
    <a href="../logout.php" class="logout-button">🚪 Cerrar Sesión</a>
</div>

    <div class="main-content">
        <h1>Detalles del Coche</h1>

        <?php if ($coche): ?>
            <table>
                <tr><th>Marca</th><td><?= $coche['marca'] ?></td></tr>
                <tr><th>Modelo</th><td><?= $coche['modelo'] ?></td></tr>
                <tr><th>Color</th><td><?= $coche['color'] ?></td></tr>
                <tr><th>Precio</th><td><?= $coche['precio'] ?>€</td></tr>
                <tr><th>Estado</th><td><?= $coche['alquilado'] ? 'Alquilado' : 'Disponible' ?></td></tr>
            </table>

            <h2>Información del Usuario</h2>
            <table>
                <tr><th>Nombre</th><td><?= $usuario['nombre'] ?></td></tr>
                <tr><th>Apellidos</th><td><?= $usuario['apellidos'] ?></td></tr>
                <tr><th>Saldo</th><td><?= $usuario['saldo'] ?>€</td></tr>
            </table>

            <?php if ($usuario['saldo'] >= $coche['precio']): ?>
                <a href="alquilar_coche.php?id_coche=<?= $coche['id_coche'] ?>" class="boton-alquilar">🚗 Alquilar Coche</a>

            <?php else: ?>
                <p class="mensaje">❌ No tienes saldo suficiente para alquilar este coche.</p>
            <?php endif; ?>

        <?php else: ?>
            <p class="mensaje">❌ No se encontró el coche.</p>
        <?php endif; ?>
    </div>

</body>
</html>
