<?php
require "template" . DIRECTORY_SEPARATOR . "header.php";

use App\Controller\ControllerUsuario;
use App\Model\Vaga;

$vaga = new Vaga();
$list = $vaga->listVagas();
ControllerUsuario::verifySession();
?>

<?php
//Código abaixo utilizado para devolver a resposta do servidor para a view
if (isset($_SESSION['response'])) {
    echo "<div style='margin-bottom:1rem;padding:.9rem;background-color: rgb(0, 162, 255);text-align:center;' class='container-form'>" . $_SESSION['response'] . "</div>";
    session_unset();
}
?>
<div class="container-cards">
    <?php
    //Validação 
    if (count($list) > 0) : ?>
        <table>
            <thead>
                <th>#</th>
                <th>Título</th>
                <th>Publicação</th>
                <th>Ações</th>
            </thead>
            <tbody>
                <?php foreach ($list as $v) :
                ?>
                    <tr>
                        <td><?= $v['id'] ?></td>
                        <td><?= $v['titulo'] ?></td>
                        <td><?= date("d M Y", strtotime($v['publicacao'])) ?> ás <?= date("H:i", strtotime($v['publicacao'])) ?></td>
                        <td>
                            <a href="?action=editar&id=<?= $v['id'] ?>">Editar</a>
                            <a href="?action=excluir&id=<?= $v['id'] ?>">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <h2 style="text-align:center;width:100%" class="view-message">
            Não Existem vagas no momento!
        </h2>
    <?php endif; ?>
</div>
</body>

</html>