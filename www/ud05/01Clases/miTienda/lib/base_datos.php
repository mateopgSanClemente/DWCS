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

function ejecutar_consulta($conPDO, $sql){
    try{
    $resultado = $conPDO->exec($sql);
    return $resultado;
    }catch(PDOException $e){
        echo "Se produjo un error en la consulta: " . $e->getMessage();
    }
}
function crear_bd_tienda($conPDO){
    try{
        $sql = "CREATE DATABASE IF NOT EXISTS tienda";
        //USAR exec() porque no se retornan datos ¿?--> Usar exec() cuando no se usan consultas preparadas.
        ejecutar_consulta($conPDO, $sql);
    }catch(PDOException $e){
        echo $sql . "<br>" . $e->getMessage();
    }
}

function cambiar_base_datos($conPDO, $baseDatos){
    $conexion->select_db($baseDatos);
}

function crear_tabla_mysql($conPDO){
    try{
        $sql="CREATE TABLE IF NOT EXISTS usuarios (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            nombre VARCHAR(50) NOT NULL,
            password VARCHAR(150),
            apellido VARCHAR(100),
            edad INT NOT NULL,
            provincia VARCHAR(50)
            );";
        ejecutar_consulta($conPDO,$sql);
    }catch(PDOException $e){
        echo "Fallo en la conexión: " . $e->getMessage();
    }
}
function crear_tabla_productos($conPDO){
    try{
        $sql="CREATE TABLE IF NOT EXISTS productos(
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            nombre VARCHAR(50),
            descripcion VARCHAR(100),
            precio FLOAT,
            unidades FLOAT,
            foto BLOB);";
        ejecutar_consulta($conPDO, $sql);
    }catch(PDOException $e){
        echo"Falla a la hora de crear la tabla 'productos': " . $e->getMessage();
    }
}


function insertar_datos_tabla ($conPDO, $nombre, $password, $apellido, $edad, $provincia){
    try{
        $sql = "INSERT INTO usuarios (nombre, password, apellido, edad, provincia)
        VALUES (:nombre, :password, :apellido, :edad, :provincia)";
        $stmt=$conPDO->prepare($sql);
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":password", $password);
        $stmt->bindParam(":apellido", $apellido);
        $stmt->bindParam(":edad", $edad);
        $stmt->bindParam(":provincia", $provincia);
        $stmt->execute();
    } catch(PDOException $e){
        echo "Se produjo un error: " . $e->getMessage();
    }
}
function insertar_datos_producto($conPDO, $nombre, $descripcion, $precio, $unidades, $nombreArchivo, $targetDir = "fotografias/"){
    try{
        if (is_array($nombreArchivo)){
            foreach($nombreArchivo as $file){
                $targetFile = $targetDir . basename($file);
                $contenidoArchivo = addslashes(file_get_contents($targetFile));
                $sql="INSERT INTO productos (nombre, descripcion, precio, unidades, foto)
                VALUE(:nombre, :descripcion, :precio, :unidades, :foto)";
                $stmt=$conPDO->prepare($sql);
                $stmt->bindParam(":nombre",$nombre);
                $stmt->bindParam(":descripcion", $descripcion);
                $stmt->bindParam(":precio", $precio);
                $stmt->bindParam(":unidades", $unidades);
                $stmt->bindParam(":foto", $contenidoArchivo);
                $stmt->execute();
            }
        } elseif (is_string($nombreArchivo)){          
            $targetFile = $targetDir . basename($nombreArchivo);
            $contenidoArchivo = addslashes(file_get_contents($targetFile));
            $sql="INSERT INTO productos (nombre, descripcion, precio, unidades, foto)
            VALUE(:nombre, :descripcion, :precio, :unidades, :foto)";
            $stmt=$conPDO->prepare($sql);
            $stmt->bindParam(":nombre",$nombre);
            $stmt->bindParam(":descripcion", $descripcion);
            $stmt->bindParam(":precio", $precio);
            $stmt->bindParam(":unidades", $unidades);
            $stmt->bindParam(":foto", $contenidoArchivo);
            $stmt->execute();
            $stmt->close();
        }
    }catch(PDOException $e){
        echo"Se produjo un error: ".$e->getMessage();
    }
}
function seleccionar_datos($conPDO){
    try{
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

function consulta($conPDO){
    try{
        $sql = "SELECT id, nombre, apellido, edad, provincia FROM usuarios";
        $stmt = $conPDO->prepare($sql);
        $stmt->execute();
        //Obtiene los resultados como un array asociativo
        $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $clientes;
    }catch(PDOExceptio $e){
        echo"Error al ejecutar la consulta: " . $e->getMessage();
    }
}

function consulta_alternativa($conPDO){
    $sql="SELECT * FROM usuarios";
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
    }catch(PDOException $e){
        echo"Se produjo un error en la consulta:".$e->getMessage()."<br>";
    }
}
function consulta_id($conPDO, $id){
    $sql="SELECT * FROM usuarios WHERE id=?";
    $stmt=$conPDO->prepare($sql);
    $stmt->execute([$id]);//Devuelve un booleando
    $cliente = $stmt->fetchAll(PDO::FETCH_ASSOC);//Crea array asociativo
    return $cliente;
} 

function editar_cliente($conPDO, $id, $nombre, $apellidos, $edad, $provincia){
    $sql="UPDATE usuarios SET nombre=?, apellido=?, edad=?, provincia=? WHERE id=?";
    $stmt=$conPDO->prepare($sql);
    $stmt->execute([$nombre, $apellidos, $edad, $provincia, $id]);
}

function borrar_datos($conPDO, $id){
    $sql="DELETE FROM usuarios WHERE id=$id";
    $conPDO->exec($sql);
    $conPDO=null;
}

function cerrarConexion ($conPDO){
    //CERRAR CONEXIÓN A LA BASE DATOS
    $conPDO = null;
}

function recuperarPassword($conPDO, $nombreUsuario){
    $sql = "SELECT password FROM usuarios WHERE nombre=?;";
    $stmt = $conPDO->prepare($sql);
    $stmt->execute([$nombreUsuario]);
    $password = $stmt->fetchColumn();
    cerrarConexion($conPDO);
    return $password;
}

function comprobarUsuario ($conPDO, $nombreUsuario){
    $sql = "SELECT COUNT(*) as total FROM usuarios WHERE nombre = :usuario";
    $stmt = $conPDO->prepare($sql);
    $stmt->bindParam(":usuario", $nombreUsuario);
    $stmt->execute();
    $resultado=$stmt->fetch(PDO::FETCH_COLUMN); 
    return $resultado;
}

//FUNCIONES TEMA 4. No tiene ningún sentido que convierta funciones en funciones

