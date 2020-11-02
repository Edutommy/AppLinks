<?php

use models\LinksModel as LinksModel;

session_start();
require_once("../models/LinksModel.php");

if (isset($_SESSION['usuario'])) {
    $model = new LinksModel();
    $links = $model->getAllLinksByEmail($_SESSION['usuario']['email']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Admin</title>
</head>

<body class="blue lighten-5">
    <?php
    if (isset($_SESSION['usuario'])) { ?>

        <nav class="blue darken-3">
            <div class="nav-wrapper">
                <a href="#" class="brand-logo">Bienvenido <?= $_SESSION['usuario']['nombre'] ?></a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="nuevo_link.php">Nuevo Link</a></li>
                    <li class="active"><a href="mislinks.php">Mis Links</a></li>
                    <li><a href="salir.php">Salir</a></li>
                </ul>
            </div>
        </nav>

        <div class="container">
            <div class="row">
                <?php foreach ($links as $link) { ?>
                    <div class="col l4 m4 s12">
                        <div class="card">
                            <div class="card-image">
                                <img src="https://yeovilnetballclub.co.uk/wp-content/uploads/2018/06/Useful-Link.jpg">
                                
                            </div>
                            <div class="card-content">
                                <p><span class="card-title blue-text darken-4"><?= $link['nombre'] ?></span></p>
                            </div>
                            <div class="card-action">
                                <a target="_BLANK" href="<?= $link['link'] ?>" class="blue-text accent-4">Link de la Página</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>



    <?php } else { ?>
        <h3 class="red-text">Error de Acceso</h3>
        <p>
            Usted no tiene permisos para estar aqui
            <br>
            <a href="../index.php">Home</a>
        </p>

    <?php } ?>



</body>

</html>