<?php include('menu.php') ; ?>

    <div class = "contenido"> 
        <h1>Hoja de vida</h1>
        <form id="dt-hoja" class='info' method="post">
            <div class="ttlcuadro">
                <div class="titulo">
                    <h2>Información básica</h2>
                </div>
            </div>
            <div class="txtcuadro"> 
                <label for="salario">Salario esperado:</label>
                <?php
                if($Nconusu->HojaDeVida != NULL){
                    $sqlho = "SELECT * FROM [dbo].[HojaVida] WHERE IdHojaVida=?";
                    $paramsho = array( $Nconusu->HojaDeVida);
                    $resultadoho = sqlsrv_query( $conn, $sqlho, $paramsho);
                    $Valho = sqlsrv_fetch_object($resultadoho);
                    echo '<input type="number" name="salario" class="txtform" value="'.$Valho->SalarioEsperado.'">';
                }else{
                    echo '<input type="number" name="salario" class="txtform">';
                }?>
                <label class="archivo" for="video">Video:</label>
                <input type="file" name="video" class="txtformfl">
                <br>
                <label for="descripcion">Descripción:</label>
                <?php
                if($Nconusu->HojaDeVida != NULL){
                    echo '<input type="text" name="descripcion" class="txtformlg" value="'.$Valho->DescripcionPerfil.'"><br><br>';
                }else{
                    echo '<input type="text" name="descripcion" class="txtformlg"><br><br>';
                }
                ?>
                <input type="submit" name="gdhoja" value="Guardar" class="button">
            </div>
        </form>
        <?php
            $sql = "SELECT HojaDeVida FROM [dbo].[Desempleado] where IdUsuario = ?";
            $params = array( $IdUsuario);
            $resultado = sqlsrv_query( $conn, $sql, $params);
            $infoHV = sqlsrv_fetch_object($resultado);
            
            if($infoHV->HojaDeVida != NULL) {
        ?>
        <div>
            <a id="btn-estudios" class="button2">Añadir estudios</a>
        </div>
        <table id="estudios">
            <thead class="row_titulo">
                <tr>
                    <th colspan = '3'>Estudios</th>
                </tr>
            </thead>    
            <tbody>
                <tr class='espacio'></tr>
                <tr class='row_HVsub'><td>Institución</td><td>Título</td><td>Año finalización</td></tr>
                <?php
                    $sql = "SELECT Institucion, Profesion, AnoFinalizacion FROM [dbo].[Formacion] INNER JOIN [dbo].[FormacionXHoja] on IdFormacion = Estudios
                    INNER JOIN [dbo].[Profesiones] on TituloOtorgado = IdProfesion WHERE HojaVida = ?";
                    $params = array($infoHV->HojaDeVida);
                    $resultado = sqlsrv_query( $conn, $sql, $params);
                    while ($fila = sqlsrv_fetch_object($resultado)) {
                        echo "<tr class='espacio'></tr>";
                        echo "<tr class='row_HV'> <td>$fila->Institucion</td><td>$fila->Profesion</td><td>$fila->AnoFinalizacion</td></tr>";
                    }
                ?>
            </tbody>
        </table>
        <div>
            <a id="btn-experiencia" class="button2">Añadir experiencia</a>
        </div>
        <table id="Experiencia">
            <thead class="row_titulo">
                <tr>
                    <th colspan = '4'>Experiencia laboral</th>
                </tr>
            </thead>    
            <tbody>
                <tr class='espacio'></tr>
                <tr class='row_HVsub'><td>Empresa</td><td>Puesto</td><td>Año trabajo</td><td>Descripcion</td></tr>
                <?php
                    $sql = "SELECT Empresa, PuestoOcupado, Ano, Descripcion FROM [dbo].[ExperienciaLaboral] INNER JOIN [dbo].[ExperienciaXHoja] 
                    on IdExperiencia = Experiencia
                    WHERE HojaVida = ?";
                    $params = array($infoHV->HojaDeVida);
                    $resultado = sqlsrv_query( $conn, $sql, $params);
                    while ($fila = sqlsrv_fetch_object($resultado)) {
                        echo "<tr class='espacio'></tr>";
                        echo "<tr class='row_HV'> <td>$fila->Empresa</td><td>$fila->PuestoOcupado</td><td>$fila->Ano</td><td>$fila->Descripcion</td></tr>";
                    }
                ?>
            </tbody>
        </table>
        <div>
            <a id="btn-referencia" class="button2">Añadir referencias</a>
        </div>
        <table id="referencias">
            <thead class="row_titulo">
                <tr>
                    <th colspan = '4'>Referencias</th>
                </tr>
            </thead>    
            <tbody>
                <tr class='espacio'></tr>
                <tr class='row_HVsub'><td>Nombre y apellido</td><td>Télefono</td><td>Correo</td><td>Tipo</td></tr>
                <?php
                    $sql = "SELECT NombrePersona, Telefono, Email, TipoReferencia FROM [dbo].[Referencia] INNER JOIN [dbo].[ReferenciaXHoja] on IdReferencia = Referencia
                    WHERE HojaVida = ?";
                    $params = array($infoHV->HojaDeVida);
                    $resultado = sqlsrv_query( $conn, $sql, $params);
                    while ($fila2 = sqlsrv_fetch_object($resultado)) {
                        echo "<tr class='espacio'></tr>";
                        echo "<tr class='row_HV'> <td>".$fila2->NombrePersona."</td><td>".$fila2->Telefono."</td><td>".$fila2->Email."</td><td>".$fila2->TipoReferencia."</td></tr>";
                    }
                ?>
            </tbody>
        </table>
        <?php } ?>
    </div>

    <!--Modal estudios-->
    <dialog id="modalest" class="modal_lg">
        <div class="T-Modal">
            <h2>Añadir estudios</h2>
            <span id="btn-cerrar-modalEst" class="material-symbols-outlined btn-cerrar">cancel</span>
        </div>
        <form id="register-form" method="post">
            <div class="form-group">
                <label for="institucion">Instutución:</label>
                <input name="institucion" type="text" class="form-iniciar-lg" required>
            </div>
            <div class="form-group">
                <label for="profesion">Titulo profesional:</label>
                <?php
                $resultado = sqlsrv_query($conn, "SELECT IdProfesion, Profesion FROM [dbo].[Profesiones]");
                echo '<select name="profesion" class="form-iniciar-lg" id="selectorPro">';
                while ($prof = sqlsrv_fetch_object($resultado)) {
                        echo '<option value="' , $prof->IdProfesion , '">' , $prof->Profesion , '</option>';
                    }
                echo '</select>'
                ?>
            </div>
            <div class="form-group">
                <label for="final">Año finalización:</label>
                <input name="final" type="text" class="form-iniciar-lg" required>
            </div>
            <div class="opciones">
                <button type="submit" class="btn-lg" name="btn-Estudios">Añadir</button>
            </div>
        </form>
    </dialog>

    <!--Modal experiencias-->
    <dialog id="modalexp" class="modal_lg">
        <div class="T-Modal">
            <h2>Añadir experiencia laboral</h2>
            <span id="btn-cerrar-modalExp" class="material-symbols-outlined btn-cerrar">cancel</span>
        </div>
        <form method="post">
            <div class="form-group">
                <label for="empresaexp">Empresa:</label>
                <input name="empresaexp" type="text" class="form-iniciar-lg" required>
            </div>
            <div class="form-group">
                <label for="puesto">Puesto ocupado:</label>
                <input name="puesto" type="text" class="form-iniciar-lg" required>
            </div>
            <div class="form-group">
                <label for="anoexp">Año:</label>
                <input name="anoexp" type="text" class="form-iniciar-lg" required>
            </div>
            <div class="form-group">
                <label for="descripcionExp">Descripción:</label>
                <input name="descripcionExp" type="text" class="form-iniciar-lg" required>
            </div>
            <div class="opciones">
                <button type="submit" class="btn-lg" name="btn-Experiencia">Añadir</button>
            </div>
        </form>
    </dialog>

    <!--Modal referencias-->
    <dialog id="modalref" class="modal_lg">
        <div class="T-Modal">
            <h2>Añadir referencias</h2>
            <span id="btn-cerrar-modalRef" class="material-symbols-outlined btn-cerrar">cancel</span>
        </div>
        <form id="register-form" method="post">
            <div class="form-group">
                <label for="nomref">Nombre completo:</label>
                <input name="nomref" type="text" id="estinstitucion" class="form-iniciar-lg" required>
            </div>
            <div class="form-group">
                <label for="telefonoref">Télefono:</label>
                <input name="telefonoref" type="number" id="esttitulo" class="form-iniciar-lg" required>
            </div>
            <div class="form-group">
                <label for="correoref">Correo:</label>
                <input name="correoref" type="email" id="esttitulo" class="form-iniciar-lg" required>
            </div>
            <div class="form-group">
                <label for="tiporef">Tipo referencia:</label>
                <select name="tiporef" class="form-iniciar-lg">
                    <option value="personal">Personal</option>
                    <option value="laboral">Laboral</option>
                </select>
            </div>
            <div class="opciones">
                <button type="submit" class="btn-lg" name="btnReferencia">Añadir</button>
            </div>
        </form>
    </dialog>

    <?php
        if(isset($_POST['gdhoja'])){
            $Salario=$_POST['salario'];
            $Descripcion=$_POST['descripcion'];
            echo '<script> console.log("Llegue a esta zona :3)</script>';
            
            if($TaUser->HojaDeVida == NULL){
                //Se crea la hoja de vicda
                $sql = "INSERT INTO [dbo].[HojaVida] (SalarioEsperado, DescripcionPerfil ) VALUES (?,?)";
                $params = array($Salario, $Descripcion);
                $stmt = sqlsrv_query( $conn, $sql, $params);
                if( $stmt === FALSE ){

                }
                else{
                    $scope = "SELECT IdHojaVida FROM [dbo].[HojaVida] WHERE SalarioEsperado = '$Salario' AND DescripcionPerfil = '$Descripcion'";
                    $scoop= sqlsrv_query( $conn, $scope);
                    $fila = sqlsrv_fetch_array($scoop);

                    $sql1 = "UPDATE dbo.Desempleado SET HojaDeVida = ? WHERE IdUsuario = ?";
                    $params1 = array($fila[0], $IdUsuario);
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
                    echo '<script type="text/javascript"> window.location.href = "https://agenciaempleobogota.azurewebsites.net/hoja.php" </script>';
                }
                }
        }else{
            //Se actualiza la hoja de vida
            $sql = "UPDATE [dbo].[HojaVida] SET SalarioEsperado=?, DescripcionPerfil=? WHERE IdHojaVida=?";
            $params = array($Salario, $Descripcion,$TaUser->HojaDeVida);
            $stmt = sqlsrv_query( $conn, $sql, $params);
            if( $stmt === FALSE ){
                die( print_r( sqlsrv_errors(), true));
                echo '<script language="javascript">';
                echo 'alert("Error al crear usuario")';
                echo '</script>';
            }else{
                echo '<script language="javascript">';
                echo 'alert("Datos actualizados exitosamente';
                echo '")</script>';
                echo '<script type="text/javascript"> window.location.href = "https://agenciaempleobogota.azurewebsites.net/hoja.php" </script>';
            }
        }
    }

        if(isset($_POST['btn-Estudios'])){
            $Institucionest=$_POST['institucion'];
            $Profesion=$_POST['profesion'];
            $Final=$_POST['final'];
        
            $sql = "INSERT INTO [dbo].[Formacion] (Institucion, TituloOtorgado, AnoFinalizacion) VALUES (?,?,?)";
            $params = array($Institucionest, $Profesion, $Final);
        
            $stmt = sqlsrv_query( $conn, $sql, $params);
            if( $stmt === FALSE ){
                die( print_r( sqlsrv_errors(), true));
            }
            else{
                $scope = "SELECT IdFormacion FROM Formacion where Institucion = '$Institucionest' AND TituloOtorgado = '$Profesion' AND
                            AnoFinalizacion = $Final";
                $scoop= sqlsrv_query( $conn, $scope);
                $fila1 = sqlsrv_fetch_array($scoop);

                $sql1 = "INSERT INTO [dbo].[FormacionXHoja] (Estudios, HojaVida) VALUES (?,?)";
                $params1 = array($fila1[0], $infoHV->HojaDeVida);
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
                echo '<script type="text/javascript"> window.location.href = "https://agenciaempleobogota.azurewebsites.net/hoja.php" </script>';
            }
            }
        }

        if(isset($_POST['btn-Experiencia'])){
            $Empresa = $_POST['empresaexp'];
            $Puesto = $_POST['puesto'];
            $Ano = $_POST['anoexp'];
            $DescripcionExp = $_POST['descripcionExp'];
        
            $sql = "INSERT INTO [dbo].[ExperienciaLaboral] (Empresa, PuestoOcupado, Ano, Descripcion) VALUES (?,?,?,?)";
            $params = array($Empresa, $Puesto, $Ano, $DescripcionExp);
        
            $stmt = sqlsrv_query( $conn, $sql, $params);
            if( $stmt === FALSE ){
                die( print_r( sqlsrv_errors(), true));
            }
            else{
                $scope = "SELECT IdExperiencia FROM [dbo].[ExperienciaLaboral] where Empresa LIKE '%$Empresa%' AND PuestoOcupado LIKE '%$Puesto%' AND
                            Ano LIKE '%$Ano%' AND Descripcion LIKE '%$DescripcionExp%'";
                $scoop= sqlsrv_query( $conn, $scope);
                $fila1 = sqlsrv_fetch_array($scoop);

                $sql1 = "INSERT INTO [dbo].[ExperienciaXHoja] (Experiencia, HojaVida) VALUES (?,?)";
                $params1 = array($fila1[0], $infoHV->HojaDeVida);
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
                echo '<script type="text/javascript"> window.location.href = "https://agenciaempleobogota.azurewebsites.net/hoja.php" </script>';
            }
            }
        }

        if(isset($_POST['btnReferencia'])){
            $NombreRef = $_POST['nomref'];
            $TelefonoRef = $_POST['telefonoref'];
            $CorreoRef = $_POST['correoref'];
            $TipoRef = $_POST['tiporef'];
        
            $sql = "INSERT INTO [dbo].[Referencia] (NombrePersona, Telefono, Email, TipoReferencia) VALUES (?,?,?,?)";
            $params = array($NombreRef, $TelefonoRef, $CorreoRef, $TipoRef);
        
            $stmt = sqlsrv_query( $conn, $sql, $params);
            if( $stmt === FALSE ){
                die( print_r( sqlsrv_errors(), true));
            }
            else{
                $scope = "SELECT IdReferencia FROM [dbo].[Referencia] where NombrePersona LIKE '%$NombreRef%' AND Telefono LIKE '%$TelefonoRef%' AND
                            Email LIKE '%$CorreoRef%' AND TipoReferencia LIKE '%$TipoRef%'";
                $scoop= sqlsrv_query( $conn, $scope);
                $fila1 = sqlsrv_fetch_array($scoop);

                $sql1 = "INSERT INTO [dbo].[ReferenciaXHoja] (Referencia, HojaVida) VALUES (?,?)";
                $params1 = array($fila1[0], $infoHV->HojaDeVida);
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
                echo '<script type="text/javascript"> window.location.href = "https://agenciaempleobogota.azurewebsites.net/hoja.php" </script>';
            }
            }
        }
    ?>
    <script src="js/modal_hoja.js"></script>
</body>