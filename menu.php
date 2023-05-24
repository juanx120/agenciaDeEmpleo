<?php include('header.php') ?>
<div class=contenedor>
    <div id='menu'>
        <a href='inicio.php'>Datos usuario</a>
        <?php if($TaUser->TipoUsuario == 'P' || $TaUser->TipoUsuario == 'A'){ ?> 
        <a href='hoja.php'>Hoja de vida</a>
        <a href='empresas.php'>Empresas</a>
        <a href='vacante.php'>Vacantes</a>
        <?php } ?>
        <?php if($TaUser->TipoUsuario == 'E' || $TaUser->TipoUsuario == 'A'){ ?> 
        <a href='aspirantes.php'>Aspirantes</a>
        <a href='crearVacante.php'>Crear vacante</a>
        <a href='#'>Reportes</a>
        <?php } ?>
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