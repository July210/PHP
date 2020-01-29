<!DOCTYPE>
<html lang="pt-br">
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="_css/estilo.css">
		<title>AD1 Questão 2</title>
	</head>
	<body>
	<h1>Questão 2</h1>
	<div>
	<p>
	<?php
		$valor = $_GET["soma"];
	//Utilizei a tabela da questão como exemplo.
	$tabela = array(array('1','3','6','7','2','5'),array('4','4','6','2','2','4'),array('2','3','5','1','1','5'),array('5','3','5','1','5','7'),array('6','2','4','2','1','3'),array('3','2','3','1','7','4'));

	function acheSequencia($tabela,$valor){
		$soma = 0;
		$nums = "";
		echo "<p>Horizontal: </br>";
		$a=0;
		$b=0;
		$j=0;
		$n=0;
		$y=0;
		while ($a<6){
			while ($b<6){
				if ($soma<$valor) {
					$soma += $tabela[$a][$b];
					$nums = $nums. $tabela[$a][$b]. ",";
					$n++;
					if ($n==1){
					$j=$b;
					$y=$a;
					} 
					$b++;
				} elseif ($soma==$valor) {
					$soma=0;
					$b=$j+1;
					$a=$y;
					$n=0;
					echo substr($nums, 0, -1). "</br>";	
					$nums = "";
				} else {
					$soma=0;
					$b=$j+1;
					$a=$y;
					$n=0;
					$nums = "";
					}
			}
		$a++;
		$b=0;
		
		}
		echo "</p>";
		$soma = 0;
		$nums = "";
		echo "<p>Vertical: </br>";
		$a=0;
		$b=0;
		$j=0;
		$n=0;
		$y=0;
		while ($b<6){
			while ($a<6){
				if ($soma<$valor) {
					$soma += $tabela[$a][$b];
					$nums = $nums. $tabela[$a][$b]. ",";
					$n++;
					if ($n==1){
					$j=$a;
					$y=$b;
					} 
					$a++;
				} elseif ($soma==$valor) {
					$soma=0;
					$a=$j+1;
					$b=$y;
					$n=0;
					echo substr($nums, 0, -1). "</br>";	
					$nums = "";
				} else {
					$soma=0;
					$a=$j+1;
					$b=$y;
					$n=0;
					$nums = "";
					}
			}
		$b++;
		$a=0;
		
		}
	}
 acheSequencia($tabela,$valor);
 
	?>
	</p>
	<input type="button" value="Voltar" onclick="javascript: location.href='questao3.php';" id="botao"/>
	</div>
	</body>
</html>