<?php include('menu.php') ; ?>

<div class = "contenido"> 
    <form id="dt-hoja" class='info' method="post">
        <div class="ttlcuadro">
            <div class="titulo">
                <h2>Datos de la vacante</h2>
            </div>
        </div>
        <div class="txtcuadro"> 
            <label for="fechaInicio">Fecha inicio:</label>
            <input type="date" name="fechaInicio" class="txtform">
            <label for="fechaFinal">Fecha final:</label>
            <input type="date" name="fechaInicio" class="txtform">
            <label for="profesion">Profesion:</label>
            <?php
                $resultado = sqlsrv_query($conn, "SELECT IdProfesion, Profesion FROM [dbo].[Profesiones]");
                echo '<select name="profesion" class="txtform" id="selectorPro">';
                while ($prof = sqlsrv_fetch_object($resultado)) {
                        echo '<option value="' , $prof->IdProfesion , '">' , $prof->Profesion , '</option>';
                    }
                echo '</select>'
            ?>
            <label for="edMin">Edad minima:</label>
            <input type="number" name="edMin" class="txtform">
            <label for="edMax">Edad maxima:</label>
            <input type="number" name="edMax" class="txtform">
            <label for="nvlEducacion">Nivel educación:</label>
            <input type="text" name="nvlEducacion" class="txtform">
            <label for="salario">Salario:</label>
            <input type="number" name="salario" class="txtform">
            <br>
            <label for="descripcionva">Descripción:</label>
            <input type="text" name="descripcionva" class="txtformlg"><br><br>
            <input type="submit" name="gdvacante" value="Guardar" class="button">
        </div>
    </form>

</div>

</div>
</body>