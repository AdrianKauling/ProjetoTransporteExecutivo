<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="jquery/jquery-3.6.0.min.js"></script>

    <title>Document</title>
</head>
<body>
    <select id="grupo" name="grupo">
</body>
</html>

<script>
    function carregaGrupos()
	{
		$.getJSON("loadUsuario.php?",jsonData);
		options = "";
		function jsonData(valores)
		{
			options += '<option value=""></option>';
			$.each(valores, function (key, val) {
				options += '<option value="' + val.nome + '">' + val.senha + '</option>';
					
			});	
				
			$("#grupo").html(options);
			
		}
		
	}
    carregaGrupos()
</script>

