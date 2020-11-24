<?php

include "html_inicio.php";
require 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {		
	$matricula = $_POST["matricula"];
	$nomeAluno = $_POST["nomeAluno"];
    $nomeDisc = $_POST["nomeDisc"];
    $codTurma = $_POST["codTurma"];
    $codDisciplina = $_POST["codTurma"];
    
    $matricula = filter_input(INPUT_POST,"matricula",FILTER_SANITIZE_SPECIAL_CHARS);
    $nomeAluno = filter_input(INPUT_POST,"nomeAluno",FILTER_SANITIZE_SPECIAL_CHARS);
    $nomeDisc = filter_input(INPUT_POST,"nomeDisc",FILTER_SANITIZE_SPECIAL_CHARS);

    if($matricula && $nomeAluno && $nomeDisc){
    $sql = "UPDATE aluno_disciplina SET apto = '2' WHERE matricula = '$matricula' AND codDisciplina = '$codDisciplina'";
    
    if($conn->query($sql) === TRUE){
        include "sucesso.php";
    }else{
        echo "Erro: ".$conn->error;
    }
}
    $conn->close();
    require 'conexao.php';


	$sql = "INSERT into aluno_inscrito (matricula, nomeAluno, nomeDisc, codTurma) 
	values (" . $matricula . ", '" . $nomeAluno . "', '" . $nomeDisc . "', '" . $codTurma .  "')";
	if ($conn->query($sql) === TRUE) {
		echo "<h1>Aluno Matriculado com Sucesso</h1>";
	} else {
		include "falha.php";
    }
    
} else {
	include "falha.php";
}		
$conn->close();

include "html_fim.php";

?>