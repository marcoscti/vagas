<?php
require "template" . DIRECTORY_SEPARATOR . "header.php";

use App\Model\Vaga;

$vaga = new Vaga();
$list = $vaga->listVagas();
?>
<div class="formulario">
    <h1>Procurando uma oportunidade de trabalho?</h1>
    <form action="#">
        <input type="text" placeholder="Buscar Vaga">
        <button class="btn">Confirmar</button>
    </form>
</div>

<?php
//Código abaixo utilizado para devolver a resposta do servidor para a view
if (isset($_SESSION['response'])) {
    echo "<div style='margin-bottom:1rem;padding:.9rem;background-color: rgb(0, 162, 255);text-align:center;' class='container-form'>" . $_SESSION['response'] . "</div>";
    session_unset();
}
?>
<div class="container-cards">
    <?php
    if (count($list) > 0) :

        foreach ($list as $v) :
    ?>
            <!--Card-->
            <div class="card">
                <?= $v['pcd'] ? '<div class="card-header red">' : '<div class="card-header blue">' ?>

                <div class="item">
                    <?= $v['pcd'] ? '<img src="img/Wheelchair.png">' : '<img src="img/bag.png">' ?>
                </div>
                <div class="item">
                    <h3><?= $v['titulo'] ?></h3>
                </div>
            </div>
            <div class="card-body">
                <strong>R$ <?= number_format($v['salario'], 2, ",", ".");

                            ?></strong>
                <strong><?= $v['localizacao'] ?></strong>
                <p class="descricao"><?= $v['descricao'] ?></p>

            </div>
            <div class="card-footer">
                <small>Publicado : <?= date("d M Y", strtotime($v['publicacao'])) ?> ás <?= date("H:i", strtotime($v['publicacao'])) ?></small>
            </div>
</div>
<!--Fim Card-->
<?php
        endforeach;
    else : ?>
<h2 style="text-align:center;width:100%" class="view-message">
    Não Existem vagas no momento!
</h2>
<?php endif; ?>
</div>
</body>

</html>