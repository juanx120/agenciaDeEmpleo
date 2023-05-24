<?php
session_start();
?>
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
    <link rel="stylesheet" href="/css/modal.css">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/menu.css">
    <link rel="stylesheet" href="/css/contenido.css">
    <title>Agencia Empleos Bogota</title>
</head>

<body> 
    <header id='encabezado'>
        <div class='parent'>
            <div>
                <a href='inicio.php'><img src='/img/logo.png' alt='logo agencia de empleo' ></a>
            </div>
            <div class='derecha'>
                <ul>
                    <li>
                        <span class='material-symbols-outlined'>person</span>
                    </li>
                    <li>
                        <?php
                        include('conection.php');
                        $ExUsuario=FALSE;
                        // Verificar si la variable de sesión existe y tiene un valor
                        if (isset($_SESSION["SIdu"])) {
                            $IdUsuario=$_SESSION["SIdu"];
                        } else {
                            // Si la variable de sesión no existe o no tiene valor, redirigir a index.php
                            echo '<script type="text/javascript"> window.location.href = "https://agenciadeempleobogota.azurewebsites.net/" </script>'; 
                        }
                        echo '<script>';
                        echo 'console.log ("el valor de usuario es:'. $IdUsuario;
                        echo '")</script>';
                        $ConsultaNU = sqlsrv_query($conn, "SELECT * FROM [dbo].[Desempleado] WHERE IdUsuario=$IdUsuario");
                        if( $ConsultaNU === FALSE ){
                            die(print_r(sqlsrv_errors($ConsultaNU), true));
                            }
                        else{
                            if (sqlsrv_has_rows($ConsultaNU))
                            {
                                $ExUsuario=TRUE;
                                $Nconusu = sqlsrv_fetch_object($ConsultaNU);
                                echo "<p><b>";
                                echo $Nconusu->Nombre;
                                echo " ";
                                echo $Nconusu->Apellido;
                                echo "</b></p>";
                            }
                            else
                            {
                                $resultado = sqlsrv_query($conn, "SELECT * FROM [dbo].[Usuario] WHERE IdUsuario=$IdUsuario");
                                    while ($fila = sqlsrv_fetch_object($resultado)) {
                                    echo "<p><b>";
                                    echo $fila->Correo;
                                    echo "</b></p>";
                                }
                            }
                        }   
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </header>