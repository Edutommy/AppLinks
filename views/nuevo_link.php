<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Admin</title>
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION['usuario'])) { ?>
        <nav class="blue darken-3">
            <div class="nav-wrapper">
                <a href="#" class="brand-logo">Bienvenido <?= $_SESSION['usuario']['nombre'] ?></a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li class="active"><a href="nuevo_link.php">Nuevo Link</a></li>
                    <li><a href="mislinks.php">Mis Links</a></li>
                    <li><a href="salir.php">Salir</a></li>
                </ul>
            </div>
        </nav>

        <div class="container">
            <div class="row">
                <div class="col l4 m4 s12">

                </div>
                <div class="col l4 m4 s12">
                    <h3 class="center">Nuevo Link</h3>
                    
                    <p class="red-text">
                        <?php 
                            if(isset($_SESSION['error'])){
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                            }
                        ?>
                    </p>

                    <p class="green-text">
                        <?php 
                            if(isset($_SESSION['respuesta'])){
                                echo $_SESSION['respuesta'];
                                unset($_SESSION['respuesta']);
                            }
                        ?>
                    </p>

                    <form action="../controllers/NuevoLinkController.php" method="POST">
                        <div class="input-field">
                            <input id="nombre" type="text" name="nombre">
                            <label for="nombre">Nombre de la Página</label>
                        </div>
                        <div class="input-field">
                            <input id="url" type="text" name="url">
                            <label for="url">URL de la Página</label>
                        </div>
                        <button class="btn blue ancho-100 redondo">Guardar Link</button>
                    </form>
                </div>
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