<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSERTAR USUARIO</title>
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
            flex-direction: column;
            align-items: center;
            justify-content: center;
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

        .menu-lateral .dropdown a {
            padding: 15px;
            font-size: 1.2rem;
            color: white;
            text-decoration: none;
            border-bottom: 1px solid #6A0DAD;
        }

        .menu-lateral .dropdown a:hover {
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
            width: 100%;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .menu-lateral .main-button:hover {
            background-color: #8A2BE2;
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
                <a href="añadircoches.html">Añadir Coche</a>
                <a href="listarcoches.php">Listar Coches</a>
                <a href="buscarcoches.html">Buscar Coche</a>
                <a href="modificarcoches.html">Modificar Coche</a>
                <a href="borrarcoches.php">Borrar Coche</a>
            </div>
        </div>
        <div class="dropdown">
            <a href="javascript:void(0)">Usuarios</a>
            <div class="dropdown-content">
                <a href="../usuarios/añadirusuarios.html">Añadir Usuario</a>
                <a href="../usuarios/listarusuarios.php">Listar Usuarios</a>
                <a href="../usuarios/buscarusuarios.html">Buscar Usuario</a>
                <a href="../usuarios/modificarusuarios.html">Modificar Usuario</a>
                <a href="../usuarios/borrarusuarios.php">Borrar Usuario</a>
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

    <?php

        $servername = "localhost";
        $username = "root";
        $password = "rootroot";
        $dbname = "concesionario";

        $conn = mysqli_connect($servername, $username, $password, $dbname);

        if (!$conn) {
            die("Conexión fallida: " . mysqli_connect_error());
        }

        $marca = $_REQUEST['marca'];
        $modelo = $_REQUEST['modelo'];
        $precio = $_REQUEST['precio'];
        $color = $_REQUEST['color'];
        $foto = $_REQUEST['foto'];

        $alquilado = ($_REQUEST['alquilado'] === "si") ? 1 : 0;

        $sql = "INSERT INTO usuarios (nombre, apellidos, dni, password, saldo) VALUES ('$nombre', '$apellidos', '$dni', '$password', '$saldo')";
    
        echo "<div class='message-container'>";
        if (mysqli_query($conn, $sql)) 
        {
            echo "<p class='success-message'>Usuario insertado con éxito.</p>";
        } 
        else 
        {
            echo "<p class='error-message'>Error al insertar el usuario: " . mysqli_error($conn). "</p>";
        }

        mysqli_close($conn);
        echo "<a href='añadirusuarios.html' class='back-link'>Volver al menú</a>";
        echo "</div>";
    ?>

</body>
</html>















