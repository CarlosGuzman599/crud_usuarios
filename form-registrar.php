<html>

    <?php include_once 'templates/head.php'; ?>

    <script src="js/registrar.js"></script>

    <body class="font">
        <img class="img-login" src="img/FONDO.jpg" alt="">
        <div class="container center">

            <form method="POST" id="form-registro" class="col-md-6 col-lg-6 col-xl-6 col-xxl-6">


                <div class="form-group col">
                    <label for="nombre">Nombre</label>
                    <input id="nombre" type="text" name="nombre" >
                </div>

                <div class="form-group col">
                    <label for="email">Correo Electrónico</label>
                    <input id="email" type="email" name="email" >
                </div>

                <div class="form-group col">
                    <label for="password">Contraseña</label>
                    <input id="password" type="password" name="password">
                </div>

                <div class="form-group col">
                    <label for="password-confir">Confirmar Contraseña</label>
                    <input id="password-confir" type="password-confir" name="password-confir">
                </div>

                <label for="genero">Genero</label>

                <input type="radio" id="contactChoice2" name="genero" value="f" />
                <label for="contactChoice2">Masculino</label>

                <input type="radio" id="contactChoice3" name="genero" value="f" />
                <label for="contactChoice3">Femenino</label>


                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="">Registrar</button>
                        
                    </div>
                </div>

            </form>
            
        </div>
    </body>
</html>