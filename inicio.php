<?php include('menu.php') ;

    //$Idu = $_SESSION['Idu'];
    echo $_SESSION['Idu'];
    echo '<script>';
    echo 'console.log ("el valor de usuario es:"', $_SESSION['Idu'];
    echo ')';
    echo 'console.log ("el valor de usuario es:"', $_GET['Idu'], $_SESSION['Idu'];
    echo ')</script>';
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
                <label  for="nombre"> Nombres:</label>
                <input type="text" name="nombre" class="txtform">
                <label class= "descripcion" for="apellido">Apellidos:</label>
                <input type="text" name="apellido" class="txtform">
                <label  for="identificacion">No. Identificación:</label>
                <input type="text" name="identificacion" class="txtform">
                <label  for="genero">Genero</label>
                <select name="genero" class="txtform">
                    <option value="">Selecciona un género</option>
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
                <input type="text" name="genero" class="txtform">
                <label for="estcivil">Estado civil</label>
                <input type="text" name="estcivil" class="txtform">
                <hr>
                <h3> Nacimiento </h3> 
                <label for="lugarnc">Lugar:</label>
                <?php
                $resultado = sqlsrv_query($conn, "SELECT * FROM [dbo].[Paises]");
                echo '<select name="lugarnc" class="txtform">';
                while ($fila = sqlsrv_fetch_object($resultado)) {
                        echo '<option value="' , $fila->IdPais , '">' , $fila->Pais , '</option>';
                    }
                echo '</select>'
                ?>
                <label   for="fechanc">Fecha:</label>
                <input type="date" name="fechanc" class="txtform">
                <hr>
                <h3> Ubicación </h3> 
                <label  for="ciudad">Ciudad:</label>
                <input type="text" name="ciudad" class="txtform">
                <label  for="pais">País:</label>
                <?php
                $resultado = sqlsrv_query($conn, "SELECT * FROM [dbo].[Paises]");
                echo '<select name="pais" class="txtform">';
                while ($fila = sqlsrv_fetch_object($resultado)) {
                        echo '<option value="' , $fila->IdPais , '">' , $fila->Pais , '</option>';
                    }
                echo '</select>'
                ?>
                <label  for="direccion">Dirección:</label>
                <input type="text" name="direccion" class="txtform">
                <hr>
                <h3> Contacto </h3> 
                <label  for="telefono">Teléfono:</label>
                <input type="number" name="telefono" class="txtform"><br>
                <input type="submit" name="btnguardarN" value="Guardar" class="button">
            </div>
        </form>
    </div>

    <?php
    if(isset($_POST['btnguardarN'])){
        $Nombre=$_POST['Nombre'];
        $Apellido=$_POST['apellido'];
        $Identificacion=$_POST['identificacion'];
        $Genero=$_POST['genero'];
        $CoExix=FALSE;
    }
    ?>
</body>