function preencherCidades(){
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){

        if (this.readyState == 4 && this.status == 200) {
        try { //lê o json provido pelo cidades.php e converte para um objeto.
            let cidadesJSON = JSON.parse(this.responseText);
            console.log(cidadesJSON);
            
            //preenche as opções do select na tela1.
            for(var i = 0; i < cidadesJSON.length; i++){        
                let option = document.createElement("option");
                option.setAttribute("value", cidadesJSON[i]["idCidade"]);
                option.innerHTML = cidadesJSON[i]["cidade"];
                document.getElementById("cidade").appendChild(option);
            }
            //caso dê erro, o select será preenchido com este aviso.
        } catch(err){
            let option = document.createElement("option");
            option.setAttribute("value", "erro");
            option.innerHTML = "Erro!";
            document.getElementById("cidade").appendChild(option);
        }
    }

    }
    xhttp.open("GET", "cidades.php", true);
    xhttp.send();
}
