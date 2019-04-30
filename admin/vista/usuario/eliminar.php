<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Sistema de Gestion de Usuarios</title>
    <link href="../../../public/vista/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <header class="cab">
        <h1>Borrar Usuario</h1>
    </header>
    <?php
    $codigo=$_GET["codigo"];
    echo "<form id='" . "formulario01" . "' method='" . "POST" . "' action='eliminar2.php?codigo=$codigo'";
    echo "<label for=" . "'cedula'" . ">Cédula</label> <input type=" . "'text'" . " id=" . "'cedula'" . " name=" . "'cedula'" . " value='" . "$_GET[cedula]" . "' readonly=" . "'readonly'" . "/>";
    echo "<label for=" . "'nombre'" . ">Nombres</label> <input type=" . "'text'" . " id=" . "'nombres'" . " name=" . "'nombres'" . " value='" . "$_GET[nombres]" . "' readonly=" . "'readonly'" . "/>";
    echo "<label for=" . "'apellido'" . ">Apellidos</label> <input type=" . "'text'" . " id=" . "'apellidos'" . " name=" . "'apellidos'" . " value='" . "$_GET[apellidos]" . "' readonly=" . "'readonly'" . "/>";
    echo "<label for=" . "'telefono'" . ">Teléfono</label> <input type=" . "'text'" . " id=" . "'telefono'" . " name=" . "'telefono'" . " value='" . "$_GET[telefono]" . "' readonly=" . "'readonly'" . "/>";
    echo "<label for=" . "'direccion'" . ">Dirección</label> <input type=" . "'text'" . " id=" . "'direccion'" . " name=" . "'direccion'" . " value='" . "$_GET[direccion]" . "' readonly=" . "'readonly'" . "/>";
    echo "<label for=" . "'correo'" . ">Correo Electrónico</label> <input type=" . "'email'" . " id=" . "'correo'" . " name=" . "'correo'" . " value='" . "$_GET[correo]" . "' readonly=" . "'readonly'" . "/>";
    echo "<label for=" . "'fechaNacimiento'" . ">Fecha de Nacimiento</label> <input type=" . "'date'" . " id=" . "'fechaNacimiento'" . " name=" . "'fechaNacimiento'" . " value='" . "$_GET[fecha]" . "' readonly=" . "'readonly'" . "/>";
    echo "<input type=" . "'submit'" . " id=" . "'eliminar'" . " name=" . "'eliminar'" . " value=" . "'Aceptar'" . " />";
    echo "<input type=" . "'reset'" . " id=" . "'cancelar'" . " name=" . "cancelar" . " value=" . "'Cancelar'" . " />";

    echo "<a href='index.php'> Regresar  </a>";
    echo "</form>";
    ?>
</body>

</html>