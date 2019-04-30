<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Sistema de Gestion de Usuarios</title>
    <link href="../../../public/vista/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <header class="cab">
        <h1>Comprobación de Borrado</h1>
    </header>
    <?php
    include '../../../config/conexionBD.php';
    $codigo=$_GET["codigo"];
    $sql = "DELETE FROM usuario WHERE usu_codigo=$codigo;";
    if ($conn->query($sql) === TRUE) {
        echo "<p>Se han borrado los datos personales correctamemte !!!</p>";
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