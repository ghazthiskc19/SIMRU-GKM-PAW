import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';
import interactionPlugin from '@fullcalendar/interaction';
import idLocale from '@fullcalendar/core/locales/id';

document.addEventListener('DOMContentLoaded', () => {
    const calendarElement = document.getElementById('home-calendar');

    if (!calendarElement) {
        return;
    }

    const now = new Date();
    const year = now.getFullYear();
    const month = now.getMonth();
    const day = now.getDate();

    const calendar = new Calendar(calendarElement, {
        plugins: [dayGridPlugin, timeGridPlugin, interactionPlugin],
        initialView: 'timeGridWeek',
        firstDay: 1,
        locale: idLocale,
        height: '60vh',
        expandRows: true,
        allDaySlot: false,
        slotMinTime: '05:00:00',
        slotMaxTime: '24:00:00',
        slotDuration: '01:00:00',
        slotLabelInterval: '01:00:00',
        nowIndicator: true,
        headerToolbar: {
            left: 'prev',
            center: 'title',
            right: 'next'
        },
        
        // Format options
        dayHeaderFormat: { day: 'numeric' },
        slotLabelFormat: {
            hour: 'numeric',
            minute: '2-digit',
            hour12: false,
        },
        eventTimeFormat: {
            hour: 'numeric',
            minute: '2-digit',
            hour12: false,
        },
        events: function(fetchInfo, successCallback, failureCallback) {
            fetch('/api/jadwal')
                .then(res => res.json())
                .then(data => successCallback(data))
                .catch(err => failureCallback(err));
        },
        
        // Hooks untuk format time dengan dot
        slotLabelDidMount(info) {
            const labelEl = info.el.querySelector('.fc-timegrid-slot-label-cushion');
            
            if (labelEl && labelEl.textContent) {
                labelEl.textContent = labelEl.textContent.replace(':', '.');
            }
        },
        eventDidMount(info) {
            const timeEl = info.el.querySelector('.fc-event-time');
            if (timeEl?.textContent) {
                timeEl.textContent = timeEl.textContent.replace(/:/g, '.');
            }
        },
    });

    calendar.render();
});
