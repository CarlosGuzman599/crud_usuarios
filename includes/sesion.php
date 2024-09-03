<?php
    function usuario_autenticado(){
        if(!revisar_usuario()) {
          header('Location:log-in.php');
          exit();
        }
    }
    function revisar_usuario() {
        return isset($_SESSION['nombre_cliente']);
    }
    
    session_start();
    usuario_autenticado();
?>