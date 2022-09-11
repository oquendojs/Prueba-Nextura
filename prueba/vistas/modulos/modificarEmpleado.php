
<?php

$DatosArea = ControladorFormularios::ctrDatosArea();

$DatosRol = ControladorFormularios::ctrDatosRol();

//$DatosRegistro = ControladorFormularios::ctrRegistro();

//echo '<pre>'; print_r($DatosRegistro); echo '</pre>';

if(isset($_GET["id"])){

    $item ="id";

    $valor = $_GET["id"];

    $Empleado = ControladorFormularios::ctrDatosModificar($item, $valor);

    //echo '<pre>'; print_r($Empleado); echo '</pre>';
}

?>

<form method="post">

    <label for="nombreEmpleado">Nombre Completo *</label>
    <input type="text" id="nombreEmpleado" name="actualizarNombre" value="<?php echo $Empleado["nombre"]; ?>"> <br>

    <label for="correo">Correo electronico *</label>
    <input type="email" id="correo" name="actualizarCorreo" value="<?php echo $Empleado["email"]; ?>"><br>

    <label> Genero * </label>

            <?php

            if($Empleado["sexo"]=="M"){

                echo '<input type="radio" id="genero" name="actualizarGenero" value="M" checked>Masculino<br>';
                echo '<input type="radio" id="genero" name="actualizarGenero" value="F">Femenino<br>';
        
            }elseif($Empleado["sexo"]=="F"){

                echo '<input type="radio" id="genero" name="actualizarGenero" value="M" >Masculino<br>';
                echo '<input type="radio" id="genero" name="actualizarGenero" value="F" checked>Femenino<br>';
                
        
            }

        ?>

    <label>Área *</label>
    <select name="actualizarArea" id="area">

            <option value="<?php echo $DatosArea.$value ["id"]; ?>"> <?php echo $Empleado["nombreA"]; ?></option>

        <?php foreach ($DatosArea as $key => $value): ?>

            <option value="<?php echo $value ["id"]; ?>"> <?php echo $value["nombreA"]; ?></option>

        <?php endforeach ?>

    </select><br>

    <label>Descripción *</label><br>
    <textarea name="actualizarDescripcion" id="descripcion" cols="30" rows="10"><?php echo $Empleado["descripcion"]; ?></textarea><br>

    <label>Boletín *</label>

    <select name="actualizarBoletin" id="boletin">

        <?php

            if($Empleado["boletin"]=="1"){

                echo '<option value="1">Si</option>';
                echo '<option value="0">No</option>';
        
            }elseif($Empleado["boletin"]=="0"){


                echo '<option value="0">No</option>';
                echo '<option value="1">Si</option>';
        
            }

        ?>


    </select><br>
    
    <label>Roles*</label>
    <?php foreach ($DatosRol as $key => $value): ?>

        <input type="checkbox" id="rol" value="<?php echo $value ["id"]; ?>" name="actualizarRol"> <?php echo $value ["nombre"];?> <br>

    <?php endforeach ?> <br>


    <input type="submit" value="Modificar">
   

</form>