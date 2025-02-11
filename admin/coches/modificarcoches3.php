<?php

    $servername = "localhost";
    $username = "root";
    $password = "rootroot";
    $dbname = "concesionario";
    $id = $_REQUEST['id_coche'];

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) 
    {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM coches WHERE id_coche = '$id'";
    
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
    <title>Actualizar Coche</title>

    
    <style>


        body {
            font-family: 'Arial', sans-serif;
            background: url('../../img/deportivo.jpg') no-repeat center center fixed;
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
        <button class="main-button" onclick="location.href='../2index.php'">Ir a la Principal</button>

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

    <div class="main-content">
        <h1>Actualizar Coche</h1>
        <form action="modificarcoches4.php" method="post">
            <input type="text" readonly name="id_coche" value="<?php echo $row['id_coche']; ?>"><br><br>
            <label for="marca">Marca:</label>
            <input type="text" name="marca" value="<?php echo $row['marca']; ?>" required><br>
            
            <label for="modelo">Modelo:</label>
            <input type="text" name="modelo" value="<?php echo $row['modelo']; ?>" required><br>
            
            <label for="color">Color:</label>
            <input type="text" name="color" value="<?php echo $row['color']; ?>" required><br>
            
            <label for="precio">Precio:</label>
            <input type="text" name="precio" value="<?php echo $row['precio']; ?>" required><br>

            <label for="alquilado">Alquilado:</label>
            <select name="alquilado">
                <option value="1" <?php if ($row['alquilado'] == '1') echo 'selected'; ?> >Sí</option>
                <option value="0" <?php if ($row['alquilado'] == '0') echo 'selected'; ?> >No</option>
            </select><br>

            <label for="foto">Foto:</label>
            <input type="file" name="foto" value="<?php echo $row['foto']; ?>" ><br>

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
