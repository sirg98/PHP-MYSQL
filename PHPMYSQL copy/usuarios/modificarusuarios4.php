<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Usuario</title>
    <style>

        body {
            font-family: 'Arial', sans-serif;
            background: url('../img/deportivo.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #FFFFFF;
            margin: 0;
            display: flex;
            min-height: 100vh;
            justify-content: center; 
            align-items: center;
        }

        h1 {
            font-size: 2.5rem;
            text-align: center;
            color: #000000;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
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

        .menu-lateral .main-button {
            background-color: #6A0DAD;
            color: #fff;
            font-size: 1.2rem;
            text-align: center;
            border: none;
            padding: 15px;
            cursor: pointer;
            width: 100%;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .menu-lateral .main-button:hover {
            background-color: #8A2BE2;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
            flex-grow: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        form {
            background-color: #1a1a1a;
            padding: 30px;
            border-radius: 10px;
            width: 50%;
            margin: auto;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
        }

        input, select {
            width: 100%; 
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #6a0dad;
            background-color: #333;
            color: #fff;
            box-sizing: border-box; 
        }

        input[type="submit"] {
            background-color: #6a0dad;
            color: #fff;
            cursor: pointer;
            border: none;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #8a2be2;
        }

        label {
            font-size: 1.2rem;
            color: #fff;
            display: block; 
            margin-bottom: 5px;
        }

        .message-container {
            text-align: center;
            margin-top: 50px;
            padding: 20px;
            background-color: rgba(29, 29, 29, 0.8);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 500px;
        }

        .success-message {
            font-size: 1.2rem;
            color: #4CAF50; 
            margin-bottom: 20px;
        }

        .error-message {
            font-size: 1.2rem;
            color: #FF5722; 
            margin-bottom: 20px;
        }

        .back-link {
            display: inline-block;
            padding: 10px 20px;
            color: #FFFFFF;
            background-color: #6A0DAD;
            text-decoration: none;
            font-size: 1rem;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.2s;
        }

        .back-link:hover {
            background-color: #8A2BE2;
            transform: scale(1.05);
        }
    </style>
</head>
<body>

    <div class="menu-lateral">
        <button class="main-button" onclick="location.href='../index.php'">Ir a la Principal</button>

        <div class="dropdown">
            <a href="javascript:void(0)">Coches</a>
            <div class="dropdown-content">
                <a href="../coches/añadircoches.html">Añadir Coche</a>
                <a href="../coches/listarcoches.php">Listar Coches</a>
                <a href="../coches/buscarcoches.html">Buscar Coche</a>
                <a href="../coches/modificarcoches.html">Modificar Coche</a>
                <a href="../coches/borrarcoches.php">Borrar Coche</a>
            </div>
        </div>

        <div class="dropdown">
            <a href="javascript:void(0)">Usuarios</a>
            <div class="dropdown-content">
                <a href="añadirusuarios.html">Añadir Usuario</a>
                <a href="listarusuarios.php">Listar Usuarios</a>
                <a href="buscarusuarios.html">Buscar Usuario</a>
                <a href="modificarusuarios.html">Modificar Usuario</a>
                <a href="borrarusuarios.php">Borrar Usuario</a>
            </div>
        </div>

        <div class="dropdown">
            <a href="javascript:void(0)">Alquileres</a>
            <div class="dropdown-content">
                <a href="../alquileres/listaralquileres.php">Listar Alquileres</a>
                <a href="../alquileres/borraralquileres.php">Borrar Alquileres</a>
            </div>
        </div>
    </div>

</body>
</html>




<?php

    $servername = "localhost";
    $username = "root";
    $password = "rootroot";
    $dbname = "concesionario";


    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn)
    {
        die("Conexion fallida". mysqli_connect_error());
    }

    $id = $_REQUEST['id_usuario'];

    $nombre = $_REQUEST['nombre'];
    $apellidos = $_REQUEST['apellidos'];
    $dni = $_REQUEST['dni'];
    $pass = $_REQUEST['password'];
    $saldo = $_REQUEST['saldo'];

    $sql = "UPDATE usuarios SET nombre='$nombre', apellidos='$apellidos', dni='$dni', password='$pass', saldo='$saldo' WHERE id_usuario = '$id'";

    echo "<div class='message-container'>";
    if (mysqli_query($conn, $sql))
    {
        echo "<p class='success-message'>Usuario actualizado con exito</p>";
    }
    else
    {
        echo "<p class='error-message'>Error al actualizar ". mysqli_error($conn). "</p>";
    }
    mysqli_close($conn);
    echo "<a href='modificarusuarios.html' class='back-link'>Volver a modificar</a>";
    echo "</div>";
?>