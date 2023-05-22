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
    <form id="dt-aspirante" method="post">
        <div class="cuadro">
            <div class="titulo">
                <h1>Datos personales</h1>
            </div>
            <h3> Principales </h3> 
            <label for="nombre">Nombres:</label>
            <input type="text" name="nombre" class="txtformulario">
            <label for="apellido">Apellidos:</label>
            <input type="text" name="apellido" class="txtformulario">
            <label for="identificacion">No. Identificación:</label>
            <input type="text" name="identificacion" class="txtformulario">
            <label for="genero">Genero</label>
            <input type="text" name="genero" class="txtformulario">
            <label for="estcivil">Estado civil</label>
            <input type="text" name="estcivil" class="txtformulario">
            <h3> Nacimiento </h3> 
            <label for="lugarnc">Lugar:</label>
            <?php
            $resultado = sqlsrv_query($conn, "SELECT * FROM [dbo].[Usuario]");
            echo '<select name="paises">';
            while ($fila = sqlsrv_fetch_object($resultado)) {
                    echo '<option name="lugarnc" class="txtformulario" value="' . $fila->IdPais . '">' . $fila->Pais . '</option>';
                }
            ?>
            <label for="fechanc">Fecha:</label>
            <input type="date" name="fechanc" class="txtformulario">
            <h3> Ubicación </h3> 
            <label for="ciudad">Ciudad:</label>
            <input type="text" name="ciudad" class="txtformulario">
            <label for="pais">País:</label>
            <input type="text" name="pais" class="txtformulario">
            <label for="direccion">Dirección:</label>
            <input type="text" name="direccion" class="txtformulario">
            <h3> Contacto </h3> 
            <label for="telefono">Teléfono:</label>
            <input type="text" name="telefono" class="txtformulario">
        </div>   
    </form>
    





    </div>
</body>