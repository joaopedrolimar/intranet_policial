<?php
// Inicia a sessão
session_start();

// Verifica se o usuário já está logado
if (isset($_SESSION['usuario_id'])) {
    // Redireciona para a página inicial
    header("Location: home.php");
    exit;
}

// Restante do código da página
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles/estilo.css">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="validar_login.php" method="post">
            <div class="input-group">
                <label for="username">Usuário:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Senha:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Enviar</button>
            <p>Não tem uma conta? <a href="criar_conta.php">Criar Conta</a></p>

        </form>
    </div>
</body>
</html>
