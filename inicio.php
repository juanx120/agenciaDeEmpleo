<?php include('menu.php') ;

    //$Idu = $_SESSION['Idu'];
    echo $_SESSION['Idu'];
    echo '<script>';
    echo 'console.log ("el valor de usuario es:"', $_SESSION['Idu'];
    echo ')';
    echo 'console.log ("el valor de usuario es:"', $_GET['Idu'], $_SESSION['Idu'];
    echo ')</script>';
?>



    <form id="dt-aspirante" method="post">
        <div class="cuadro">
            <div class="titulo">
                <h1>Datos personales</h1>
            </div>
            <h3> Principales </h3> 
            <label for="Nombre">Nombres:</label>
            <input type="text" name="Nombre" class="txtformulario" ><br><br>
            <label for="Apellido">Apellidos:</label>
            <input type="text" name="Apellido" class="txtformulario" ><br><br>
            <label for="Identificacion">No. Identificación:</label>
            <input type="text" name="Identificacion" class="txtformulario" ><br><br>
            <label for="Genero">Genero</label>
            <input type="text" name="Genero" class="txtformulario" ><br><br>
        </div>   
    
        <div class="content">
                <div class="circulo"><span class="material-symbols-outlined">person</span></div>
                <input type="text" name="CorreoIngreso" class="txtingreso" placeholder="Correo"><br><br>
            </div>
            <div class="content">
                <div class="circulo"><span class="material-symbols-outlined">lock</span></div>
            <input type="text" name="ClaveIngreso" class="txtingreso" placeholder="Contraseña"><br><br>
            </div> 
            <input type="submit" name="btningreso" value="INGRESAR" class="button1">
            <div class="opciones">
                <a id="btn-password" class="btn-registro">¿Has olvidado tu clave?</a>
            </div>
            <div class="opciones">
                <p class="btn-registro">¿No tienes cuenta?</p>
                <a id="btn-registro" class="btn-registro">Regristrate</a>
            </div>
    </form>
    





    </div>
</body>