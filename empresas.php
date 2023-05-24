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
                <th colspan = '3'>Resultados</th>
            </tr>
        </thead>    
        <tbody>
        <tr class='espacio'></tr>
                <tr class='row_HVsub'><td>Razón social</td><td>Nombre</td><td>NIT</td></tr>
                <?php
                    $sql = "SELECT NIT, RazonSocial, Nombre FROM Empresa where IdUsuario = ?";
                    $params = array($IdUsuario);
                    $resultado = sqlsrv_query( $conn, $sql, $params);
                    while ($fila = sqlsrv_fetch_object($resultado)) {
                        echo "<tr class='espacio'></tr>";
                        echo "<tr class='row_HV'> <td>$fila->RazonSocial</td><td>$fila->Nombre</td><td>$fila->NIT</td></tr>";
                    }
                ?>
        </tbody>
    </table>

</div>

</div>
</body>