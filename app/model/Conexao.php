<?php

namespace App\Model;

class Conexao
{
    public static $conexao;

    public static function conectar()
    {
        if (!isset(self::$conexao)) {
            //Está conectando o PHP ao driver do Mysql
            self::$conexao = new \PDO("mysql:host=localhost;dbname=vagas;charset=utf8", "root", "");
            //PDO::ATTR_ERRMODE: Error reporting
            //PDO::ERRMODE_EXCEPTION: Throw exceptions.
            self::$conexao->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }
        return self::$conexao;
    }
}
