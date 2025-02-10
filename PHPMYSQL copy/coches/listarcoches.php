<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Coches</title>
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

        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            background-color: rgba(0, 0, 0, 0.8);
            border-radius: 10px;
            overflow: hidden;
            color: #FFFFFF;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        th {
            background-color: #6A0DAD;
            color: white;
            padding: 15px;
            text-align: left;
            font-size: 1rem;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #444;
            text-align: left;
        }

        tr:nth-child(even) {
            background-color: #111111;
        }

        tr:hover {
            background-color: #6A0DAD;
            color: #FFFFFF;
        }

        img {
            border-radius: 5px;
        }

        p {
            text-align: center;
            font-size: 1.2rem;
            color: #BBBBBB;
        }

        @media (max-width: 768px) {
            .menu-lateral {
                width: 200px;
            }

            .main-content {
                margin-left: 200px;
            }

            table {
                width: 100%;
            }
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

    <div class="main-content">
        <h1>Listado de coches</h1>

        <?php

        $conn = mysqli_connect("localhost", "root", "rootroot") 
            or die("No se puede conectar con el servidor");

        mysqli_select_db($conn, "concesionario") 
            or die("No se puede seleccionar la base de datos");

        $sql = "SELECT * FROM Coches";
        $result = mysqli_query($conn, $sql) 
            or die("Fallo en la consulta");

            $nfilas = mysqli_num_rows($result);
            if ($nfilas > 0) 
            {
                echo "<table>";
                echo "<tr>
                    <th>Id</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Color</th>
                    <th>Precio</th>
                    <th>Alquilado</th>
                    <th>Foto</th>
                </tr>";
    
                while ($resultado = mysqli_fetch_array($result)) 
                {
                    echo "<tr>
                        <td>{$resultado['id_coche']}</td>
                        <td>{$resultado['marca']}</td>
                        <td>{$resultado['modelo']}</td>
                        <td>{$resultado['color']}</td>
                        <td>{$resultado['precio']}</td>
                        <td>{$resultado['alquilado']}</td>
                        <td><img src='../img/{$resultado['foto']}' style='width:100px;'></td>
                    </tr>";
                }
                echo "</table>";
            } 
            else 
            {
                echo "<p>No hay coches disponibles.</p>";
            }

        mysqli_close($conn);
        ?>
    </div>

</body>
</html>
