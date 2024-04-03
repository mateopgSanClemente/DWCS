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
            grupoSanguineo VARCHAR(3) NOT NULL CHECK (grupoSanguineo IN ('A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-')),
            codigoPostas INT NOT NULL CHECK (LENGTH(codigoPostal)=5),
            telefonoMovil INT NOT NULL CHECK (LENGTH(telefonoMovil)=9)
        );";
        try{
            ejecutar_consulta($conPDO, $sql);
        }catch(PDOException $e){
            echo"Se produjo un error a la hora de crear la tabla: ".$e->getMessage();
        }
    }

    function crear_tabla_historico($conPDO){
        $sql="CREATE TABLE IF NOT EXISTS historicos(
            id INT PRIMARY KEY,
            idDonante INT,
            FOREIGN KEY (idDonante) REFERENCES donantes(id),
            fechaDonacion DATE,
            fechaProxDonacion DATE AS (DATE_ADD(fechaDonacion, INTERVAL 4 MONTH))
            );";
        try{
            ejecutar_consulta($conPDO, $sql);
        }catch(PDOException $e){
            echo"Se produjo un error a la hora de crear la tabla: ".$e->getMessage();
        }
    }

    function crear_tabla_administradores($conPDO){
        $sql="CREATE TABLE IF NOT EXISTS administradores(
            nombreUsuario VARCHAR(50) NOT NULL PRIMARY KEY,
            pass VARCHAR(200) NOT NULL
            );";
        ejecutar_consulta($conPDO, $sql);
    }

    function registrar_donante($conPDO, $nombre, $apellidos, $edad, $grupoSanguineo, $codigoPostal, $telefonoMovil){
        try{
            $sql="INSERT INTO donantes (nombre, apellidos, edad, grupoSanguineo, codigoPostal, telefonoMovil)
            VALUES (:nombre, :apellido, :edad, :grupoSanguineo, :codigoPostal, :telefonoMovil);";
            $stmt = $conPDO->prepare($sql);
            $stmt->bindParam(":nombre", $nombre);
            $stmt->bindParam(":apellidos", $apellidos);
            $stmt->bindParam(":edad", $edad);
            $stmt->bindParam(":grupoSanguineo", $grupoSanguineo);
            $stmt->bindParam(":codigoPostal", $codigoPostal);
            $stmt->bindParam(":telefonoMovil", $telefonoMovil);
            $stmt->execute();
        }catch(PDOException $e){
            echo"Hubo un error a hora de crear la tabla 'donantes': " . $e->getMessage();
        }
    }

    function mostrar_donantes($conPDO){
        try{
            $sql="SELECT * FROM donantes;";
            ejecutar_consulta($conPDO, $sql);
        } catch(PDOException $e){
            echo"Se produjo un error a la hora de seleccionar los datos de la tabla 'donantes': ".$e->getMessage();
        }
    }

    function registrar_donacion($conPDO, $idDonante){
        try{
            $sql="INSERT INTO historicos (idDonante, fechaDonacion)
            VALUES (:idDonante, :fechaDonacion);";
            $stmt=$conPDO->prepare($sql);
            $stmt->bindParam(":idDonante", $idDonante);
            $stmt->bindParam(":fechaDonacion", $fechaDonacion);
            $stmt->execute();
        }catch(PDOException $e){
            echo"Se produjo un error a la hora de registrar la donacion: ".$e->getMessage();
        }
    }

    function eliminar_donante($conPDO, $idDonante){
        try{
            $sql="DELETE FROM donantes WHERE id=$idDonante;";
            ejecutar_consulta($conPDO, $sql);
        }catch(PDOException $e){
            echo"Se produjo un error a la hora de eliminar al usuario con id ".$idDonante.": ". $e->getMessage();
        }
    }
?>