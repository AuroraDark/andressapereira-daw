<?php
require "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {			

    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $cpf = $_POST['cpf'];
    $ccnome = $_POST['ccnome'];
    $ccnum = $_POST['ccnum'];
    $ccval = $_POST['ccval'];
    $cccod = $_POST['cccod'];

    $idCidade = $_POST['cidade'];
    $idLoja = $_POST['idLoja'];
    $parcelas = $_POST['parcelas'];
    $placa = $_POST['placa'];
    $data_ini = $_POST['data_ini'];
    $periodo = $_POST['periodo'];
    $valorTotal = $_POST['valorTotal'];
    $data_ini = (new DateTime($data_ini))->format('Y-m-d');

    // Inserindo na tabela de clientes
    $sql = "INSERT INTO clientes (nome,sobrenome,cpf,ccnome,ccnum,ccval,cccod) 
    VALUES ('$nome','$sobrenome','$cpf','$ccnome','$ccnum','$ccval','$cccod')";
    
    if (!$conn->query($sql)) {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
    // Inserindo na tabela de reservas
    $sql = "INSERT INTO locacao (cpf,placa,idCidade,idLoja,data_ini,periodo,parcelas,valor_total) 
    VALUES ('$cpf','$placa','$idCidade','$idLoja', '$data_ini','$periodo','$parcelas','$valorTotal')";

    if ($conn->query($sql) === TRUE) {
        include "sucesso.php";
    }else{
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
    //Atualizando o carro para alugado
    $sql = "UPDATE carros SET disponivel = 0 WHERE placa = '$placa'";
    $conn->query($sql);

	$conn->close();

} else {
	include "falha.php";
}		

?>