<?php
include('menu.php') ;

    //$Idu = $_SESSION['Idu'];
    //echo $_SESSION["SIdu"];
    //echo '<script>';
    //echo 'console.log ("el valor de usuario es:'. $_SESSION["SIdu"];
    //echo '")';
    //echo '</script>';
    //echo '<script>'
    //echo 'console.log ("el valor de usuario es:'. $_GET['Idu']. $_SESSION["SIdu"];
    //echo '")</script>';
    $ConsultaUs = sqlsrv_query($conn, "SELECT * FROM [dbo].[Usuario] WHERE IdUsuario=$IdUsuario");
    $TaUser= sqlsrv_fetch_object($ConsultaUs);
    if ($TaUser->TipoUsuario == 'P') {
        $VisivilidadAspirante = 'dt-aspirante-visible';
        $VisivilidadEmpresa = 'dt-empresa-oculto';
    } elseif ($TaUser->TipoUsuario == 'E') {
        $VisivilidadAspirante = 'dt-aspirante-oculto';
        $VisivilidadEmpresa = 'dt-empresa-visible';
    }else{
        $VisivilidadAspirante = 'dt-aspirante-visible';
        $VisivilidadEmpresa = 'dt-empresa-visible';
    }
?>


    <div class = "contenido"> 
        <form id="<?php echo $VisivilidadAspirante; ?>" class='info' method="post">
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
                    echo '<input type="text" name="nombre" class="txtform" value="'.$Nconusu->Nombre.'" disabled>';
                }
                else{
                    echo '<input type="text" name="nombre" class="txtform">';
                }
                ?>
                <label for="apellido">Apellidos:</label>
                <?php
                if($ExUsuario){
                    echo '<input type="text" name="apellido" class="txtform" value="'.$Nconusu->Apellido.'" disabled>';
                }
                else{
                    echo '<input type="text" name="apellido" class="txtform">';
                }
                ?>
                <label for="identificacion">No. Identificación:</label>
                <?php
                if($ExUsuario){
                    echo '<input type="text" name="identificacion" class="txtform" value="'.$Nconusu->Identificacion.'" disabled>';
                }
                else{
                    echo '<input type="text" name="identificacion" class="txtform">';
                }
                ?>
                <label  for="genero">Género:</label>
                <select name="genero" class="txtform">
                <?php
                    if ($ExUsuario && $Nconusu->Genero == "masculino") {
                        echo '<option value="masculino" selected>Masculino</option>';
                    } else {
                        echo '<option value="masculino">Masculino</option>';
                    }

                    if ($ExUsuario && $Nconusu->Genero == "femenino") {
                        echo '<option value="femenino" selected>Femenino</option>';
                    } else {
                        echo '<option value="femenino">Femenino</option>';
                    }

                    if ($ExUsuario && $Nconusu->Genero == "no-binario") {
                        echo '<option value="no-binario" selected>No binario</option>';
                    } else {
                        echo '<option value="no-binario">No binario</option>';
                    }

                    if ($ExUsuario && $Nconusu->Genero == "género-fluido") {
                        echo '<option value="género-fluido" selected>Género fluido</option>';
                    } else {
                        echo '<option value="género-fluido">Género fluido</option>';
                    }

                    if ($ExUsuario && $Nconusu->Genero == "agénero") {
                        echo '<option value="agénero" selected>Agénero</option>';
                    } else {
                        echo '<option value="agénero">Agénero</option>';
                    }

                    if ($ExUsuario && $Nconusu->Genero == "androginx") {
                        echo '<option value="androginx" selected>Androginx</option>';
                    } else {
                        echo '<option value="androginx">Androginx</option>';
                    }

                    if ($ExUsuario && $Nconusu->Genero == "bigénero") {
                        echo '<option value="bigénero" selected>Bigénero</option>';
                    } else {
                        echo '<option value="bigénero">Bigénero</option>';
                    }

                    if ($ExUsuario && $Nconusu->Genero == "pangénero") {
                        echo '<option value="pangénero" selected>Pangénero</option>';
                    } else {
                        echo '<option value="pangénero">Pangénero</option>';
                    }

                    if ($ExUsuario && $Nconusu->Genero == "transgénero") {
                        echo '<option value="transgénero" selected>Transgénero</option>';
                    } else {
                        echo '<option value="transgénero">Transgénero</option>';
                    }

                    if ($ExUsuario && $Nconusu->Genero == "cisgénero") {
                        echo '<option value="cisgénero" selected>Cisgénero</option>';
                    } else {
                        echo '<option value="cisgénero">Cisgénero</option>';
                    }

                    if ($ExUsuario && $Nconusu->Genero == "intergénero") {
                        echo '<option value="intergénero" selected>Intergénero</option>';
                    } else {
                        echo '<option value="intergénero">Intergénero</option>';
                    }

                    if ($ExUsuario && $Nconusu->Genero == "trigénero") {
                        echo '<option value="trigénero" selected>Trigénero</option>';
                    } else {
                        echo '<option value="trigénero">Trigénero</option>';
                    }

                    if ($ExUsuario && $Nconusu->Genero == "ninguno") {
                        echo '<option value="ninguno" selected>Ninguno</option>';
                    } else {
                        echo '<option value="ninguno">Ninguno</option>';
                    }

                    if ($ExUsuario && $Nconusu->Genero == "otro") {
                        echo '<option value="otro" selected>Otro</option>';
                    } else {
                        echo '<option value="otro">Otro</option>';
                    }
                ?>
                </select>
                <label for="estcivil">Estado civil:</label>
                <select name="estcivil" class="txtform">
                    <?php
                    if ($ExUsuario && $Nconusu->EstadoCivil == "soltero") {
                        echo '<option value="soltero" selected>Soltero/a</option>';
                    } else {
                        echo '<option value="soltero">Soltero/a</option>';
                    }

                    if ($ExUsuario && $Nconusu->EstadoCivil == "casado") {
                        echo '<option value="casado" selected>Casado/a</option>';
                    } else {
                        echo '<option value="casado">Casado/a</option>';
                    }

                    if ($ExUsuario && $Nconusu->EstadoCivil == "divorciado") {
                        echo '<option value="divorciado" selected>Divorciado/a</option>';
                    } else {
                        echo '<option value="divorciado">Divorciado/a</option>';
                    }

                    if ($ExUsuario && $Nconusu->EstadoCivil == "viudo") {
                        echo '<option value="viudo" selected>Viudo/a</option>';
                    } else {
                        echo '<option value="viudo">Viudo/a</option>';
                    }

                    if ($ExUsuario && $Nconusu->EstadoCivil == "union_libre") {
                        echo '<option value="union_libre" selected>Unión libre</option>';
                    } else {
                        echo '<option value="union_libre">Unión libre</option>';
                    }

                    if ($ExUsuario && $Nconusu->EstadoCivil == "anulado") {
                        echo '<option value="anulado" selected>Anulado/a</option>';
                    } else {
                        echo '<option value="anulado">Anulado/a</option>';
                    }

                    if ($ExUsuario && $Nconusu->EstadoCivil == "separado") {
                        echo '<option value="separado" selected>Separado/a</option>';
                    } else {
                        echo '<option value="separado">Separado/a</option>';
                    }

                    if ($ExUsuario && $Nconusu->EstadoCivil == "conviviente") {
                        echo '<option value="conviviente" selected>Conviviente</option>';
                    } else {
                        echo '<option value="conviviente">Conviviente</option>';
                    }
                ?>
                </select>
                <label for="profesion">Profesión:</label>
                <?php
                $resultado = sqlsrv_query($conn, "SELECT * FROM [dbo].[Profesiones]");
                echo '<select name="profesion" class="txtform" id="selectorPro">';
                while ($fila = sqlsrv_fetch_object($resultado)) {
                    if ($ExUsuario && $fila->IdProfesion==$Nconusu->Profesion){
                        echo '<option value="' , $fila->IdProfesion , '" selected>' , $fila->Profesion , '</option>';
                    }else{
                        echo '<option value="' , $fila->IdProfesion , '">' , $fila->Profesion , '</option>';
                    }
                    }
                echo '</select>'
                ?>
                <hr>
                <h3> Nacimiento </h3> 
                <label for="lugarnc">País:</label>
                <?php
                $resultado = sqlsrv_query($conn, "SELECT * FROM [dbo].[Paises]");
                echo '<select name="lugarnc" class="txtform" ' . ($ExUsuario ? 'disabled' : '') . '>';
                while ($fila = sqlsrv_fetch_object($resultado)) {
                    if ($ExUsuario && $fila->IdPais == $Nconusu->LugarNacimiento) {
                        echo '<option value="' , $fila->IdPais , '" selected>' , $fila->Pais , '</option>';
                    } else {
                        echo '<option value="' , $fila->IdPais , '">' , $fila->Pais , '</option>';
                    }
                }
                echo '</select>';
                ?>
                <label for="fechanc">Fecha:</label>
                <input type="date" name="fechanc" class="txtform" <?php echo ($ExUsuario ? 'readonly' : ''); ?> value="<?php echo ($ExUsuario ? $Nconusu->FechaNacimiento->format('Y-m-d') : ''); ?>">
                <hr>
                <h3> Ubicación </h3> 
                <label for="ciudad">Ciudad:</label>
                <input type="text" name="ciudad" class="txtform" value="<?php echo ($ExUsuario ? obtenerCiudad($conn, $Nconusu->Ubicacion) : ''); ?>">
                <label for="pais">País:</label>
                <?php
                $resultado = sqlsrv_query($conn, "SELECT * FROM [dbo].[Paises]");
                echo '<select name="PaisU" class="txtform">';
                while ($fila = sqlsrv_fetch_object($resultado)) {
                    if ($ExUsuario && obtenerPais($conn, $Nconusu->Ubicacion) == $fila->IdPais) {
                        echo '<option value="' , $fila->IdPais , '" selected>' , $fila->Pais , '</option>';
                    } else {
                        echo '<option value="' , $fila->IdPais , '">' , $fila->Pais , '</option>';
                    }
                }
                echo '</select>';
                ?>

                <label for="direccion">Dirección:</label>
                <input type="text" name="direccion" class="txtform" value="<?php echo ($ExUsuario ? obtenerDireccion($conn, $Nconusu->Ubicacion) : ''); ?>">

                <hr>
                <h3> Contacto </h3> 
                <label for="telefono">Teléfono:</label>
                <?php
                if ($ExUsuario) {
                    echo '<input type="number" name="telefono" class="txtform" value="' . $Nconusu->Telefono . '"><br>';
                } else {
                    echo '<input type="number" name="telefono" class="txtform"><br>';
                }
                ?>
                <button type="submit" name="gdpersona" value="Guardar" class="button">Guardar</button>
            </div>
        </form>
        <br> <br>
        <form id="<?php echo $VisivilidadEmpresa; ?>" class='info' method="post">
            <div class="ttlcuadro">
                <div class="titulo">
                    <h2>Datos de la empresa</h2>
                </div>
            </div>
            <div class="txtcuadro"> 
                <h3> Principales </h3> 
                <label for="nombreemp"> Nombre:</label>
                <?php
                if($ExEmpresa){
                    echo '<input type="text" name="nombreemp" class="txtform" value="'.$Nconemp->Nombre.'" disabled>';
                }else{
                    echo '<input type="text" name="nombreemp" class="txtform">';
                }
                ?>
                <label for="nit"> NIT:</label>
                <?php
                if($ExEmpresa){
                    echo '<input type="number" name="nit" class="txtform" value="'.$Nconemp->NIT.'" disabled>';
                }else{
                    echo '<input type="number" name="nit" class="txtform">';
                }
                ?>
                <label for="razsocial">Razón social:</label>
                <?php
                if($ExEmpresa){
                    echo '<input type="text" name="razsocial" class="txtform" value="'.$Nconemp->RazonSocial.'" disabled>';
                }else{
                    echo '<input type="text" name="razsocial" class="txtform">';
                }
                ?>
                <label for="repre">Representante:</label>
                <?php
                if($ExEmpresa){
                    echo '<input type="text" name="repre" class="txtform" value="'.$Nconemp->RepresentanteL.'">';
                }else{
                    echo '<input type="text" name="repre" class="txtform">';
                }
                ?>
                <hr>
                <h3> Ubicación </h3> 
                <label for="ciudademp">Ciudad:</label>
                <input type="text" name="ciudademp" class="txtform" value="<?php echo ($ExEmpresa ? obtenerCiudad($conn, $Nconemp->Ubicacion) : ''); ?>">
                <label  for="paisemp">País:</label>
                <?php
                $resultado = sqlsrv_query($conn, "SELECT * FROM [dbo].[Paises]");
                echo '<select name="paisemp" class="txtform">';
                while ($fila = sqlsrv_fetch_object($resultado)) {
                    if ($ExEmpresa && obtenerPais($conn, $Nconemp->Ubicacion) == $fila->IdPais) {
                        echo '<option value="' , $fila->IdPais , '" selected>' , $fila->Pais , '</option>';
                    } else {
                        echo '<option value="' , $fila->IdPais , '">' , $fila->Pais , '</option>';
                    }
                    }
                echo '</select>';
                ?>
                <label  for="direccionemp">Dirección:</label>
                <input type="text" name="direccionemp" class="txtform" value="<?php echo ($ExEmpresa ? obtenerDireccion($conn, $Nconemp->Ubicacion) : ''); ?>">
                <br>
                <input type="submit" name="gdempresa" value="Guardar" class="button">
            </div>
        </form>
        <div id="<?php echo $VisivilidadEmpresa; ?>">
            <a id="btn-sedes" class="button2">Añadir sede</a>
        </div>
        <table id="<?php echo $VisivilidadEmpresa; ?>">
            <thead class="row_titulo">
                <tr>
                    <th class="titulo">Sedes</th>
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

    if (isset($_POST['gdpersona'])) {
        $Nombre = $_POST['nombre'];
        $Apellido = $_POST['apellido'];
        $Identificacion = $_POST['identificacion'];
        $Genero = $_POST['genero'];
        $Estadocivil = $_POST['estcivil'];
        $Profesion = $_POST['profesion'];
        $Lugarnc = $_POST['lugarnc'];
        $Fechanc = strtotime($_POST['fechanc']);
        $Fechanc = date('Y-m-d', $Fechanc);
        $CiudadU = $_POST['ciudad'];
        $PaisU = $_POST['PaisU'];
        $DireccionU = $_POST['direccion'];
        $TelefonoU = $_POST['telefono'];
    
        if ($ExUsuario) {
            // Actualizar el usuario existente
            $sqlUpdate = "UPDATE [dbo].[Desempleado] SET Genero = ?, EstadoCivil = ?, Profesion = ?, Telefono = ? WHERE IdUsuario = ?";
            $paramsUpdate = array($Genero, $Estadocivil, $Profesion, $TelefonoU, $IdUsuario);
            $stmtUpdate = sqlsrv_query($conn, $sqlUpdate, $paramsUpdate);
            
            // Actualizar la ubicación
            $sqlUpdateUbicacion = "UPDATE [dbo].[Ubicacion] SET Ciudad = ?, Pais = ?, Direccion = ? WHERE IdUbicacion = ?";
            $paramsUpdateUbicacion = array($CiudadU, $PaisU, $DireccionU, $Nconusu->Ubicacion);
            $stmtUpdateUbicacion = sqlsrv_query($conn, $sqlUpdateUbicacion, $paramsUpdateUbicacion);
    
            if ($stmtUpdate === false || $stmtUpdateUbicacion === false) {
                die(print_r(sqlsrv_errors(), true));
                echo '<script language="javascript">';
                echo 'alert("Error al actualizar usuario")';
                echo '</script>';
                echo '</script>';
                echo '<script type="text/javascript"> window.location.href = "https://agenciaempleobogota.azurewebsites.net/inicio.php'; 
                echo '"</script>';
            } else {
                echo '<script language="javascript">';
                echo 'alert("Datos actualizados exitosamente")';
                echo '</script>';
                echo '<script type="text/javascript"> window.location.href = "https://agenciaempleobogota.azurewebsites.net/inicio.php'; 
                echo '"</script>';
            }
        } else {
            // Insertar un nuevo usuario
            $sqlInsertUbicacion = "INSERT INTO [dbo].[Ubicacion] (Ciudad, Direccion, Pais) VALUES (?,?,?)";
            $paramsInsertUbicacion = array($CiudadU, $DireccionU, $PaisU);
            $stmtInsertUbicacion = sqlsrv_query($conn, $sqlInsertUbicacion, $paramsInsertUbicacion);
    
            if ($stmtInsertUbicacion === false) {
                die(print_r(sqlsrv_errors(), true));
                echo '<script language="javascript">';
                echo 'alert("Error al crear ubicación")';
                echo '</script>';
            } else {
                // Obtener el IdUbicacion insertado
                $queryIdUbicacion = "SELECT IdUbicacion FROM [dbo].[Ubicacion] WHERE Direccion LIKE '%$DireccionU%' AND Ciudad LIKE '%$CiudadU%' AND Pais = $PaisU";
                $stmtIdUbicacion = sqlsrv_query($conn, $queryIdUbicacion);
                $rowIdUbicacion = sqlsrv_fetch_array($stmtIdUbicacion);
                $IdUbicacion = $rowIdUbicacion['IdUbicacion'];
    
                // Insertar el nuevo usuario
                $sqlInsertUser = "INSERT INTO [dbo].[Desempleado] (Identificacion, IdUsuario, Nombre, Apellido, Telefono, LugarNacimiento, FechaNacimiento, Genero, EstadoCivil, Profesion, Ubicacion) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
                $paramsInsertUser = array($Identificacion, $IdUsuario, $Nombre, $Apellido, $TelefonoU, $Lugarnc, $Fechanc, $Genero, $Estadocivil, $Profesion, $IdUbicacion);
                $stmtInsertUser = sqlsrv_query($conn, $sqlInsertUser, $paramsInsertUser);
    
                if ($stmtInsertUser === false) {
                    die(print_r(sqlsrv_errors(), true));
                    echo '<script language="javascript">';
                    echo 'alert("Error al crear usuario")';
                    echo '</script>';
                    echo '</script>';
                    echo '<script type="text/javascript"> window.location.href = "https://agenciaempleobogota.azurewebsites.net/inicio.php'; 
                    echo '"</script>';
                } else {
                    echo '<script language="javascript">';
                    echo 'alert("Datos guardados exitosamente")';
                    echo '</script>';
                    echo '</script>';
                    echo '<script type="text/javascript"> window.location.href = "https://agenciaempleobogota.azurewebsites.net/inicio.php'; 
                    echo '"</script>';
                }
            }
        }
    }

    if(isset($_POST['gdempresa'])){
        $Nombreemp = $_POST['nombreemp'];
        $Nit = $_POST['nit'];
        $Razsocial = $_POST['razsocial'];
        $Representante = $_POST['repre'];
        $CiudadEmp = $_POST['ciudademp'];
        $PaisEmp = $_POST['paisemp'];
        $DireccionEmp = $_POST['direccionemp'];
    
        if ($ExEmpresa) {
            // Actualizar los datos de la empresa existente
            $sqlUpdateEmpresa = "UPDATE [dbo].[Empresa] SET RepresentanteL = ? WHERE IdUsuario = ?";
            $paramsUpdateEmpresa = array($Representante, $IdUsuario);
            $stmtUpdateEmpresa = sqlsrv_query($conn, $sqlUpdateEmpresa, $paramsUpdateEmpresa);
    
            // Actualizar la ubicación
            $sqlUpdateUbicacion = "UPDATE [dbo].[Ubicacion] SET Ciudad = ?, Pais = ?, Direccion = ? WHERE IdUbicacion = ?";
            $paramsUpdateUbicacion = array($CiudadEmp, $PaisEmp, $DireccionEmp, $Nconemp->Ubicacion);
            $stmtUpdateUbicacion = sqlsrv_query($conn, $sqlUpdateUbicacion, $paramsUpdateUbicacion);
    
            if ($stmtUpdateEmpresa === false || $stmtUpdateUbicacion === false) {
                die(print_r(sqlsrv_errors(), true));
                echo '<script language="javascript">';
                echo 'alert("Error al actualizar la empresa")';
                echo '</script>';
            } else {
                echo '<script language="javascript">';
                echo 'alert("Datos actualizados exitosamente")';
                echo '</script>';
            }
        } else {
            // Insertar una nueva ubicación
            $sqlInsertUbicacion = "INSERT INTO [dbo].[Ubicacion] (Ciudad, Direccion, Pais) VALUES (?,?,?)";
            $paramsInsertUbicacion = array($CiudadEmp, $DireccionEmp, $PaisEmp);
            $stmtInsertUbicacion = sqlsrv_query($conn, $sqlInsertUbicacion, $paramsInsertUbicacion);
    
            if ($stmtInsertUbicacion === false) {
                die(print_r(sqlsrv_errors(), true));
                echo '<script language="javascript">';
                echo 'alert("Error al crear ubicación")';
                echo '</script>';
            } else {
                // Obtener el ID de la ubicación recién insertada
                $idUbicacion = sqlsrv_query($conn, "SELECT IdUbicacion FROM [dbo].[Ubicacion] WHERE Direccion LIKE '%$DireccionEmp%' AND Ciudad LIKE '%$CiudadEmp%' AND Pais = $PaisEmp";);
                $filaUbicacion = sqlsrv_fetch_array($idUbicacion);
                $idUbicacion = $filaUbicacion['IdUbicacion'];
    
                // Insertar una nueva empresa
                $sqlInsertEmpresa = "INSERT INTO [dbo].[Empresa] (IdUsuario, Nombre, NIT, RazonSocial, RepresentanteL, Ubicacion) VALUES (?,?,?,?,?,?)";
                $paramsInsertEmpresa = array($IdUsuario, $Nombreemp, $Nit, $Razsocial, $Representante, $idUbicacion);
                $stmtInsertEmpresa = sqlsrv_query($conn, $sqlInsertEmpresa, $paramsInsertEmpresa);
    
                if ($stmtInsertEmpresa === false) {
                    die(print_r(sqlsrv_errors(), true));
                    echo '<script language="javascript">';
                    echo 'alert("Error al crear empresa")';
                    echo '</script>';
                } else {
                    echo '<script language="javascript">';
                    echo 'alert("Datos guardados exitosamente")';
                    echo '</script>';
                }
            }
        }
    }

    function obtenerCiudad($conn, $ubicacionId) {
        $query = "SELECT Ciudad FROM [dbo].[Ubicacion] WHERE IdUbicacion = ?";
        $params = array($ubicacionId);
        $result = sqlsrv_query($conn, $query, $params);
        $ciudad = '';
    
        if ($result && sqlsrv_has_rows($result)) {
            $row = sqlsrv_fetch_array($result);
            $ciudad = $row['Ciudad'];
        }
    
        return $ciudad;
    }
    
    function obtenerPais($conn, $ubicacionId) {
        $query = "SELECT Pais FROM [dbo].[Ubicacion] WHERE IdUbicacion = ?";
        $params = array($ubicacionId);
        $result = sqlsrv_query($conn, $query, $params);
        $paisId = '';
    
        if ($result && sqlsrv_has_rows($result)) {
            $row = sqlsrv_fetch_array($result);
            $paisId = $row['Pais'];
        }
    
        return $paisId;
    }
    
    function obtenerDireccion($conn, $ubicacionId) {
        $query = "SELECT Direccion FROM [dbo].[Ubicacion] WHERE IdUbicacion = ?";
        $params = array($ubicacionId);
        $result = sqlsrv_query($conn, $query, $params);
        $direccion = '';
    
        if ($result && sqlsrv_has_rows($result)) {
            $row = sqlsrv_fetch_array($result);
            $direccion = $row['Direccion'];
        }
    
        return $direccion;
    }
    ?>

    <script src="js/modal_usuario.js"></script>
</body>