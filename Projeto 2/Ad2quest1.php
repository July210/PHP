<!DOCTYPE>
<html lang="pt-br">
	<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="_css/estilo.css">
	<title>Ad2 Questão 1</title>
	</head>
	<body>
	<h1>Questão 1</h1>
	<div>
	<p>
	<?php
	function cont($td,$mat){
		$d=0;
		for($b=0;$b<count($mat);$b++){
			if ($td[0]==$mat[$b][1]){
				$d = $d+1;
			}
		}
	return $d;
	}
	$til = $_GET["disc"];
	$aid = $_GET["idaluno"];
	function MATRICULA_ALUNO($til,$aid){
	$v = 0;	
	$mysqli = new mysqli("127.0.0.1", "root","","prova",3306);
	$query = "SELECT turma.ID_TURMA,disciplina.ID_DISCIPLINA,turma.NUMERO_DE_VAGAS FROM disciplina INNER JOIN turma ON disciplina.ID_DISCIPLINA = turma.ID_DISCIPLINA WHERE disciplina.TITULO = '$til'";
	$result = $mysqli->query($query);
	$td = $result ->fetch_all(MYSQLI_NUM);
	$query1 = "SELECT ID_MATRICULA,ID_TURMA FROM matricula ";
	$result1 = $mysqli->query($query1);
	$mat = $result1->fetch_all(MYSQLI_NUM);	
		for ($a=0;$a<count($td);$a++){
			$temp = cont($td[$a],$mat);
			if ($td[$a][2]>$temp){
				$f=$td[$a][0];
				$query2 = "INSERT INTO matricula (ID_TURMA,ID_ALUNO) VALUES ('$f','$aid')";
				$result2 = $mysqli->query($query2);
				echo "O aluno foi matriculado com sucesso.";
				$v=1;
				break;
			}
		}
		if ($v!=1){
			$f=$td[0][1];
				$query3 = "INSERT INTO listaespera (ID_DISCIPLINA,ID_ALUNO) VALUES ('$f','$aid')";
				$result3 = $mysqli->query($query3);
				echo "A disciplina ".$til." não possui vagas."; 
			}
	mysqli_close($mysqli);
	}
	MATRICULA_ALUNO($til,$aid);
	?>
	</p>
	<input type="button" value="Voltar" onclick="javascript: location.href='Ad2Q1.html';" id="botao"/>
	</div>
	</body>

</html>