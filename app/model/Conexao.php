<?php

namespace App\Model;

class Conexao
{
    public static $conexao;

    public static function conectar()
    {
        if (!isset(self::$conexao)) {
            try {
                // Cria a conexão primeiro
                self::$conexao = new \PDO("mysql:host=db:3306;dbname=vagas;charset=utf8", "marcoscti", "admin");
                
                // Agora define o modo de erro
                self::$conexao->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            
            } catch (\PDOException $e) {
                // Exibe o erro de conexão
                die("Erro de conexão: " . $e->getMessage());
            }
        }
        return self::$conexao;
    }
}
