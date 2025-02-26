<?php
session_start();


if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSERTAR COCHE</title>
    <style>
        body {font-family: 'Arial', sans-serif;
            background: url('../../img/deportivo.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #FFFFFF;
            margin: 0;
            padding: 0;
            display: flex;
            min-height: 100vh;}

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

        .menu-lateral .dropdown a {padding: 15px;
                                font-size: 1.2rem;
                                color: white;
                                text-decoration: none;
                                border-bottom: 1px solid #6A0DAD;}

        .menu-lateral .dropdown a:hover {background-color: #8A2BE2;}

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
        
        .main-content {margin-left: 250px;
                    padding: 20px;
                    min-height: 100vh;
                    flex-grow: 1;}

        h2 {font-size: 2rem;
            color: #ffffff;
            text-align: center;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 1.5px;}
        
        form {background-color: rgba(29, 29, 29, 0.9);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            margin: 0 auto;}

        label {font-size: 1rem;
            color: #FFFFFF;
            display: block;
            margin-bottom: 5px;}

        input[type="text"], input[type="file"], select {width: 100%;
                                                        padding: 10px 12px;
                                                        margin-bottom: 20px;
                                                        border: 1px solid #444;
                                                        border-radius: 5px;
                                                        background-color: #2D2D2D;
                                                        color: #FFFFFF;
                                                        font-size: 1rem;
                                                        box-sizing: border-box;}

        input[type="submit"] {background-color: #6A0DAD; 
                            color: #FFFFFF;
                            border: none;
                            padding: 12px;
                            font-size: 1rem;
                            cursor: pointer;
                            border-radius: 5px;
                            width: 100%;
                            transition: background-color 0.3s, transform 0.2s;}

        input[type="submit"]:hover {background-color: #8A2BE2;
                                transform: scale(1.05);}

        select {background-color: #2D2D2D;
                color: #FFFFFF;
                border: 1px solid #444;
                border-radius: 5px;
                font-size: 1rem;
                padding: 10px;}

        @media (max-width: 768px) {.menu-lateral {width: 200px;
                                                padding-top: 10px;}

                                    .main-content {margin-left: 0;}}

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
        <a href="../../logout.php" class="logout-button">🚪 Cerrar Sesión</a>

    </div>

    <div class="main-content">
        
        <form action="añadircoches2.php" method="post" enctype="multipart/form-data">
            <h2>Insertar coche</h2>
            <label for="marca">Marca:</label>
            <input type="text" name="marca" id="marca" required><br><br>

            <label for="modelo">Modelo:</label>
            <input type="text" name="modelo" id="modelo" required><br><br>

            <label for="precio">Precio:</label>
            <input type="text" name="precio" id="precio" required><br><br>

            <label for="color">Color:</label>
            <input type="text" name="color" id="color" required><br><br>

            <label for="alquilado">Alquilado:</label>
            <select name="alquilado">
                <option value="si" name="1">Si</option>
                <option value="no" name="0">No</option>
            </select><br><br>

            <label for="foto">Foto:</label>
            <input type="file" name="foto" id="foto" accept="image/*"><br><br>

            <input type="submit" value="Insertar">
        </form>
    </div>

</body>
</html>
