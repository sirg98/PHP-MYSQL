<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start(); 


if (!isset($_SESSION['nombre'])) {
    header("Location: login.php?error=Debe iniciar sesión");
    exit();
}

$nombre = $_SESSION['nombre']; 
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
            position: relative;
        }

        h1 {
            font-size: 2.5rem;
            color: #FFFFFF;
            text-transform: uppercase;
        }

        .menu-lateral .main-button {
            background-color: #6A0DAD;
            color: #fff;
            font-size: 1.2rem;
            text-align: center;
            border: none;
            padding: 15px;
            cursor: pointer;
            width: 88%;
            margin: 10px 0;
            border-radius: 5px;
            display: block;
            text-decoration: none;
        }

        .menu-lateral .main-button:hover {
            background-color: #8A2BE2;
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

        .menu-lateral .dropdown-content {
            display: none;
            background-color: #333;
            border-left: 3px solid #6A0DAD;
        }

        .menu-lateral .dropdown-content a {
            padding-left: 30px;
        }

        .menu-lateral .dropdown:hover .dropdown-content {
            display: block;
        }

        .menu-lateral .logout-button {
            background-color: #28A745; 
            color: #fff;
            font-size: 1.2rem;
            text-align: center;
            border: none;
            padding: 15px;
            cursor: pointer;
            width: 88%;
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
        }

        .main-content h2 {
            font-size: 2rem;
            text-align: center;
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
        <h1>¡Bienvenido, <?php echo htmlspecialchars($nombre); ?>!</h1>

        </div>
    </header>

    <div class="menu-lateral">
    <a href="2index.php" class="main-button">🏠 Volver al Inicio</a>
        <div class="dropdown">
            <a href="javascript:void(0)">Coches</a>
            <div class="dropdown-content">
                <a href="coches/añadircoches.html">Añadir Coche</a>
                <a href="coches/listarcoches.php">Listar Coches</a>
                <a href="coches/buscarcoches.html">Buscar Coche</a>
                <a href="coches/modificarcoches.html">Modificar Coche</a>
                <a href="coches/borrarcoches.php">Borrar Coche</a>
            </div>
        </div>

        <div class="dropdown">
            <a href="javascript:void(0)">Usuarios</a>
            <div class="dropdown-content">
                <a href="usuarios/añadirusuarios.html">Añadir Usuario</a>
                <a href="usuarios/listarusuarios.php">Listar Usuarios</a>
                <a href="usuarios/buscarusuarios.html">Buscar Usuario</a>
                <a href="usuarios/modificarusuarios.html">Modificar Usuario</a>
                <a href="usuarios/borrarusuarios.php">Borrar Usuario</a>
            </div>
        </div>

        <div class="dropdown">
            <a href="javascript:void(0)">Alquileres</a>
            <div class="dropdown-content">
                <a href="alquileres/listaralquileres.php">Listar Alquileres</a>
                <a href="alquileres/borraralquileres.php">Borrar Alquileres</a>
            </div>
        </div>
        <a href="../logout.php" class="logout-button">🚪 Cerrar Sesión</a>
    </div>

    <div class="main-content">
        <h2>Bienvenido al Concesionario</h2>
        <p>En esta página podrás consultar todas las opciones disponibles.</p>
        <ul>
            <li>COCHES</li>
            <ul>
                <li>AÑADIR COCHE</li>
                <li>LISTAR COCHE</li>
                <li>BUSCAR COCHE</li>
                <li>MODIFICAR COCHE</li>
                <li>BORRAR COCHE</li>
            </ul><br>
            <li>USUARIOS</li>
            <ul>
                <li>AÑADIR USUARIO</li>
                <li>LISTAR USUARIOS</li>
                <li>BUSCAR USUARIO</li>
                <li>MODIFICAR USUARIO</li>
                <li>BORRAR USUARIO</li>
            </ul><br>
            <li>ALQUILERES</li>
            <ul>
                <li>LISTAR ALQUILERES</li>
                <li>BORRAR ALQUILERES</li>
            </ul>
        </ul>
    </div>

</body>
</html>
