<?php
session_start();
if (!isset($_SESSION['nombre_usuario']) || $_SESSION['rol'] != 'admin') {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    include 'conexion.php';

    $stmt = $conn->prepare("DELETE FROM usuarios WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    echo "Usuario borrado exitosamente";

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Borrar Usuario/os</title>
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
    <form method="POST">
        <table>
            <tr>
                <td><label for="id">ID del usuario a borrar:</label></td>
                <td><input type="text" id="id" name="id" required></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;"><input type="submit" value="Borrar Usuario"></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <div class="button-container">
                        <a href="menu.php">Volver al Menú</a>
                    </div>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
