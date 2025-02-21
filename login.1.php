<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "rootroot";
$dbname = "concesionario";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

$nombre = trim($_POST['nombre']);
$pass = trim($_POST['password']);

$sql = "SELECT * FROM usuarios WHERE nombre = '$nombre'";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $nombre);  
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
    if (password_verify($pass, $row['password'])) {
        $_SESSION['nombre'] = $row['nombre'];
        $_SESSION['tipo'] = $row['tipo'];
        $_SESSION['id_usuario'] = $row['id_usuario'];

        
        switch ($row['tipo']) {
            case 'admin':
                header("Location: ./admin/2index.php");
                exit();
            case 'vendedor':
                header("Location: ./vendedor/3index.php");
                exit();
            case 'comprador':
                header("Location: ./comprador/4index.php");
                exit();
            default:
                die("Error: Tipo de usuario no reconocido.");
        }
    } else {
        $error_message = "Contraseña incorrecta.";
    }
} else {
    $error_message = "Usuario no encontrado.";
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario No Encontrado</title>
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
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .message-container {
            text-align: center;
            background-color: rgba(29, 29, 29, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 500px;
        }

        .error-message {
            font-size: 1.5rem;
            color: #FF5722;
            margin-bottom: 20px;
        }

        .back-button {
            display: inline-block;
            padding: 12px 20px;
            color: #FFFFFF;
            background-color: #6A0DAD;
            text-decoration: none;
            font-size: 1.2rem;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.2s;
        }

        .back-button:hover {
            background-color: #8A2BE2;
            transform: scale(1.05);
        }
    </style>
</head>
<body>

<div class="message-container">
    <p class="error-message"><?php echo isset($error_message) ? $error_message : "Ha ocurrido un error."; ?></p>
    <a href="index.php" class="back-button">🏠 Volver al Inicio</a>
</div>

</body>
</html>
