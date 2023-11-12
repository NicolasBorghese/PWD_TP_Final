<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $tituloPagina ?></title>

    <!-- link a librería de bootstrap -->
    <script src="./Utiles/librerias/bootstrap/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./Utiles/librerias/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./vendor/twbs/bootstrap-icons/font/bootstrap-icons.css">

    <!-- link a librería de jquery -->
    <script src="./Utiles/librerias/jquery/jquery-3.7.1.min.js"></script>
    <script src="./Utiles/librerias/jquery/jquery.validate.min.js"></script>
    <script src="./Utiles/librerias/jquery/messages_es_PE.js"></script>

    <!-- link a css propio -->
    <link rel="stylesheet" href="Vista/estructura/css/estilos.css">
    <!-- link a js propio -->
    <script src="estructura/js/validaBoostrap.js"></script>

    <!-- link a iconos de bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

</head>

<body>

<header class="header">
        <div class="menu-opciones">
            <div class="logo-nav">
                <img src="Archivos/Imagenes/logoBlanco.png">
            </div>
            <div class="navbar">
                <a class="nav-link active" aria-current="page" href="#">Inicio</a>
            </div>
            <div class="navbar"><a class="nav-link" href="#">Mates</a></div>
            <div class="navbar"><a class="nav-link" href="#">Yerbas</a></div>
            <div class="navbar"><a class="nav-link" href="#">Bombillas</a></div>
            <div class="navbar"><a class="nav-link" href="#">Termos</a></div>
            <div class="navbar"><a class="nav-link" href="#">SETS</a></div>
        </div>
        <div class="login">
            <i class="bi bi-person-fill fa-user" data-bs-toggle="modal" data-bs-target="#mimodal" tabindex="-1"></i>
        </div>
    </header>