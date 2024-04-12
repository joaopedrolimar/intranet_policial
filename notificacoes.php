<?php
// Inicia a sessão
session_start();

// Verifica se o usuário não está logado
if (!isset($_SESSION['usuario_id'])) {
    // Redireciona para a página de login
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aprovar Contas</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'header.php'; ?> <!-- Inclui o cabeçalho -->
    <div class="content">
        <?php
        // Conexão com o banco de dados
        include 'conexao.php';

        // Verifica se a notificação foi marcada como aprovada
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['aprovar'])) {
            // Obter o ID da notificação a ser aprovada
            $id_notificacao = $_POST['id_notificacao'];

            // Atualizar o status da conta para aprovada no banco de dados
            $sql_aprovar_conta = "UPDATE policiais SET aprovado = TRUE WHERE id = $id_notificacao";
            if ($conexao->query($sql_aprovar_conta) === TRUE) {
                echo "Conta aprovada com sucesso!";
            } else {
                echo "Erro ao aprovar conta: " . $conexao->error;
            }
        }

        // Consulta SQL para selecionar todas as notificações não lidas
        $sql = "SELECT * FROM notificacoes WHERE lida = FALSE";
        $resultado = $conexao->query($sql);

        if ($resultado->num_rows > 0) {
            // Exibir as notificações
            while ($row = $resultado->fetch_assoc()) {

                // Exibir a mensagem da notificação
                echo $row['mensagem'];

                // Formulário para aprovar a notificação
                echo "<form method='post'>";
                echo "<input type='hidden' name='id_notificacao' value='" . $row['id'] . "'>";
                echo "<button type='submit' name='aprovar'>Aprovar</button>";
                echo "</form>";
            }
        } else {
            echo "Não há novas notificações.";
        }

        // Fechar a conexão com o banco de dados
        $conexao->close();
        ?>
    </div>
</body>
</html>



