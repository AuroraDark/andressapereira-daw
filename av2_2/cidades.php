<?php
    require "conexao.php";

    $sql = "SELECT * FROM cidades";
    $resultado = $conn->query($sql);

    $cidades = [];

    if($resultado->num_rows > 0){
    $cidades = $resultado->fetch_all(MYSQLI_ASSOC);
    }

    $listacidadesjson = json_encode($cidades);
    echo $listacidadesjson;

    $conn->close();

?>