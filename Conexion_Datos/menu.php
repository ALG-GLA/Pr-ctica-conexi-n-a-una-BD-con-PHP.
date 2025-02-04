<?php
session_start();

if (!isset($_SESSION['nombre_usuario'])) {
    header("Location: login.php");
    exit();
}

$nombre_usuario = $_SESSION['nombre_usuario'];
$rol = $_SESSION['rol']; 

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Menú Principal</title>
    <style>
        body {
            background-color: #f0f8ff; /* estilo para la pagina */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        table {
            background-color: #87CEEB; 
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        td {
            padding: 10px;
            font-family: Arial, sans-serif;
            font-size: 1.2em;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <td colspan="2" style="text-align: center;">Bienvenido, <?php echo $nombre_usuario; ?></td>
        </tr>
        <?php if ($rol == 'admin'): ?>
            <tr>
                <td><a href="crear_usuario.php">Crear Usuario</a></td>
            </tr>
            <tr>
                <td><a href="actualizar_usuario.php">Actualizar Usuario</a></td>
            </tr>
            <tr>
                <td><a href="borrar_usuario.php">Borrar Usuario</a></td>
            </tr>
            <tr>
                <td><a href="consultar_todos.php">Consultar Todos los Usuarios</a></td>
            </tr>
        <?php else: ?>
            <tr>
                <td><a href="consultar_propio.php">Consultar Mis Datos</a></td>
            </tr>
        <?php endif; ?>
        <tr>
            <td><a href="logout.php">Cerrar Sesión</a></td>
        </tr>
    </table>
</body>
</html>

