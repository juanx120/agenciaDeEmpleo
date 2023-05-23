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
                <label  for="nombre"> <p class= "descripcion">Nombres:</p></label>
                <input type="text" name="nombre" class="txtform">
                <label class= "descripcion" for="apellido">Apellidos:</label>
                <input type="text" name="apellido" class="txtform">
                <label  for="identificacion">No. Identificación:</label>
                <input type="text" name="identificacion" class="txtform">
                <label  for="genero">Genero</label>
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
                <input type="text" name="pais" class="txtform">
                <label  for="direccion">Dirección:</label>
                <input type="text" name="direccion" class="txtform">
                <hr>
                <h3> Contacto </h3> 
                <label  for="telefono">Teléfono:</label>
                <input type="number" name="telefono" class="txtform">
                <input type="submit" name="btningreso" value="Guardar" class="button">
            </div>
        </form>
    </div>
</body>