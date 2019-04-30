<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Gestión de usuarios</title>
    <link href="../../../public/vista/stables.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <table id="tbl">
    <caption> Lista de Usuarios </caption>
        <tr>
            <th>Cedula</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Dirección</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Fecha Nacimiento</th>
            <th>Eliminar</th>
            <th>Modificar</th>
            <th>Cambiar Contraseña</th>
        </tr>
        <?php
        include '../../../config/conexionBD.php';
        $sql = "SELECT * FROM usuario";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $codigo = $row["usu_codigo"];
                $cedula = $row["usu_cedula"];
                $nombres = $row["usu_nombres"];
                $apellidos = $row["usu_apellidos"];
                $direccion = $row["usu_direccion"];
                $telefono = $row["usu_telefono"];
                $correo = $row["usu_correo"];
                $fecha = $row["usu_fecha_nacimiento"];
                $contrasena=$row["usu_password"];
                echo "<tr>"; 
                echo "   <td>" . $cedula . "</td>";
                echo "   <td>" . $nombres . "</td>";
                echo "   <td>" . $apellidos . "</td>";
                echo "   <td>" . $direccion . "</td>";
                echo "   <td>" . $telefono . "</td>";
                echo "   <td>" . $correo . "</td>";
                echo "   <td>" . $fecha . "</td>";
                echo "   <td> <a href='eliminar.php?codigo=$codigo&cedula=$cedula&nombres=". urlencode($nombres)."&apellidos=". urlencode($apellidos)."&direccion=". urlencode($direccion)."&telefono=$telefono&correo=$correo&fecha=$fecha'> Ir </a> </td>";
                echo "   <td> <a href='actualizar.php?codigo=$codigo&cedula=$cedula&nombres=". urlencode($nombres)."&apellidos=". urlencode($apellidos)."&direccion=". urlencode($direccion)."&telefono=$telefono&correo=$correo&fecha=$fecha'>Ir </a> </td>";
                echo "   <td> <a href='cambiarContrasena.php?codigo=$codigo&nombres=". urlencode($nombres)."&apellidos=". urlencode($apellidos)."'>Ir </a> </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr>";
            echo "   <td colspan='7'> No existen usuarios registradas en el sistema </td>";
            echo "</tr>";
        }
        $conn->close();
        ?>
    </table>
    <a href="../../../public/vista/login.html"> Cerrar Sesión</a>
</body>

</html>