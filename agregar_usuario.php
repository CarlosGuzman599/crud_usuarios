<?php
    if (isset($_POST)) {
        $error = '';
        if($_POST['nombre'] == '' || $_POST['email'] == '' || $_POST['genero'] == '' || $_POST['password'] == ''){
            $error = 'Campos incompletos';
        }else{
            $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
            $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
            $genero = filter_var($_POST['genero'], FILTER_SANITIZE_STRING);
            $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
            $opciones = array('cost' => 12);
            $hashed_password = password_hash($password, PASSWORD_BCRYPT, $opciones);

            try {
                include_once 'includes/db_conexion.php';
                if(!exite_email($email, $conn)){
                    $stmt = $conn->prepare("INSERT INTO usuario (nombre, email, genero, fecha, password) VALUES (?, ?, ?, ?, ?)");
                    $stmt->bind_param("sssss", $nombre, $email, $genero, date("Y-m-d H:i:s"), $hashed_password);
                    $stmt->execute();
                    if($stmt->affected_rows == 1) {
                        
                        $respuesta = array(
                            'respuesta' => 'correcto',
                            'datos' => array(
                            'nombre' => $nombre)
                        );
        
                        session_start();
                        $_SESSION['id'] = $stmt->insert_id;
                        $_SESSION['nombre'] = $nombre;
                        $_SESSION['email'] = $email;
    
                        $stmt->close();
                        $conn->close();
                    }
                }else{
                    $respuesta = array(
                        'respuesta' => 'error',
                        'tipo' => 'Error!: Informacion de contacto previamente agregada'
                    );
                }
            } catch(Exception $e) {
                $respuesta = array(
                    'respuesta' => 'error',
                    'tipo' => "Error!: ".$e->getMessage()
                );
            }
            echo json_encode($respuesta);
    



        }
    }


    function exite_email($email, $conn){
        $existe = false;
        try{
            $stmt = $conn->prepare("SELECT * FROM usuario WHERE email = ?;");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            if($stmt->affected_rows){
                $existe = $stmt->fetch();
            }
        }catch(Exception $e){
            $existe = $e->getMessage();
        }
        return $existe;
    }

?>