<?php
// Conexão com o banco de dados
include 'conexao.php';

// Inicia a sessão
session_start();

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $nome_usuario = $_POST['username'];
    $senha = $_POST['password'];

    // Consulta SQL para selecionar o usuário com as credenciais fornecidas
    $sql = "SELECT * FROM policiais WHERE nome_usuario = '$nome_usuario' AND senha = '$senha'";
    $resultado = $conexao->query($sql);

    if ($resultado->num_rows == 1) {
        // Usuário autenticado com sucesso
        $row = $resultado->fetch_assoc();
        $_SESSION['usuario_id'] = $row['id'];
        $_SESSION['permissao'] = $row['permissao'];

        // Redireciona o usuário para a página correta com base em suas permissões
        if ($_SESSION['permissao'] == 'owner') {
            header("Location: notificacoes.php");
        } else {
            echo "Você não tem permissão para acessar esta página.";
        }
    } else {
        header("Location: senha_incorreta.php");
    }
}

// Fecha a conexão com o banco de dados
$conexao->close();
?>

