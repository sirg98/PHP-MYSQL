<?php
    session_start();
    
    
    if (!isset($_SESSION['id_usuario'])) {
        header("Location: login.php");
        exit();
    }
    
    $servername = "localhost";
    $username = "root";
    $password = "rootroot";
    $dbname = "concesionario";
    $id = $_REQUEST['id_alquiler'];

    $conn = mysqli_connect ($servername, $username, $password, $dbname);
    if (!$conn)
    {
        die("Conexion fallida". mysqli_connect_error());
    }

    if (isset($_REQUEST['delete_ids']) && is_array($_REQUEST['delete_ids']))
    {
        $ids_to_delete = implode(",", array_map('intval', $_REQUEST['delete_ids']));
        
        $sql = "DELETE FROM alquileres WHERE id_alquiler in ($ids_to_delete)";
        if (mysqli_query($conn, $sql))
        {
            echo "<h1>Alquileres eliminados correctamente</h1>";
        }
        else 
        {
            echo "<h1>Error al eliminar alquileres: " . mysqli_error($conn) . "</h1>";
        }
    }
    else
    {
        echo "<h1>No has seleccionado ningún alquiler</h1>";
    }
    mysqli_close($conn);
    echo "<a href='borraralquileres.php'>Volver al listado</a>";
?>