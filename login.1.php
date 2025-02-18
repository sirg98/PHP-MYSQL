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
mysqli_stmt_bind_param($stmt, "s", $user);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
    if (password_verify($pass, $row['password'])) {
        $_SESSION['nombre'] = $row['nombre'];
        $_SESSION['tipo'] = $row['tipo'];

        // Redirigir según el tipo de usuario
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
        die("Error: Contraseña incorrecta.");
    }
} else {
    die("Error: Usuario no encontrado.");
}

mysqli_close($conn);
?>
