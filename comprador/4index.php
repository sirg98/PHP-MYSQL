<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);


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
    <title>Concesionario</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: url('../img/deportivo.jpg') no-repeat center center fixed; 
            background-size: cover;
            color: #FFFFFF;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: rgba(29, 29, 29, 0.9); 
            padding: 20px;
            text-align: center;
        }

        h1 {
            font-size: 2.5rem;
            color: #FFFFFF;
            text-transform: uppercase;
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
            min-height: 100vh;
            background-color: rgba(0, 0, 0, 0.7); 
            color: #FFFFFF;
            text-align: center;
        }

        .main-content h2 {
            font-size: 2rem;
        }

        @media (max-width: 768px) {
            .menu-lateral {
                width: 200px;
                padding-top: 10px;
            }

            .main-content {
                margin-left: 0;
                padding: 10px;
            }
        }
    </style>
</head>

<body>

    <header>
        <h1>¡Bienvenid@, <?php echo $_SESSION['nombre']; ?>!</h1>
    </header>

    <div class="menu-lateral">
        
        <a href="4index.php" class="main-button">🏠 Volver al Inicio</a>
        <a href="listarcoches.php">Listar Coches</a> 
        <a href="mis_coches.php">Mis Coches</a>
        <a href="editar_usuario.php">Editar Usuario</a>
        <a href="../logout.php" class="logout-button">🚪 Cerrar Sesión</a>
    </div>

    <div class="main-content">
        <h2>Bienvenido al Concesionario</h2>
        <p>En esta página podrás alquilar todos nuestros coches disponibles.</p>
    </div>

</body>
</html>
