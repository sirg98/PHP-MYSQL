<?php

    $servername = "localhost";
    $username = "root";
    $password = "rootroot";
    $dbname = "concesionario";
    $id = $_REQUEST['id_usuario'];
    


    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) 
    {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM usuarios WHERE id_usuario = '$id'";
    
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) 
    {
        $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Usuarioe</title>
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

        .error {
            color: red;
            text-align: center;
            font-size: 1.2rem;
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

    <div class="main-content">
        <h1>Actualizar Coche</h1>
        <form action="modificarusuarios4.php" method="post">
            <input type="text" readonly name="id_usuario" value="<?php echo $row['id_usuario']; ?>"><br><br>
            
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>" required><br>
            
            <label for="apellidos">Apellidos:</label>
            <input type="text" name="apellidos" value="<?php echo $row['apellidos']; ?>" required><br>
            
            <label for="dni">DNI:</label>
            <input type="text" name="dni" value="<?php echo $row['dni']; ?>" required><br>
            
            <label for="saldo">Saldo:</label>
            <input type="text" name="saldo" value="<?php echo $row['saldo']; ?>" required><br>

            <label for="password">Contraseña:</label>
            <input type="password" name="password" value="<?php echo $row['password']; ?>" ><br>

            <input type="submit" value="Actualizar">
        </form>
    </div>
</body>
</html>
<?php
    } 
    else
    {
        echo "<div class='no-results'>No se encontró el coche.</div>";
    }


    mysqli_close($conn);
?>
