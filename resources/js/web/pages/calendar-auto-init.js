document.addEventListener('DOMContentLoaded', function () {
    const calendarContainers = document.querySelectorAll('[data-calendar-init="true"]');
    
    calendarContainers.forEach(container => {
        const selectedMonth = parseInt(container.dataset.selectedMonth);
        const selectedYear = parseInt(container.dataset.selectedYear);
        const nowYear = parseInt(container.dataset.nowYear);
        const nowMonth = parseInt(container.dataset.nowMonth);
        const nowDay = parseInt(container.dataset.nowDay);

        if (typeof window.initCalendar === 'function') {
            window.initCalendar(selectedMonth, selectedYear, nowYear, nowMonth, nowDay);
        }
    });
});
