<?php

use App\Controller\ControllerUsuario;

require "autoload.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/card.css">
    <link rel="stylesheet" href="css/layout.css">
    <title>Vagas</title>
</head>

<body>
    <nav>
        <div class="navegacao">
            <div class="logo">
                <a href="index.php"><img src="img/logo.png">Fake.dev</a>
            </div>
            <ul class="menu">
                <?php if (!isset($_SESSION['logado'])) : ?>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="?action=login">Login</a></li>
                <?php else : ?>
                    <li><a href="#"><?= $_SESSION['logado'][0]['nome'] ?></a></li>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="?action=list-vagas">Lista de Vagas</a></li>
                    <li><a href="?action=vaga">Anunciar Vaga</a></li>
                    <li><a href="?action=logout">Logout</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>