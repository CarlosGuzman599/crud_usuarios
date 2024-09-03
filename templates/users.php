<html>


    <?php include_once 'templates/head.php'; ?>

    <script src="js/usuarios.js"></script>

    <body class="font">
        <img class="img-login" src="img/main-8.png" alt="">
        <div class="container center">

            <img class="center" src="img/LOGO-iSTRATEGY-.png" alt="">


            <table>
                <?php 
                    $sql = "SELECT * FROM `usuario`";
                    try {
                        include_once('includes/db_conexion.php');
                        $resultado = $conn->query($sql);
                    } catch (Exception $e) {
                        $error = $e->getMessage();
                    }
                
                ?>

            </table>



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
                <tbody>

                <?php while($usuario = $resultado->fetch_assoc()){ ?>

                    <tr id="<?php echo $usuario['id'] ?>">


                        <th scope="row"><?php echo $usuario['nombre'] ?></th>
                        <td><?php echo $usuario['email'] ?></td>
                        <td><?php echo $usuario['genero'] ?></td>
                        <td><?php echo $usuario['fecha'] ?></td>
                        <td>
                            <button><img src="img/icono pluma-8.png" alt=""></button>
                            <button class="borrar"><img src="img/icono basura-8.png" alt=""></button>
                        </td>

                    </tr>

                    <?php } 

                    $conn->close();

                    ?>
                </tbody>
            </table>
            
        </div>
    </body>
</html>