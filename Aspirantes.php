<?php include('menu.php') ; ?>

<div class = "contenido"> 
    <form id="dt-aspirante" class='info' method="post">
        <div class="txtcuadro"> 
            <h3> Filtro aspirantes</h3> 
            <label for="nombre"> Profesión:</label>
            <input type="text" name="nombre" class="txtform">
            <label for="educación">Educación:</label>
            <input type="text" name="educación" class="txtform">
            <label for="ubicacion">Ubicación:</label>
            <input type="text" name="ubicacion" class="txtform">
            <label for="edad">Edad:</label>
            <input type="text" name="edad" class="txtform">
            <input type="submit" name="gdpersona" value="Buscar" class="button">
        </div>
    </form>

    <table id="rslaspirantes">
        <thead class="row_titulo">
            <tr>
                <th>Resultados</th>
            </tr>
        </thead>    
        <tbody>
        <tr class='espacio'></tr>
                <tr class='row_HVsub'><td>Nombre</td><td>Télefono</td><td>Profesion</td></tr>
                <?php
                    $sql = "SELECT  IdUsuario,Nombre,Apellido,Telefono,b.Profesion FROM Desempleado a 
                    INNER JOIN Profesiones b on b.IdProfesion = a.Profesion where IdUsuario = ?";
                    $params = array($IdUsuario);
                    $resultado = sqlsrv_query( $conn, $sql, $params);
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