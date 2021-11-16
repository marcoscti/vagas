<?php
require "template" . DIRECTORY_SEPARATOR . "header.php";
?>

<div class="container-form">
    <div class="form-cadastro">
        <h1 class="txt-center pad-1">Anuncie a sua vaga aqui!</h1>
        <form action="?action=newvaga" method="POST">
            <div class="row">
                <label for="titulo">Título da vaga</label>
                <input type="text" placeholder="Título da Vaga" maxlength="40" minlength="3" name="titulo" required>
            </div>
            <div class="row">
                <label for="salario">Salário</label>
                <input type="number" placeholder="Salário" name="salario">
            </div>
            <div class="row">
                <label for="local">Local de Trabalho</label>
                <input type="text" placeholder="Local" maxlength="15" minlength="3" name="local" required>
            </div>
            <div class="row inline">
                <div>Vaga PCD?</div>
                <div><input type="radio" name="pcd" value="1">Sim</div>
                <div><input type="radio" name="pcd" value="0" checked>Não</div>
            </div>
            <div class="row">
                <label for="descricao">Descrição da vaga</label>
                <textarea rows="4" placeholder="Descrição" name="descricao" maxlength="120" required></textarea>
            </div>
            <div class="row">
                <button class="btn">Enviar Vaga</button>
            </div>
        </form>
    </div>
</div>
</body>

</html>