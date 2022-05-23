<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de usuários</title>
    <link rel="stylesheet" href="menuUsuario.css">

    <script src="../jquery/jquery-3.6.0.min.js"></script>
</head>

<body>
    <?php include("logo.php"); ?>
    <div class="h1">
        <h1>Menu de usuários</h1>
    </div>
    <div class="main">
        <?php include("botoesDeAcao.php"); ?>

        <form id="form1">
            <div class="submitForm b botoes">
                <button type="submit" id="incluir" class="incluir" 
                    style="
                    margin-left: 392px;
                    background-color: #f77f00;
                    padding: 4px;
                    border-radius: 4px;
                    margin-top: 0px;
                    width: 164px;
                    margin-left: 392px;">Incluir
                </button>
            </div>

            <div class="dados_para_inclusao">
                <tr>
                    <td><input type="number" id="id" style="display:none;" readonly /></td>
                    <td><input type="text" placeholder="nome" name="nome" id="nome" required /></td>
                    <td><input type="password" placeholder="senha" name="senha" id="senha" required /></td>
                    <td>
                        <select name="categoriaUsuario" id="categoriaUsuario">
                            <option value="ADM">ADM</option>
                            <option value="Normal">Normal</option>
                        </select>
                    </td>
                    <td>
                        <select name="situacaoUsuario" id="situacaoUsuario">
                            <option value="Ativo">Ativo</option>
                            <option value="Inativo">Inativo</option>
                        </select>
                    </td>
                </tr>

            </div>

            

        </form>

        <table class="tabela">
            <thead>
                <tr>
                    <th>id</th>
                    <th>nome</th>
                    <th>senha</th>
                    <th>categoria</th>
                    <th>situacao</th>
                </tr>
            </thead>

            <tbody>
                <?php

                include("../DataBase/conexao.php");

                $sql = 'SELECT * FROM Usuario';

                $result = $mysqli_connection->query($sql);



                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {

                        echo "<tr onclick=popula(" . $row['id'] . ")>";

                        echo "<td>";
                        echo "      <p > " . $row['id'] . "</P>";
                        echo "</td>";

                        echo "<td>";
                        echo "      <p class='tabela-nome'> " . $row['nome'] . "</P>";
                        echo "</td>";

                        echo "<td>";
                        echo "      <p> " . $row['senha'] . "</P>";
                        echo "</td>";
                        echo "<td>";
                        echo "       <p> " . $row['categoria'] . "</P>";
                        echo "</td>";

                        echo "<td>";
                        echo "       <p> " . $row['situacao'] . "</P>";
                        echo "</td>";

                        echo "<td style='border: none'>";
                        echo "       <button class='excluir' style='background-color: #f77f00; width: 100%; padding: 3px;' onclick='excluir(" . $row['id'] . ")'> Excluir </button>";
                        echo "</td>";
                                
                        echo " </tr>";
                    }
                } else {
                    echo "0 results";
                }

                $mysqli_connection->close();

                ?>

            </tbody>    
        </table>

    </div>


</body>

</html>

<script>
    
    $(document).ready(function() {

        $("#form1").submit(function(e) {
            var form = $(this);


            // if ($("#id").val() != "")
            //     strURL = 'adm_usuario.php?id=' + $("#id").val();
            if($("#id").val() == ""){
                strURL = 'adm_usuario.php';

                $.ajax({
                    type: "POST",
                    url: strURL,
                    data: form.serialize(), // serializes the form's elements.
                    success: function(data) {
                        console.log("sucess")
                    }
                });
            }else{
                alert('Nao pode')
            }
        })
    })

    function excluir(id) {
        $.getJSON("adm_usuario.php?excluir=true&id="+ id)
        document.location.reload(true)
    }

    function popula(id)
    {
        $.getJSON("loadUsuario.php?id=" + id,jsonData);
        
        function jsonData(valores)
        {
            $("#id").val(valores.id);   
            $("#nome").val(valores.nome);
            $("#senha").val(valores.senha);
            $("#categoriaUsuario").val(valores.categoria);
            $("#situacaoUsuario").val(valores.situacao);

        }
    }

    function alterar(){
        let id = $("#id").val();   
        let nome = $("#nome").val();
        let senha = $("#senha").val();
        let categoria = $("#categoriaUsuario").val();
        let situacao = $("#situacaoUsuario").val();

        let form = $("#form1");
        if($("#id").val() != ""){
            strURL = 'adm_usuario.php?id=' + id;

            $.ajax({
                type: "POST",
                url: strURL,
                data: form.serialize(), // serializes the form's elements.
                success: function(data) {
                    console.log("sucess")
                }
            });
        }else{
            alert('Nao pode')
        }
        
    }
</script>