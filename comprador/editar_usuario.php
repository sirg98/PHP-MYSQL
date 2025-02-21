<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_SESSION['nombre'])) {
    header("Location: login.php");
    exit();
}

$conn = mysqli_connect("localhost", "root", "rootroot", "concesionario");

if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

$id_usuario = $_SESSION['id_usuario'];


$sql_usuario = "SELECT nombre, apellidos, saldo FROM usuarios WHERE id_usuario = '$id_usuario'";
$result_usuario = mysqli_query($conn, $sql_usuario);
$usuario = mysqli_fetch_assoc($result_usuario);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nuevo_saldo = $_POST["saldo"];
    $nueva_password = $_POST["password"];

    
    if (!empty($nueva_password)) {
        $hashed_password = password_hash($nueva_password, PASSWORD_BCRYPT);
        $sql_update = "UPDATE usuarios SET saldo = '$nuevo_saldo', password = '$hashed_password' WHERE id_usuario = '$id_usuario'";
    } else {
        $sql_update = "UPDATE usuarios SET saldo = '$nuevo_saldo' WHERE id_usuario = '$id_usuario'";
    }

    if (mysqli_query($conn, $sql_update)) {
        echo "<p class='mensaje exito'>✅ Datos actualizados correctamente.</p>";
        // Recargar datos del usuario
        $result_usuario = mysqli_query($conn, $sql_usuario);
        $usuario = mysqli_fetch_assoc($result_usuario);
    } else {
        echo "<p class='mensaje error'>❌ Error al actualizar los datos.</p>";
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: url('../img/deportivo.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #FFFFFF;
            margin: 0;
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

        .menu-lateral .logout-button:hover {
            background-color: #218838;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
            flex-grow: 1;
            width: calc(100% - 250px);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            text-align: center;
            color: #FFFFFF;
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        form {
            background-color: rgba(0, 0, 0, 0.8);
            width: 40%;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        label {
            font-size: 1.2rem;
            display: block;
            margin-bottom: 5px;
        }

        input {
            width: 80%;
            padding: 10px;
            margin: 0 auto;
            display: block;
            border-radius: 5px;
            border: none;
            font-size: 1rem;
            text-align: center;
        }

        .boton {
            width: 80%;
            padding: 10px;
            background-color: #6A0DAD;
            color: #FFFFFF;
            text-decoration: none;
            text-align: center;
            border-radius: 5px;
            font-size: 1.2rem;
            font-weight: bold;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
            display: block;
            margin: 0 auto;
        }

        .boton:hover {
            background-color: #8A2BE2;
        }

        .mensaje {
            text-align: center;
            font-size: 1.2rem;
            font-weight: bold;
            margin-top: 20px;
        }

        .mensaje.exito {
            color: #28A745;
        }

        .mensaje.error {
            color: #FF4747;
        }
    </style>
</head>
<body>

<div class="menu-lateral">
    <a href="4index.php" class="main-button">🏠 Volver al Inicio</a>
    <a href="listarcoches.php">Listar Coches</a>
    <a href="mis_coches.php">Mis Coches</a> 
    <a href="editar_usuario.php">Editar Usuario</a>
    <a href="../logout.php" class="logout-button">🚪 Cerrar Sesión</a>
</div>

<div class="main-content">
    <h1>Editar Perfil</h1>

    <form action="editar_usuario2.php" method="post">

        <div class="form-group">
            <label>Nombre:</label>
            <input type="text" value="<?= $usuario['nombre'] ?>" disabled>
        </div>

        <div class="form-group">
            <label>Apellidos:</label>
            <input type="text" value="<?= $usuario['apellidos'] ?>" disabled>
        </div>

        <div class="form-group">
            <label>Saldo (€):</label>
            <input type="text" name="saldo" value="<?= $usuario['saldo'] ?>" required>
        </div>

        <div class="form-group">
            <label>Nueva Contraseña (opcional):</label>
            <input type="password" name="password" placeholder="Escribe tu nueva contraseña">
        </div>

        <button type="submit" class="boton">Guardar Cambios</button>
    </form>
</div>

</body>
</html>
