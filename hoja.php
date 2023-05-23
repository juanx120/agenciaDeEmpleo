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
            $IdUsuario;
            $sql = "SELECT HojaDeVida FROM Desempleado a INNER JOIN Usuario b on a.IdUsuario = b.IdUsuario  where a.IdUsuario = $IdUsuario";
            $resultado = sqlsrv_query( $conn, $sql);
            while ($fila = sqlsrv_fetch_object($resultado)) {
                $info_hoja = $fila->HojaDeVida;
            }

            if($info_hoja != NULL OR $info_hoja != 0) {
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
        <table id="referencias">
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
        <?php } ?>
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
                <label for="titulo">Título profesional:</label>
                <input name="titulo" type="text" id="esttitulo" class="form-iniciar-s" required>
            </div>
            <div class="form-group">
                <label for="profesion">Profesión:</label>
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
                <button type="submit" class="btn-ini" name="btnEstudios">Añadir</button>
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
                <label for="institucion">Empresa:</label>
                <input name="institucion" type="text" id="estinstitucion" class="form-iniciar-s" required>
            </div>
            <div class="form-group">
                <label for="titulo">Puesto ocupado:</label>
                <input name="titulo" type="text" id="esttitulo" class="form-iniciar-s" required>
            </div>
            <div class="form-group">
                <label for="final">Año:</label>
                <input name="final" type="text" id="estfinal" class="form-iniciar-s" required>
            </div>
            <div class="form-group">
                <label for="descripcionExp">Descripción:</label>
                <input name="descripcionExp" type="text" id="estfinal" class="form-iniciar-s" required>
            </div>
            <div class="opciones">
                <button type="submit" class="btn-ini" name="btnExperiencia">Añadir</button>
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
                <button type="submit" class="btn-ini" name="btnReferencia">Añadir</button>
            </div>
        </form>
    </dialog>

    <?php
        if(isset($_POST['gdhoja'])){
            $Salario=$_POST['salario'];
            $Descripcion=$_POST['descripcion'];
            echo '<script> console.log("Llegue a esta zona :3)</script>';
            
            $sql = "INSERT INTO [dbo].[HojaVida] (SalarioEsperado, DescripcionPerfil) VALUES (?,?)";
            $params = array($Salario, $Descripcion);
            $stmt = sqlsrv_query( $conn, $sql, $params);
            if( $stmt === FALSE ){
                die( print_r( sqlsrv_errors(), true));
                echo '<script language="javascript">';
                echo 'alert("Error al crear usuario")';
                echo '</script>';
            }
            else{
                echo '<script language="javascript">';
                echo 'alert("Datos guardados exitosamente';
                echo '")</script>';
            }
        }
    ?>
    <script src="js/modal_hoja.js"></script>
</body>