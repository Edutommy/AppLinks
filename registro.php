<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Registro</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col l4 m4 s12">

            </div>

            <div class="col l4 m4 s12">
                <h3 class="center">App Links</h3>
                <h6 class="center">Guarda tus páginas web</h6>

                <p class="red-text">
                    <?php
                    session_start();
                    if (isset($_SESSION['error'])) {
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    }
                    ?>
                </p>
                <p class="green-text">
                    <?php
                    if (isset($_SESSION['respuesta'])) {
                        echo $_SESSION['respuesta'];
                        unset($_SESSION['respuesta']);
                    }
                    ?>
                </p>

                <form action="controllers/RegistroController.php" method="POST">
                    <div class="input-field">
                        <input id="email" type="email" name="email">
                        <label for="email">Email</label>
                    </div>
                    <div class="input-field">
                        <input id="nombre" type="text" name="nombre">
                        <label for="nombre">Nombre</label>
                    </div>
                    <div class="input-field">
                        <input id="pass" type="password" name="pass">
                        <label for="pass">Contraseña</label>
                    </div>
                    <button class="btn blue ancho-100 redondo">Registrar Cuenta</button>

                    <p class="center">
                        <a href="index.php">Volver</a>
                    </p>

                </form>

            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>