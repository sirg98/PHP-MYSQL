<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Coches</title>
    <style>

        body {font-family: 'Arial', sans-serif;
            background: url('../img/deportivo.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #FFFFFF;
            margin: 0;
            display: flex;
            min-height: 100vh;}

        h1 {font-size: 2.5rem;
            text-align: center;
            color: #000000;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 1.5px;}

        .menu-lateral {background-color: #1D1D1D;
                    width: 250px;
                    position: fixed;
                    top: 0;
                    left: 0;
                    height: 100%;
                    padding-top: 20px;
                    z-index: 1000;
                    border-right: 2px solid #6A0DAD;}

        .menu-lateral a {display: block;
                        padding: 15px;
                        text-decoration: none;
                        color: #fff;
                        font-size: 1.2rem;
                        border-bottom: 1px solid #6A0DAD;}

        .menu-lateral a:hover {background-color: #8A2BE2;}

        .menu-lateral .dropdown-content {display: none;
                                        background-color: #333;
                                        border-left: 3px solid #6A0DAD;}

        .menu-lateral .dropdown-content a {padding-left: 30px;}

        .menu-lateral .dropdown:hover .dropdown-content {display: block;}

        .menu-lateral .main-button {background-color: #6A0DAD;
                                    color: #fff;
                                    font-size: 1.2rem;
                                    text-align: center;
                                    border: none;
                                    padding: 15px;
                                    cursor: pointer;
                                    width: 100%;
                                    margin-bottom: 20px;
                                    border-radius: 5px;}

        .menu-lateral .main-button:hover {background-color: #8A2BE2;}

        .main-content {margin-left: 250px;
                        padding: 20px;
                        flex-grow: 1;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        flex-direction: column;}

        table {width: 90%;
                margin: 20px auto;
                border-collapse: collapse;
                box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
                background-color: #000000;
                border-radius: 10px;
                overflow: hidden;
                color: #FFFFFF;
                border: 1px solid #6a0dad;}

        th {background-color: #6a0dad;
            color: #ffffff;
            padding: 15px;
            text-align: left;
            font-size: 1rem;}

        td {padding: 12px;
            border-bottom: 1px solid #6a0dad;
            text-align: left;
            color: #FFFFFF;}

        tr:nth-child(even) {background-color: #1a1a1a;}

        tr:hover {background-color: #6a0dad;
                color: #ffffff;}

        button {display: block;
                margin: 20px auto;
                padding: 10px 20px;
                font-size: 1rem;
                background-color: #6a0dad;
                color: #ffffff;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                transition: background-color 0.3s ease;}

        button:hover {background-color: #4e087b;}

        h1 + h1 {font-size: 1.5rem;
                text-align: center;
                color: #cccccc;
                margin-top: 50px;}
                
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

    <div class="main-content">
        <?php

        $servername = "localhost";
        $username = "root";
        $password = "rootroot";
        $dbname = "concesionario";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) 
        {
            die("Conexión fallida: " . mysqli_connect_error());
        }

        $sql = "SELECT id_coche, marca, modelo, color, precio FROM coches";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) 
        {
            echo "<h1>Listado de Coches</h1>";
            echo "<form action='borrarcoches2.php' method='post'>";
            echo "<table>";
            echo "<tr><th>Seleccionar</th><th>Marca</th><th>Modelo</th><th>Color</th><th>Precio</th><</tr>";

            while ($row = mysqli_fetch_assoc($result)) 
            {
                echo "<tr>";
                echo "<td><input type='checkbox' name='delete_ids[]' value='" . $row['id_coche'] . "'></td>";
                echo "<td>" . htmlspecialchars($row['marca']) . "</td>";
                echo "<td>" . htmlspecialchars($row['modelo']) . "</td>";
                echo "<td>" . htmlspecialchars($row['color']) . "</td>";
                echo "<td>" . htmlspecialchars($row['precio']) . "</td>";
                echo "</tr>";
            }

            echo "</table><br>";
            echo "<button type='submit'>Eliminar seleccionados</button>";
            echo "</form>";
        } 
        else 
        {
            echo "<h1>No hay coches disponibles</h1>";
        }
        mysqli_close($conn);
        ?>
    </div>
</body>
</html>
