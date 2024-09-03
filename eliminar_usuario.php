<?php 

    if (isset($_POST)) {
        try {
            include_once 'includes/db_conexion.php';
            $id = $_POST["id"];
            echo
            $stmt = $conn->prepare("DELETE FROM usuario WHERE id = ".$id.";");
            $stmt->execute();
            if($stmt->affected_rows == 1) {
                $respuesta = array(
                    'status' => 200,
                    'respuesta' => 'ok'
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
?>