<?php include('menu.php') ; ?>

<div class = "contenido"> 
    <form id="dt-aspirante" class='info' method="post">
        <div class="txtcuadro"> 
            <h3> Filtro vacantes</h3> 
            <label for="nombre"> Cargo:</label>
            <input type="text" name="nombre" class="txtform">
            <label for="educación">Empresa:</label>
            <input type="text" name="educación" class="txtform">
            <label for="ubicacion">Fecha inicio:</label>
            <input type="text" name="ubicacion" class="txtform">
            <label for="edad">Fecha fin:</label>
            <input type="text" name="edad" class="txtform">
            <input type="submit" name="gdpersona" value="Buscar" class="button">
        </div>
    </form>

    <table id="rslaspirantes">
        <thead class="row_titulo">
            <tr>
                <th colspan = '3'>Resultados</th>
            </tr>
        </thead>    
        <tbody>
        <tr class='espacio'></tr>
                <tr class='row_HVsub'><td>Nombre</td><td>Télefono</td><td>Profesion</td></tr>
                <?php
                    $sql = "SELECT  IdUsuario,Nombre,Apellido,Telefono,b.Profesion FROM Desempleado a 
                    INNER JOIN Profesiones b on b.IdProfesion = a.Profesion";
                    $resultado = sqlsrv_query( $conn, $sql);
                    while ($fila = sqlsrv_fetch_object($resultado)) {
                        echo "<tr class='espacio'></tr>";
                        echo "<tr class='row_HV'> <td>$fila->Nombre $fila->Apellido</td><td>$fila->Telefono</td><td>$fila->Profesion</td></tr>";
                    }
                ?>
        </tbody>
    </table>

</div>

</div>
</body>