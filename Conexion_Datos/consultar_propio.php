<?php
session_start();
if (!isset($_SESSION['nombre_usuario'])) {
    header("Location: login.php");
    exit();
}

$nombre_usuario = $_SESSION['nombre_usuario'];

include 'conexion.php';

$stmt = $conn->prepare("SELECT id, nombre_usuario, rol FROM usuarios WHERE nombre_usuario = ?");
$stmt->bind_param("s", $nombre_usuario);
$stmt->execute();
$stmt->bind_result($id, $nombre_usuario, $rol);
$stmt->fetch();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Consultar Mis Datos</title>
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
        td {
            padding: 10px;
            font-family: Arial, sans-serif;
            font-size: 1.2em;
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
            <td>ID:</td>
            <td><?php echo $id; ?></td>
        </tr>
        <tr>
            <td>Nombre de Usuario:</td>
            <td><?php echo $nombre_usuario; ?></td>
        </tr>
        <tr>
            <td>Rol:</td>
            <td><?php echo $rol; ?></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">
                <div class="button-container">
                    <a href="menu.php">Volver al Menú</a>
                </div>
            </td>
        </tr>
    </table>
</body>
</html>
