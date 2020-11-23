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

if ($_SERVER["REQUEST_METHOD"] == "POST") {		
	$mat = $_POST["mat"];
	$sql = "DELETE FROM Alunos where mat = " . $mat;
	if ($conn->query($sql) === TRUE) {
		include "sucesso.php";
	} else {
		include "falha.php";
	}
} else {
	include "falha.php";
}		

$conn->close();
?>