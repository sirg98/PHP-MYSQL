<?php
$servername = "localhost";
$username = "root";
$password = "rootroot";
$dbname = "concesionario";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$user = trim($_REQUEST['nombre']);
$ape = trim($_REQUEST['apellidos']);
$pass = trim($_REQUEST['password']);

$sql = "SELECT * FROM usuarios WHERE nombre = '$user' AND apellidos = '$ape'";
$result = mysqli_query($conn, $sql);

if ($row = mysqli_fetch_assoc($result)) {
    if (password_verify($pass, $row['password'])) {
        // Si el usuario es admin, redirigir a 2index.php
        if ($row['tipo'] === 'admin') {
            header("Location: ./admin/2index.php");
            exit();
        }
    } else {
        $error = "Contraseña incorrecta.";
    }
} else {
    $error = "Usuario no encontrado.";
}

mysqli_close($conn);
?>
