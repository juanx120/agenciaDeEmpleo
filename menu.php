<?php include('header.php') ?>
<div class=contenedor>
    <div id='menu'>
        <a href='inicio.php'>Datos usuario</a>
        <a href='aspirantes.php'>Aspirantes</a>
        <a href='hoja.php'>Hoja de vida</a>
        <a href='#'>Vacantes</a>
        <a href='#'>Empresas</a>
        <a href='#'>Reportes</a>
        <form method="post">
            <button name='CerrarS' class='salir'>Cerrar sesión</button>
        </form>
    </div>
<?php
    if(isset($_POST['CerrarS'])){
        unset($_SESSION['SIdu']);
        echo '<script type="text/javascript"> window.location.href = "https://agenciaempleobogota.azurewebsites.net'; 
        echo '"</script>';
    
    }
?>