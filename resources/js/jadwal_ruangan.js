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

    const now = new Date();
    const year = now.getFullYear();
    const month = now.getMonth();
    const day = now.getDate();

    const allEvents = [
        {
            // titlenya sesuaikan dengan Nama Room nya
            title: 'GKM 4.1',
            start: new Date(year, month, day, 7, 0),
            end: new Date(year, month, day, 10, 0),
            extendedProps: { roomId: 'gkm-41' },
        },
        {
            title: 'GKM 4.1',
            start: new Date(year, month, day, 11, 0),
            end: new Date(year, month, day, 13, 0),
            extendedProps: { roomId: 'gkm-41' },
        },
        {
            title: 'GKM 4.1 ',
            start: new Date(year, month, day, 14, 0),
            end: new Date(year, month, day, 16, 0),
            extendedProps: { roomId: 'gkm-41' },
        },
        {
            title: 'GKM 4.2',
            start: new Date(year, month, day + 1, 8, 0),
            end: new Date(year, month, day + 1, 10, 0),
            extendedProps: { roomId: 'gkm-42' },
        },
        {
            title: 'GKM 3.1',
            start: new Date(year, month, day + 2, 13, 0),
            end: new Date(year, month, day + 2, 15, 0),
            extendedProps: { roomId: 'gkm-31' },
        },
        {
            title: 'GKM Lt.1',
            start: new Date(year, month, day + 3, 9, 0),
            end: new Date(year, month, day + 3, 12, 0),
            extendedProps: { roomId: 'gkm-lt1' },
        },
    ];

    const getCheckedRoomIds = () => {
        return Array.from(roomCheckboxes)
            .filter((checkbox) => checkbox.checked)
            .map((checkbox) => checkbox.value);
    };

    const getFilteredEvents = (selectedRooms) => {
        if (!selectedRooms.length) {
            return [];
        }

        if (selectedRooms.length === roomCheckboxes.length) {
            return allEvents;
        }

        return allEvents.filter((event) => selectedRooms.includes(event.extendedProps.roomId));
    };

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
        dayHeaderFormat: { weekday: 'long', day: 'numeric', month: 'long' },
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
        events: getFilteredEvents(getCheckedRoomIds()),
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
        calendar.removeAllEvents();
        calendar.addEventSource(getFilteredEvents(getCheckedRoomIds()));
    }

    roomCheckboxes.forEach((checkbox) => {
        checkbox.addEventListener('change', () => {
            const selectedRooms = getCheckedRoomIds();
            calendar.removeAllEvents();
            calendar.addEventSource(getFilteredEvents(selectedRooms));
        });
    });

    roomFilterGroup.addEventListener('keydown', (e) => {
        if (e.key !== 'Enter') {
            return;
        }

        const activeElement = document.activeElement;
        if (!(activeElement instanceof HTMLInputElement) || !activeElement.classList.contains('room-filter-checkbox')) {
            return;
        }

        activeElement.checked = !activeElement.checked;
        const selectedRooms = getCheckedRoomIds();
        calendar.removeAllEvents();
        calendar.addEventSource(getFilteredEvents(selectedRooms));
    });

    const backButton = document.querySelector('.header-back');
    backButton?.addEventListener('click', () => {
        window.history.back();
    });
});
