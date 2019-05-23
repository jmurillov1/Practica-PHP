# Practica04-Mi-Correo-Electr-nico

 	FORMATO DE INFORME DE PRÁCTICA DE LABORATORIO / TALLERES / CENTROS DE SIMULACIÓN – PARA ESTUDIANTES

CARRERA:  INGENIERÍA DE SISTEMAS
	ASIGNATURA:  HYPERMEDIAL 

NRO. PRÁCTICA:	4	TÍTULO PRÁCTICA:  Resolución de problemas sobre PHP y MySQL

OBJETIVO ALCANZADO:
Entender y organizar de una mejor manera los sitios de web en Internet 
Diseñar adecuadamente elementos gráficos en sitios web en Internet.
Crear sitios web aplicando estándares actuales.

ACTIVIDADES DESARROLLADAS
1. Generar el diagrama E-R para la solución de la práctica.
 
La base de datos se llama “hipermedial” y para las tablas use el siguiente script:
CREATE TABLE `usuario` (
`usu_codigo` int(11) NOT NULL AUTO_INCREMENT,
`usu_cedula` varchar(10) NOT NULL,
`usu_nombres` varchar(50) NOT NULL,
`usu_apellidos` varchar(50) NOT NULL,
`usu_direccion` varchar(75) NOT NULL,
`usu_telefono` varchar(20) NOT NULL,
`usu_correo` varchar(20) NOT NULL,
`usu_password` varchar(255) NOT NULL,
`usu_fecha_nacimiento` date NOT NULL,
`usu_eliminado` varchar(1) NOT NULL DEFAULT 'N',
`usu_fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
`usu_fecha_modificacion` timestamp NULL DEFAULT NULL,
`usu_rol` varchar(10),
`usu_foto` longblob,
PRIMARY KEY (`usu_codigo`),
UNIQUE KEY `usu_cedula` (`usu_cedula`)) 
ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE `correos` (
`cor_codigo` int(11) NOT NULL AUTO_INCREMENT,
`cor_fecha_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
`cor_usu_remitente` int(11) NOT NULL,
`cor_usu_destinatario` int(11) NOT NULL,
`cor_asunto` varchar(50) NOT NULL,
`cor_mensaje` varchar(255) NOT NULL,
`cor_eliminado` varchar(1) NOT NULL DEFAULT 'N',
`cor_fecha_modificacion` timestamp NULL DEFAULT NULL,
PRIMARY KEY (`cor_codigo`),
FOREIGN KEY (`cor_usu_remitente`) REFERENCES usuario(usu_codigo),
FOREIGN KEY (`cor_usu_destinatario`) REFERENCES usuario(usu_codigo)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

2. Crear un repositorio en GitHub con el nombre “Practica04–Mi Correo Electrónico”
Para realizar este paso previamente creamos una cuenta en GitHub, ahora conectado a la cuenta en línea procedemos a crear el repositorio donde guardaremos la práctica.

Luego tendremos la siguiente pantalla:



 

Con esto ya hemos creado nuestro repositorio. En este lugar nos dará la url del repositorio que es necesaria para configurar la forma de subir los archivos.
3. Realizar un commit y push por cada requerimiento de los puntos antes descritos. 
Para el desarrollo de esta práctica haremos uso del proyecto anterior, al cual le daremos estilos con CSS 3.
Para esto debemos abrir el cmd y colocar los siguientes comandos, en el caso de Windows:
-	git init
-	git add .
-	git commit -m "Nombre-Proyecto"
-	git remote add origin “url del respositorio”
-	git push -u origin master
Estos para la primera vez que se vaya a trabajar con el proyecto, después solo es necesario correr:
-	git add .
-	git commit -m "Nombre-Proyecto"
-	git push -u origin master
Y para que esto funcione previamente debes haber instalado y configurado “Git for Windows”.
Ahora luego de correr los comandos tendremos:
 
Con el init iniciamos el repositorio vacío.
Con el add los añadimos.
Con el commit creamos los datos dentro del repositorio.
Con el remote le damos la dirección de donde subir los archivos.
Y con el push guardamos los datos en el repositorio.
Si todo corre bien deberíamos obtener lo siguiente:
 
Como pueden darse cuenta la pagina web en GitHub se actualiza con los nuevos datos subidos, con esto hemos cargado en la pagina el primer punto de la práctica.


CARPETA PUBLICA
-	Controladores
JAVASCRIPT
 
Función que se encarga de mostrar una vista previa de la foto, que se elige para el usuario.
 
 
Esta es la función general que al pasar por el submit valida los datos ingresados, primero comprueba que todos los datos sean diferentes de vacío para pasar, esto lo hacemos realizando un recorrido de los elementos que tiene el formulario con un bucle for y preguntando si son de tipo text, luego si pasa eso me devuelve una variable si es falso y me pinta de rojo el borde y me dice el error que tengo, para facilidad del usuario del sistema.
Luego en otro if llamo al método siguiente para validar la cedula, si me devuelve true pasa el requisito, luego el correo y la fecha de nacimiento, se declaro una variable para cada una de estas preguntas de tipo boolean que inician en false, a excepción de una que inicia en true, que se vuelve falsa si algún input este vacío y no deja enviar el formulario.
Cada una de las preguntas que se hacen con los if devuelve un valor true si se cumple y al final pregunta si todas son true la general se vuelve true y se retorna para que se envíen los datos por el formulario.
 
El método de aquí sirve para validar ya sea los nombres o apellidos, como pide el trabajo, primero recibe el objeto que lo llama, obtiene el valor del input y pregunta si es Nombre o Apellido, luego cada carácter lo convierte a ASCII para facilitar la pregunta de si son letras, si cumple estos ingresa y divide el contenido con split, para saber si hay dos palabras, si supera las dos palabras da error de que no cumple con los requisitos, y si un carácter no pertenece a los que se permiten se borra automáticamente, esto aplica tanto para Nombre y Apellidos.
 
 
 
Ahora validamos la fecha, con ayuda de la función substr(), cortamos los datos necesarios como son día, mes y año, primero validamos con ayuda de ifs que los días sean los permitidos, según el mes y según el año si es bisiesto.
Luego validamos si el día que ingresamos es mayor al día actual, seguido de el formato, que no es mas que preguntar si los símbolos slash están donde es su lugar, si cumple las validaciones se hacen true, por una falsa ya no la acepta, caso contrario si todo va bien retorna un true que nos sirve en la función general.
 
Ahora validamos el teléfono, que así mismo recibe el elemento de donde se llama al método. Se obtiene el valor del input en una variable, que luego cada carácter se pasa a ASCII para facilitar las preguntas en el if, si cumple pasa y pregunta si es mayor a 10 el numero se pinta de rojo el input en cuestión, si no pertenecen los caracteres ingresados a los permitidos se borran automáticamente en tiempo real.
 
 
Aquí le pasamos el valor del elemento desde la función general, luego preguntamos si es igual a 10 la longitud desarrollamos la comprobación de la cédula ecuatoriana, multiplicamos por 2 los números en posiciones pares y por uno en posiciones impares, si la multiplicación por 2 es mayor a 9 se le resta 9 y luego se hace una suma de estos nuevos valores, luego el valor de la suma lo subo al inmediato superior, y restamos el valor de la suma de su inmediato superior y si este numero es igual al ultimo digito se valida como true.
 
 
Ahora para validar el correo, al método le pasos el id del elemento, luego con ese obtenemos el valor del input y preguntamos si es menor o igual a 70 lo validamos, si lo es obtenemos su última parte según la validación ya sea @ups.edu.ec o @est.ups.edu.ec, luego preguntamos si lo obtenido es igual a lo inicial y si es mayor o igual a 14 en el caso de @ups.edu.ec o en el else si es mayor o igual a 18 e igual a @est.ups.edu.ec, si cumple esto, para cada caso recorreremos el valor de input y preguntaremos si hay mínimo 3 caracteres antes de las terminaciones requeridas y con ASCII validamos in son caracteres alfanuméricos.
Y si cumple retornara un true.



PHP
crear_usuario.php
 
 
Este archivo se encarga de tomar los datos del formulario, y comunicarse con la base de datos y guardar los datos dados por el usuario. Como el formulario tiene el método POST, los datos se reciben por $_POST, donde se les aplica arreglos para luego ser guardados en la base de datos.






login.php
 
En este archivo ahora validamos los datos ingresados que sean iguales a la base datos y de esta forma permitimos el ingreso al sistema de correo.
Cabe resaltar que se hace uso de la variable $_SESSION para mandar valores hacia otras ventanas de manera rápida y útil. A parte como dice la práctica según el rol del usuario ingresara al sistema, entonces aquí revisamos que rol tiene el usuario para redireccionarlo a su respectiva página. Si no se cumple con los requisitos el sistema lo redirige de nuevo al login.
-	Vista
CSS
style.css
   
   
   
 
stables.css
 
Este archivo tiene las reglas css que dan estilo al trabajo, en base a las practicas anteriores se sabe cómo se usan.


En la carpeta images se encuentran 2 imágenes, la primera imagen si un usuario no elige una foto se coloca la por defecto y la otra del icono de la lupa.
Afuera están los archivos .html de crear_usuario.html y login.html, que sirven para acceder al sistema de correo.
crear_usuario.html
 
 
 
login.html
 
Estos dos archivos apuntas a sus similares con extensión .php que están en la carpeta controladores. Al hacer clic en el botón.

CARPETA CONFIG
conexionBD.php
 
Se encarga de establecer comunicación con la base de datos para obtener consultas, que necesita el usuario. 
cerrarSesion(){
 
Se encarga de destruir la sesión que el usuario crea al loguearse, para que al cerrar sesión no se permita regresar con los botones del navegador.
Acceso.html
 
Este es para cuando un usuario admin, quiera pasar a rol user, con lo cual bloquea para evitar ese acceso.

ADMIN
 






Controladores
Admin
Aquí se encuentran los controladores, que permiten ejecutar las acciones que tiene permitidos un usuario con rol admin. Aquí tenemos los controladores de actualizar, eliminar, cambiar contraseña y eliminar mensaje.
Actualizar
 
 
Este controlador en modo admin se encarga de actualizar los datos de cualquier usuario, cada una de las páginas que están en admin, empiezan al inicio con el código de php que pregunta si esta logueado para acceder al contenido, si no es el caso le redirige a el login.
Eliminar
 
El eliminado de los usuarios no es total solo se actualiza una variable, para que al hacer la consulta estos queden ocultos.
CambiarContraseña
 
Se encarga de actualizar la contraseña en la base de datos.
Eliminar Mensajes
 
Este proceso solo lo puede hacer un usuario con rol de admin. Un usuario admin puede hacer cambios sobre cualquier usuario.
User
Aquí se encuentran los controladores, que permiten ejecutar las acciones que tiene permitidos un usuario con rol user. Un usuario user solo puede modificar datos respectivos a su cuenta. Aquí se encuentra el eliminar, actualizar, cambiar contraseña, crear correo, leer correos y buscar correos.
Los controladores generales como actualizar, eliminar y cambiar contraseña son los mismos, con respecto a los demás:
Crear Correo
 
Sirve para ingresar un nuevo correo a la base, recordar que los usuarios admin no puede enviar ni recibir correos por lo cual se pregunta si el usuario del correo ingresado es admin no puede enviarse, caso contrario se puede realizar. 
Lectura Correo
 
 
Aquí se realiza una búsqueda de los correos de los usuarios registrados en el mensaje, pero primero se pregunta en que pagina se encuentra si en index o en mensajes enviados, y según eso se coloca los valores en los inputs vacíos.
Buscar para AJAX de Javascript
 
 
 
 
 
Este php se encarga de hacer la búsqueda según el texto que ingrese en el input de buscar, preguntando la pagina en la que estoy para según eso devolver los valores que se requieren. Lo que devuelve lo coloco en una tabla para su vista posterior.
JavaScript
Método buscar
 
Aquí obtengo el valor del input buscar por correo, y la url donde estoy, con la cual me redirecciono si no se cumple la búsqueda. Luego según el código visto en clase procedo a modificarlo para buscar por correo para eso al abrir con Ajax paso por la url el valor del input y la url en la que estoy. Según esto va al buscar.php a trabajar si encuentra me devuelve y me manda a escribir en l lugar que se le dé.


Vista
Admin, aquí se tienen las vistas de lo que tiene acceso un usuario admin. Aquí se encuentra la vista de actualizar, eliminar, cambiar contraseña, eliminar mensaje, index y listado.
Actualizar:
 
Para visualizar los datos actuales y modificarlos.
Eliminar
 
Cambiar Contraseña
 


Eliminar mensaje
 
Me muestra el mensaje previo a eliminar.
Index
Me da el listado de todos los correos enviados que no han sido eliminados.
 


Listado
 
Me lista todos los usuarios del sistema que no han sido eliminados.
User, este tiene las vistas para actualizar, eliminar, cambiarContraseña, index, mensajeNuevo, mensajesEnviados y cuenta.
El actualizar eliminar y cambiarContraseña son los mismos.
Index
 
Me lista todos los correos que recibió el usuario que ingreso.
Mensaje Nuevo
 
Me permite enviar un nuevo correo.
Mensaje Enviados
 
Me lista todos los mensajes que envió el usuario ingresado. 


Mi cuenta
 
Me muestra los datos actuales del usuario.

Código para la foto
 
JavaScript
 
Commit y Push
 
 
4. Luego, se debe crear el archivo README del repositorio de GitHub. 
 
5. Información de GitHub (usuario y URL del repositorio de la práctica).
Usuario: jmurillov1
URL del repositorio: https://github.com/jmurillov1/Practica04-Mi-Correo-Electr-nico

7. En el archivo README del repositorio debe constar la misma información del informe de resultados de la práctica que se indica en el siguiente punto. 



RESULTADO(S) OBTENIDO(S):
•	Tener el conocimiento suficiente para que el estudiante pueda entender y organizar de una mejor manera los sitios de web y de negocios en Internet.
•	Tener el conocimiento sobre nuevas etiquetas y su uso.
•	Aprender a usar HTML5 y CCS3.
Resultados:
Sitio Web Completo: Google Chrome
 
 
Vista Admin
 
 
Vista User
 
 
 
  
 
  









Sitio Web Completo: Firefox
 
 
 
 










Sitio Web Completo: Internet Explorer
 
 
 
 
 
 










CONCLUSIONES:
•	Los estudiantes podrán organizar sitios web basados en el lenguaje de programación PHP para persistir información en una base de datos relacional.
•	Que es de mucha ayuda aprender nuevos conocimientos, que nos ayudan a mejorar como profesionales, como es el caso de la programación en la web.
RECOMENDACIONES:
•	Probar la solución de la práctica en al menos tres navegadores web; Google Chrome, Firefox y Safari.
•	Validar las páginas creadas con un software, como es el caso de: W3C Validator.
•	Usar correctamente las etiquetas HTML y las formas de CSS.

Nombre del estudiante: Jordan Fernando Murillo Valarezo

Firma del estudiante: Jordan Murillo
