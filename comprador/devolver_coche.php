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


if (isset($_GET['id_coche'])) {
    $id_coche = $_GET['id_coche'];

 
    $sql_devolver = "UPDATE alquileres SET devuelto = NOW() WHERE id_coche = '$id_coche' AND id_usuario = '$id_usuario' AND devuelto IS NULL";

    if (mysqli_query($conn, $sql_devolver)) {
        $mensaje = "✅ Coche devuelto correctamente.";
    } else {
        $mensaje = "❌ Error al devolver el coche.";
    }
}


$sql = "SELECT c.id_coche, c.marca, c.modelo, c.color, c.precio, c.foto 
        FROM Coches c
        JOIN alquileres a ON c.id_coche = a.id_coche
        WHERE a.id_usuario = '$id_usuario' AND a.devuelto = 0";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devolver Coche</title>
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

        .catalogo {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            width: 80%;
        }

        .coche {
            background-color: rgba(0, 0, 0, 0.8);
            border-radius: 10px;
            padding: 15px;
            width: 250px;
            text-align: center;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .coche img {
            width: 100%;
            border-radius: 5px;
        }

        .coche p {
            margin: 10px 0;
            font-size: 1rem;
            color: #FFFFFF;
        }

        .boton {
            display: block;
            margin: 10px auto;
            padding: 10px 15px;
            color: #FFFFFF;
            background-color: #6A0DAD;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
            text-align: center;
            font-weight: bold;
        }

        .boton:hover {
            background-color: #8A2BE2;
        }

        p {
            text-align: center;
            font-size: 1.2rem;
            color: #BBBBBB;
        }

        .mensaje {
            text-align: center;
            font-size: 1.2rem;
            color: #FF4747;
            font-weight: bold;
            margin-top: 20px;
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
    <h1>Mis coches alquilados</h1>

    <?php if (isset($mensaje)) { echo "<p class='mensaje'>$mensaje</p>"; } ?>

    <div class="catalogo">
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($coche = mysqli_fetch_array($result)) {
                echo "<div class='coche'>
                    <img src='../img/{$coche['foto']}' alt='Foto de {$coche['modelo']}'>
                    <p><strong>Marca:</strong> {$coche['marca']}</p>
                    <p><strong>Modelo:</strong> {$coche['modelo']}</p>
                    <p><strong>Color:</strong> {$coche['color']}</p>
                    <p><strong>Precio:</strong> {$coche['precio']}€</p>
                    <a href='devolver_coche.php?id_coche={$coche['id_coche']}' class='boton'>Devolver</a>
                </div>";
            }
        } else {
            echo "<p>No tienes coches alquilados.</p>";
        }

        mysqli_close($conn);
        ?>
    </div>
</div>

</body>
</html>
