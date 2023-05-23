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
                <p class= "descripcion">Nombres:</p>
                <input type="text" name="nombre" class="txtform">
                <p class= "descripcion">Apellidos:</p>
                <input type="text" name="apellido" class="txtform">
                <p class= "descripcion">No. Identificación:</p>
                <input type="text" name="identificacion" class="txtform">
                <p class= "descripcion">Genero</p>
                <input type="text" name="genero" class="txtform">
                <p class= "descripcion">Estado civil</p>
                <input type="text" name="estcivil" class="txtform">
                <hr>
                <h3> Nacimiento </h3> 
                <p class= "descripcion">Lugar:</p>
                <?php
                $resultado = sqlsrv_query($conn, "SELECT * FROM [dbo].[Paises]");
                echo '<select name="lugarnc" class="txtform">';
                while ($fila = sqlsrv_fetch_object($resultado)) {
                        echo '<option value="' , $fila->IdPais , '">' , $fila->Pais , '</option>';
                    }
                echo '</select>'
                ?>
                <p class= "descripcion" class= "descripcion" for="fechanc">Fecha:</p>
                <input type="date" name="fechanc" class="txtform">
                <hr>
                <h3> Ubicación </h3> 
                <p class= "descripcion">Ciudad:</p>
                <input type="text" name="ciudad" class="txtform">
                <p class= "descripcion">País:</p>
                <input type="text" name="pais" class="txtform">
                <p class= "descripcion">Dirección:</p>
                <input type="text" name="direccion" class="txtform">
                <hr>
                <h3> Contacto </h3> 
                <p class= "descripcion">Teléfono:</p>
                <input type="number" name="telefono" class="txtform">
                <input type="submit" name="btningreso" value="Guardar" class="button">
            </div>
        </form>
    </div>
</body>