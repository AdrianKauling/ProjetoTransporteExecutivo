<?php
       
	   include("../DataBase/conexao.php");
	   if($mysqli_connection->connect_error){
		  echo "Desconectado! Erro: " . $mysqli_connection->connect_error;
	   }
   
   
	   $sql = "SELECT * FROM Usuario where id = " . $_GET['id'];;
	   $result = $mysqli_connection->query($sql);
   
	   if ($result->num_rows > 0) 
	   {
		 while($row = $result->fetch_assoc()) 
		 {
		   echo json_encode(($row));
		 }
	   } 
