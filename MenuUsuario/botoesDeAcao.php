<div class="botoesAcoes">

    <div class="botoes">
        <input type="text" placeholder="Pesquisa" class="pesquisa" id="pesquisa" >

        <a onclick="pesquisar()">
            <div class="lupa">
                <img src="../imagens/lupa.png" width="20px" alt="">
            </div>
        </a>
        
        
    </div>

    <div class="botoes">
        <select name="" id="select" id="filtro_por">
            <option value="nome">nome</option>
            <option value="id">id</option>
            <option value="categoria">categoria</option>
            <option value="situacao">situacao</option>
        </select>
    </div>
    
    <div class="botoes">
        
        
        <button class="alterar" onclick="alterar()"
        style="
            background-color: #f77f00;
            padding: 4px;
            border-radius: 4px;
            width: 164px;"
        >Alterar</button>
    </div>

</div>
<script>

    function pesquisar(){
        let id_pesquisa = $("#pesquisa").val()
        $("tbody").detach()
        let filtro_por = $("#filtro_por").val()
        $.getJSON("loadUsuario.php?id=" + id_pesquisa,jsonData);
        console.log(filtro_por)
        function jsonData(valores)
        {
            console.log(valores.id  )
            console.log(valores.nome)
            console.log(valores.senha)
            console.log(valores.categoria)
            console.log(valores.situacao)

        }
    }

</script>