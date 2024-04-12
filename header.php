<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intranet Policial</title>
    <link rel="stylesheet" href="styles/header.css">
</head>
<body>
    <header class="header">
    <div class="logo">
        <img src="#" alt="">
        Intranet Policial
    </div>
        <nav>
            <ul>
                <li><a href="index.php" class="nav-link" >Home</a></li>
                <li><a href="missões.php" class="nav-link" >Missões</a></li>
                <li><a href="afastamentos.php" class="nav-link" >Afastamentos</a></li>
                <?php if ($_SESSION['permissao'] == 'owner'): ?>
                    <li><a href="notificacoes.php" class="nav-link" >Aprovar Contas</a></li>
                <?php endif; ?>
                <li><a href="logout.php">Sair</a></li>
            </ul>
        </nav>
    </header>
    <main>
