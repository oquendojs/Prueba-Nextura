
<?php

$DatosArea = ControladorFormularios::ctrDatosArea();

$DatosRol = ControladorFormularios::ctrDatosRol();

//$DatosRegistro = ControladorFormularios::ctrRegistro();

//echo '<pre>'; print_r($DatosRegistro); echo '</pre>';

?>

<form method="post">

    <label for="nombreEmpleado">Nombre Completo *</label>
    <input type="text" id="nombreEmpleado" name="nombreEmpleado" placeholder="Nombre completo del empleado"> <br>

    <label for="correo">Correo electronico *</label>
    <input type="email" id="correo" name="correo" placeholder="Correo electronico"><br>

    <label> Genero * </label>
    <input type="radio" id="genero" name="genero" value="M">Masculino<br>
    <input type="radio" id="genero" name="genero" value="F" checked>Femenino<br>

    <label>Área *</label>
    <select name="area" id="area">

        <?php foreach ($DatosArea as $key => $value): ?>

            <option value="<?php echo $value ["id"]; ?>"> <?php echo $value ["nombreA"]; ?></option>

        <?php endforeach ?>

    </select><br>

    <label>Descripción *</label><br>
    <textarea name="descripcion" id="descripcion" cols="30" rows="10"></textarea><br>

    <label>Boletín *</label>

    <select name="boletin" id="boletin">

            <option value="1">Si</option>
            <option value="0">No</option>

    </select><br>
    
    <label>Roles*</label>
    <?php foreach ($DatosRol as $key => $value): ?>

        <input type="checkbox" id="rol" value="<?php echo $value ["id"]; ?>" name="rol"> <?php echo $value ["nombre"];?> <br>

    <?php endforeach ?> <br>

    <?php


        $registro = ControladorFormularios::ctrRegistro();

        if ($registro == "ok") {

            echo '<script>
                if (window.history.replaceState){
                    window.history.replaceState(null, null, window.location.href="index.php?modulo=listaEmpleados"); 
                }
            
            </script>';

            echo "agregado";
        }


        ?>



    <button type="submit" name="guardar">Guardar</button>
   

</form>