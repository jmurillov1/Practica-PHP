<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Sistema de Gestion de Usuarios</title>
    <link href="../../../public/vista/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <header class="cab">
        <h1>Comprobación de Actualización</h1>
    </header>
    <?php
    date_default_timezone_set ('America/Guayaquil');
    include '../../../config/conexionBD.php';
    $codigo = $_GET["codigo"];
    $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
    $nombres = isset($_POST["nombres"]) ? mb_strtoupper(trim($_POST["nombres"]), 'UTF-8') : null;
    $apellidos = isset($_POST["apellidos"]) ? mb_strtoupper(trim($_POST["apellidos"]), 'UTF-8') : null;
    $direccion = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]), 'UTF-8') : null;
    $telefono = isset($_POST["telefono"])  ? trim($_POST["telefono"]) : null;
    $correo =  isset($_POST["correo"]) ?  mb_strtoupper(trim($_POST["correo"])) : null;
    $fechaNacimiento = isset($_POST["fechaNacimiento"]) ? trim($_POST["fechaNacimiento"]) : null;
    $fechaMod = date('Y-m-d G:i:s');
    $sql = "UPDATE usuario SET usu_cedula='$cedula',usu_nombres='$nombres', usu_apellidos='$apellidos', usu_direccion='$direccion', usu_telefono='$telefono', usu_correo='$correo', usu_fecha_nacimiento='$fechaNacimiento', usu_fecha_modificacion='$fechaMod' WHERE usu_codigo=$codigo;";
    if ($conn->query($sql) === TRUE) {
        echo "<p>Se han actualizado los datos personales correctamemte !!!</p>";
    } else {
        if ($conn->errno == 1062) {
            echo "<p class='error'> La persona con la cedula $cedula no se encuentra registrada en el sistema </p>";
        } else {
            echo "<p class='error'>Error : " . mysqli_error($conn) . "</ p>";
        }
    }
    //cerrar la base de datos
    $conn->close();
    ?>
    <a href="index.php"> Regresar </a>
</body>

</html>