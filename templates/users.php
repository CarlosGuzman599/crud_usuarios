<html>
    <?php include_once 'templates/head.php'; ?>
    <body class="font">
        <img class="img-login" src="img/main-8.png" alt="">
        <div class="container center">

            <img class="center" src="img/LOGO-iSTRATEGY-.png" alt="">

            <button class="logout">Cerrar Session</button>

            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Genero</th>
                    <th scope="col">Fecha Registro</th>
                    <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody id="tbody-usuarios">


                </tbody>
            </table>
            
        </div>
    </body>
    

    <!-- Modal -->
    <div class="modal fade" id="update-usuario" tabindex="-1" aria-labelledby="update-usuarioLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="update-usuarioLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="form-update" class="">
                        <input id="id" type="hidden" name="id">

                        <div class="form-group col">
                            <label for="nombre">Nombre</label>
                            <input id="nombre" type="text" name="nombre">
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
                            <input id="password-confir" type="password" name="password-confir">
                        </div>

                        <label for="genero">Genero</label>

                        <input type="radio" id="contactChoice2" name="genero" value="m" />
                        <label for="contactChoice2">Masculino</label>

                        <input type="radio" id="contactChoice3" name="genero" value="f" />
                        <label for="contactChoice3">Femenino</label>


                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="">Actualizar</button>
                                
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="js/usuarios.js"></script>

</html>