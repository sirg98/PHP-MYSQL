<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de la Búsqueda</title>
    <style>

        body {
            font-family: 'Arial', sans-serif;
            background: url('../../img/deportivo.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #FFFFFF;
            margin: 0;
            padding: 0;
            display: flex;
            min-height: 100vh;
            flex-direction: column;
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
            margin-left: 270px;
            padding: 20px;
            flex-grow: 1;
        }

        h1 {
            text-align: center;
            color: #FFFFFF;
            margin-bottom: 20px;
            font-size: 2.5rem;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            border-radius: 10px;
            overflow: hidden;
            color: #FFFFFF;
            background-color: #1D1D1D;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        th {
            background-color: #6A0DAD;
            color: white;
            padding: 15px;
            text-align: left;
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

        .no-results {
            text-align: center;
            margin: 20px 0;
            font-size: 1.2rem;
            color: #FFFFFF;
        }

        .modify-button {
            background-color: #6A0DAD;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            text-align: center;
            transition: background-color 0.3s ease;
        }
    </style>
</head>
<body>

    <div class="menu-lateral">
        <button class="main-button" onclick="location.href='../2index.php'">Ir a la Principal</button>

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
        <h1>Resultado de la Búsqueda</h1>
        <?php

        $conn = mysqli_connect("localhost", "root", "rootroot", "concesionario");

        if (!$conn) 
        {
            die("<p class='no-results'>Error de conexión: " . mysqli_connect_error() . "</p>");
        }

        $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : '';
        $apellidos = isset($_POST['apellidos']) ? trim($_POST['apellidos']) : '';
        $dni = isset($_POST['dni']) ? trim($_POST['dni']) : '';    

        if (empty($nombre) && empty($apellidos) && empty($dni)) 
        {
            echo "<p class='no-results'>Por favor, ingresa al menos un criterio de búsqueda.</p>";
        } 
        else 
        {
            $sql = "SELECT id_usuario, nombre, apellidos, dni, saldo FROM usuarios WHERE 1=1";
            if (!empty($nombre)) 
            {
                $sql .= " AND nombre LIKE '%" . mysqli_real_escape_string($conn, $nombre) . "%'";
            }
            if (!empty($apellidos)) 
            {
                $sql .= " AND apellidos LIKE '%" . mysqli_real_escape_string($conn, $apellidos) . "%'";
            }
            if (!empty($dni)) 
            {
                $sql .= " AND dni = '" . mysqli_real_escape_string($conn, $dni) . "'";
            }

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) 
            {
                echo "<table>";
                echo "<tr><th>ID</th><th>Nombre</th><th>Apellidos</th><th>DNI</th><th>Saldo</th></tr>";

                while ($row = mysqli_fetch_assoc($result)) 
                {
                    echo "<form action='modificarusuarios3.php' method='post'";
                    echo "<tr>";
                    echo "<input type='text' name='id_usuario' value='". htmlspecialchars($row['id_usuario']) ."' hidden>";
                    echo "<td><button class='modify-button' type='submit'>Modificar</button></td>";
                    echo "<td>" . htmlspecialchars($row['nombre']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['apellidos']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['dni']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['saldo']) . "€</td>";
                    echo "</tr>";
                    echo "</form>";
                }

                echo "</table>";
            } 
            else 
            {
                echo "<div class='no-results'>No se encontraron usuarios con los criterios de búsqueda</div>";
            }
        }
        
        mysqli_close($conn);
        ?>
    </div>
</body>
</html>
