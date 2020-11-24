<?php

require 'conexao.php';
    
?>
        <form method="POST" action="listando_matriculas.php">

                <label for="disciplinas">Selecione a disciplina:</label>
                <select name="disciplina" id="disciplina">
                    <?php foreach($disciplinas as $linha){?>
                        <option value="<?=$linha['codDisciplina']?>" > <?=$linha['nome']?> </option>
                    <?php } ?>
                </select><br><br>

                <label for="turmas">Selecione a turma:</label>
                <select name="turma" id="turm">
                    <?php foreach($turmas as $linha){?>
                        <option value="<?=$linha['codTurma']?>" > <?=$linha['turno']?> </option>
                    <?php } ?>
                </select><br><br>

                <input type="submit" value="Enviar">
        </form>

