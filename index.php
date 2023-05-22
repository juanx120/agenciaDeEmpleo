<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet"  href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" >
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/login.css">
    <title>Agencia Empleos Bogota</title>
</head>

<body id="backgroundI">
    <div class="cuadro">
        <form id="ingreso" method="post">
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

    <!--Modal registro-->
    <dialog id="modalr" class="modal">
        <div class="T-Modal">
            <h2>Registro</h2>
            <span id="btn-cerrar-modalR" class="material-symbols-outlined btn-cerrar">cancel</span>
        </div>
        <form id="register-form" method="post">
            <div class="form-group">
                <input name="CoRegistro" type="email" id="registeremail" class="form-iniciar-s" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input name="ClRegistro" type="password" id="registerpassword" class="form-iniciar-s" placeholder="Contraseña" required>
            </div>
            <div class="form-group">
            <label for="TipoU">Selecciona tipo de usuario:</label>
            <select id="TipoU" name="TipoU">
                <option value="P">Persona</option>
                <option value="E">Empresa</option>
            </select>
            </div>
            <div class="opciones">
                <button type="submit" class="btn-ini" name="btnRegistrarse">Registrarse</button>
            </div>
        </form>
    </dialog>

    <!--Modal contraseña-->
    <dialog id="modalp" class="modal">
        <div class="T-Modal">
            <h2>Cambiar contraseña</h2>
            <span id="btn-cerrar-modalP" class="material-symbols-outlined btn-cerrar">cancel</span>
        </div>
        <form id="password-form" method="post">
            <div class="form-group" id="pass-from">
                <input name="CoPassword" type="email" id="registeremail" class="form-iniciar-s" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input name="ClPassword" type="password" id="registerpassword" class="form-iniciar-s" placeholder="Nueva contraseña" required>
            </div>
            <div class="opciones">
                <button type="submit" class="btn-ini" name="btn-password">Cambiar</button>
            </div>
        </form>
    </dialog>


<?php
    function Llamarswal(){
        if(empty($_POST['txt1'])  || empty($_POST['txt2'])){
            echo "<script> swal({
            title: 'Oooops...',
            text: 'Llena todos los campos!',
            type: 'error',
            });</script>";
    }
}


include('conection.php');
include('session.php');
if(isset($_POST['btningreso'])){
    $Correo = $_POST['CorreoIngreso'];
    $Contraseña = $_POST['ClaveIngreso'];
    $resultado = sqlsrv_query($conn, "SELECT * FROM [dbo].[Usuario]");
    // O usando el estilo orientado a objetos
    //$resultado = $conn->query("SELECT * FROM [dbo].[usuario]");
    // Verificar si la consulta fue exitosa
    if ($resultado) {
        $Ingreso = FALSE;
        // Hacer algo con el resultado, por ejemplo mostrar los datos
        while ($fila = sqlsrv_fetch_object($resultado)) {
            if(($Correo == $fila->Correo) && ($Contraseña == $fila->Clave)){
                $Ingreso = TRUE;
                $Idu = $fila->IdUsuario;
                $_SESSION['Idu'] = $Idu;
                //echo '<script language="javascript">';
                //echo 'alert("Inicio exitoso""', $Idu;
                //echo '")</script>';
                //header("Location: https://agenciadeempleobogota.azurewebsites.net/inicio.php");
                //exit();
                echo '<script type="text/javascript"> window.location.href = "https://agenciadeempleobogota.azurewebsites.net/inicio.php?Idu=',$Idu; 
                echo '"</script>';
            }
        }
    } else {
    // Mostrar un mensaje de error
    echo "La consulta falló: " , sqlsrv_error($conn);
    }
    if(!$Ingreso){
        echo '<script language="javascript">';
        echo 'alert("Correo o Clave incorrectos")';
        echo '</script>';
    }
}
if(isset($_POST['btnRegistrarse'])){
    $CoRegistro=$_POST['CoRegistro'];
    $ClRegistro=$_POST['ClRegistro'];
    $TipoU=$_POST['TipoU'];

    echo '<script language="javascript">';
    echo 'console.log("Inicio exitoso', $CoRegistro,$ClRegistro,$TipoU;
    echo '")</script>';

    $sql = "INSERT INTO [dbo].[Usuario] (Correo, Clave, TipoUsuario) VALUES (?,?,?)";
    $params = array($CoRegistro, $ClRegistro, $TipoU);

    $stmt = sqlsrv_query( $conn, $sql, $params);
    if( $stmt === false ) {
        die( print_r( sqlsrv_errors(), true));
        echo '<script language="javascript">';
        echo 'alert("Error al crear usuario")';
        echo '</script>';
    }else{
        echo '<script language="javascript"> CerrarModal();</script>';
        echo '<script language="javascript">';
        echo 'alert("Usuario creado con exito")';
        echo '</script>';
    }
}
?>

    <script src="js/registro.js"></script>

</body>