<?php include('menu.php') ;

    //$Idu = $_SESSION['Idu'];
    //echo $_SESSION['Idu'];
    //echo '<script>';
    //echo 'console.log ("el valor de usuario es:', $_SESSION['Idu'];
    //echo '")';
    //echo '</script>';
    //echo '<script>'
    //echo 'console.log ("el valor de usuario es:', $_GET['Idu'], $_SESSION['Idu'];
    //echo '")</script>';
?>


    <div class = "contenido"> 
        <form id="dt-aspirante" class='info' method="post">
            <div class="ttlcuadro">
                <div class="titulo">
                    <h2>Datos del usuario</h2>
                </div>
            </div>
            <div class="txtcuadro"> 
                <h3> Principales </h3> 
                <label for="nombre"> Nombres:</label>
                <?php
                if($ExUsuario){
                    echo '<input type="text" name="nombre" class="txtform" value="'.$Nconusu->Nombre.'" disamble>';
                }
                else{
                    echo '<input type="text" name="nombre" class="txtform">';
                }
                ?>
                <label for="apellido">Apellidos:</label>
                <input type="text" name="apellido" class="txtform">
                <label for="identificacion">No. Identificación:</label>
                <input type="text" name="identificacion" class="txtform">
                <label  for="genero">Género:</label>
                <select name="genero" class="txtform">
                    <option value="masculino">Masculino</option>
                    <option value="femenino">Femenino</option>
                    <option value="no-binario">No binario</option>
                    <option value="género-fluido">Género fluido</option>
                    <option value="agénero">Agénero</option>
                    <option value="androginx">Androginx</option>
                    <option value="bigénero">Bigénero</option>
                    <option value="pangénero">Pangénero</option>
                    <option value="transgénero">Transgénero</option>
                    <option value="cisgénero">Cisgénero</option>
                    <option value="intergénero">Intergénero</option>
                    <option value="trigénero">Trigénero</option>
                    <option value="ninguno">Ninguno</option>
                    <option value="otro">Otro</option>
                </select>
                <label for="estcivil">Estado civil:</label>
                <select name="estcivil" class="txtform">
                    <option value="soltero">Soltero/a</option>
                    <option value="casado">Casado/a</option>
                    <option value="divorciado">Divorciado/a</option>
                    <option value="viudo">Viudo/a</option>
                    <option value="union_libre">Unión libre</option>
                    <option value="anulado">Anulado/a</option>
                    <option value="separado">Separado/a</option>
                    <option value="conviviente">Conviviente</option>
                </select>
                <label for="profesion">Profesión:</label>
                <?php
                $resultado = sqlsrv_query($conn, "SELECT * FROM [dbo].[Profesiones]");
                echo '<select name="profesion" class="txtform" id="selectorPro">';
                while ($fila = sqlsrv_fetch_object($resultado)) {
                        echo '<option value="' , $fila->IdProfesion , '">' , $fila->Profesion , '</option>';
                    }
                echo '</select>'
                ?>
                <hr>
                <h3> Nacimiento </h3> 
                <label for="lugarnc">País:</label>
                <?php
                $resultado = sqlsrv_query($conn, "SELECT * FROM [dbo].[Paises]");
                echo '<select name="lugarnc" class="txtform">';
                while ($fila = sqlsrv_fetch_object($resultado)) {
                        echo '<option value="' , $fila->IdPais , '">' , $fila->Pais , '</option>';
                    }
                echo '</select>'
                ?>
                <label for="fechanc">Fecha:</label>
                <input type="date" name="fechanc" class="txtform">
                <hr>
                <h3> Ubicación </h3> 
                <label for="ciudad">Ciudad:</label>
                <input type="text" name="ciudad" class="txtform">
                <label  for="pais">País:</label>
                <?php
                $resultado = sqlsrv_query($conn, "SELECT * FROM [dbo].[Paises]");
                echo '<select name="PaisU" class="txtform">';
                while ($fila = sqlsrv_fetch_object($resultado)) {
                        echo '<option value="' , $fila->IdPais , '">' , $fila->Pais , '</option>';
                    }
                echo '</select>'
                ?>
                <label  for="direccion">Dirección:</label>
                <input type="text" name="direccion" class="txtform">
                <hr>
                <h3> Contacto </h3> 
                <label for="telefono">Teléfono:</label>
                <input type="number" name="telefono" class="txtform"><br>
                <button type="submit" name="gdpersona" value="Guardar" class="button">Guardar</button>
            </div>
        </form>
        <br> <br>
        <form id="dt-empresa" class='info' method="post">
            <div class="ttlcuadro">
                <div class="titulo">
                    <h2>Datos de la empresa</h2>
                </div>
            </div>
            <div class="txtcuadro"> 
                <h3> Principales </h3> 
                <label for="nombreemp"> Nombre:</label>
                <input type="text" name="nombreemp" class="txtform">
                <label for="nit"> NIT:</label>
                <input type="number" name="nit" class="txtform">
                <label for="razsocial">Razón social:</label>
                <input type="text" name="razsocial" class="txtform">
                <label for="repre">Representante:</label>
                <input type="text" name="repre" class="txtform">
                <hr>
                <h3> Ubicación </h3> 
                <label for="ciudademp">Ciudad:</label>
                <input type="text" name="ciudademp" class="txtform">
                <label  for="paisemp">País:</label>
                <?php
                $resultado = sqlsrv_query($conn, "SELECT * FROM [dbo].[Paises]");
                echo '<select name="paisemp" class="txtform">';
                while ($fila = sqlsrv_fetch_object($resultado)) {
                        echo '<option value="' , $fila->IdPais , '">' , $fila->Pais , '</option>';
                    }
                echo '</select>'
                ?>
                <label  for="direccionemp">Dirección:</label>
                <input type="text" name="direccionemp" class="txtform">
                <br>
                <input type="submit" name="gdempresa" value="Guardar" class="button">
            </div>
        </form>
        <div>
            <a id="btn-sedes" class="button2">Añadir sede</a>
        </div>
        <table id="estudios">
            <thead class="row_titulo">
                <tr>
                    <th>Sedes</th>
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
    </div>

    <!--Modal sedes-->
    <dialog id="modals" class="modal">
        <div class="T-Modal">
            <h2>Añadir sede</h2>
            <span id="btn-cerrar-modalS" class="material-symbols-outlined btn-cerrar">cancel</span>
        </div>
        <form id="register-form" method="post">
            <div class="form-group">
                <label for="nombresd"> Nombre:</label>
                <input type="number" name="nombresd" class="form-iniciar-s" required>
            </div>
            <div class="form-group">
                <label for="telefonosd">Télefono:</label>
                <input name="telefonosd" type="number" id="esttitulo" class="form-iniciar-s" required>
            </div>
            <div class="form-group">
                <label for="paissd">País:</label>
                <?php
                $resultado = sqlsrv_query($conn, "SELECT * FROM [dbo].[Paises]");
                echo '<select name="paissd" class="form-iniciar-s">';
                while ($fila = sqlsrv_fetch_object($resultado)) {
                        echo '<option value="' , $fila->IdPais , '">' , $fila->Pais , '</option>';
                    }
                echo '</select>'
                ?>
            </div>
            <div class="form-group">
                <label for="ciudadesd">Ciudad:</label>
                <input type="text" name="ciudadesd" class="form-iniciar-s" required>
            </div>
            <div class="form-group">
                <label for="direccionsd">Direccion:</label>
                <input type="text" name="direccionsd" class="form-iniciar-s" required>
            </div>
            <div class="opciones">
                <button type="submit" class="btn-ini" name="btnSede">Añadir</button>
            </div>
        </form>
    </dialog>

    <?php
    if(isset($_POST['gdpersona'])){
        $Nombre=$_POST['nombre'];
        $Apellido=$_POST['apellido'];
        $Identificacion=$_POST['identificacion'];
        $Genero=$_POST['genero'];
        $Estadocivil=$_POST['estcivil'];
        $Profesion=$_POST['profesion'];
        $Lugarnc=$_POST['lugarnc'];
        $Fechanc=strtotime($_POST['fechanc']);
        $Fechanc=date('Y-m-d', $Fechanc);
        $CiudadU=$_POST['ciudad'];
        $PaisU=$_POST['PaisU'];
        $DireccionU=$_POST['direccion'];
        $TelefonoU=$_POST['telefono'];
        echo '<script> console.log("Llegue a esta zona :3)</script>';
        
        $sql = "INSERT INTO [dbo].[Ubicacion] (Ciudad, Direccion, Pais) VALUES (?,?,?)";
        $params = array($CiudadU, $DireccionU, $PaisU);
        $stmt = sqlsrv_query( $conn, $sql, $params);
        if( $stmt === FALSE ){

        }
        else{
            $scope = "SELECT IdUbicacion FROM [dbo].[Ubicacion] WHERE Direccion LIKE '%$DireccionU%' AND Ciudad LIKE '%$CiudadU%' AND Pais = $PaisU";
            $scoop= sqlsrv_query( $conn, $scope);
            $fila = sqlsrv_fetch_array($scoop);

            $sql1 = "INSERT INTO [dbo].[Desempleado] (Identificacion, IdUsuario, Nombre, Apellido, Telefono, LugarNacimiento, FechaNacimiento, Genero, EstadoCivil, Profesion, Ubicacion) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
            $params1 = array($Identificacion, $_GET['Idu'], $Nombre, $Apellido,$TelefonoU,$Lugarnc,$Fechanc,$Genero,$Estadocivil,$Profesion,$fila[0]);
            $stmt1 = sqlsrv_query( $conn, $sql1, $params1);
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

    if(isset($_POST['gdempresa'])){
        $Nombreemp=$_POST['nombreemp'];
        $Nit=$_POST['nit'];
        $Razsocial=$_POST['razsocial'];
        $Representante=$_POST['repre'];
        $CiudadEmp=$_POST['ciudademp'];
        $PaisEmp=$_POST['paisemp'];
        $DireccionEmp=$_POST['direccionemp'];
        
        $sql = "INSERT INTO [dbo].[Ubicacion] (Ciudad, Direccion, Pais) VALUES (?,?,?)";
        $params = array($CiudadEmp, $DireccionEmp, $PaisEmp);
        $stmt = sqlsrv_query( $conn, $sql, $params);
        if( $stmt === FALSE ){

        }
        else{
            $scope = "SELECT IdUbicacion FROM [dbo].[Ubicacion] WHERE Direccion LIKE '%$DireccionEmp%' AND Ciudad LIKE '%$CiudadEmp%' AND Pais = $PaisEmp";
            $scoop= sqlsrv_query( $conn, $scope);
            $fila = sqlsrv_fetch_array($scoop);

            $sql1 = "INSERT INTO [dbo].[Empresa] ( IdUsuario, Nombre, NIT, RazonSocial, RepresentanteL, Ubicacion) VALUES (?,?,?,?,?,?)";
            $params1 = array( $_GET['Idu'], $Nombreemp, $Nit, $Razsocial,$Representante,$fila[0]);
            $stmt1 = sqlsrv_query( $conn, $sql1, $params1);
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

    <script src="js/modal_usuario.js"></script>
</body>