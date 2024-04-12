<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Conta</title>

    <link rel="stylesheet" href="styles/criar_conta.css">
</head>
<body>
    <div class="criar-container">
        <h2>Criar Conta</h2>
        <form action="processar_criacao_conta.php" method="post">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required><br><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required><br><br>
            <!-- Outros campos conforme necessário -->
            <button type="submit">Enviar</button>
            <p>Ja tem conta? <a href="login.php">Voltar para login</a></p>
        </form>
    </div>
</body>
</html>
