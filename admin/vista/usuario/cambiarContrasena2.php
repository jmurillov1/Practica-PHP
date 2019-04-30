<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Sistema de Gestion de Usuarios</title>
    <link href="../../../public/vista/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <header class="cab">
        <h1>Comprobación de Cambio de Contraseña</h1>
    </header>
    <?php
    date_default_timezone_set('America/Guayaquil');
    include '../../../config/conexionBD.php';
    $codigo = $_GET["codigo"];
    $contraseñaActual = $_POST["contraActual"];
    $contraseñaNueva = $_POST["contraNueva"];
    $contrasena = MD5($contraseñaNueva);
    $fechaMod = date('Y-m-d G:i:s');

    $passwd = "";

    $bus = "SELECT usu_password FROM usuario WHERE usu_codigo=$codigo;";
    $resultb = $conn->query($bus);
    if ($resultb->num_rows > 0) {
        while ($row = $resultb->fetch_assoc()) {
            $passwd=$row["usu_password"];
        }
    }

    if (MD5($contraseñaActual) == $passwd) {
        $sql = "UPDATE usuario SET usu_password='$contrasena', usu_fecha_modificacion='$fechaMod' WHERE usu_codigo=$codigo;";
        if ($conn->query($sql) === TRUE) {
            echo "<p>Se ha cambiado la contraseña correctamemte !!!</p>";
        } else {
            if ($conn->errno == 1062) {
                echo "<p class='error'> La persona con la cedula $cedula no se encuentra registrada en el sistema </p>";
            } else {
                echo "<p class='error'>Error : " . mysqli_error($conn) . "</ p>";
            }
        }
    } else {
        echo "Las contraseñas no coinciden";
    }
    //cerrar la base de datos
    $conn->close();
    ?>
    <a href="index.php"> Regresar </a>
</body>

</html>