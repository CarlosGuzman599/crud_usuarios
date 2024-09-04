<?php

    if (isset($_POST)) {
        $respuesta = "";
        
        if($_POST['id'] == '' || $_POST['nombre'] == '' || $_POST['email'] == '' || $_POST['genero'] == ''){
            $respuesta = array(
                'respuesta' => 'error',
                'tipo' => 'Error!:Campos incompletos'
            );
        }else{
            
            $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
            $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
            $genero = filter_var($_POST['genero'], FILTER_SANITIZE_STRING);

            if (isset($_POST['password'])) {
                $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
                $hashed_password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));
            }
            

            try {
                
                include_once 'includes/db_conexion.php';
                if(!exite_email($_POST['id'],$email, $conn)){
                    
                    if(isset($_POST['password'])){
                        $stmt = $conn->prepare("UPDATE usuario SET nombre = ?, email = ?, genero = ?, password = ? WHERE id = ".$_POST['id']);
                        $stmt->bind_param("ssss", $nombre, $email, $genero, $hashed_password);
                    }else{
                        $stmt = $conn->prepare("UPDATE usuario SET nombre = ?, email = ?, genero = ? WHERE id = ".$_POST['id']);
                        $stmt->bind_param("sss", $nombre, $email, $genero);
                    }

                    
                    $stmt->execute();
                    if($stmt->affected_rows == 1) {
                        
                        $respuesta = array(
                            'respuesta' => 'correcto',
                            'datos' => array(
                            'nombre' => $nombre)
                        );
    
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
            
        }
        echo json_encode($respuesta);
    }


    function exite_email($id, $email, $conn){
        $existe = false;
        try{
            $stmt = $conn->prepare("SELECT * FROM usuario WHERE email = ? AND ! id = ?;");
            $stmt->bind_param("ss", $email, $id);
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