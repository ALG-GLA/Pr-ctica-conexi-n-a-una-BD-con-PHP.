<?php
session_start();
if (!isset($_SESSION['nombre_usuario']) || $_SESSION['rol'] != 'admin') {
    header("Location: login.php");
    exit();
}

include 'conexion.php';

$sql = "SELECT id, nombre_usuario, rol FROM usuarios";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Consultar Todos los Usuarios</title>
    <style>
        body {
            background-color: #87CEEB; /* estilo para la pagina */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        table {
            background-color: #98FB98; 
            border: 2px solid #32CD32; 
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        td, th {
            padding: 10px;
            font-family: Arial, sans-serif;
            font-size: 1.2em;
        }
        th {
            background-color: #32CD32; 
        }
        .button-container {
            text-align: center;
            margin-top: 20px;
        }
        .button-container a {
            background-color: #32CD32;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre de Usuario</th>
            <th>Rol</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["id"]. "</td><td>" . $row["nombre_usuario"]. "</td><td>" . $row["rol"]. "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No hay usuarios registrados</td></tr>";
        }
        $conn->close();
        ?>
        <tr>
            <td colspan="3" style="text-align: center;">
                <div class="button-container">
                    <a href="menu.php">Volver al Menú</a>
                </div>
            </td>
        </tr>
    </table>
</body>
</html>
