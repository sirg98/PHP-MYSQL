<?php
session_start();


if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BORRAR USUARIO</title>
</head>
<body>
    <style>

        body {
            font-family: 'Arial', sans-serif;
            background-color: #000000;
            color: #FFFFFF;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        h1 {
            font-size: 2rem;
            text-transform: uppercase;
            color: #FFFFFF;
            margin-bottom: 20px;
            text-align: center;
            letter-spacing: 1.5px;
        }

        form {
            background-color: #1D1D1D;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }

        label {
            font-size: 1rem;
            color: #FFFFFF;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 20px;
            border: 1px solid #444;
            border-radius: 5px;
            background-color: #2D2D2D;
            color: #FFFFFF;
            font-size: 1rem;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #FF4500; 
            color: #FFFFFF;
            border: none;
            padding: 12px;
            font-size: 1rem;
            cursor: pointer;
            border-radius: 5px;
            width: 100%;
            transition: background-color 0.3s, transform 0.2s;
        }

        input[type="submit"]:hover {
            background-color: #FF6347; 
            transform: scale(1.05);
        }

        @media (max-width: 768px) {
            form {
                padding: 20px;
            }

            h1 {
                font-size: 1.8rem;
            }

            input[type="submit"] {
                font-size: 0.9rem;
            }
        }

    </style>
    <h1>BORRAR USUARIO</h1>
    <form action="borrarusuarios2.php" method="post">

        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre"><br><br>
        
        <label for="apellidos">Apellidos: </label>
        <input type="text" name="apellidos" id="apellidos"><br><br>

        <label for="dni">DNI: </label>
        <input type="text" name="dni" id="dni"><br><br>

        
    
        <input type="submit" value="Buscar">

    </form>
</body>
</html>