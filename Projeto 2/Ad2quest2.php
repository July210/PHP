<!DOCTYPE>
<html lang="pt-br">
	<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="_css/estilo.css">
	<title>Ad2 Questão 2</title>
	</head>
	<body>
	<h1 align=center>Questão 2</h1>
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
	$mcr=0;
	$aluno=0;
	$v = 0;
	$t=0;
	$turma=0;
	$mysqli = new mysqli("127.0.0.1", "root","","prova",3306);
	$query = "SELECT turma.ID_TURMA,disciplina.ID_DISCIPLINA,turma.NUMERO_DE_VAGAS FROM disciplina INNER JOIN turma ON disciplina.ID_DISCIPLINA = turma.ID_DISCIPLINA WHERE disciplina.TITULO = '$til'";
	$result = $mysqli->query($query);
	$td = $result ->fetch_all(MYSQLI_NUM);
	$query1 = "SELECT matricula.ID_MATRICULA,matricula.ID_TURMA,aluno.ID_ALUNO,aluno.CR FROM matricula INNER JOIN aluno ON matricula.ID_ALUNO = aluno.ID_ALUNO ";
	$result1 = $mysqli->query($query1);
	$mat = $result1->fetch_all(MYSQLI_NUM);
	$query4 = "SELECT CR FROM aluno WHERE ID_ALUNO='$aid'";
	$result4 = $mysqli->query($query4);
	$craluno = $result4->fetch_array(MYSQLI_NUM);
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
			for ($b=0;$b<count($td);$b++){
				for ($c=0;$c<count($mat);$c++){
					if ($td[$b][0]==$mat[$c][1]){
						if ($t!=1){
							$mcr=$mat[$c][3];
							$aluno=$mat[$c][2];
							$turma=$mat[$c][1];
						}
						if ($mcr>$mat[$c][3]){
							$mcr=$mat[$c][3];
							$aluno=$mat[$c][2];
							$turma=$mat[$c][1];
						}
					$t=1;
					}
				}
			}
			if ($craluno[0]>$mcr){
				$query5 = "DELETE FROM matricula WHERE ID_ALUNO = '$aluno' AND ID_TURMA='$turma' ";
				$result5 = $mysqli->query($query5);
				$query6 = "INSERT INTO matricula (ID_TURMA,ID_ALUNO) VALUES ('$turma','$aid') ";
				$result6 = $mysqli->query($query6);
				$query7 = "INSERT INTO listaespera (ID_DISCIPLINA,ID_ALUNO) VALUES ('$f','$aluno')";
				$result7 = $mysqli->query($query7);
				echo "O aluno foi matriculado com sucesso.";
			} else{
				$query3 = "INSERT INTO listaespera (ID_DISCIPLINA,ID_ALUNO) VALUES ('$f','$aid')";
				$result3 = $mysqli->query($query3);
				echo "A disciplina ".$til." não possui vagas.";
			}	
		}
	mysqli_close($mysqli);
	}
	MATRICULA_ALUNO($til,$aid);
	?>
	</p>
	<input type="button" value="Voltar" onclick="javascript: location.href='Ad2Q2.html';" id="botao"/>
	</div>
	</body>

</html>