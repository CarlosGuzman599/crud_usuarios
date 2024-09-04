<?php 
    if(isset($_POST)){
        if ($_POST['email'] == '' && $_POST['password'] == '') {
            echo "Falta correo y password";
        }else if ($_POST['email'] == '') {
            echo "Falta correo";;
        }else if ($_POST['password'] == '') {
            echo "Falta password";;
        }else{

            $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
            $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    
            try{
                include_once 'includes/db_conexion.php';
                $stmt = $conn->prepare("SELECT id, nombre, password FROM usuario WHERE email = ?;");
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $stmt->bind_result($id_db, $nombre_db, $password_db);
                if($stmt->affected_rows){
                    $existe = $stmt->fetch();
    
                    if($existe){
    
                        if(password_verify($password, $password_db)){
                            $respuesta = array(
                                'respuesta'=> 'correcto',
                                'datos' => array(
                                'id_insertado' => $id_db,
                                'nombre' => $nombre_db)
                            );
                            session_start();
                            $_SESSION['id'] = $id_db;
                            $_SESSION['nombre'] = $nombre_db;
                            $_SESSION['email'] = $email;
                        }else{
                            $respuesta = array(
                                'respuesta' => 'error',
                                'tipo' => 'Error!: DatosIncorrectos'
                            );
                        }
    
                        
                    }else{
                        $respuesta = array(
                            'respuesta' => 'error',
                            'tipo' => 'Error!DatosIncorrectos'
                        );
                    }
                }
    
                $stmt->close();
                $conn->close();
    
            }catch(Exception $e){
                $respuesta = array(
                    'respuesta' => 'error',
                    'tipo' => "Error!: ".$e->getMessage()
                );
            }
    
            echo json_encode($respuesta);
            
        
        }
    }
?>