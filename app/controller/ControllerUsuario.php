<?php

namespace App\Controller;

use App\Model\Usuario;

class ControllerUsuario
{
    public static function logar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Passo 1: Receber dados via post
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            //Passo 2: Verificar se ele existe no BD
            $usuario = new Usuario();
            $find = $usuario->buscarUsuario($email);
            if (count($find) > 0) {
                
                if (password_verify($senha,$find[0]['senha'])) {

                    $_SESSION['logado'] = $find;
                    ControllerVaga::redirect();
                    
                } else {
                    echo "Usuário ou senha Inválidos";
                }
            } else {
                echo "Usuário não localizado";
            }
        }
    }
    public static function verifySession(){
        if(!isset($_SESSION['logado'])){
            ControllerVaga::redirect();
        }
    }
    public static function logout(){
        session_destroy();
        ControllerVaga::redirect();
    }
    public static function createUsuario($nome,$email,$senha){

        $data = [
            $nome,
            $email,
            password_hash($senha,PASSWORD_DEFAULT),
        ];

        $user = new Usuario();

        return $user->insertUsuario($data);

    }
}
