<?php

use App\Model\Vaga;

require "template" . DIRECTORY_SEPARATOR . "header.php";
?>
<?php if (isset($_GET['id'])) :
    $vaga = new Vaga();
    $result = $vaga->buscarVaga($_GET['id']);

?>
    <div class="container-form">
        <div class="form-cadastro">
            <h1 class="txt-center pad-1">Anuncie a sua vaga aqui!</h1>
            <form action="?action=insert-vaga" method="POST">
                <input type="hidden" name="id" value="<?= $result[0]['id'] ?>">
                <div class="row">
                    <label for="titulo">Título da vaga</label>
                    <input type="text" value="<?= $result[0]['titulo'] ?>" maxlength="40" minlength="3" name="titulo" required>
                </div>
                <div class="row">
                    <label for="salario">Salário</label>
                    <input type="number" name="salario" value="<?= $result[0]['salario'] ?>">
                </div>
                <div class="row">
                    <label for="local">Local de Trabalho</label>
                    <input type="text" maxlength="15" minlength="3" name="local" required value="<?= $result[0]['localizacao'] ?>">
                </div>
                <div class="row inline">
                    <div>Vaga PCD?</div>
                    <?php
                    if ($result[0]['pcd']) :
                    ?>
                        <div><input type="radio" name="pcd" value="1" checked>Sim</div>
                        <div><input type="radio" name="pcd" value="0">Não</div>
                    <?php
                    else :
                    ?>
                        <div><input type="radio" name="pcd" value="1">Sim</div>
                        <div><input type="radio" name="pcd" value="0" checked>Não</div>
                    <?php
                    endif;
                    ?>

                </div>
                <div class="row">
                    <label for="descricao">Descrição da vaga</label>
                    <textarea rows="4" name="descricao" maxlength="120" required><?= $result[0]['localizacao'] ?></textarea>
                </div>
                <div class="row">
                    <button class="btn">Atualizar Vaga</button>
                </div>
            </form>
        </div>

    <?php else : ?>
        <div class="container-form">
            <div class="form-cadastro">
                <h1 class="txt-center pad-1">Anuncie a sua vaga aqui!</h1>
                <form action="?action=insert-vaga" method="POST">
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
    <?php endif ?>

    </body>

    </html>