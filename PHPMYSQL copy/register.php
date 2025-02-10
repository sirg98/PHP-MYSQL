<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta de Usuario</title>
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
            justify-content: center;
            min-height: 100vh;
        }

        h2 {
            font-size: 2rem;
            color: #ffffff;
            text-align: center;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }
        
        form {
            background-color: rgba(29, 29, 29, 0.9);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
            text-align: center;
        }

        label {
            font-size: 1rem;
            color: #FFFFFF;
            display: block;
            margin-bottom: 5px;
            text-align: left;
        }

        input[type="text"], input[type="password"] {
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
            background-color: #6A0DAD; 
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
            background-color: #8A2BE2;
            transform: scale(1.05);
        }

        .main-button {
            background-color: #6A0DAD;
            color: #fff;
            font-size: 1.2rem;
            text-align: center;
            border: none;
            padding: 12px;
            cursor: pointer;
            width: 100%;
            max-width: 400px;
            margin-top: 20px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }

        .main-button:hover {
            background-color: #8A2BE2;
        }

        select {background-color: #2D2D2D;
                color: #FFFFFF;
                border: 1px solid #444;
                border-radius: 5px;
                font-size: 1rem;
                padding: 10px;
                width: 100%;}
        
        
            
    </style>
</head>
<body>
    
    <form action="login.2.php" method="post">
    <h1>Regístrate</h1>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>

        <label for="apellidos">Apellidos:</label>
        <input type="text" name="apellidos" id="apellidos" required>

        <label for="dni">DNI:</label>
        <input type="text" name="dni" id="dni" required>

        <label for="saldo">Saldo:</label>
        <input type="text" name="saldo" id="saldo" required>

        <label for="tipo">¿Qué necesitas?:</label>
            <select name="tipo">
                <option value="comprador">Comprar</option>
                <option value="vendedor">Vender</option>
            </select><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
    
        <input type="submit" value="Alta">
    </form>

    <a href="index.php" class="main-button">Volver al Inicio</a>

</body>
</html>
