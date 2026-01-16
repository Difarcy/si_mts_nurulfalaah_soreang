/**
 * Calendar Functions
 * Digunakan untuk menampilkan dan navigasi kalender
 * Dipakai di: agenda.blade.php, info-terkini.blade.php
 */

window.initCalendar = function(selectedMonth, selectedYear, nowYear, nowMonth, nowDay) {
    let currentCalendarMonth = selectedMonth;
    let currentCalendarYear = selectedYear;
    const today = new Date(nowYear, nowMonth - 1, nowDay);

    const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    const daysShort = ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'];

    function getDaysInMonth(month, year) {
        return new Date(year, month, 0).getDate();
    }

    function getFirstDayOfMonth(month, year) {
        const firstDay = new Date(year, month - 1, 1);
        return firstDay.getDay();
    }

    function isToday(date, month, year) {
        return date === today.getDate() &&
               month === today.getMonth() + 1 &&
               year === today.getFullYear();
    }

    function renderCalendar(month, year) {
        const calendarTitle = document.getElementById('calendar-title');
        const calendarGrid = document.getElementById('calendar-grid');
        if (!calendarTitle || !calendarGrid) return;

        calendarTitle.textContent = `${months[month - 1]} ${year}`;
        calendarGrid.innerHTML = '';

        daysShort.forEach(day => {
            const header = document.createElement('div');
            header.className = 'text-xs font-semibold text-gray-600 dark:text-slate-400 py-1';
            header.textContent = day;
            calendarGrid.appendChild(header);
        });

        const daysInMonth = getDaysInMonth(month, year);
        const firstDay = getFirstDayOfMonth(month, year);

        const prevMonth = month === 1 ? 12 : month - 1;
        const prevYear = month === 1 ? year - 1 : year;
        const daysInPrevMonth = getDaysInMonth(prevMonth, prevYear);

        for (let i = firstDay - 1; i >= 0; i--) {
            const day = daysInPrevMonth - i;
            const dayElement = document.createElement('div');
            dayElement.className = 'aspect-square flex items-center justify-center text-xs text-gray-400 dark:text-slate-500 hover:bg-gray-100 dark:hover:bg-slate-700 hover:rounded transition-colors cursor-pointer';
            dayElement.textContent = day;
            calendarGrid.appendChild(dayElement);
        }

        for (let day = 1; day <= daysInMonth; day++) {
            const dayElement = document.createElement('div');
            const isTodayDate = isToday(day, month, year);
            dayElement.className = `aspect-square flex items-center justify-center text-xs text-gray-900 dark:text-slate-100 hover:bg-gray-100 dark:hover:bg-slate-700 hover:rounded transition-colors cursor-pointer ${isTodayDate ? 'bg-green-700 text-white rounded font-bold' : ''}`;
            dayElement.textContent = day;
            calendarGrid.appendChild(dayElement);
        }

        const totalCells = calendarGrid.children.length;
        const remainingCells = 42 - totalCells;

        const nextMonth = month === 12 ? 1 : month + 1;
        const nextYear = month === 12 ? year + 1 : year;

        for (let day = 1; day <= remainingCells; day++) {
            const dayElement = document.createElement('div');
            dayElement.className = 'aspect-square flex items-center justify-center text-xs text-gray-400 dark:text-slate-500 hover:bg-gray-100 dark:hover:bg-slate-700 hover:rounded transition-colors cursor-pointer';
            dayElement.textContent = day;
            calendarGrid.appendChild(dayElement);
        }
    }

    window.changeCalendarMonth = function(direction) {
        currentCalendarMonth += direction;

        if (currentCalendarMonth < 1) {
            currentCalendarMonth = 12;
            currentCalendarYear--;
        } else if (currentCalendarMonth > 12) {
            currentCalendarMonth = 1;
            currentCalendarYear++;
        }

        renderCalendar(currentCalendarMonth, currentCalendarYear);

        const url = new URL(window.location.href);
        url.searchParams.set('cal_month', currentCalendarMonth);
        url.searchParams.set('cal_year', currentCalendarYear);
        window.history.pushState({}, '', url.toString());
    };

    // Initial render
    renderCalendar(currentCalendarMonth, currentCalendarYear);
};

