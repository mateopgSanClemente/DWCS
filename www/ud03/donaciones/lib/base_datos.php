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

    function seleccionar_bd_donaciones($conPDO){
        $sql="USE donacion";
        $conPDO->exec($sql);
    }

    function ejecutar_consulta($conPDO, $sql){
        try{
            $consulta=$conPDO->exec($sql);
            return $consulta;
        }catch(PDOException $e){
            echo"Se produjo un error en la consulta: " . $e->getMessage();
        }
    }

    function crear_bd_donaciones($conPDO){    
        try{
            $sql="CREATE DATABASE IF NOT EXISTS donacion";
            ejecutar_consulta($conPDO, $sql);
        }catch(PDOException $e){
            echo"Se produjo un error en la creación de la base de datos: ".$e->getMessage();
        }
    }

    function crear_tabla_donantes($conPDO){
        $sql="CREATE TABLE IF NOT EXISTS donantes(
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            nombre VARCHAR(50) NOT NULL,
            apellidos VARCHAR(100) NOT NULL,
            edad INT NOT NULL CHECK (edad>=18 AND edad<=120),
            grupoSanguineo VARCHAR(3) NOT NULL CHECK (grupoSanguineo IN ('A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-')),
            codigoPostal INT NOT NULL,
            telefonoMovil INT NOT NULL
        );";
        try{
            ejecutar_consulta($conPDO, $sql);
        }catch(PDOException $e){
            echo"Se produjo un error a la hora de crear la tabla: ".$e->getMessage();
        }
    }

    function crear_tabla_historico($conPDO){
        $sql="CREATE TABLE IF NOT EXISTS historicos(
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            idDonante INT UNSIGNED,
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
            VALUES (:nombre, :apellidos, :edad, :grupoSanguineo, :codigoPostal, :telefonoMovil);";
            $stmt = $conPDO->prepare($sql);
            $stmt->bindParam(":nombre", $nombre);
            $stmt->bindParam(":apellidos", $apellidos);
            $stmt->bindParam(":edad", $edad);
            $stmt->bindParam(":grupoSanguineo", $grupoSanguineo);
            $stmt->bindParam(":codigoPostal", $codigoPostal);
            $stmt->bindParam(":telefonoMovil", $telefonoMovil);
            $stmt->execute();
        }catch(PDOException $e){
            echo"Hubo un error a hora de insertar en la tabla 'donantes': " . $e->getMessage();
        }
    }

    function mostrar_donantes($conPDO){
        try{
            $sql="SELECT * FROM donantes;";
            $stmt=$conPDO->prepare($sql);
            $stmt->execute();
            while($donante=$stmt->fetch(PDO::FETCH_ASSOC)){
                echo"<tr>";
                echo "<td>".$donante['id']."</td>";
                echo "<td>".$donante['nombre']."</td>";
                echo "<td>".$donante['apellidos']."</td>";
                echo "<td>".$donante['edad']."</td>";
                echo "<td>".$donante['grupoSanguineo']."</td>";
                echo "<td>".$donante['codigoPostal']."</td>";
                echo "<td>".$donante['telefonoMovil']."</td>";
                echo"<td><a href=\"donar.php?id=".$donante['id']."\">Registrar donación</a></td>";
                echo"<td><a href=\"listar_donaciones.php?id=".$donante['id']."\">Listar donación</a></td>";
                echo"<td><a href=\"borrar_donante.php?id=".$donante['id']."\">Eliminar</a></td>";
                echo"</tr>";
            }
        } catch(PDOException $e){
            echo"Se produjo un error a la hora de seleccionar los datos de la tabla 'donantes': ".$e->getMessage();
        }
    }

    function registrar_donacion($conPDO, $idDonante, $fechaDonacion){
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
            $sql="DELETE FROM donantes WHERE id=:idDonante;";
            $stmt=$conPDO->prepare($sql);
            $stmt->bindParam(":idDonante", $idDonante);
            $stmt->execute();
        }catch(PDOException $e){
            echo"Se produjo un error a la hora de eliminar al usuario con id ".$idDonante.": ". $e->getMessage();
        }
    }

    function mostrar_donaciones($conPDO, $idDonante){
        try{
            $sql="SELECT h.id, h.idDonante, h.fechaDonacion, h.fechaProxDonacion,d.nombre, d.apellidos, d.edad, d.grupoSanguineo
            FROM historicos h
            JOIN donantes d ON h.idDonante=d.id
            WHERE h.idDonante=:idDonante
            ORDER BY fechaDonacion DESC";
            $stmt=$conPDO->prepare($sql);
            $stmt->bindParam(":idDonante", $idDonante);
            $stmt->execute();
            while($donacion=$stmt->fetch(PDO::FETCH_ASSOC)){
                //MODIFICAR PARA AJUSTAR A TABLA
                echo "<tr>";
                echo "<td>".$donacion["id"]."</td>";
                echo "<td>".$donacion["idDonante"]."</td>";
                echo "<td>".$donacion["nombre"]."</td>";
                echo "<td>".$donacion["apellidos"]."</td>";
                echo "<td>".$donacion["edad"]."</td>";
                echo "<td>".$donacion["grupoSanguineo"]."</td>";
                echo "<td>".$donacion["fechaDonacion"]."</td>";
                echo "<td>".$donacion["fechaProxDonacion"]."</td>";
                echo "</tr>";
            }
            if($stmt->rowCount()==0){
                echo("No se encontró ninguna coincidencia");
            }
        }catch(PDOException $e){
            echo"Se produjo un error a la hora de mostrar las donaciones: ".$e->getMessage();
        }
    }

    function buscar_donante_codigo_postal($conPDO, $codigoPostal){
        try{
            $sql="SELECT d.*, h.*
            FROM historicos
            JOIN donantes d ON h.idDonantes=d.id
            WHERE d.codigoPostas=:codigoPostal";
            $stmt=$conPDO->prepare($sql);
            $stmt->bindParam(":codigoPostal",$codigoPostal);
            $stmt->execute();
            //AJUSTAR A TABLA E INCLUIR LOS CASOS EN LOS QUE EL DONANTE NO HAYA REALIZADO DONACIONES
            while($coincidencia=$stmt->fetch(PDO::FETCH_ASSOC)){
                echo $coincidencia["nombre"];
                echo $coincidencia["apellidos"];
                echo $coincidencia["edad"];
                echo $coincidencia["codigoPostal"];
                echo $coincidencia["grupoSanguineo"];
                echo $coincidencia["fechaProxDonacion"];
            }
        }catch(PDOException $e){
            echo"Se produjo un error en la seleción de los campos: ".$e->getMessage();
        }
    }

    function registrar_administrador($conPDO, $nombreUsuario, $pass){
        try{
        $sql="INSERT INTO administradores (nombreUsuario, pass)
        VALUES (:nombreUsuario, :pass);";
        $stmt=$conPDO->prepare($sql);
        $stmt->bindParam(":nombreUsuario", $nombreUsuario);
        $stmt->bindParam(":pass", $pass);
        $stmt->execute();
        }catch(PDOException $e){
            "Se produjo un error a la hora de introducir los valores en la tabla 'administradores': ".$e->getMessage();
        }
    }
?>