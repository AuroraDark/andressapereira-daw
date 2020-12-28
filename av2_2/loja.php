<?php
    require "conexao.php";
    include "html_inicio.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {		
        $cidade = $_POST["cidade"];
        $periodo = $_POST["periodo"];
        $data_ini = $_POST["data_ini"];
        $placa = $_POST["carro"];

        $sql = "SELECT * FROM lojas WHERE idCidade = '$cidade'";
$resultado = $conn->query($sql);

$lojas = [];

if($resultado->num_rows > 0){
    $lojas = $resultado->fetch_all(MYSQLI_ASSOC);
}
?>

<h1>Em qual loja deseja buscar o carro?</h1>
<form method="POST" action="tela_confirmacao.php">
<select name="loja" id="loja" required>
                    <?php foreach($lojas as $linha){?>
                        <option value="<?=$linha['idLoja']?>"> Loja <?=$linha['idLoja']?> - <?=$linha['endereco']?> </option>
                    <?php } ?>
                </select><br><br>
                <input type='hidden' name='data_ini' value="<?=$data_ini?>">
                <input type='hidden' name='periodo' value="<?=$periodo?>">
                <input type='hidden' name='cidade' value="<?=$cidade?>">
                <input type='hidden' name='placa' value="<?=$placa?>">
                <input type="submit" value="Continuar">
</form>
<?php
    }else {
        include "falha.php";
    }
    $conn->close();
    include "html_fim.php";
?>