<?php

require 'flight/Flight.php';

Flight::register('db', 'PDO', array('mysql:host=db;dbname=pruebas', 'root', 'test'));

Flight::route('GET /clientes', function () {
    Flight::request()->query["id"];
    $stmt = Flight::db()->prepare("SELECT * FROM clientes");
    $stmt->execute();
    $datos = $stmt->fetchAll();
    Flight::json($datos);
});

Flight::route('GET /clientes/@id', function ($id) {
    $stmt = Flight::db()->prepare("SELECT * FROM clientes WHERE id=?");
    $stmt->bindParam(1, $id);
    $stmt->execute();
    $datos = $stmt->fetch();
    Flight::json($datos);
});


Flight::route('POST /clientes', function () {

    $nombre =  Flight::request()->data->nombre;
    $apellidos =  Flight::request()->data->apellidos;
    $email =  Flight::request()->data->email;
    $edad = Flight::request()->data->edad;
    $telefono = Flight::request()->data->telefono;

    $sql = "INSERT INTO clientes (nombre, apellidos, email, edad, telefono)
    VALUES (:nombre, :apellidos, :email, :edad, :telefono)";

    $stmt = Flight::db()->prepare($sql);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':apellidos', $apellidos);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':edad', $edad);
    $stmt->bindParam(':telefono', $telefono);
    $stmt->execute();
    
    // Ver si el resultado de la inserción es correcto
    if ($stmt->rowCount() > 0) {
        Flight::jsonp(["Cliente agregado correctamente pffff."]);
    } else {
        Flight::jsonp(["Error al agregar el cliente."]);
    }
});

Flight::route('DELETE /clientes', function () {
    $id =  Flight::request()->data->id;
    $sql  = "DELETE FROM clientes WHERE id=?";
    $stmt = Flight::db()->prepare($sql);
    $stmt->bindParam(1, $id);
    $stmt->execute();

    Flight::jsonp(["Cliente eliminado correctamente."]);
});


Flight::route('PUT /clientes', function () {
    $id =  Flight::request()->data->id;
    $apellidos =  Flight::request()->data->apellidos;
    $email =  Flight::request()->data->email;
    $edad = Flight::request()->data->edad;
    $telefono = Flight::request()->data->telefono;

    $sql = "UPDATE clientes SET apellidos=?, email=?, edad=?, telefono=? WHERE id=?";

    $stmt = Flight::db()->prepare($sql);

    $stmt->bindParam(1, $apellidos);
    $stmt->bindParam(2, $email);
    $stmt->bindParam(3, $edad);
    $stmt->bindParam(4, $telefono);
    $stmt->bindParam(5, $id);

    $stmt->execute();

    Flight::jsonp(["Cliente actualizado correctamente."]);
});

