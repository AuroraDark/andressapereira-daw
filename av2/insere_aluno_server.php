<?php
require "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {		
	$nome = $_POST["nome"];
	$mat = $_POST["mat"];
	$cpf = $_POST["cpf"];
	$dtNasc = $_POST["dtNasc"];
	$sql = "INSERT into aluno (matricula, nome, cpf, dataNascimento) 
	values (" . $mat . ", '" . $nome . "', '" . $cpf . "', '" . $dtNasc .  "')";
	if ($conn->query($sql) === TRUE) {
		include "sucesso.php";
	} else {
		include "falha.php";
	}

	$conn->close();
	require "conexao.php";

	foreach($disciplinas as $disciplina){
		$apto = random(0,1);
		$sql = "INSERT into aluno_disciplina (matricula, codDisciplina, apto, nomeDisc, nomeAluno) 
	values (" . $mat . ", '" . $disciplina["codDisciplina"] . "', '" . $apto . "', '" . $disciplina["nomeDisc"] .  "', '" . $nome .  "')";
		$q = mysqli_query($conn, $sql) or die (mysqli_error($conn));
	}

} else {
	include "falha.php";
}		

$conn->close();
?>