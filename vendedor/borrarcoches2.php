<?php
session_start();

$id = $_SESSION['id_usuario'];

if (!isset($_SESSION['nombre'])) {
    header("Location: login.php"); 
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar Coche</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: url('../img/deportivo.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #FFFFFF;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
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
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .menu-lateral a {
            display: block;
            width: 90%;
            padding: 15px;
            text-decoration: none;
            color: #fff;
            font-size: 1.2rem;
            border-bottom: 1px solid #6A0DAD;
            text-align: center;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .menu-lateral a:hover {
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
            width: 90%;
            margin: 10px 0;
            border-radius: 5px;
            display: block;
            text-decoration: none;
        }

        .menu-lateral .main-button:hover {
            background-color: #8A2BE2;
        }

        .menu-lateral .logout-button {
            background-color: #28A745; 
            color: #fff;
            font-size: 1.2rem;
            text-align: center;
            border: none;
            padding: 15px;
            cursor: pointer;
            width: 90%;
            margin: 10px 0;
            border-radius: 5px;
            display: block;
            text-decoration: none;
            font-weight: bold;
        }

        .menu-lateral .logout-button:hover {
            background-color: #218838; 
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
    <a href="3index.php" class="main-button">🏠 Volver al Inicio</a>
    <a href="añadircoches.php">Añadir Coche</a>
    <a href="borrarcoches.php">Borrar Coche</a>
    <a href="listarcoches.php">Listar Coches</a>
    <a href="editar_usuario.php">Editar Usuario</a>

    <a href="../logout.php" class="logout-button">🚪 Cerrar Sesión</a>
</div>

<div class="message-container">
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "rootroot";
    $dbname = "concesionario";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    if (isset($_REQUEST['delete_ids']) && is_array($_REQUEST['delete_ids'])) {
        $ids_to_delete = implode(",", array_map('intval', $_REQUEST['delete_ids']));
        
        $sql = "DELETE FROM coches WHERE id_coche IN ($ids_to_delete)";
        if (mysqli_query($conn, $sql)) {
            echo "<p class='success-message'>Coches eliminados correctamente</p>";
        } else {
            echo "<p class='error-message'>Error al eliminar coches: " . mysqli_error($conn) . "</p>";
        }
    } else {
        echo "<h1>No has seleccionado ningún coche</h1>";
    }
    
    mysqli_close($conn);
    ?>
    <a href='borrarcoches.php' class='back-link'>Volver al listado</a>
</div>

</body>
</html>
