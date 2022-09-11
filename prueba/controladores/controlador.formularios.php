<?php

class ControladorFormularios{

    static public function ctrDatosArea(){

        $tablaArea = "areas";

        $respuesta = ModeloFormularios::mdlDatosArea($tablaArea);

        return $respuesta;

        
    }

    static public function ctrDatosRol(){

        $tablaRol = "roles";

        $respuesta = ModeloFormularios::mdlDatosRol($tablaRol);

        return $respuesta;

        
    }

    static public function ctrDatosEmpleados(){

        $tablaEmpleados = "empleado";

        $tablaArea = "areas";

        $respuesta = ModeloFormularios::mdlDatosEmpleados($tablaEmpleados, $tablaArea);

        return $respuesta;

        
    }

    static public function ctrRegistro(){

        if(isset($_POST["nombreEmpleado"])){

            $tablaEmpleados = "empleado";

            $datos = array("nombre" => $_POST["nombreEmpleado"], "email" => $_POST["correo"], "sexo" => $_POST["genero"], "area_id"=> $_POST["area"], "boletin"=> $_POST["boletin"], "descripcion"=>$_POST["descripcion"]);

            $respuesta = ModeloFormularios::mdlRegistro($tablaEmpleados, $datos);

            return $respuesta;

        }

    }

    static public function ctrDatosModificar($item, $valor){

        $tablaEmpleados = "empleado";

        $tablaArea = "areas";

        $respuesta = ModeloFormularios::mdlDatosModificar($tablaEmpleados, $tablaArea , $item, $valor);

        return $respuesta;

        
    }

    static public function ctrDatosActualizar(){

        if(isset($_POST["actualizarNombre"])){

            $tablaEmpleados = "empleado";

            $datos = array("nombre" => $_POST["actualizarNombre"], "email" => $_POST["actualizarCorreo"], "sexo" => $_POST["actualizarGenero"], "area_id"=> $_POST["actualizarArea"], "boletin"=> $_POST["actualizarBoletin"], "descripcion"=>$_POST["actualizarDescripcion"]);

            $respuesta = ModeloFormularios::mdlActualizar($tablaEmpleados, $datos);

            return $respuesta;

            if($respuesta == "ok"){

                echo '<script>
                if (window.history.replaceState){
                    window.history.replaceState(null, null, window.location.href); 
                }
            
            </script>';

            echo "Actualizado";

        }
            }

        }
        
    }
