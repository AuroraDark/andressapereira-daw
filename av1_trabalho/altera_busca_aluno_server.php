<?php
$servername = "localhost";
$username = "3daw";
$password = "mysql123";
$dbname = "3dawTest";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
<?php
include "html_inicio.php";
?>
<h1>Alterar Aluno</h1>
<form action="altera_aluno_server.php" method="POST">
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {		
	$mat = $_POST["mat"];
	$sql = "SELECT mat, NOME, cpf, DataNascimento FROM Alunos where mat = " . $mat; 
	$resultado = $conn->query($sql);
	
	if ($resultado->num_rows > 0) {

		while ($linha = mysqli_fetch_assoc($resultado)) {
			echo "<b>Mat:</b> " . $linha["mat"] . "<br><b> Nome:</b> " . $linha["NOME"] . "<br> <b>CPF:</b> " . $linha["cpf"] . "<br> <b>Data Nasc:</b> ". $linha["DataNascimento"] . "<br> ";
			echo "<input type=hidden name='mat' value =  " . $linha["mat"] . "><br> ";
			echo "<input type='text' name='nome' placeholder='Nome' />";
			echo "<input type='text' name='cpf' placeholder='CPF' />";
			echo "<input type='text' name='dtNasc' placeholder='Data de Nascimento' />";
			echo "<input type='submit' value='Alterar'/>";
		}
	} else {
		echo "Aluno não encontrado";
	}
} else {
	echo "metodo errado";
}		
$conn->close();
?>
</form>
<?php
include "html_fim.php";
?>