<?php

//declare(strict_types=1);

//require_once 'flight/Flight.php';
require 'flight/autoload.php';
/*
Flight::route('/', function () {
    echo 'hello mundo!';
    //echo "Hola buenas tardes!";
});
*/
//Probando FLight
/*
Flight::route('POST /', function (){
    echo 'Peticion POST!';
});

Flight::route('GET /', function (){
    echo 'Peticion GET!';
});
*/

//TAREA UD6
//ACCESO A BASE DE DATOS
Flight::register('db', 'PDO', array('mysql:host=db;dbname=dbname', 'root', 'test'));

//Ejecuto el fichero pruebas.sql
Flight::route('/', function () {
    $db = Flight::db();
    $sqlFilePath = 'pruebas.sql';  // Asegúrate de usar la ruta correcta
        // Leer el contenido del fichero SQL
        $sql = file_get_contents($sqlFilePath);
        if ($sql === false) {
            throw new Exception("Error al leer el fichero SQL");
        }

        // Ejecutar las sentencias SQL
        $db->exec($sql);

        echo "Fichero SQL ejecutado correctamente.";
});

/*
Tabla Clientes

Se debe permitir las siguientes acciones sobre la tabla clientes y la ruta /clientes:

    GET: Al acceder a esta ruta se debe mostar todos los datos de los clientes.
    Debes mostrar la información de un único cliente a través del id.
    POST: Se debe poder insertar un cliente en la base de datos.
    DELETE: Dado un id se debe poder eliminar un cliente.
    PUT: Se podrá modificar de un cliente sus apellidos, edad, email y teléfono.

*/

//MOSTRAR TODOS LOS DATOS
Flight::route('GET /clientes', function () {
    $sql = Flight::db()->prepare("SELECT * FROM clientes");
    $sql->execute();
    $datos = $sql->fetchAll();
    Flight::json($datos);
});

//MOSTRAR LA INFORMACIÓN DE UN ÚNICO CLIENTE
Flight::route('GET /clientes/@id', function ($id) {
    $stmt = Flight::db()->prepare("SELECT * FROM clientes WHERE id=?");
    $stmt->bindParam(1, $id);
    $stmt->execute();
    $datos = $stmt->fetch();
    Flight::json($datos);
});

//INSERTAR UN CLIENTE EN LA BASE DE DATOS
/*
--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(10) NOT NULL,
  `apellidos` varchar(30) NOT NULL,
  `edad` int(2) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
*/
Flight::route('POST /clientes', function () {
    $request = Flight::request();
    //Se obtiene los campos de la tabla
    $nombre = $request->data->nombre;
    $apellidos = $request->data->apellidos;
    $edad = $request->data->edad;
    $email = $request->data->email;
    $telefono = $request->data->telefono;
    //Sentencia sql para insertar los campos en la tabla
    //RECUERDA: La nueva tupla a insertar se introduce en formato JSON en el body de la solicitud http
    $sql = "INSERT INTO clientes (nombre, apellidos, edad, email, telefono)
    VALUES (:nombre, :apellidos, :edad, :email, :telefono)";
    //Consultas preparadas
    $stmt = Flight::db()->prepare($sql);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':apellidos', $apellidos);
    $stmt->bindParam(':edad', $edad);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':telefono', $telefono);
    $stmt->execute();
    //Comprobar si el resultado de la insercioón es correcto
    if($stmt->rowCount() > 0){
        Flight::jsonp(["Cliente agregado correctamente!"]);
    }else{
        Flight::jsonp(["Error al agregar el cliente"]);
    }
    /*
    {
         "nombre": "Mateo",
         "apellidos": "Pastor",
         "edad": 29,
         "email": "mateo@correo.es",
         "telefono": 938457395
    }
    */
});
//DADO UN id ELIMINAR UNA TUPLA DE LA BASE DE DATOS
Flight::route('DELETE /clientes/', function(){
    //Seleccionar el id
    $id = Flight::request()->data->id;
    //Sentencia sql
    $sql = "DELETE FROM clientes WHERE id=?";
    //Preparar la sentencia
    $stmt = Flight::db()->prepare($sql);
    $stmt->bindParam(1, $id);
    //Ejecutar la sentencia
    $stmt->execute();
    //Devovler en formato json una sentencia que indica que todo fue bien
    Flight::jsonp(["Cliente eliminado con id: $id"]);
    /*JSON de prueba
    {
        "id": 2
    }
    */
});

