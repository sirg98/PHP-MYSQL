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
    <title>ALQUILERES</title>
</head>
<style>
    body {font-family: 'Arial', sans-serif;
         background-color: #000000;
         color: #FFFFFF;
         margin: 0;
         padding: 20px;
         display: flex;
         flex-direction: column;
         align-items: center;}

    h1 {font-size: 2.5rem;
        margin-bottom: 30px;
        color: #FFFFFF;
        text-transform: uppercase;
        letter-spacing: 2px;
        text-align: center;}

    form {margin: 15px 0;}

    input[type="submit"] {background-color: #6A0DAD; 
                         color: #FFFFFF;
                         border: none;
                         padding: 12px 20px;
                         font-size: 1rem;
                         cursor: pointer;
                         border-radius: 5px;
                         transition: background-color 0.3s, transform 0.2s;}

    input[type="submit"]:hover {background-color: #8A2BE2; 
                                transform: scale(1.05);}

    body::before {content: '';
                  position: fixed;
                  top: 0;
                  left: 0;
                  width: 100%;
                  height: 100%;
                  background-image: linear-gradient(135deg, #1D1D1D, #000000);
                  z-index: -1;}

</style>
<body>
<h1>COCHES</h1>
<form action="añadircoches.html" method="post">
<input type="submit" value="Añadir coche">      
</form>
<form action="listaralquileres.php" method="post">
<input type="submit" value="Listar coches">     
</form>
<form action="buscarcoches.html" method="post">
<input type="submit" value="Buscar coche">
</form>
<form action="modificarcoches.html" method="post">
<input type="submit" value="Modificar coche">
</form>
<form action="borrarcoches.html" method="post">
<input type="submit" value="Borrar coche">
</form>


</body>
</html>
