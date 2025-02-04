<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
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
    </style>
</head>
<body>
    <form action="login.php" method="POST">
        <table>
            <tr>
                <td><label for="nombre_usuario">Nombre de usuario:</label></td>
                <td><input type="text" id="nombre_usuario" name="nombre_usuario" required></td>
            </tr>
            <tr>
                <td><label for="password">Contraseña:</label></td>
                <td><input type="password" id="password" name="password" required></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;"><input type="submit" value="Iniciar Sesión"></td>
            </tr>
        </table>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include 'conexion.php'; 

        $nombre_usuario = $_POST['nombre_usuario'];
        $password = $_POST['password'];

        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE nombre_usuario = ? AND password = ?");
        $stmt->bind_param("ss", $nombre_usuario, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            session_start();
            $row = $result->fetch_assoc();
            $_SESSION['nombre_usuario'] = $nombre_usuario;
            $_SESSION['rol'] = $row['rol']; 
            header("Location: menu.php");
            exit();
        } else {
            echo "contraseña incorrecta";
        }

        $stmt->close();
        $conn->close();
    }
    ?>
</body>
</html>
