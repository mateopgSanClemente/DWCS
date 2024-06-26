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
/*
Una alternativa a bloque de código para seleccionar una bd específica a través de parámetro puede ser:
function seleccionar_bd_tienda($conPDO, $nombre_db){

    $sql="USE $nombre_db;";
    $conPDO->exec($sql);
}
*/

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
        $sql="CREATE TABLE IF NOT EXISTS Clientes (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            nombre VARCHAR(50) NOT NULL,
            apellido VARCHAR(100),
            edad INT NOT NULL,
            provincia VARCHAR(50)
            );";
        //SE EJECUTA LA SENTENCIA SQL
        ejecutar_consulta($conPDO,$sql);
    }catch(PDOException $e){
        echo "Fallo en la conexión: " . $e->getMessage();
    }
}
//INSERTAR DATOS EN LA TABLA. HACER QUE MUESTRE TAMBIÉN EL ÚLTIMO ID!
//ESTA FUNCIÓN TENGO QUE MODIFICARLA PARA QUE RECOJA LA INFORMACIÓN DEL FOMRULARIO!!
//MODIFICARLO PARA QUE FUNCIONE COMO UN CONSULTA PREPARADA
function insertar_datos_tabla ($conPDO, $nombre, $apellido, $edad, $provincia){
    try{
        $sql = "INSERT INTO Clientes (nombre, apellido, edad, provincia)
        VALUES ('$nombre', '$apellido', '$edad', '$provincia')";
        ejecutar_consulta($conPDO, $sql);
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
        //CONVERTIR EL RESULTADO EN UN ARRAY MULTIDIMENSIONAL ASOCIATIVO
        $resultado=$stmt->setFetchMode(PDO::FETCH_ASSOC);
        foreach($stmt->fetchAll() as $k=>$v){
            echo $v;
        }
    }catch(PDOException $e){
        echo"Error: " . $e->getMessage();
    }
}

//CONSULTAR TABLA
function consultar_tabla_tienda($conPDO){
    try{
    $sql="SELECT * FROM tienda";
    $consulta = ejecutar_consulta($conPDO, $sql);
    }catch(PDOException $e){
        echo"Se produjo un error en la consulta de los datos: " . $e->getMessage();
    }
}

function consulta($conPDO){
    //Preparar consulta
    $sql = "SELECT * FROM Clientes";
    try{
    $stmt = $conPDO->prepare($sql);
    //Ejecutar consulta
    $stmt->execute();
    //Obtiene los resultados como un array asociativo
    $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $clientes;
    }catch(PDOExceptio $e){
        echo"Error al ejecutar la consulta: " . $e->getMessage();
    }
    $stmt=null;
}
function consulta_alternativa($conPDO){
    //Preparar consulta
    $sql="SELECT * FROM Clientes";
    try{
        //Se realiza la consulta a través del método query().
        $stmt=$conPDO->query($sql);
        //Se indica el formato de los datos de la consulta para que sea un array asociativo
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        while($fila=$stmt->fetch()){
            echo"<tr>";
            foreach($fila as $dato){
                echo"<td>$dato</td>";
            }
            echo"<td><a href=\"editar.php?id=".$fila["id"]."\">Editar</a></td>";
            echo"<td><a href=\"borrar.php?id=".$fila["id"]."\">Borrar</a></td>";
            echo"</tr>";
            
        }
        $stmt=null;
    }catch(PDOException $e){
        echo"Se produjo un error en la consulta:".$e->getMessage()."<br>";
    }
}
function consulta_id($conPDO, $id){
    $sql="SELECT * FROM Clientes WHERE id=?";
    $stmt=$conPDO->prepare($sql);
    $stmt->execute([$id]);//Devuelve un booleando
    $cliente = $stmt->fetchAll(PDO::FETCH_ASSOC);//Crea array asociativo
    $stmt=null;
    return $cliente;
}
//EDITAR ELEMENTO TABLA CLIENTES
function editar_cliente($conPDO, $id, $nombre, $apellidos, $edad, $provincia){
    $sql="UPDATE Clientes SET nombre=?, apellido=?, edad=?, provincia=? WHERE id=?";
    $stmt=$conPDO->prepare($sql);
    $stmt->execute([$nombre, $apellidos, $edad, $provincia, $id]);
}
//BORRAR ELEMENTO TABLA CLIENTES
function borrar_datos($conPDO, $id){
    $sql="DELETE FROM Clientes WHERE id=$id";
    $conPDO->exec($sql);
    $conPDO=null;
}
//CERRAR LA CONEXIÓN
function cerrarConexion ($conPDO){
    //CERRAR CONEXIÓN A LA BASE DATOS
    $conPDO = null;
}