/*
-- --------------------------------------------------------

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

Flight::route('GET /hoteles', function () {
    $stmt = Flight::db()->prepare("SELECT * FROM hoteles");
    $stmt->execute();
    $datos = $stmt->fetchAll();
    Flight::json($datos);
});

Flight::route('GET /hoteles/@id', function ($id) {
    $stmt = Flight::db()->prepare("SELECT * FROM hoteles WHERE id=?");
    $stmt->bindParam(1, $id);
    $stmt->execute();
    $datos = $stmt->fetch();
    Flight::json($datos);
});

Flight::route('POST /hoteles', function () {

    $hotel =  Flight::request()->data->hotel;
    $direccion =  Flight::request()->data->direccion;
    $telefono =  Flight::request()->data->telefono;
    $email = Flight::request()->data->email;

    $sql = "INSERT INTO hoteles (hotel, direccion, telefono, email)
    VALUES (:hotel, :direccion, :telefono, :email)";

    $stmt = Flight::db()->prepare($sql);
    $stmt->bindParam(':hotel', $hotel);
    $stmt->bindParam(':direccion', $direccion);
    $stmt->bindParam(':telefono', $telefono);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    
    // Ver si el resultado de la inserción es correcto
    if ($stmt->rowCount() > 0) {
        Flight::jsonp(["Hotel agregado correctamente."]);
    } else {
        Flight::jsonp(["Error al agregar el hotel."]);
    }
});

//Peticion post en formato json para insertar un hotel  en la base de datos
// {
//     "hotel": "Hotel 1",
//     "direccion": "Calle 1",
//     "telefono": "123456789",
//     "email": "
// }

Flight::route('DELETE /hoteles', function () {
    $id =  Flight::request()->data->id;
    $sql  = "DELETE FROM hoteles WHERE id=?";
    $stmt = Flight::db()->prepare($sql);
    $stmt->bindParam(1, $id);
    $stmt->execute();

    Flight::jsonp(["Hotel eliminado correctamente."]);
});

//Peticion delete en formato json para eliminar un hotel de la base de datos
// {
//     "id": "51"
// }

Flight::route('PUT /hoteles', function () {
    $id =  Flight::request()->data->id;
    $hotel =  Flight::request()->data->hotel;
    $direccion =  Flight::request()->data->direccion;
    $telefono =  Flight::request()->data->telefono;
    $email = Flight::request()->data->email;

    $sql = "UPDATE hoteles SET direccion=?, telefono=?, email=? WHERE id=?";

    $stmt = Flight::db()->prepare($sql);

    $stmt->bindParam(1, $direccion);
    $stmt->bindParam(2, $telefono);
    $stmt->bindParam(3, $email);
    $stmt->bindParam(4, $id);

    $stmt->execute();

    Flight::jsonp(["Hotel actualizado correctamente."]);
});

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

Flight::route('GET /reservas', function () {
    $stmt = Flight::db()->prepare("SELECT * FROM reservas");
    $stmt->execute();
    $datos = $stmt->fetchAll();
    Flight::json($datos);
});

Flight::route('GET /reservas/@id', function ($id) {
    $stmt = Flight::db()->prepare("SELECT * FROM reservas WHERE id=?");
    $stmt->bindParam(1, $id);
    $stmt->execute();
    $datos = $stmt->fetch();
    Flight::json($datos);
});

Flight::route('POST /reservas', function () {

    $id_cliente =  Flight::request()->data->id_cliente;
    $id_hotel =  Flight::request()->data->id_hotel;
    $fecha_reserva =  Flight::request()->data->fecha_reserva;
    $fecha_entrada = Flight::request()->data->fecha_entrada;
    $fecha_salida = Flight::request()->data->fecha_salida;

    $sql = "INSERT INTO reservas (id_cliente, id_hotel, fecha_reserva, fecha_entrada, fecha_salida)
    VALUES (:id_cliente, :id_hotel, :fecha_reserva, :fecha_entrada, :fecha_salida)";

    $stmt = Flight::db()->prepare($sql);
    $stmt->bindParam(':id_cliente', $id_cliente);
    $stmt->bindParam(':id_hotel', $id_hotel);
    $stmt->bindParam(':fecha_reserva', $fecha_reserva);
    $stmt->bindParam(':fecha_entrada', $fecha_entrada);
    $stmt->bindParam(':fecha_salida', $fecha_salida);
    $stmt->execute();
    
    // Ver si el resultado de la inserción es correcto
    if ($stmt->rowCount() > 0) {
        Flight::jsonp(["Reserva agregada correctamente."]);
    } else {
        Flight::jsonp(["Error al agregar la reserva."]);
    }
});

//Peticion post en formato json para insertar una reserva en la base de datos
// {
//     "id_cliente": "1",
//     "id_hotel": "1",
//     "fecha_reserva": "2021-06-01",
//     "fecha_entrada": "2021-06-01",
//     "fecha_salida": "2021-06-01"
// }

Flight::route('DELETE /reservas', function () {
    $id =  Flight::request()->data->id;
    $sql  = "DELETE FROM reservas WHERE id=?";
    $stmt = Flight::db()->prepare($sql);
    $stmt->bindParam(1, $id);
    $stmt->execute();

    Flight::jsonp(["Reserva eliminada correctamente."]);
});

Flight::route('PUT /reservas', function () {
    $id =  Flight::request()->data->id;
    $fecha_entrada = Flight::request()->data->fecha_entrada;
    $fecha_salida = Flight::request()->data->fecha_salida;

    $sql = "UPDATE reservas SET fecha_entrada=?, fecha_salida=? WHERE id=?";

    $stmt = Flight::db()->prepare($sql);

    $stmt->bindParam(1, $fecha_entrada);
    $stmt->bindParam(2, $fecha_salida);
    $stmt->bindParam(3, $id);

    $stmt->execute();

    Flight::jsonp(["Reserva actualizada correctamente."]);
});

//Peticion put en formato json para actualizar una reserva en la base de datos
// {
//     "id": "1",
//     "fecha_entrada": "2021-06-01",
//     "fecha_salida": "2021-06-01"


Flight::start();
