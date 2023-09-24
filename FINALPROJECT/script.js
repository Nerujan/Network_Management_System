const datesContainer = document.getElementById("dates");
const prevMonthBtn = document.getElementById("prevMonthBtn");
const nextMonthBtn = document.getElementById("nextMonthBtn");
const currentMonthElement = document.getElementById("currentMonth");

let currentMonth = new Date().getMonth();
let currentYear = new Date().getFullYear();

function updateCalendar() {
    const months = [
        "January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
    ];
    const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();
    const firstDayIndex = new Date(currentYear, currentMonth, 1).getDay();

    currentMonthElement.textContent = `${months[currentMonth]} ${currentYear}`;
    datesContainer.innerHTML = "";

    for (let i = 0; i < firstDayIndex; i++) {
        const dateElement = document.createElement("div");
        dateElement.classList.add("date", "empty");
        datesContainer.appendChild(dateElement);
    }

    for (let i = 1; i <= daysInMonth; i++) {
        const dateElement = document.createElement("div");
        dateElement.classList.add("date");
        dateElement.textContent = i;
        datesContainer.appendChild(dateElement);
    }
}
const prevYearBtn = document.getElementById("prevYearBtn");
const nextYearBtn = document.getElementById("nextYearBtn");

prevYearBtn.addEventListener("click", () => {
    currentYear--;
    updateCalendar();
});

nextYearBtn.addEventListener("click", () => {
    currentYear++;
    updateCalendar();
});

function updateCalendar() {
    const months = [
        "January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
    ];
    const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();
    const firstDayIndex = new Date(currentYear, currentMonth, 1).getDay();

    currentMonthElement.textContent = `${months[currentMonth]} ${currentYear}`;
    datesContainer.innerHTML = "";

    const currentDate = new Date();
    const currentDay = currentDate.getDate();
    const currentMonthToday = currentDate.getMonth();
    const currentYearToday = currentDate.getFullYear();

    for (let i = 0; i < firstDayIndex; i++) {
        const dateElement = document.createElement("div");
        dateElement.classList.add("date", "empty");
        datesContainer.appendChild(dateElement);
    }

    for (let i = 1; i <= daysInMonth; i++) {
        const dateElement = document.createElement("div");
        dateElement.classList.add("date");
        dateElement.textContent = i;

        // Mark the current day with a special class
        if (
            currentYear === currentYearToday &&
            currentMonth === currentMonthToday &&
            i === currentDay
        ) {
            dateElement.classList.add("current-day");
        }

       

        datesContainer.appendChild(dateElement);
    }
}


prevMonthBtn.addEventListener("click", function () {
    currentMonth--;
    if (currentMonth < 0) {
        currentMonth = 11;
        currentYear--;
    }
    updateCalendar();
});

nextMonthBtn.addEventListener("click", function () {
    currentMonth++;
    if (currentMonth > 11) {
        currentMonth = 0;
        currentYear++;
    }
    updateCalendar();
});

updateCalendar();