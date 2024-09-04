<?php 

    if (isset($_GET['id'])) {
        $sql = "SELECT * FROM `usuario` WHERE id =".$_GET['id'];
        try {
            include_once('includes/db_conexion.php');
            $resultado = $conn->query($sql);
            $arrusers = array();
            if(mysqli_num_rows($resultado)) {
                while($user = mysqli_fetch_assoc($resultado)) {
                $arrusers[] = $user;
                }
            }
    
            header('Content-type: application/json');
            echo json_encode($arrusers); 
    
        } catch (Exception $e) {
            $error = $e->getMessage();
        }
    }else{
        $sql = "SELECT * FROM `usuario`";
        try {
            include_once('includes/db_conexion.php');
            $resultado = $conn->query($sql);
            $arrusers = array();
            if(mysqli_num_rows($resultado)) {
                while($user = mysqli_fetch_assoc($resultado)) {
                $arrusers[] = $user;
                }
            }
    
            header('Content-type: application/json');
            echo json_encode($arrusers); 
    
        } catch (Exception $e) {
            $error = $e->getMessage();
        }
    }
?>