document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendario');
  
    var calendar = new FullCalendar.Calendar(calendarEl, {
      // Configurações do calendário
      plugins: [ 'dayGrid', 'interaction' ],
      locale: 'pt-br',
      initialView: 'dayGridMonth',
      // Outras opções...
    });
  
    calendar.render();
  });
  