//PUT: Se podrá modificar de un cliente sus apellidos, edad, email y teléfono.
Flight::route('PUT /clientes', function(){
    $id = Flight::request()->data->id;
    $apellidos = Flight::request()->data->apellidos;
    $edad = Flight::request()->data->edad;
    $email = Flight::request()->data->email;
    $telefono = Flight::request()->data->telefono;
    //Sentencia sql
    $sql = "UPDATE clientes SET apellidos=?, edad=?, email=?, telefono=? WHERE id=?";
    //Preparar
    $stmt = Flight::db()->prepare($sql);
    $stmt->bindParam(1, $apellidos);
    $stmt->bindParam(2, $edad);
    $stmt->bindParam(3, $email);
    $stmt->bindParam(4, $telefono);
    $stmt->bindParam(5, $id);
    $stmt->execute();
    Flight::jsonp(["Cliente actualizado con id: $id"]);
    /*JSON de prueba
    {
        "apellidos": "Gonzalez",
        "edad": 89,
        "email": "unemail@cores.net"
        "telefono": 234867345,
        "id": 13
    }
    */
});
/*
Tabla Hoteles
Se debe permitir las siguientes acciones sobre la tabla clientes y la ruta /hoteles:
    GET: Al acceder a esta ruta se debe mostar todos los datos de los hoteles. Debes mostrar la información de un único hotel a través del id.
    POST: Se debe poder insertar un hotel en la base de datos.
    DELETE: Dado un id se debe poder eliminar un hotel.
    PUT: Se podrá modificar de un hotel sus direccion, email y teléfono.
*/

//GET: Al acceder a esta ruta se debe mostar todos los datos de los hoteles. Debes mostrar la información de un único hotel a través del id.
Flight::route('GET /hoteles', function () {
    $sql = Flight::db()->prepare("SELECT * FROM hoteles");
    $sql->execute();
    $datos = $sql->fetchAll();
    Flight::json($datos);
});

//MOSTRAR LA INFORMACIÓN DE UN ÚNICO CLIENTE
Flight::route('GET /hoteles/@id', function ($id) {
    $stmt = Flight::db()->prepare("SELECT * FROM hoteles WHERE id=?");
    $stmt->bindParam(1, $id);
    $stmt->execute();
    $datos = $stmt->fetch();
    Flight::json($datos);
});
//POST: Se debe poder insertar un hotel en la base de datos.
/*
--
-- Estructura de tabla para la tabla `hoteles`
--

CREATE TABLE `hoteles` (
  `id` int(11) NOT NULL,
  `hotel` varchar(20) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
*/
Flight::route('POST /hoteles', function(){
    $request = Flight::request();
    $hotel = $request->data->hotel;
    $direccion = $request->data->direccion;
    $telefono = $request->data->telefono;
    $email = $request->data->email;
    $sql = "INSERT INTO hoteles (hotel, direccion, telefono, email)
    VALUES (:hotel, :direccion, :telefono, :email);";
    $stmt = Flight::db()->prepare($sql);
    $stmt->bindParam(":hotel", $hotel);
    $stmt->bindParam(":direccion", $direccion);
    $stmt->bindParam(":telefono", $telefono);
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    Flight::jsonp(["Hotel insertado corectamente!"]);
    /*JSON de prueba
    {
        "hotel": "Mariano",
        "direccion": "Calle falsa",
        "telefono": 1
        "email": "a"
    }
    */
});
//DELETE: Dado un id se debe poder eliminar un hotel.
Flight::route("DELETE /hoteles", function(){
    $id = Flight::request()->data->id;
    $sql = "DELETE FROM hoteles WHERE id=?";
    $stmt = Flight::db()->prepare($sql);
    $stmt->bindParam(1, $id);
    $stmt->execute();
    Flight::jsonp(["Hotel eliminado"]);
    /*JSON de prueba
    {
        "id": 5
    }
    */
});

