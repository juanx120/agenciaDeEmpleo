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