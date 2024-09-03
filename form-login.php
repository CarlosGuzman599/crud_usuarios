<html>

    <?php include_once 'templates/head.php'; ?>

    <script src="js/login.js"></script>

    <body class="font">
        <img class="img-login" src="img/FONDO.jpg" alt="">
        <div class="container center">

            <img class="center" src="img/LOGO-iSTRATEGY-.png" alt="">
            <h1 class="text-center color1 display-2">Inicia sesión</h1>

            <h2 class="text-center display-5">Ingresa tus datos a continuación</h2>

            <form method="POST" id="form-login" class="col-md-6 col-lg-6 col-xl-6 col-xxl-6">


                <div class="form-group col">
                    <label for="email">Correo Electrónico</label>
                    <input id="email" type="email" name="email" >

                </div>

                <div class="form-group col">
                    <label for="password">Contraseña</label>
                    <input id="password" type="password" name="password">
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember">

                        <label class="form-check-label" for="remember">
                            Mantenme Conectado
                        </label>

                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="">Iniciar sesión</button>
                        <a href="form-registrar.php">Crear usuario</a>
                    </div>
                </div>

            </form>
            
        </div>
    </body>
</html>