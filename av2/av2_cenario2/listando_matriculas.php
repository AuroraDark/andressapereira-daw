<?php

require 'conexao.php';
    
include "html_inicio.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {		
	$codDisciplina = $_POST["disciplina"];
    $codTurma = $_POST["turma"];
    
?>   
<table>
  <tr>
    <th>Aluno</th>
    <th>Matrícula</th>
    <th>Disciplina</th>
    <th>Se matricular</th>
  </tr>
<?php		
	$sql = "SELECT nomeAluno, matricula, nomeDisc FROM aluno_disciplina WHERE apto = " . 1 . " AND codDisciplina = " . $codDisciplina; 
	$resultado = $conn->query($sql);
	
	if ($resultado->num_rows > 0) {

		while ($linha = mysqli_fetch_assoc($resultado)) {
            echo "<tr>";
            echo "<td>" . $linha["matricula"] . "</td>";
            echo "<td>" . $linha["nomeAluno"] . "</td>";
            echo "<td>" . $linha["nomeDisc"] . "</td>";
            echo "<td>" . "<form method='POST' action='matricula.php'><input type='hidden' name='matricula' value=".$linha["matricula"].">"."<input type='hidden' name='nomeAluno' value=".$linha["nomeAluno"].">"."<input type='hidden' name='nomeDisc' value=".$linha["nomeDisc"].">"."<input type='hidden' name='codTurma' value=".$codTurma.">"."<input type='hidden' name='codDisciplina' value=".$codDisciplina.">"."<input type='submit' value='Matricular-se'>"."></form>"."</td>";
            echo "</tr>";
		}

	} else {
		echo "Não há alunos cadastrados !";
    }		
    
$conn->close();
?>
</table>
<?php
}
include "html_fim.php";
?>