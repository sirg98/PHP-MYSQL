<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_SESSION['nombre'])) {
    header("Location: login.php");
    exit();
}

$id_usuario = $_SESSION['id_usuario'];
$conn = mysqli_connect("localhost", "root", "rootroot", "concesionario");

if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

$sql = "SELECT c.id_coche, c.marca, c.modelo, c.color, c.precio, c.foto, a.prestado, a.devuelto
        FROM alquileres a
        JOIN coches c ON a.id_coche = c.id_coche
        WHERE a.id_usuario = '$id_usuario'";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Coches Alquilados</title>
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
            margin: auto;
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

        .boton-devolver {
            display: inline-block;
            padding: 10px;
            background-color: #FF0000;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1rem;
            margin-top: 10px;
        }

        .boton-devolver:hover {
            background-color: #CC0000;
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
        <h1>Mis Coches Alquilados</h1>

        <div class="catalogo">
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($coche = mysqli_fetch_assoc($result)) {
                    echo "<div class='coche'>
                        <img src='../img/{$coche['foto']}' alt='Foto de {$coche['modelo']}'>
                        <p><strong>Marca:</strong> {$coche['marca']}</p>
                        <p><strong>Modelo:</strong> {$coche['modelo']}</p>
                        <p><strong>Color:</strong> {$coche['color']}</p>
                        <p><strong>Precio:</strong> {$coche['precio']}€</p>
                        <p><strong>Alquilado el:</strong> {$coche['prestado']}</p>";

                    
                    if (empty($coche['devuelto'])) {
                        echo "<a href='devolver_coche.php?id_coche={$coche['id_coche']}' class='boton-devolver'>Devolver Coche</a>";
                    } else {
                        echo "<p><strong>Devuelto el:</strong> {$coche['devuelto']}</p>";
                    }
                    
                    echo "</div>";
                }
            } else {
                echo "<p>No has alquilado ningún coche.</p>";
            }

            mysqli_close($conn);
            ?>
        </div>
    </div>

</body>
</html>
