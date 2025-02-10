<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concesionario</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: url('img/deportivo.jpg') no-repeat center center fixed; 
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
        <h1>Concesionario</h1>
    </header>

    <div class="menu-lateral">
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
    </div>

    <div class="main-content">
        <h2>Bienvenido al Concesionario</h2>
        <p>En esta página podrás consultar todas las opciones disponibles.</p>
        <p>¿Qué vas a encontrar?</p>
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
