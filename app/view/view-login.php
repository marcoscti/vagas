<?php
require "template" . DIRECTORY_SEPARATOR . "header.php";
?>
<div class="container-form">
    <div class="form-cadastro">
        <h1 class="txt-center pad-1">Login</h1>
        <form action="?action=logar" method="POST">
            <div class="row">
                <label for="titulo">Login</label>
                <input type="email" placeholder="email@email" name="email" required>
            </div>
            <div class="row">
                <label for="salario">Senha</label>
                <input type="password" placeholder="Senha" name="senha" required>
            </div>
            <div class="row">
                <button class="btn">Entrar</button>
            </div>
        </form>
    </div>
</div>