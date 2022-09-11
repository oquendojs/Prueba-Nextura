<!DOCTYPE html>

<html lang="es">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Empleados</title>

    </head>

    <body>

        <?php

            if(isset($_GET["modulo"])){

                if($_GET["modulo"] == "crearEmpleado" ||
                    $_GET["modulo"] == "listaEmpleados" ||
                    $_GET["modulo"] == "modificarEmpleado"){

                    include "modulos/".$_GET["modulo"].".php";

                }else{

                    include "modulos/error404.php";
                }

            }else{

                include "modulos/listaEmpleados.php";
                
            }

        ?>
      
        
    </body>

</html>