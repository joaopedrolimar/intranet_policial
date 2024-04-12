<?php
// Inicia a sessão
session_start();
?>

<?php
// Inicia a sessão
session_start();

// Verifica se o usuário não está logado
if (!isset($_SESSION['usuario_id'])) {
    // Redireciona para a página de login
    header("Location: login.php");
    exit;
}

// Restante do código da página
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <!-- Adicionar link para o arquivo CSS do FullCalendar -->
    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.min.css' rel='stylesheet' />
    <!-- Adicionar script da biblioteca FullCalendar -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>
</head>
<body>

    <?php include 'header.php'; ?>

<div id='calendar'></div>

<div>
    <!-- Botões de seleção de policial -->
    <button onclick="carregarEventos('policial1')">Policial 1</button>
    <button onclick="carregarEventos('policial2')">Policial 2</button>
    <button onclick="carregarEventos('policial3')">Policial 3</button>
    <!-- Adicione botões para cada policial -->
</div>

<!-- Script JavaScript para carregar eventos -->
<script>
    // Função para carregar eventos do calendário
    function carregarEventos(policial) {
        // Simula carregamento de eventos do banco de dados
        var eventos = [
            {
                title: 'Evento 1',
                start: '2024-04-12'
            },
            {
                title: 'Evento 2',
                start: '2024-04-15'
            }
            // Adicione mais eventos conforme necessário
        ];

        // Adiciona os eventos ao calendário
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            events: eventos
        });
        calendar.render();
    }
</script>

</body>
</html>

