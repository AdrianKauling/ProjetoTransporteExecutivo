<?php

	
	//abre a conexão com o banco de dados
	include("../DataBase/conexao.php");
	
	if (isset($_GET['id'])) {

		if (isset($_GET['excluir'])) {
			//realiza a exclusão
			$sql = "delete from Usuario where id = ".$_GET['id'];
		}
		else
		{
			//realiza a alteração	
			$sql = "update Usuario set nome='".$_POST["nome"]."', senha=' ".$_POST["senha"]. "', categoria='".$_POST["categoriaUsuario"]."', situacao = '".$_POST["situacaoUsuario"]."' where id =".$_GET['id'];
		}
	}
	else
	{
		//realiza inserção no banco de dados
		$sql = "insert into Usuario(nome,senha,categoria, situacao)
				VALUES ('".$_POST["nome"]."','".$_POST["senha"]."','".$_POST["categoriaUsuario"]."','".$_POST["situacaoUsuario"]."')";
		
	}
	$mysqli_connection->query($sql);

	//fecha conexão com o banco de dados
	$mysqli_connection->close();


	header("Location: menuUsuario.php");

?>