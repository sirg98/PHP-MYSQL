<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit();
}

$mensaje = "";

$conn = mysqli_connect("localhost", "root", "rootroot", "concesionario");

if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

if (isset($_GET['id_coche']) && is_numeric($_GET['id_coche'])) {
    $id_coche = intval($_GET['id_coche']);
    $id_usuario = $_SESSION['id_usuario'];

    $result_coche = mysqli_query($conn, "SELECT precio, alquilado, propietario FROM coches WHERE id_coche = $id_coche");
    $coche = mysqli_fetch_assoc($result_coche);

    if (!$coche) {
        $mensaje = "Error: El coche no existe.";
    } elseif ($coche['alquilado'] == 1) {
        $mensaje = "Error: El coche ya está alquilado.";
    } else {
        $precio_coche = $coche['precio'];
        $id_propietario = $coche['propietario'];

        if ($id_propietario == $id_usuario) {
            $mensaje = "Error: No puedes alquilar tu propio coche.";
        } else {
            $result_usuario = mysqli_query($conn, "SELECT saldo FROM usuarios WHERE id_usuario = $id_usuario");
            $usuario = mysqli_fetch_assoc($result_usuario);

            if (!$usuario) {
                $mensaje = "Error: Usuario no encontrado.";
            } elseif ($usuario['saldo'] < $precio_coche) {
                $mensaje = "Error: Saldo insuficiente para alquilar este coche.";
            } else {
                $nuevo_saldo_usuario = $usuario['saldo'] - $precio_coche;
                mysqli_query($conn, "UPDATE usuarios SET saldo = $nuevo_saldo_usuario WHERE id_usuario = $id_usuario");
                mysqli_query($conn, "UPDATE usuarios SET saldo = saldo + $precio_coche WHERE id_usuario = $id_propietario");
                mysqli_query($conn, "INSERT INTO alquileres (id_usuario, id_coche, prestado) VALUES ($id_usuario, $id_coche, NOW())");
                mysqli_query($conn, "UPDATE coches SET alquilado = 1 WHERE id_coche = $id_coche");

                $mensaje = "🚗 Coche alquilado con éxito. Se han descontado {$precio_coche}€ de tu saldo.";
            }
        }
    }
} else {
    $mensaje = "Error: ID de coche no válido.";
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alquiler de Coche</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: url('../img/deportivo.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #FFFFFF;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            text-align: center;
        }

        .contenedor {
            background-color: rgba(0, 0, 0, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 80%;
            word-wrap: break-word;
        }

        h1 {
            color: #6A0DAD;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.2rem;
            color: #FFFFFF;
        }

        a {
            display: inline-block;
            margin: 15px 10px;
            padding: 10px 20px;
            background-color: #6A0DAD;
            color: white;
            text-decoration: none;
            font-size: 1.2rem;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #8A2BE2;
        }
    </style>
</head>
<body>
    <div class="contenedor">
        <h1><?= htmlspecialchars($mensaje); ?></h1>
        <a href="4index.php">🏠 Volver al Inicio</a>
        <a href="mis_coches.php">📋 Ver mis coches alquilados</a>
    </div>
</body>
</html>
