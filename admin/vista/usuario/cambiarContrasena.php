<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Sistema de Gestion de Usuarios</title>
    <link href="../../../public/vista/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <header class="cab">
        <h1>Cambiar Contraseña Usuario</h1>
    </header>
    <?php
    $codigo = $_GET["codigo"];
    echo "<form id='" . "formulario01" . "' method='" . "POST" . "' action='cambiarContrasena2.php?codigo=$codigo'";
    echo "<label for=" . "'usuario'" . ">Usuario</label> <input type=" . "'text'" . " id=" . "'usuario'" . " name=" . "'usuario'" . " value='" . "$_GET[nombres] $_GET[apellidos]" . "' readonly=" . "'readonly'" . "/>";
    echo "<label for=" . "'contraActual'" . ">Contraseña Actual</label> <input type=" . "'password'" . " id=" . "'contraactual'" . " name=" . "'contraActual'" . " value='' placeholder='Ingrese su contraseña actual'/>";
    echo "<label for=" . "'contraNueva'" . ">Contraseña Nueva</label> <input type=" . "'password'" . " id=" . "'contraNueva'" . " name=" . "'contraNueva'" . " value='' placeholder='Ingrese su contraseña nueva'/>";
    echo "<input type=" . "'submit'" . " id=" . "'cambiar'" . " name=" . "'cambiar'" . " value=" . "'Aceptar'" . " />";
    echo "<input type=" . "'reset'" . " id=" . "'cancelar'" . " name=" . "cancelar" . " value=" . "'Cancelar'" . " />";

    echo "<a href='index.php'> Regresar  </a>";
    echo "</form>";
    ?>
</body>

</html>