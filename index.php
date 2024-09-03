<?php
    session_start();
    if(isset($_SESSION['nombre_cliente'])){
        echo "Nombre";
    }else{
      include_once 'templates/form-login.php';
    }
?>  