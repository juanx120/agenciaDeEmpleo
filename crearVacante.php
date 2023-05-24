<?php include('menu.php') ; ?>

<div class = "contenido"> 
    <form id="dt-hoja" class='info' method="post">
        <div class="ttlcuadro">
            <div class="titulo">
                <h2>Datos de la vacante</h2>
            </div>
        </div>
        <div class="txtcuadro"> 
            <label for="titulova">Título:</label>
            <input type="text" name="titulova" class="txtform" require>    
            <label for="salariova">Salario:</label>
            <input type="number" name="salariova" class="txtform" require>
            <label for="fechaInicio">Fecha inicio:</label>
            <input type="date" name="fechaInicio" class="txtform" require>
            <label for="fechaFinal">Fecha final:</label>
            <input type="date" name="fechaInicio" class="txtform" require>
            <label for="profesionva">Profesion:</label>
            <?php
                $resultado = sqlsrv_query($conn, "SELECT IdProfesion, Profesion FROM [dbo].[Profesiones]");
                echo '<select name="profesionva" class="txtform" id="selectorPro">';
                while ($prof = sqlsrv_fetch_object($resultado)) {
                        echo '<option value="' , $prof->IdProfesion , '">' , $prof->Profesion , '</option>';
                    }
                echo '</select>'
            ?>
            <label for="sedeva">Sede:</label>
            <?php
                $resultado = sqlsrv_query($conn, "SELECT IdSede, a.Nombre FROM Sede a INNER JOIN SedesXEmpresa on IdSede = Sede
                INNER JOIN Empresa on Empresa = NIT where IdUsuario = $IdUsuario");
                echo '<select name="sedeva" class="txtform" id="selectorPro">';
                while ($sed = sqlsrv_fetch_object($resultado)) {
                        echo '<option value="' , $sed->IdSede , '">' , $sed->Nombre , '</option>';
                    }
                echo '</select>'
            ?>
            <label for="edMin">Edad minima:</label>
            <input type="number" name="edMin" class="txtform" require>
            <label for="edMax">Edad maxima:</label>
            <input type="number" name="edMax" class="txtform" require>
            <label for="nvlEducacion">Nivel educación:</label>
            <input type="text" name="nvlEducacion" class="txtform" require>
            <br><br>
            <label for="descripcionva">Descripción:</label>
            <input type="text" name="descripcionva" class="txtformlg" require><br><br>
            <input type="submit" name="gdvacante" value="Guardar" class="button">
        </div>
    </form>
 
    <table>
        <thead class="row_titulo">
            <tr>
                <th colspan = '5'>Listado de vacantes</th>
            </tr>
        </thead>    
        <tbody>
            <tr class='espacio'></tr>
            <tr class='row_HVsub'><td>Título</td><td>Profesion</td><td>Salario</td><td>Nivel educación</td><td>Fecha final</td></tr>
            <?php
                $sql = "SELECT IdVacante, Titulo, b.Profesion, EducacionRequerida, Salario, FechaFin
                FROM Vacante a INNER JOIN Profesiones b on b.IdProfesion = a.Profesion
                INNER JOIN VacanteXEmpresa c on IdVacante = c.Vacante INNER JOIN Empresa on NIT = c.Empresa 
                where IdUsuario = ?";
                $params = array($IdUsuario);
                $resultado = sqlsrv_query( $conn, $sql, $params);
                while ($fila2 = sqlsrv_fetch_array($resultado)) {
                    echo "<tr class='espacio'></tr>";
                    echo "<tr class='row_HV'> <td>".$fila2['Titulo']."</td><td>".$fila2['Profesion']."</td><td>".$fila2['Salario']."</td>
                    <td>".$fila2['EducacionRequerida']."</td><td>".$fila2->['FechaFin']."</td></tr>";
                }
            ?>
        </tbody>
    </table>
</div>

<?php 
    if(isset($_POST['gdvacante'])){
        $Titulova=$_POST['titulova'];
        $Salario=$_POST['salariova'];
        $Fechin = date('Y-m-d', strtotime($_POST['fechaInicio']));
        $Fechfin = date('Y-m-d', strtotime($_POST['fechaFinal']));
        $Profesionva=$_POST['profesionva'];
        $Sedeva=$_POST['sedeva'];
        $EdMin=$_POST['edMin'];
        $EdMax=$_POST['edMax'];
        $NvlEducacion=$_POST['nvlEducacion'];
        $Descripcionva=$_POST['descripcionva'];
    
        $sql = "INSERT INTO [dbo].[Vacante] (Titulo, Salario, FechaInicio, FechaFin, Profesion, Sede, EdadMinima, EdadMaxima, EducacionRequerida, DescripcionVacante) 
        VALUES (?,?,?,?,?,?,?,?,?,?)";
        $params = array($Titulova, $Salario, $Fechin, $Fechfin, $Profesionva, $Sedeva, $EdMin, $EdMax, $NvlEducacion, $Descripcionva);
    
        $stmt = sqlsrv_query( $conn, $sql, $params);
        if( $stmt === FALSE ){
            die( print_r( sqlsrv_errors(), true));
        }
        else{
            $scope = "SELECT IdVacante FROM [dbo].[Vacante] where Titulo like '%$Titulova%' AND Profesion LIKE '%$Profesion%' AND Sede LIKE '%$Sedeva%'";
            $scoop= sqlsrv_query( $conn, $scope);
            $fila1 = sqlsrv_fetch_array($scoop);

            $sql1 = "INSERT INTO [dbo].[VacanteXEmpresa] (Vacante, Empresa) VALUES (?,?)";
            $params1 = array($fila1[0], $Nconemp->NIT);
            $stmt1 = sqlsrv_query($conn, $sql1, $params1);
        if( $stmt1 === false ) {
            die( print_r( sqlsrv_errors(), true));
            echo '<script language="javascript">';
            echo 'alert("Error al crear usuario")';
            echo '</script>';
        }else{
            echo '<script language="javascript">';
            echo 'alert("Datos guardados exitosamente';
            echo '")</script>';
            echo '<script type="text/javascript"> window.location.href = "https://agenciaempleobogota.azurewebsites.net/crearVacante.php" </script>';
        }
        }
    }
?>

</div>
</body>