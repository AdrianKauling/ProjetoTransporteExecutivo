<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <div class="logo">
        <img src="https://lpexecutivo.com.br/img/logos/logo_branco_sborda.png" width="120px" alt="">
    </div>

    <div class="tela-login">
        <h1>Login</h1>
        <div class="form">

            <?php if(isset($buscaUsuario) && $buscaUsuario['cod'] == 0): ?>
                <div class="alert alert-danger">
                    <?php echo $buscaUsuario['msg']; ?>
                </div>
            <?php endif; ?>

            <form action="login.php" class="form" method="POST">
                <div class="campo">
                    <input type="text" id="nome" name="nome">
                    <label for="nome">Nome de usuário</label>
                </div>
                <div class="campo">
                    <input type="password" id="senha" name="senha">
                    <label for="senha">Senha</label>
                </div>
                <div class="botoes">
                    <button type="submit">Login</button>
                    <a href="">Esqueceu a senha?</a>
                </div>
            </form>
        </div>
    </div>

</body>

</html>