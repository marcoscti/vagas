<?php
/**
 * Arquivo responsável por processar as requisições automáticas dos arquivos do projeto
 */
spl_autoload_register(function ($class) {
    $baseDir = __DIR__ . '/'; // Diretório base do projeto
    $file = $baseDir . str_replace('\\', '/', $class) . '.php';
    
    if (file_exists($file)) {
        
        require $file;

    } else {
        die("Erro: Arquivo $file não encontrado!");
    }
});