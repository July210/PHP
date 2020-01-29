<!DOCTYPE>
<html lang="pt-br">
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="_css/estilo.css">
		<title>AD1 Questão 4</title>
	</head>
	<body>
	<h1 align=center>Questão 4</h1>
	<div>
	<?php
	
	$origin = ($_GET["orig"]);
	$alter = ($_GET["mod"]);
	$o = explode("/",$origin);
	$m = explode ("/",$alter);
	
	function comparacaoFilmes($array1,$array2){
	$part1 = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
	$part2 = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
	$til1=0;
	$til2=0;
	$til3=0;
	$w=0;
	$y=0;
	$z=0;
	for ($s=0;$s<sizeof($array1);$s++) {
		$total=0;
		$r1=trim($array1[$s]);
		$r2=trim($array2[$s]);
		if (strlen($r1) >= strlen($r2)){
		$t=strlen($r2);	
		} elseif (strlen($r1) < strlen($r2)){
		$t=strlen($r1); 	
		}
		for ($a=0;$a<$t;$a++){
			if ((in_array($r1[$a],$part1)==true) and (in_array($r2[$a],$part2)==true) or ((in_array($r1[$a],$part2)==true) and in_array($r2[$a],$part1)==true)) {
			$total+= 5; 
			} elseif (ord($r1[$a]) == ord($r2[$a])){
				$total+= 10;
			} elseif (ctype_alpha($r1[$a]) and ctype_alpha($r2[$a])){
				$total+= 2;	
			}
		}
		if ($total>$w) {
		$z=$y;
		$y=$w;
		$w=$total;
		$til3=$til2;
		$til2=$til1;
		$til1=$s;
		} elseif ($total>$y){
			$til3=$til2;
			$til2=$s;
			$z=$y;
			$y=$total;
			} elseif ($total>$z){
				$til3=$s;
				$z=$total;
			}
	}
	echo "Os três títulos com a maior similaridade são:</br>";
	echo "Comparação entre ". $array1[$til1]. " e ". $array2[$til1]. " = ". $w. "</br>";
	echo "Comparação entre ". $array1[$til2]. " e ". $array2[$til2]. " = ". $y. "</br>";
	echo "Comparação entre ". $array1[$til3]. " e ". $array2[$til3]. " = ". $z. "</br>";
	}
	
	comparacaoFilmes($o,$m);
	?>
	</br>
	<footer id="botao">
	<input type="button" value="Voltar" onclick="javascript: location.href='questao4.php';" />
	</footer>
	</div>
	</body>
</html>