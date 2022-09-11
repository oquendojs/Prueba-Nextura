<?php

class Conexion{

    static public function conectar(){

        $link = new PDO("mysql:host=localhost; dbname=prueba_tecnica_dev", "root", "");
        
        $link -> exec("set names utf8");
        
        return $link;
    }
}