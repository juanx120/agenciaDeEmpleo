
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
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/menu.css">
    <title>Agencia Empleos Bogota</title>
</head>

<body>
    <header id='encabezado'>
        <div class='parent'>
            <div>
                <img src='/img/logo.png' alt='logo agencia de empleo'>
            </div>
            <div class='derecha'>
                <ul>
                    <li>
                        <span class='material-symbols-outlined'>person</span>
                    </li>
                    <li>
                        <p><b id="Per">Maria Paula Castrillon Orozco</b></p>
                    </li>
                </ul>
            </div>
        </div>
    </header>

<?php
    $document = new DOMDocument();
    $document->loadHTML($content);

    $tags = $document->getElementsByTagName('Per');
    foreach ($tags as $tag) {
    $tag->setAttribute('src', 
        str_replace('http://programacion.net', 
                    'https://programacion.net', 
                    $tag->getAttribute('src')
        )
    );
    }
?>