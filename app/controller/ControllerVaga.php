<?php

namespace App\Controller;

use App\Model\Vaga;

class ControllerVaga
{
    //Função para realizar a inserção de dados no banco.
    public static function inserirVaga()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['pcd'])) {

            $data = [
                0 => $_POST['pcd'],
                1 => $_POST['titulo'],
                2 => $_POST['salario'],
                3 => $_POST['local'],
                4 => $_POST['descricao'],
            ];
            $vaga = new Vaga();

            if (isset($_POST['id'])) {
                array_push($data,$_POST['id']);
                if ($vaga->updateVaga($data)) {
                    $_SESSION['response'] = "Vaga Atualizada com sucesso";
                    ControllerVaga::redirect();
                } else {
                    return $_SESSION['response'] = "Erro ao Cadastrar vaga!";
                }
            } else {
                if ($vaga->insertVaga($data)) {
                    $_SESSION['response'] = "Nova Vaga Cadastrada com sucesso";
                    ControllerVaga::redirect();
                } else {
                    return $_SESSION['response'] = "Erro ao Cadastrar vaga!";
                }
            }
        }
    }

    public static function redirect($to = "")
    {
        if (!empty($to) && isset($to)) {
            header("location:index.php?$to");
        } else {
            header("location:index.php");
        }
    }
}
