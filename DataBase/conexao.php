<?php
    $mysqli_connection = new MySQLi('localhost', 'root', '', 'teste');
    if($mysqli_connection->connect_error)
    {
        echo "Desconectado! Erro: " . $mysqli_connection->connect_error;
    }
?>