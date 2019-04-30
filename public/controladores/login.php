<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <?php
    session_start();
    include '../../config/conexionBD.php';
    $usuario = isset($_POST["correo"]) ? mb_strtoupper(trim($_POST["correo"])) : null;
    $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;

    $pass = MD5($contrasena);
    echo $pass;
    $sql = "SELECT * FROM usuario WHERE usu_correo = '$usuario' and usu_password = '$pass'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $_SESSION['isLogged'] = TRUE;
        header("Location: ../../admin/vista/usuario/index.php");
    } else {
        header("Location: ../vista/login.html");
    }
    $conn->close();
    ?>
</body>

</html>