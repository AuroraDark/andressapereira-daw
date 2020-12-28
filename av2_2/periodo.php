<?php
    require "conexao.php";
    include "html_inicio.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {		
        $cidade = $_POST["cidade"];
?>

<script>
            //validação se a data é posterior ao dia atual.
			function validaData(){
				var data = document.getElementById("data_ini").value;
				console.log(data);
				data = data.split("-");
				data = new Date(data[0],data[1],data[2]);
				data = data.getTime();
				var data_hoje = Date.now();
				data_hoje = data_hoje + (30*24*60*60*1000);
				if(data < data_hoje){
					alert("A data deve ser a partir do dia de hoje.");
					document.getElementById("data_ini").value="";
					return false;
				}else{
					return true;
				}
			}
		</script>

<h1>Por quanto tempo deseja alugar o carro?</h1>
<form method="POST" action="carros.php">
                <b><p>A partir do dia</p></b>
                <input type='date' name='data_ini' id="data_ini" required>
               <b> <p>Durante</p></b>
                <select name="periodo" id="periodo">
                        <option value="">Selecione a quantidade de dias</option>
                        <option value="7">7 dias</option>
                        <option value="15">15 dias</option>
                        <option value="30">30 dias</option>
                </select><br><br>

                <input type='hidden' name='cidade' value="<?=$cidade?>">
                <input type="submit" onclick="validaData()" value="Continuar">
</form>
<?php
    
    }else {
        include "falha.php";
    }
    $conn->close();
    include "html_fim.php";
?>