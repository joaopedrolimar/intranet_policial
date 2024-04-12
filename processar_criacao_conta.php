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

<?php
// Continuação do código anterior...

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Verifica se o email já está em uso
    $sql_verificar_email = "SELECT * FROM policiais WHERE email = '$email'";
    $resultado_verificar_email = $conexao->query($sql_verificar_email);
    
    if ($resultado_verificar_email->num_rows > 0) {
        echo "Este email já está em uso.";
    } else {
        // Insere os dados do novo policial no banco de dados
        $sql_inserir_policial = "INSERT INTO policiais (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
        
        if ($conexao->query($sql_inserir_policial) === TRUE) {
            echo "Conta criada com sucesso!";
            
            // Notifica o Owner sobre a nova conta
            $sql_notificacao_owner = "INSERT INTO notificacoes (mensagem) VALUES ('Nova conta criada: $nome - $email')";
            $conexao->query($sql_notificacao_owner);
            
            // Redireciona para a página de login ou para a home
            // header("Location: login.php");
        } else {
            echo "Erro ao criar conta: " . $conexao->error;
        }
    }
}

// Fecha a conexão com o banco de dados
$conexao->close();
?>

