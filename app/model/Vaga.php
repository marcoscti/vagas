<?php

namespace App\Model;

use App\Model\Sql;

class Vaga
{
    public function insertVaga($data)
    {
        try {
            $sql = "INSERT INTO vaga(pcd,titulo,salario,localizacao,descricao) VALUES(?,?,?,?,?)";
            Sql::setData($sql, $data);
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function deleteVaga($dados)
    {
        try {
            $sql = "DELETE * FROM vaga WHERE id=?";
            Sql::setData($sql, $dados);
            return true;
        } catch (\Exception $e) {
            echo $e;
        }
    }
    public function updateVaga($dados)
    {
        try {
            $sql = "UPDATE vaga SET pcd=?,titulo=?,salario=?,localizacao=?,descricao=? WHERE id=?";
            Sql::setData($sql, $dados);
            return true;
        } catch (\Exception $e) {
            echo $e;
        }
    }
    public function listVagas()
    {
        $sql = "SELECT * FROM vaga ORDER BY id DESC";
        $list = Sql::getList($sql);
        return $list;
    }
    public function findVaga()
    {
    }
}
