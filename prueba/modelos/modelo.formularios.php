<?php

require_once "conexion.php";

class ModeloFormularios{

    static public function mdlDatosArea($tablaArea){

        $stmt = Conexion::conectar() -> prepare("SELECT * FROM $tablaArea");

        $stmt -> execute();

        return $stmt->fetchAll();

        $stmt -> close();

        $stmt = null;
        

    }

    static public function mdlDatosRol($tablaRol){

        $stmt = Conexion::conectar() -> prepare("SELECT * FROM $tablaRol");

        $stmt -> execute();

        return $stmt->fetchAll();

        $stmt -> close();

        $stmt = null;
        

    }

    static public function mdlDatosEmpleados($tablaEmpleados, $tablaArea){

        $stmt = Conexion::conectar() -> prepare("SELECT $tablaEmpleados.id, $tablaEmpleados.nombre, $tablaEmpleados.email, $tablaEmpleados.sexo, $tablaArea.nombreA, $tablaEmpleados.boletin, $tablaEmpleados.descripcion FROM $tablaEmpleados, $tablaArea WHERE $tablaArea.id=$tablaEmpleados.area_id");

        $stmt -> execute();

        return $stmt->fetchAll();

        $stmt -> close();

        $stmt = null;
        

    }

    static public function mdlRegistro($tablaEmpleados, $datos){


        $stmt = Conexion::conectar() -> prepare("INSERT INTO $tablaEmpleados (nombre, email, sexo, area_id, boletin, descripcion) VALUES (:nombre, :email, :sexo, :area_id, :boletin, :descripcion)");

        $stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $stmt -> bindParam(":sexo", $datos["sexo"], PDO::PARAM_STR);
        $stmt -> bindParam(":area_id", $datos["area_id"], PDO::PARAM_STR);
        $stmt -> bindParam(":boletin", $datos["boletin"], PDO::PARAM_STR);
        $stmt -> bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);

        if($stmt->execute()){

            return "ok";

        }else{

            print_r(Conexion::conectar()->errorInfo());

        }

        $stmt -> close();

        $stmt = null;

    }

    static public function mdlDatosModificar($tablaEmpleados, $tablaArea, $item, $valor){

        $stmt = Conexion::conectar() -> prepare("SELECT $tablaEmpleados.id, $tablaEmpleados.nombre, $tablaEmpleados.email, $tablaEmpleados.sexo, $tablaArea.nombreA, $tablaEmpleados.boletin, $tablaEmpleados.descripcion FROM $tablaEmpleados, $tablaArea WHERE $tablaArea.id=$tablaEmpleados.area_id AND $tablaEmpleados.id = :$item ORDER BY $tablaEmpleados.id DESC");

        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

        $stmt -> execute();

        return $stmt->fetch();

        $stmt -> close();

        $stmt = null;
        
    }

    static public function mdlActualizar($tablaEmpleados, $datos){

        $stmt = Conexion::conectar() -> prepare("UPDATE $tablaEmpleados SET nombre=:nombre, email=:email, sexo=:sexo, area_id=:area_id, boletin=:boletin, descripcion=:descripcion WHERE id= :id");

        $stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $stmt -> bindParam(":sexo", $datos["sexo"], PDO::PARAM_STR);
        $stmt -> bindParam(":area_id", $datos["area_id"], PDO::PARAM_STR);
        $stmt -> bindParam(":boletin", $datos["boletin"], PDO::PARAM_STR);
        $stmt -> bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);

        if($stmt->execute()){

            return "ok";

        }else{

            print_r(Conexion::conectar()->errorInfo());

        }

        $stmt -> close();

        $stmt = null;
        
    }


}

