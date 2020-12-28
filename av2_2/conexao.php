<?php
$servername = "localhost";
$username = "3daw";
$password = "mysql123";
$dbname = "locadora_carros";

$conn = new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error){
    die("Erro de conexão:" . $conn->connection_error);
}
?>