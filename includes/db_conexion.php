<?php
  
  define('HOST', 'localhost');
  define('DB_USUARIO', 'root');
  define('DB_PASSWORD', '');
  define('DB_DATABASE', 'crud');

  $conn =new mysqli(HOST, DB_USUARIO, DB_PASSWORD, DB_DATABASE);

  if($conn->connect_error) {
    echo $conn->connect_error;
  }

?>