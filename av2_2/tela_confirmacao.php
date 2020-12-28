<?php
require "conexao.php";
include "html_inicio.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $cidade = $_POST["cidade"];
    $periodo = $_POST["periodo"];
    $data_ini = $_POST["data_ini"];
    $placa = $_POST["placa"];
    $idLoja = $_POST["loja"];

    $carros = [];

    $sql = "SELECT * FROM carros WHERE placa = '$placa'";

    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        $carros = $resultado->fetch_all(MYSQLI_ASSOC);
    }

    $loja = [];

    $sql = "SELECT * FROM lojas WHERE  idLoja = '$idLoja'";

    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        $loja = $resultado->fetch_all(MYSQLI_ASSOC);
    }

    foreach ($carros as $linha) {
        //Valor total e calculo da data final.
        $valorTotal = $linha['valor_dia'] * $periodo;
        $data_fim = (new DateTime($data_ini))->modify('+' . $periodo . ' days');

?>
 <!-- Informações para o cliente -->
        <form method="POST" action="pagamento.php">
            <h1>Detalhes do Pedido</h1>
            <h2>Carro </h2>
            <p><b>Marca:</b> <?= $linha['marca'] ?> </p>
            <p><b>Modelo:</b> <?= $linha['modelo'] ?> </p>
            <p><b>Ano:</b> <?= $linha['ano'] ?></p>
            <p><b>Preço por Dia:</b> R$<?= $linha['valor_dia'] ?></p><br>
            <h2>Aluguel</h2>
            <p><b>Local:</b> Loja <?= $idLoja ?> -
                <?foreach($loja as $linha){echo $linha['endereco'];}?> (Este é o local onde você irá buscar e devolver o veículo)</p>
            <p><b>Período:</b> <?= $periodo ?> dias </p>
            <p><b>Início:</b> <?= (new DateTime($data_ini))->format('d/m/Y') ?></p>
            <p><b>Fim:</b> <?= $data_fim->format('d/m/Y') ?></p><br>
            <h3><b>Valor Total:</b> R$<?= $valorTotal ?></h3><br><br>

            <!-- Cadastro do Cliente -->
            <h1>Dados do cliente</h1>
            <input type="text" name="nome" placeholder="Nome" required />
            <input type="text" name="sobrenome" placeholder="Sobrenome" required />
            <input type="text" name="cpf" placeholder="CPF" required /><br><br>

             <!-- Cadastro dos Dados de Pagamento -->
            <h1>Dados de pagamento</h1>
             <!-- Parcelas -->
            <select name="parcelas" id="parcelas" required>
                        <option value="">Número de Parcelas</option>
                        <option value="1">1x de R$<?= round($valorTotal, 2) ?></option>
                        <option value="2">2x de R$<?= round($valorTotal/2, 2) ?></option>
                        <option value="3">3x de R$<?= round($valorTotal/3, 2) ?></option>
                        <option value="4">4x de R$<?= round($valorTotal/4, 2) ?></option>
                        <option value="5">5x de R$<?= round($valorTotal/5, 2) ?></option>
                        <option value="6">6x de R$<?= round($valorTotal/6, 2) ?></option>
                        <option value="7">7x de R$<?= round($valorTotal/7, 2) ?></option>
                        <option value="8">8x de R$<?= round($valorTotal/8, 2) ?></option>
                        <option value="9">9x de R$<?= round($valorTotal/9, 2) ?></option>
                        <option value="10">10x de R$<?= round($valorTotal/10, 2) ?></option>
                        <option value="11">11x de R$<?= round($valorTotal/11, 2) ?></option>
                        <option value="12">12x de R$<?= round($valorTotal/12, 2) ?></option>
                </select>

            <input type="text" name="ccnome" placeholder="Nome no Cartão de Crédito" required/>
            <input type="text" name="ccnum" placeholder="Número do Cartão de Crédito" required/>
            <input type="text" name="ccval" placeholder="Validade" required/>
            <input type="text" name="cccod" placeholder="Código de Segurança" required/>
            
             <!-- Dados para o backend -->
            <input type='hidden' name='data' value="<?= $data_ini ?>">
            <input type='hidden' name='periodo' value="<?= $periodo ?>">
            <input type='hidden' name='cidade' value="<?= $cidade ?>">
            <input type='hidden' name='placa' value="<?= $placa ?>">
            <input type='hidden' name='idLoja' value="<?= $idLoja ?>">
            <input type='hidden' name='valorTotal' value="<?= $valorTotal ?>">
            <input type="submit" value="Reservar">
        </form>
<?php
    }
} else {
    include "falha.php";
}

$conn->close();
include "html_fim.php";
?>