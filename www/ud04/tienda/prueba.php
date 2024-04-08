<?php
//PASOS IMPORTANTES A LA HORA DE LLEVAR A CABO UNA SESIÓN:
//1.Iniciar sesión en php
session_start();
if(!isset($_SESSION["count"])){
    $_SESSION["count"]=0;
}else{
    $_SESSION["count"]++;
}
//2.Establecer variables de sesión
$_SESSION["favcolor"]="verde";
$_SESSION["favanimal"]="gato";
//Otra forma de mostrar las variables de sesión:
print_r($_SESSION);
//3.Obtener ID de sesión. El operador '@' se utiliza para suprimir los mensajes de error que se puedan generar durante la ejecución.
@session_start();
session_id();
//4.Eliminar una variable de sesión
unset($variable_sesion);
//5.Eliminar todas las variables de sesión globales y destruir la sesión, respectivamente:
session_unset();
session_destroy();
//6.Crear cookies. El úncio parámetro obligatorio es $name
setcookie($name, $value, $expire, $path, $domain, $secure, $httponly);
//Ejemplo de cookie:
setcookie("usuario", "Mateo", time()+(86400*30),"/");
//7.Recuperar el valor deuna cookie
$_COOKIE["clave"];//Array asociativo que contiene la informacion que se le pasa al script via HTTP cookie
//También se usa isset() para averiguar si la cookie está configurada
//8.Modificar el valor de una cookie. setcookie():
setcookie($name, $value, $expTime, $path, $domain, $secure, $httponly);
//9.Eliminar cookie: se modifica su fecha de caducidad mediante setcookie()
//10.Comprobar si la cookie están habilitadas
if(count($_COOKIE)>0){};
//11.Leer archivos y escribirlos en el búfer de salida
readfile("archivo.extension");
//12.La función fopen() ofrece más opciones que la anterior.
$miFichero=fopen($nombreArchivoAbrir, $modoAperturaArchivo) or die ("No es posible abrir el archivo");
echo fread($miFichero, filesize("archivo.extension"));
//13.Cerrar fichero
fclose($miFichero);
//14.Lee una sola línea de un archivo:
fgets($miFichero);
//15.Comprueba si se ha alcanzado el fin del archivo (EOF). Util para datos de long desconocida
while(!feof($miFichero)){
    echo fgets($miFichero);
}
//16.Para leer un solo caracter de un archivo
fgetc($miFichero);
//17.La función fopen() también puede crear un fichero si este no existe
$nuevoFichero=fopen("nuevoFichero.txt", "w");
//18.La función fwrite()
fwrite("archivoSobreElQueEscribir.txt", "cadena a escribir");
//19.Sobreescritura
fwrite($ficheroASobreescribir, "Nuevo texto");
//20.Agregar datos. El modo 'a' agrega texto al final de archivo mientras que 'w' anula y borra
//21.Cargar archivos al servidor.
//Carpeta a incluir los ficheros
$target_dir="uploads/";
//Recuperar el nombre del fichero.
$target_file=$target_dir.basename($_FILE["fileToUpload"]["name"]);
//Obtener el tipo de fichero
$imageFileType=srtlolower(pathinfo($target_file,PATHINFO_EXTENSION));//NO SE COMO FUNCIONA!
//22.Comprobar si el archivo existe en la ruta:
if(file_exists($ruta)){};
//23.Limitar el tamaño en bytes de un fichero:
if($_FILE["fileToUpload"]["size"]>500000){};
//24.Limitar tipo de archivo
if($imageFileType=="jpg"){};
//25.Redirigir a otra página:
header("Location: pagina.php");
//26.Funciones básicas de hashing en php
md5($cadenaCaracteres);
sha1($cadenaCaracteres);
hash($algoritmo, $cadenaCaracteres);
//27.Funciones de hashing recomendadas
password_hash($password, $algoritmo, $opciones);//NO SE COMO FUNCIONA
//28.Comprobar contraseña guardada
password_verify($password, $hash);//Devuelve boolean
?>