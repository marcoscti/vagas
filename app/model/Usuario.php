<?php

namespace App\Model;

class Usuario
{
    public function insertUsuario($data)
    {
        try {
            $sql = "INSERT INTO usuario (nome, email, senha) VALUES (?,?,?)";
            Sql::setData($sql, $data);
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    
    public function deleteUsuario($dados)
    {
        try {
            $sql = "DELETE FROM usuario WHERE idusuario=?";
            Sql::setData($sql, [$dados]);
            return true;
        } catch (\Exception $e) {
            echo $e;
        }
    }

    public function updateUsuario($dados)
    {
        try {
            $sql = "UPDATE usuario SET nome=?,email=? WHERE idusuario=?";
            Sql::setData($sql, $dados);
            return true;
        } catch (\Exception $e) {
            echo $e;
        }
    }

    public function listUsuario()
    {
        $sql = "SELECT * FROM usuario ORDER BY idusuario DESC";
        $list = Sql::getList($sql);
        return $list;
    }

    public function buscarUsuario($email)
    {
        try {
            $sql = "SELECT * FROM usuario WHERE email = ?";
            $list = Sql::getData($sql, [$email]);
            return $list;
        } catch (\Exception $e) {
            echo "ERRO: " . $e;
        }
    }
}
