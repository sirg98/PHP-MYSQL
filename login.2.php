<?php
$servername = "localhost";
$username = "root";
$password = "rootroot";
$dbname = "concesionario";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed " . mysqli_connect_error());
}

$user = trim(htmlspecialchars($_REQUEST['nombre'] ?? ''));
$ape = trim(htmlspecialchars($_REQUEST['apellidos'] ?? ''));
$dni = trim(htmlspecialchars($_REQUEST['dni'] ?? ''));
$saldo = floatval($_REQUEST['saldo'] ?? 0);
$tipo = $_POST['tipo'] ?? 'comprador';
$pass = trim($_REQUEST['password']);
$hash_pass = password_hash($pass, PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios (nombre, apellidos, dni, saldo, tipo, password) 
        VALUES ('$user', '$ape', '$dni', '$saldo', '$tipo', '$hash_pass')";

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario Creado</title>
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

        .success-message {
            font-size: 1.5rem;
            color: #4CAF50;
            margin-bottom: 20px;
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
    <?php
    if (mysqli_query($conn, $sql)) {
        echo "<p class='success-message'>¡Usuario creado exitosamente!</p>";
    } else {
        echo "<p class='error-message'>Error: " . mysqli_error($conn) . "</p>";
    }
    mysqli_close($conn);
    ?>
    <a href="index.php" class="back-button">🏠 Volver al Inicio</a>
</div>

</body>
</html>
