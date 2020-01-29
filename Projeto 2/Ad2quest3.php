<!DOCTYPE>
<html lang="pt-br">
	<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="_css/estilo.css">
	<title>Ad2 Questão 3</title>
	</head>
	<body>
	<h1 align=center>Questão 3</h1>
	<div>
	<?php
	$get1 = $_GET["per"];
	$get2 = $_GET["ano"];
	$mnota = 0;
	$s = 0;
	$mysqli = new mysqli("127.0.0.1","root","","prova",3306);
	$query1 = "SELECT matricula.ID_MATRICULA,aluno.NOME,matricula.ID_ALUNO,matricula.NOTA_FINAL FROM turma INNER JOIN matricula ON turma.ID_TURMA=matricula.ID_TURMA INNER JOIN aluno ON matricula.ID_ALUNO = aluno.ID_ALUNO WHERE aluno.CR>8 AND turma.PERIODO='$get1' AND turma.ANO='$get2'";
	$result1 = $mysqli->query($query1);
	$row1 = $result1->fetch_all(MYSQLI_NUM);
			for ($a=0;$a<count($row1);$a++){
		if ($mnota<$row1[$a][3]){
			$mnota=$row1[$a][3];
			$s=$a;
		} elseif ($mnota==$row1[$a][3]){
			if ($row1[$s][0]<$row1[$a][0]){
				$s=$a;
			}
		}
	}
	echo 'O nome do aluno que possui o cr maior que 8 e possui a maior média é '. $row1[$s][1].'.</br>';
	?>
	<input type="button" value="Voltar" onclick="javascript: location.href='Ad2quest3.php';" id="botao"/>
	</div>
	</body>

</html>