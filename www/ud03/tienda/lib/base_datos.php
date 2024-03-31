<?php

function get_conexion(){
    //Código para establecer á conexión
    //return $conexion;

    //Establecer una conexión mediante PDO
    //1. Crear las variables para autenticarse en la base de datos
    //ATENCION!: NO incluyo la base de datos en la instancia de la conexión pq todavía no existe

    $dsn = "mysql:host=db";
    $username = "root";
    $password = "test";
    //2. Establcer la conexión
    try {
        $conPDO = new PDO($dsn, $username, $password);
        //Configurar el modo de error y excepcion de PDO
        $conPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Conexión correcta<br>";
        return $conPDO;
    }catch(PDOException $e){
        echo "Fallo en la conexión: " . $e->getMessage();
    }
}



//SELECCIONAR LA BASE DE DATOS
function seleccionar_bd_tienda($conPDO){
    /*OJO!: Esta función está disponible para la extensión MySQLi, pero no para PDO
    $conPDO->select_db("tienda");
    */
    $sql="USE tienda;";
    $conPDO->exec($sql);
}

//EJECUTAR CONSULTA
function ejecutar_consulta($conPDO, $sql){
    try{
    $resultado = $conPDO->exec($sql);
    return $resultado;
    }catch(PDOException $e){
        echo "Se produjo un error en la consulta: " . $e->getMessage();
    }
}

//CREAR UNA BASE DE DATOS 'TIENDA'
function crear_bd_tienda($conPDO){
    try{
        //
        $sql = "CREATE DATABASE IF NOT EXISTS tienda";
        //USAR exec() porque no se retornan datos ¿?
        ejecutar_consulta($conPDO, $sql);
        echo "Base de datos creada correctamente<br>";
    }catch(PDOException $e){
        echo $sql . "<br>" . $e->getMessage();
    }
}

//CAMBIAR DE BASE DE DATOS
function cambiar_base_datos($conPDO, $baseDatos){
    $conexion->select_db($baseDatos);
}

//CREAR UNA TABLA MYSQL
function crear_tabla_mysql($conPDO){
    try{
        $sql="CREATE TABLE Clientes (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            nombre VARCHAR(50) NOT NULL,
            apellido VARCHAR(100),
            edad INT NOT NULL,
            provincia VARCHAR(50)
            );";
        //SE EJECUTA LA SENTENCIA SQL
        ejecutar_consulta($conPDO,$sql);
        echo "La tabla fue creada correctamente.";
    }catch(PDOException $e){
        echo "Fallo en la conexión: " . $e->getMessage();
    }
}
//INSERTAR DATOS EN LA TABLA. HACER QUE MUESTRE TAMBIÉN EL ÚLTIMO ID!
//ESTA FUNCIÓN TENGO QUE MODIFICARLA PARA QUE RECOJA LA INFORMACIÓN DEL FOMRULARIO!!
function insertar_datos_tabla ($conPDO, $nombre, $apellido, $edad, $provincia){
    try{
        $insertar = "INSERT INTO tienda (nombre, apellido, edad, provincia)
        VALUES ($nombre, $apellido, $edad, $provincia)";
    } catch(PDOException $e){
        echo "Se produjo un error: " . $e->getMessage();
    }
}

//SELECCIONAR DATOS
function seleccionar_datos($conPDO){
    try{
        //Preparar el select
        $stmt = $conPDO->prepare("SELECT id, nombre, apellido, edad, provincia FROM Usuarios");
        $stmt->execute();
        //CONVERTIR EL RESULTADO EN UN ARRAY ASOCIATIVO
        $resultado=$stmt->setFetchMode(PDO::FETCH_ASSOC);
        foreach($stmt->fetchAll() as $k=>$v){
            echo $v;
        }
    }catch(PDOException $e){
        echo"Error: " . $e->getMessage();
    }
}

//CERRAR LA CONEXIÓN
function cerrarConexion ($conPDO){
    //CERRAR CONEXIÓN A LA BASE DATOS
    $conPDO = null;
}