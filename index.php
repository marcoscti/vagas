<?php

/**
 * Este arquivo é responsável por gerenciar as rotas da aplicação processando as ações dos controladores.
 */
session_start();
setlocale(LC_ALL, 'pt_BR');
require "autoload.php";

use App\Controller\ControllerVaga;
use App\Controller\ControllerMain;
use App\Controller\ControllerUsuario;
use App\Model\Vaga;

//Verifica se existe uma action via URI se não existir retorna a view Home.
if (isset($_GET['action'])) {
    //Verifica a Ação requisitada, se não houver cai no Erro 404
    switch ($_GET['action']) {
        case "logar":
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                ControllerUsuario::logar();
            } else {
                ControllerVaga::redirect();
            }
            break;
        case "logout":
            ControllerUsuario::logout();
            break;
        case "vaga":
            ControllerMain::novaVaga();
            break;
        case "login":
            ControllerMain::viewLogin();
            break;
            //Case para inserir a vaga
        case "insert-vaga":
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                ControllerVaga::inserirVaga();
            }
            break;
        case "list-vagas":
            ControllerMain::listVagas();
            break;
        case "editar":
            ControllerMain::editarVaga($_GET['id']);
            break;
        case "excluir":
            $vaga = new Vaga();
            $vaga->deleteVaga($_GET['id']);
            ControllerVaga::redirect("action=list-vagas");
            break;
            //Se não houver requisição retorna a página de erro
        default:
            ControllerMain::erro404();
            break;
    }
} else {
    ControllerMain::home();
}
