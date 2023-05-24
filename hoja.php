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
                <input type="number" name="salario" class="txtform">
                <label class="archivo" for="video">Video:</label>
                <input type="file" name="video" class="txtformfl">
                <br>
                <label for="descripcion">Descripción:</label>
                <input type="text" name="descripcion" class="txtformlg"><br><br>
                <input type="submit" name="gdhoja" value="Guardar" class="button">
            </div>
        </form>
        <?php
            
            echo $IdUsuario;
            $sql = "SELECT HojaDeVida FROM [dbo].[Desempleado] where IdUsuario = ?";
            $params = array( $IdUsuario);
            $resultado = sqlsrv_query( $conn, $sql, $params);
            $infoHV = sqlsrv_fetch_object($resultado);
            echo "<p>hoja de vida: $infoHV->HojaDeVida </p>";
            if($info_hoja->HojaDeVida > 0 )  { echo "paso"; }{
                echo "sapo perro no funciona";
            };
        ?>
        <div>
            <a id="btn-estudios" class="button2">Añadir estudios</a>
        </div>
        <table id="estudios">
            <thead class="row_titulo">
                <tr>
                    <th>Formación</th>
                </tr>
            </thead>    
            <tbody>
                <tr class="espacio"></tr>
                <tr class="row">
                    <td>Dato 1<td>
                </tr>
                <tr class="espacio"></tr>
                <tr class="row">
                    <td>Dato 2<td>
                </tr>
            </tbody>
        </table>
        <div>
            <a id="btn-experiencia" class="button2">Añadir experiencia</a>
        </div>
        <table id="Experiencia">
            <thead class="row_titulo">
                <tr>
                    <th>Experiencia laboral</th>
                </tr>
            </thead>    
            <tbody>
                <tr class="espacio"></tr>
                <tr class="row">
                    <td>Dato 1<td>
                </tr>
                <tr class="espacio"></tr>
                <tr class="row">
                    <td>Dato 2<td>
                </tr>
            </tbody>
        </table>
        <div>
            <a id="btn-referencia" class="button2">Añadir referencias</a>
        </div>
        <table id="referencias">
            <thead class="row_titulo">
                <tr>
                    <th>Referencias</th>
                </tr>
            </thead>    
            <tbody>
                <tr class="espacio"></tr>
                <tr class="row">
                    <td>Dato 1<td>
                </tr>
                <tr class="espacio"></tr>
                <tr class="row">
                    <td>Dato 2<td>
                </tr>
            </tbody>
        </table>
        <?php #} ?>
    </div>

    <!--Modal estudios-->
    <dialog id="modalest" class="modal">
        <div class="T-Modal">
            <h2>Añadir estudios</h2>
            <span id="btn-cerrar-modalEst" class="material-symbols-outlined btn-cerrar">cancel</span>
        </div>
        <form id="register-form" method="post">
            <div class="form-group">
                <label for="institucion">Instutución:</label>
                <input name="institucion" type="text" id="estinstitucion" class="form-iniciar-s" required>
            </div>
            <div class="form-group">
                <label for="profesion">Titulo profesional:</label>
                <?php
                $resultado = sqlsrv_query($conn, "SELECT * FROM [dbo].[Profesiones]");
                echo '<select name="profesion" class="txtform" id="selectorPro">';
                while ($fila = sqlsrv_fetch_object($resultado)) {
                        echo '<option value="' , $fila->IdProfesion , '">' , $fila->Profesion , '</option>';
                    }
                echo '</select>'
                ?>
            </div>
            <div class="form-group">
                <label for="final">Año finalización:</label>
                <input name="final" type="text" id="estfinal" class="form-iniciar-s" required>
            </div>
            <div class="opciones">
                <button type="submit" class="btn-ini" name="btn-Estudios">Añadir</button>
            </div>
        </form>
    </dialog>

    <!--Modal experiencias-->
    <dialog id="modalexp" class="modal">
        <div class="T-Modal">
            <h2>Añadir experiencia laboral</h2>
            <span id="btn-cerrar-modalExp" class="material-symbols-outlined btn-cerrar">cancel</span>
        </div>
        <form id="register-form" method="post">
            <div class="form-group">
                <label for="empresa">Empresa:</label>
                <input name="empresa" type="text" id="estinstitucion" class="form-iniciar-s" required>
            </div>
            <div class="form-group">
                <label for="puesto">Puesto ocupado:</label>
                <input name="puesto" type="text" id="esttitulo" class="form-iniciar-s" required>
            </div>
            <div class="form-group">
                <label for="ano">Año:</label>
                <input name="ano" type="text" id="estfinal" class="form-iniciar-s" required>
            </div>
            <div class="form-group">
                <label for="descripcionExp">Descripción:</label>
                <input name="descripcionExp" type="text" id="estfinal" class="form-iniciar-s" required>
            </div>
            <div class="opciones">
                <button type="submit" class="btn-ini" name="btn-Experiencia">Añadir</button>
            </div>
        </form>
    </dialog>

    <!--Modal referencias-->
    <dialog id="modalref" class="modal">
        <div class="T-Modal">
            <h2>Añadir referencias</h2>
            <span id="btn-cerrar-modalRef" class="material-symbols-outlined btn-cerrar">cancel</span>
        </div>
        <form id="register-form" method="post">
            <div class="form-group">
                <label for="nomref">Nombre completo:</label>
                <input name="nomref" type="text" id="estinstitucion" class="form-iniciar-s" required>
            </div>
            <div class="form-group">
                <label for="telefonoref">Télefono:</label>
                <input name="telefonoref" type="number" id="esttitulo" class="form-iniciar-s" required>
            </div>
            <div class="form-group">
                <label for="correoref">Correo:</label>
                <input name="correoref" type="email" id="esttitulo" class="form-iniciar-s" required>
            </div>
            <div class="form-group">
                <label for="tiporef">Tipo referencia:</label>
                <select name="tiporef" class="form-iniciar-s">
                    <option value="personal">Personal</option>
                    <option value="laboral">Laboral</option>
                </select>
            </div>
            <div class="opciones">
                <button type="submit" class="btn-ini" name="btn-Referencia">Añadir</button>
            </div>
        </form>
    </dialog>

    <?php
        if(isset($_POST['gdhoja'])){
            $Salario=$_POST['salario'];
            $Descripcion=$_POST['descripcion'];
            echo '<script> console.log("Llegue a esta zona :3)</script>';
            
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
            }
            }
        }

        if(isset($_POST['btn-Estudios'])){
            $Institucion=$_POST['institucion'];
            $Profesion=$_POST['profesion'];
            $Final=$_POST['final'];
        
            $sql = "INSERT INTO [dbo].[Formacion] (Institucion, TituloOtorgado, AnoFinalizacion) VALUES (?,?,?)";
            $params = array($Institucion, $Profesion, $Final);
        
            $stmt = sqlsrv_query( $conn, $sql, $params);
            if( $stmt === FALSE ){

            }
            else{
                $scope = "SELECT IdFormacion FROM Formacion where Institucion = '$Institucion' AND TituloOtorgado = '$Profesion' AND
                            AñoFinalizacion = $Final";
                $scoop= sqlsrv_query( $conn, $scope);
                $fila = sqlsrv_fetch_array($scoop);

                $scope1 = "SELECT HojaDeVida FROM Desempleado where IdUsuario = $IdUsuario";
                $scoop1= sqlsrv_query( $conn, $scope1);
                $fila1 = sqlsrv_fetch_array($scoop1);

                $sql1 = "INSERT INTO [dbo].[FormacionXHoja] (Estudios, HojaVida) VALUES (?,?)";
                $params1 = array($fila[0], $fila1[0]);
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
            }
            }
        }

        if(isset($_POST['btn-Experiencia'])){
            $Empresa = $_POST['Empresa'];
            $Puesto = $_POST['puesto'];
            $Ano = $_POST['Ano'];
            $DescripcionExp = $_POST['descripcionExp'];
        
            $sql = "INSERT INTO [dbo].[ExperienciaLaboral] (Empresa, PuestoOcupado, Ano, Descripcion) VALUES (?,?,?)";
            $params = array($Empresa, $Puesto, $Ano, $DescripcionExp);
        
            $stmt = sqlsrv_query( $conn, $sql, $params);
            if( $stmt === FALSE ){

            }
            else{
                $scope = "SELECT IdFormacion FROM ExperienciaLaboral where Empresa = '$Empresa' AND PuestoOcupado = '$Puesto' AND
                            Ano = $Ano AND Descripcion = $DescripcionExp";
                $scoop= sqlsrv_query( $conn, $scope);
                $fila = sqlsrv_fetch_array($scoop);

                $scope1 = "SELECT HojaDeVida FROM Desempleado where IdUsuario = $IdUsuario";
                $scoop1= sqlsrv_query( $conn, $scope1);
                $fila1 = sqlsrv_fetch_array($scoop1);

                $sql1 = "INSERT INTO [dbo].[FormacionXHoja] (Estudios, HojaVida) VALUES (?,?)";
                $params1 = array($fila[0], $fila1[0]);
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
            }
            }
        }
    ?>
    <script src="js/modal_hoja.js"></script>
</body>