import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from '@fullcalendar/interaction';

document.addEventListener('DOMContentLoaded', function () {
    const calendarEl = document.getElementById('calendar');
    const tableEl = document.getElementById('finance-table');
    const dateEl = document.getElementById('selected-date');
    const entriesEl = document.getElementById('finance-entries');

    const calendar = new Calendar(calendarEl, {
        plugins: [dayGridPlugin, interactionPlugin],
        initialView: 'dayGridMonth',
        dateClick: function (info) {
            tableEl.style.display = 'block';
            dateEl.textContent = info.dateStr;
            entriesEl.innerHTML = ''; // Limpiar las entradas previas
        },
    });
    calendar.render();

    const form = document.getElementById('finance-form');
    form.addEventListener('submit', (e) => {
        e.preventDefault();
    
        const type = document.getElementById('type').value;
        const reason = document.getElementById('reason').value;
        const amount = document.getElementById('amount').value;
        const date = document.getElementById('selected-date').textContent;
    
        fetch('/finances', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: JSON.stringify({ type, reason, amount, date }),
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.message) {
                    alert(data.message);
                    const newRow = document.createElement('tr');
                    newRow.innerHTML = `<td>${type}</td><td>${reason}</td><td>$${amount}</td>`;
                    entriesEl.appendChild(newRow);
                    form.reset();
                }
            })
            .catch((error) => console.error('Error:', error));
    });    
});
