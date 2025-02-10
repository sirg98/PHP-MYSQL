<?php
    $servername = "localhost";
    $username = "root";
    $password = "rootroot";
    $dbname = "concesionario";
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn)
    {
        die ("Connection failed ". mysqli_connect_error());
    }

    $user = $_REQUEST['nombre'];
    $ape = $_REQUEST['apellidos'];
    $pass = trim($_REQUEST['password']);

    
    $sql = "SELECT * FROM usuarios 
    WHERE nombre = '$user' 
    AND apellidos = '$ape'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1)
    {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($pass, $row['password'])) {
            echo "<h1>¡Bienvenido, ".htmlspecialchars($user)."!</h1>";
        }
        
    }
    else
    {
        echo "<h1> Invalido el usuario o password.</h1>";
        echo "<a href='login.php'>Intentar de nuevo</a>";
    }
    mysqli_close($conn);
?>