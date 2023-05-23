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
            <div class="txtcuadro"> 
                <h3> Filtro aspirantes</h3> 
                <label for="nombre"> Profesión:</label>
                <input type="text" name="nombre" class="txtform">
                <label for="educación">Educación:</label>
                <input type="text" name="educación" class="txtform">
                <label for="ubicacion">Ubicación:</label>
                <input type="text" name="ubicacion" class="txtform">
                <label for="edad">Edad:</label>
                <input type="text" name="edad" class="txtform">
                <input type="submit" name="gdpersona" value="Buscar" class="button">
            </div>
        </form>
        <table>
            <tr class="row_titulo">
                <td>Resultados<td>
            </tr>
            <tr class="row">
                
            </tr>
        </table>

    </div>

</div>
</body>