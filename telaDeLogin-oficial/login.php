<?php
if (count($_POST) > 0) {
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    try {
        include 'conexaoPDo.php';
        $stmt = $conn->prepare('SELECT codigo from Usuario where nome = :nome and senha = MD5(:senha)');
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll();

        if (count($result) == 0) {
            $buscaUsuario['cod'] = 0;
            $buscaUsuario['msg'] = "Nome de usuário e senha não confere.";
        }else{
            print_r($result[0]);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
include 'index.php';
