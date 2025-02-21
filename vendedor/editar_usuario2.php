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
        $mensaje = "✅ Usuario actualizado correctamente.";
    } else {
        $mensaje = "❌ Error al actualizar usuario.";
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario Editado</title>
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
            text-align: center;
        }

        .container {
            background-color: rgba(0, 0, 0, 0.8);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
            width: 40%;
        }

        h1 {
            color: #FFFFFF;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.2rem;
            margin-bottom: 20px;
        }

        .mensaje {
            font-weight: bold;
            padding: 10px;
            border-radius: 5px;
        }

        .mensaje.exito {
            color: #28A745;
        }

        .mensaje.error {
            color: #FF4747;
        }

        .boton {
            padding: 10px 20px;
            background-color: #6A0DAD;
            color: #FFFFFF;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1.2rem;
            font-weight: bold;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
            display: inline-block;
        }

        .boton:hover {
            background-color: #8A2BE2;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Edición de Usuario</h1>
    <p class="mensaje <?= (isset($mensaje) && strpos($mensaje, '✅') !== false) ? 'exito' : 'error' ?>">
        <?= isset($mensaje) ? $mensaje : "❌ Hubo un problema con la actualización." ?>
    </p>
    <a href="editar_usuario.php" class="boton">🔙 Volver</a>
    <a href="4index.php" class="boton">🏠 Inicio</a>
</div>

</body>
</html>
