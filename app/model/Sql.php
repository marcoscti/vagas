<?php
namespace App\Model;
use App\Model\Conexao;
class Sql
{
    public static function setData($sql, $dados)
    {
        try {
            $stm = Conexao::conectar()->prepare($sql);
            $stm->execute($dados);
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function getList($sql)
    {
        try {
            $stm = Conexao::conectar()->query($sql);
            return $stm->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