//PUT: Se podrá modificar de un hotel sus direccion, email y teléfono.
Flight::route("PUT /hoteles", function(){
    $id = Flight::request()->data->id;
    $hotel = Flight::request()->data->hotel;
    $direccion = Flight::request()->data->direccion;
    $telefono = Flight::request()->data->telefono;
    $email = Flight::request()->data->email;
    $sql = "UPDATE hoteles SET hotel=?, direccion=?, telefono=?, email=? WHERE id=?";
    $stmt = Flight::db()->prepare($sql);
    $stmt->bindParam(1, $hotel);
    $stmt->bindParam(2, $direccion);
    $stmt->bindParam(3, $telefono);
    $stmt->bindParam(4, $email);
    $stmt->bindParam(5, $id);
    $stmt->execute();
    Flight::jsonp(["Hotel $hotel actualizado correctamente. id: $id"]);
    /*JSON de prueba
    {
        "hotel": "Un hotel",
        "direccion": "Otra calle falsa",
        "telefono": 999,
        "email": "un correo",
        "id": 1
    }
    */
});

/*
Tabla reservas

Se debe permitir las siguientes acciones sobre la tabla clientes y la ruta /reservas. Hay que tener en cuenta que esta tabla tiene dependencias con las otras dos tablas.

    GET: Al acceder a esta ruta se debe mostar todas las reservas realizadas por todos los clientes en todos los hoteles.
    Debes mostrar la información de un única reserva a través del id.
    POST: Se debe poder insertar una reserva en la base de datos. Identificar los datos necesarios.
    DELETE: Dado un id se debe poder eliminar una reserva.
    PUT: Se podrá modificar de una reserva la fecha de entrada y la fecha de salida.
*/
//GET: Al acceder a esta ruta se debe mostar todas las reservas realizadas por todos los clientes en todos los hoteles.
Flight::route("GET /reservas", function(){
    $sql = "SELECT * FROM reservas";
    $stmt = Flight::db()->prepare($sql);
    $stmt->execute();
    $datos = $stmt->fetchAll();
    Flight::json($datos);
});
//Debes mostrar la información de un única reserva a través del id.
Flight::route("GET /reservas/@id", function($id){
    $sql = "SELECT * FROM reservas WHERE id=?";
    $stmt = Flight::db()->prepare($sql);
    $stmt->bindParam(1, $id);
    $stmt->execute();
    $datos = $stmt->fetch();
    Flight::json($datos);
});

//POST: Se debe poder insertar una reserva en la base de datos. Identificar los datos necesarios.
/*
--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_hotel` int(11) NOT NULL,
  `fecha_reserva` date NOT NULL,
  `fecha_entrada` date NOT NULL,
  `fecha_salida` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
*/
Flight::route("POST /reservas", function(){
    //Seleccionar campos tabla
    $id_cliente = Flight::request()->data->id_cliente;
    $id_hotel = Flight:: request()->data->id_cliente;
    $fecha_reserva = Flight::request()->data->fecha_reserva;
    $fecha_entrada = Flight::request()->data->fecha_entrada;
    $fecha_salida = Flight::request()->data->fecha_salida;
    $sql = "INSERT INTO reservas (id_cliente, id_hotel, fecha_reserva, fecha_entrada, fecha_salida)
    VALUES (?, ?, ?, ?, ?)";
    $stmt = Flight::db()->prepare($sql);
    $stmt->bindParam(1, $id_cliente);
    $stmt->bindParam(2, $id_hotel);
    $stmt->bindParam(3, $fecha_reserva);
    $stmt->bindParam(4, $fecha_entrada);
    $stmt->bindParam(5, $fecha_salida);
    $stmt->execute();

    if($stmt->rowCount() > 0){
        Flight::jsonp(["Reserva introducida correctamente."]);
    }
    /*JSON de prueba
    {
        "id_cliente": 8,
        "id_hotel": 9,
        "fecha_reserva": "2021-06-01",
        "fecha_entrada": "2021-06-01",
        "fecha_salida": "2021-06-01",
    }
    */
});
Flight::start();
