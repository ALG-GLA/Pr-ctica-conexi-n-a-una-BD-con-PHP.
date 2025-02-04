
<?php
session_start();
if (!isset($_SESSION['nombre_usuario']) || $_SESSION['rol'] != 'admin') {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre_usuario = $_POST['nombre_usuario'];
    $password = $_POST['password'];
    $rol = $_POST['rol'];

    include 'conexion.php';

    $stmt = $conn->prepare("UPDATE usuarios SET nombre_usuario = ?, password = ?, rol = ? WHERE id = ?");
    $stmt->bind_param("sssi", $nombre_usuario, $password, $rol, $id);
    $stmt->execute();

    echo "Usuario actualizado exitosamente";

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Usuario</title>
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
                <td><label for="id">ID del usuario a actualizar:</label></td>
                <td><input type="text" id="id" name="id" required></td>
            </tr>
            <tr>
                <td><label for="nombre_usuario">Nuevo nombre de usuario:</label></td>
                <td><input type="text" id="nombre_usuario" name="nombre_usuario" required></td>
            </tr>
            <tr>
                <td><label for="password">Nueva contraseña:</label></td>
                <td><input type="password" id="password" name="password" required></td>
            </tr>
            <tr>
                <td><label for="rol">Nuevo rol:</label></td>
                <td>
                    <select id="rol" name="rol">
                        <option value="admin">Admin</option>
                        <option value="estandar">Estandar</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;"><input type="submit" value="Actualizar Usuario"></td>
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
