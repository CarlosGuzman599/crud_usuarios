<?php
    session_start();
    if(isset($_SESSION['nombre'])){
        echo "Nombre";
    }else{
      include_once 'form-login.php';
    }
?>  