<?php
    session_start();
    if (isset($_POST)) {
        try {
            include_once 'includes/db_conexion.php';
            $id = $_POST["id"];


            if ($_SESSION['id'] == $_POST["id"]) {
                $respuesta = array(
                    'respuesta' => 'error',
                    'tipo' => "Error!: Usuario en uso"
                );
            }else{
                $stmt = $conn->prepare("DELETE FROM usuario WHERE id = ?");
                $stmt->bind_param("s", $id);
                $stmt->execute();
                if($stmt->affected_rows == 1) {
                    $respuesta = array(
                        'status' => 200,
                        'respuesta' => 'ok'
                    ); 
                }
            }
        } catch(Exception $e) {
            $respuesta = array(
                'respuesta' => 'error',
                'tipo' => "Error!: ".$e->getMessage()
            );
        }
        echo json_encode($respuesta);
    }
    
?>