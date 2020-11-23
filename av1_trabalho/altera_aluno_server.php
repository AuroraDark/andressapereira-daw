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

$mat = filter_input(INPUT_POST,"mat",FILTER_SANITIZE_SPECIAL_CHARS);
$nome = filter_input(INPUT_POST,"nome",FILTER_SANITIZE_SPECIAL_CHARS);
$cpf = filter_input(INPUT_POST,"cpf",FILTER_SANITIZE_SPECIAL_CHARS);
$dtNasc = filter_input(INPUT_POST,"dtNasc",FILTER_SANITIZE_SPECIAL_CHARS);

if($mat && $nome && $cpf && $dtNasc){
    $sql = "UPDATE Alunos SET nome = '$nome',cpf = '$cpf',dataNascimento = '$dtNasc' WHERE mat = $mat";
    
    if($conn->query($sql) === TRUE){
        include "sucesso.php";
    }else{
        echo "Erro: ".$conn->error;
    }
}else{
    include "falha.php";
}

$conn->close();
?>