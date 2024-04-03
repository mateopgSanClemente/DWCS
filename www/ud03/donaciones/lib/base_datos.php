<?php
    function crear_conexion(){
        $dsn="mysql:host=db";
        $username="root";
        $password="test";

        try{
            $conPDO=new PDO($dsn, $username, $password);
            $conPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conPDO;
        }catch(PDOException $e){
            echo"Se produjo un error en la conexión: ".$e->getMessage();
        }
    }

    function seleccionar_db_donaciones($conPDO){
        $sql="USE donacion";
        $sql->exec($sql);
    }

    function ejecutar_consulta($conPDO, $sql){
        try{
            $conPDO->exec($sql);
        }catch(PDOException $e){
            echo"Se produjo un error en la consulta: " . $e->getMessage();
        }
    }

    function crear_bd_donaciones($conPDO){
        $sql="CREATE DATABASE IF NOT EXISTS donacion";
        try{
        ejecutar_consulta($conPDO, $sql);
        }catch(PDOException $e){
            echo"Se produjo un error en la creación de la base de datos: ".$e->getMessage();
        }
    }

    function crear_tabla_donantes($conPDO){
        $sql="CREATE TABLE IF NOT EXISTS donantes(
            id INT UNSIGNED AUTO INCREMENT PRIMARY KEY,
            nombre VARCHAR(50) NOT NULL,
            apellidos VARCHAR(100) NOT NULL,
            edad INT NOT NULL CHECK (edad>=18 AND edad<=120),
            grupoSanguineo VARCHAR(3) CHECK (grupoSanguineo IN ('A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-')),
            codigoPostas INT CHECK (LENGTH(codigoPostal)=5),
            telefonoMovil INT CHECK (LENGTH(telefonoMovil)=9)
        );";
        try{
            ejecutar_consulta($conPDO, $sql);
        }catch(PDOException $e){
            echo"Se produjo un error a la hora de crear la tabla: ".$e->getMessage();
        }
    }

    function crear_tabla_historico($conPDO){}
?>