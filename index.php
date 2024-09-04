<?php
    session_start();

    if(isset($_SESSION['nombre'])){
      include_once 'templates/users.php';
    }else{
      include_once 'form-login.php';
    }
?>  