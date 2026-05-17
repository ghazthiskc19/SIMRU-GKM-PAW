import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';
import interactionPlugin from '@fullcalendar/interaction';
import idLocale from '@fullcalendar/core/locales/id';

document.addEventListener('DOMContentLoaded', () => {
    const calendarElement = document.getElementById('jadwal-calendar');
    const roomFilterGroup = document.getElementById('room-filter-group');
    const roomCheckboxes = document.querySelectorAll('.room-filter-checkbox');

    if (!calendarElement || !roomFilterGroup || !roomCheckboxes.length) {
        return;
    }

    // Ambil room yang dicentang
    const getCheckedRoomIds = () => {
        return Array.from(roomCheckboxes)
            .filter(cb => cb.checked)
            .map(cb => cb.value);
    };

    // FULLCALENDAR
    const calendar = new Calendar(calendarElement, {
        plugins: [dayGridPlugin, timeGridPlugin, interactionPlugin],
        initialView: 'timeGridWeek',
        firstDay: 1,
        locale: idLocale,
        height: '62vh',
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
            right: 'next',
        },

        // =========================
        // AJAX LOAD EVENTS (API LARAVEL)
        // =========================
        events: function(fetchInfo, successCallback, failureCallback) {
            const selectedRooms = getCheckedRoomIds();

            const query = selectedRooms
                .map(r => `rooms[]=${r}`)
                .join('&');

            fetch(`/api/jadwal?${query}`)
                .then(res => res.json())
                .then(data => successCallback(data))
                .catch(err => failureCallback(err));
        },

        // Format jam UI
        slotLabelFormat: {
            hour: 'numeric',
            minute: '2-digit',
            hour12: false,
        },

        eventTimeFormat: {
            hour: '2-digit',
            minute: '2-digit',
            hour12: false,
        },

        // Ubah ":" jadi "."
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

    // =========================
    // FILTER CHANGE (IMPORTANT)
    // =========================
    roomCheckboxes.forEach((checkbox) => {
        checkbox.addEventListener('change', () => {
            calendar.refetchEvents();
        });
    });

    // Enter key support
    roomFilterGroup.addEventListener('keydown', (e) => {
        if (e.key !== 'Enter') return;

        const activeElement = document.activeElement;

        if (
            !(activeElement instanceof HTMLInputElement) ||
            !activeElement.classList.contains('room-filter-checkbox')
        ) {
            return;
        }

        activeElement.checked = !activeElement.checked;
        calendar.refetchEvents();
    });

    // =========================
    // URL PARAM (auto select room)
    // =========================
    const params = new URLSearchParams(window.location.search);
    const roomFromQuery = params.get('ruangan');

    const roomMap = {
        '1': 'gkm-41',
        '2': 'gkm-42',
        '3': 'gkm-31',
        '4': 'gkm-lt1',
    };

    if (roomFromQuery && roomMap[roomFromQuery]) {
        const mappedRoom = roomMap[roomFromQuery];

        roomCheckboxes.forEach((checkbox) => {
            checkbox.checked = checkbox.value === mappedRoom;
        });

        calendar.refetchEvents();
    }

    // back button
    const backButton = document.querySelector('.header-back');
    backButton?.addEventListener('click', () => {
        window.history.back();
    });
});