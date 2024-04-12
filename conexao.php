<?php
// Configurações do banco de dados
$host = 'localhost';
$user = 'root';
$senha = 'root';
$banco = 'intranet_db';

// Conexão com o banco de dados
$conexao = new mysqli($host, $user, $senha, $banco);

// Verifica se ocorreu algum erro na conexão
if ($conexao->connect_error) {
    die('Erro de conexão: ' . $conexao->connect_error);
}
?>
