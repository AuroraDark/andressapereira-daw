<?php
    require "conexao.php";
    include "html_inicio.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {		
        $cidade = $_POST["cidade"];
        $periodo = $_POST["periodo"];
        $data_ini = $_POST["data_ini"];

//Todos os carros reservados naquela cidade
$locacao = [];
$sql = "SELECT * FROM locacao WHERE idCidade = ". $cidade;
$resultado = $conn->query($sql);

if($resultado->num_rows > 0){
    $locacao = $resultado->fetch_all(MYSQLI_ASSOC);
} 

//array que vai guardar todas as placas dos carros reservados que estarão livres no periodo de tempo escolhido pelo cliente.
$carrosDispPlaca = [];

foreach($locacao as $linha){
    //vai comparar o periodo de aluguel dos carros reservados com o periodo desejado pelo cliente, se não tiver reservado neste periodo ele entra no array.
    if(strtotime('+'. $periodo .' days',strtotime($data_ini)) < strtotime($linha['data']) || strtotime('+'. $linha['periodo'] .' days',strtotime($linha['data'])) < strtotime($data_ini)) {
        if(!in_array($linha['placa'], $carrosDispPlaca)){
            array_push($carrosDispPlaca, $linha['placa']);
        }
    }
}

//todos os carros, para comparar a placa dos disponiveis e listar.
$carros = [];

$sql = "SELECT * FROM carros";

 $resultado = $conn->query($sql);

if($resultado->num_rows > 0){
    $carros = $resultado->fetch_all(MYSQLI_ASSOC);
}

//carros que o cliente pode escolher.
$carrosDisp = [];

$sql = "SELECT * FROM carros
 WHERE disponivel = 1 AND cidade = ". $cidade;

 $resultado = $conn->query($sql);

if($resultado->num_rows > 0){
    $carrosDisp = $resultado->fetch_all(MYSQLI_ASSOC);
}

//adiciona os carros reservados livres naquele periodo à lista de carros.
foreach($carros as $linha){
    foreach($carrosDispPlaca as $placa){
        if($linha['placa'] == $placa){
            array_push($carrosDisp, $linha);
        }
    }
}
?>

<h1>Qual carro deseja alugar?[O preço varia de carro pra carro]</h1>
<form method="POST" action="loja.php">
                <select name="carro" id="carro" required>
                <option value="">Selecione o carro</option>
                    <?php foreach($carrosDisp as $linha){?>
                        <option value="<?=$linha['placa']?>"> <?=$linha['marca']?> <?= $linha['modelo']?> </option>
                    <?php } ?>
                </select><br><br>
                <input type='hidden' name='data_ini' value="<?=$data_ini?>">
                <input type='hidden' name='periodo' value="<?=$periodo?>">
                <input type='hidden' name='cidade' value="<?=$cidade?>">
                <input type="submit" value="Continuar">
        </form>

<?php
    }else {
        include "falha.php";
    }

$conn->close();
    include "html_fim.php";
?>