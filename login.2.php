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

    var_dump($_POST); 
    $user = trim(htmlspecialchars($_REQUEST['nombre'] ?? ''));
    $ape = trim(htmlspecialchars($_REQUEST['apellidos'] ?? ''));
    $dni = trim(htmlspecialchars($_REQUEST['dni'] ?? ''));
    $saldo = floatval($_REQUEST['saldo'] ?? 0); 
    $tipo = $_POST['tipo'] ?? 'comprador';
    $pass = trim($_REQUEST['password']);
    $hash_pass = password_hash($pass, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nombre, apellidos, dni, saldo, tipo, password) 
    values ('$user', '$ape', '$dni', '$saldo', '$tipo', '$hash_pass')";


    if (mysqli_query($conn, $sql))
    {
        echo "<h1>Usuario creado!</h1>";
        echo "$sql";
    }
    else
    {
        echo "<h1> Error ". mysqli_error($conn);
    }
    mysqli_close($conn);
?>