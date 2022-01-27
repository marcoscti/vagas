<?php

namespace App\Controller;

class ControllerMain
{

    public static function home()
    {
        require "./app/view/view-main.php";
    }

    public static function novaVaga()
    {
        require "./app/view/view-form-vaga.php";
    }

    public static function erro404()
    {
        require "./app/view/404.php";
    }

    public static function listVagas()
    {
        require "./app/view/view-vagas.php";
    }
    public static function editarVaga($id){
        header("location:index.php?action=vaga&id=$id");
    }
}