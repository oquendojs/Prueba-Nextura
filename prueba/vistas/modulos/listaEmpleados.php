<?php

$DatosEmpleados = ControladorFormularios::ctrDatosEmpleados(null, null);

//echo '<pre>'; print_r($DatosEmpleados); echo '</pre>';

?>

<?php
    $actualizar = new ControladorFormularios::ctrDatosActualizar();
?>

<table class="tablas">

    <thead>

        <tr>

            <a href="index.php?modulo=crearEmpleado">Crear</a>
            
        </tr>

        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Sexo</th>
            <th>Area</th>
            <th>Boletin</th>
            <th>Modificar</th>
            <th>Eliminar</th>
            
        </tr>

    </thead>

    <tbody>


        <?php foreach ($DatosEmpleados as $key => $value): ?>

            <tr>
                <td><?php echo $value ["nombre"]?></td>
                <td><?php echo $value ["email"]?></td>

                <td><?php
                        if ($value ["sexo"] == "M"){
                            echo "Masculino";
                            }
                            elseif($value ["sexo"] == "F"){
                                echo "Femenino";}?></td>

                <td><?php echo $value ["nombreA"]?></td>

                <td><?php
                        if ($value ["boletin"] == "1"){
                            echo "Si";
                            }
                            elseif($value ["boletin"] == "0"){
                                echo "No";}?></td>

                <td><a href='index.php?modulo=modificarEmpleado&id=<?php echo $value ["id"]; ?>'>Editar</a></td>

                <td><a href="">Borrar</a></td>
            </tr>

        <?php endforeach ?>


    </tbody>

</table>

