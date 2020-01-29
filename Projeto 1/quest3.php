<!DOCTYPE>
<html lang="pt-br">
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="_css/estilo.css">
		<title>AD1 Questão 3</title>
	</head>
	<body>
	<h1 align=center>Questão 3</h1>
	<div>
	<?php
	$texto = $_GET["texto"];
	str_split($texto);
	function cifraTexto($texto){
	$part1 = array('A','B','C','D','E','F','G','H','I','J','K','L','M');
	$part2 = array('N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
	for ($i=0; $i<strlen($texto); $i++) {
		 	if (in_array($texto[$i], $part1)) { 
				$key = array_search($texto[$i],$part1);
				echo $part2[$key];
			} elseif (in_array($texto[$i], $part2)){
				$key2 = array_search($texto[$i],$part2);
				echo $part1[$key2];
			} else {
				echo $texto[$i];
			}
		} 	
	}
	cifraTexto(strtoupper($texto));
	?>
	<p id="botao">
	<input type="button" name="botao" value="Voltar" onclick="javascript: location.href='questao3.php';" />
	</p>
	</div>
	</body>
</html>