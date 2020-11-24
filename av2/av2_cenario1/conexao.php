<?php
$servername = "localhost";
$username = "3daw";
$password = "mysql123";
$dbname = "curso";

$conn = new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error){
    die("Erro de conexão:" . $conn->connection_error);
}

$sql = "SELECT * FROM aluno";
$resultado = $conn->query($sql);

$alunos = [];

if($resultado->num_rows > 0){
    $alunos = $resultado->fetch_all(MYSQLI_ASSOC);
}

$sql = "SELECT * FROM disciplina";
$resultado = $conn->query($sql);

$disciplinas = [];

if($resultado->num_rows > 0){
    $disciplinas = $resultado->fetch_all(MYSQLI_ASSOC);
}

$sql = "SELECT * FROM turma";
$resultado = $conn->query($sql);

$turmas = [];

if($resultado->num_rows > 0){
    $turmas = $resultado->fetch_all(MYSQLI_ASSOC);
}

?>