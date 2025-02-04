<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido</title>
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
            <td>
                <?php
                session_start();

                if (!isset($_SESSION['nombre_usuario'])) {
                    header("Location: login.php");
                    exit();
                }

                $nombre_usuario = $_SESSION['nombre_usuario'];

                echo "Bienvenido, " . $nombre_usuario;
                ?>
            </td>
        </tr>
    </table>
</body>
</html>
