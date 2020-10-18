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
<table>
  <tr>
    <th>Matrícula</th>
    <th>Nome</th>
    <th>CPF</th>
    <th>Data Nasc.</th>
  </tr>
<?php		
	$sql = "SELECT mat, NOME, cpf, DataNascimento FROM Alunos"; 
	$resultado = $conn->query($sql);
	
	if ($resultado->num_rows > 0) {

		while ($linha = mysqli_fetch_assoc($resultado)) {
            echo "<tr>";
            echo "<td>" . $linha["mat"] . "</td>";
            echo "<td>" . $linha["NOME"] . "</td>";
            echo "<td>" . $linha["cpf"] . "</td>";
            echo "<td>" . $linha["DataNascimento"] . "</td>";
            echo "</tr>";
		}

	} else {
		echo "Não há alunos cadastrados !";
	}		
$conn->close();
?>
</table>