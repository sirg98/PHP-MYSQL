<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuestros Coches</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: url('./img/deportivo.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #FFFFFF;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }

        .auth-buttons {
            margin-top: 20px;
        }

        .auth-buttons button {
            background-color: #6A0DAD;
            color: #fff;
            font-size: 1.2rem;
            border: none;
            padding: 15px;
            cursor: pointer;
            margin: 5px;
            border-radius: 5px;
        }

        .auth-buttons button:hover {
            background-color: #8A2BE2;
        }

        h1 {
            text-align: center;
            color: #6A0DAD;
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .catalogo {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            width: 80%;
        }

        .coche {
            background-color: rgba(0, 0, 0, 0.8);
            border-radius: 10px;
            padding: 15px;
            width: 250px;
            text-align: center;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .coche img {
            width: 100%;
            border-radius: 5px;
        }

        .coche p {
            margin: 10px 0;
            font-size: 1rem;
            color: #FFFFFF;
        }
    </style>
</head>
<body>

    <div class="auth-buttons">
        <button onclick="location.href='login.html'">Iniciar Sesión</button>
        <button onclick="location.href='register.html'">Regístrate</button>
    </div>

    <h1>Nuestros coches</h1>

    <div class="catalogo">
    <?php
    $conn = mysqli_connect("localhost", "root", "rootroot") 
        or die("No se puede conectar con el servidor");

    mysqli_select_db($conn, "concesionario") 
        or die("No se puede seleccionar la base de datos");

    $sql = "SELECT * FROM Coches";
    $result = mysqli_query($conn, $sql) 
        or die("Fallo en la consulta");

    $nfilas = mysqli_num_rows($result);
    if ($nfilas > 0) 
    {
        while ($resultado = mysqli_fetch_array($result)) 
        {
            echo "<div class='coche'>
                <img src='./img/{$resultado['foto']}' alt='Foto de {$resultado['modelo']}'>
                <p><strong>Marca:</strong> {$resultado['marca']}</p>
                <p><strong>Modelo:</strong> {$resultado['modelo']}</p>
                <p><strong>Color:</strong> {$resultado['color']}</p>
                <p><strong>Precio:</strong> {$resultado['precio']}€</p>
            </div>";
        }
    } 
    else 
    {
        echo "<p>No hay coches disponibles.</p>";
    }

    mysqli_close($conn);
    ?>
    </div>
</body>
</html>