<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Conexión a Base de Datos</title>
    <style>
        body {
            background-color: #f0f8ff; /* Fondo de la página */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        table {
            background-color: #87CEEB; /* Fondo azul cielo para la tabla */
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
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "practica_asir";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Conexión fallida: " . $conn->connect_error);
                }
                echo "Conexión exitosa";
                ?>
            </td>
        </tr>
    </table>
</body>
</html>

