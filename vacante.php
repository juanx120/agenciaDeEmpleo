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

    <table>
        <thead class="row_titulo">
            <tr>
                <th colspan = '3'>Resultados</th>
            </tr>
        </thead>    
        <tbody>
        <tr class='espacio'></tr>
                <tr class='row_HVsub'><td>Titulo</td><td>Empresa</td><td>Profesion</td><td>Salario</td><td>Fecha fin</td></tr>
                <?php
                    $sql = "SELECT IdVacante, Titulo, RazonSocial, b.Profesion, Salario, FechaFin
                    FROM Vacante a INNER JOIN Profesiones b on b.IdProfesion = a.Profesion
                    INNER JOIN VacanteXEmpresa c on IdVacante = c.Vacante INNER JOIN Empresa on NIT = c.Empresa";
                    $resultado = sqlsrv_query( $conn, $sql);
                    while ($fila = sqlsrv_fetch_array($resultado)) {
                        $fechaFin = $fila['FechaFin']->format('d/m/Y');
                        echo "<tr class='espacio'></tr>";
                        echo "<tr class='row_HV'> <td>".$fila['Titulo']."</td><td>".$fila['RazonSocial']."</td><td>".$fila['Profesion']."</td>
                        <td>".$fila['Salario']."</td><td>".$fechaFin."</td></tr>";
                    }
                ?>
        </tbody>
    </table>

</div>

</div>
</body>