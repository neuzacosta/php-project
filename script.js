// Login (visibilidade)
function mostrarPw() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

// Search 
document.getElementById("search-input").addEventListener("keydown", function (event) {
    if (event.keyCode === 13) { // Enter key
      event.preventDefault(); // Prevent form submission
      document.querySelector(".search-container form").submit(); // Submit the form
    }
  })


// Grafico1 - Desempenho
var meses = ["Jan", "Fev", "Mar", "Abr", "Mai"];
var comissoes = [598, 758, 492, 387, 560];
var premios = [950, 1532, 851, 547, 890];

var grafico = new Chart(document.getElementById('grafico'), {
    type: 'line',
    data: {
        labels: meses,
        datasets: [{
            label: 'Comissões',
            data:comissoes,
            borderColor:'#3b536c',
            fill: true
        },
        {
            label: 'Prémios',
            data: premios,
            borderColor: '#343a40',
            fill: true
        }
    ]
    }
});

// Grafico2 - Apólices
const estadoApolices = ['Em vigor', "Anuladas", "Anuladas por Substituição"];
const numApolices = [100, 80, 30];

const ctx1 = document.getElementById('grafico2').getContext('2d');
const grafico2 = new Chart(ctx1, {
    type: 'pie',
    data: {
        labels: estadoApolices,
        datasets: [{
            label: 'Apólices',
            data: numApolices,
            backgroundColor: ['#3b536c', '#343a40', '#3b536c6a'],
            borderColor: '#3b536c',
            borderWidth: 0,
        }]
    },
    options: {
        responsive: true,
    }
});

// Grafico3 - Clientes
const clientes = ['Clientes'];
const numClientes = [305];

const ctx2 = document.getElementById('grafico3').getContext('2d');
const grafico3 = new Chart(ctx2, {
    type: 'pie',
    data: {
        labels: clientes,
        datasets: [{
            label: 'Ativos',
            data: numClientes,
            backgroundColor: '#3b536c',
            borderColor: '#3b536c',
            borderWidth: 0,
        }]
    },
    options: {
        responsive: true,
    }
});

// Sidebar -> Abrir e Fechar Menu
function open_closeNav() {
    var sidebar = document.getElementById("mySidebar");
    var content = document.getElementById("main");

    if (sidebar.style.width === "250px") {
        sidebar.style.width = "0";
        content.style.marginLeft = "0";
    } else {
        sidebar.style.width = "250px";
        content.style.marginLeft = "250px";
    }
}

// Calendario
function CalendarControl() {
    const calendar = new Date();
    const calendarControl = {
        localDate: new Date(),
        prevMonthLastDate: null,
        calWeekDays: ["D", "S", "T", "Q", "Q", "S", "S"],
        calMonthName: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
        daysInMonth: function (month, year) {
            return new Date(year, month, 0).getDate();
        },
        firstDay: function () {
            return new Date(calendar.getFullYear(), calendar.getMonth(), 1);
        },
        lastDay: function () {
            return new Date(calendar.getFullYear(), calendar.getMonth() + 1, 0);
        },
        firstDayNumber: function () {
            return calendarControl.firstDay().getDay() + 1;
        },
        lastDayNumber: function () {
            return calendarControl.lastDay().getDay() + 1;
        },
        getPreviousMonthLastDate: function () {
            let lastDate = new Date(
                calendar.getFullYear(),
                calendar.getMonth(),
                0
            ).getDate();
            return lastDate;
        },
        navigateToPreviousMonth: function () {
            calendar.setMonth(calendar.getMonth() - 1);
            calendarControl.attachEventsOnNextPrev();
        },
        navigateToNextMonth: function () {
            calendar.setMonth(calendar.getMonth() + 1);
            calendarControl.attachEventsOnNextPrev();
        },
        navigateToCurrentMonth: function () {
            let currentMonth = calendarControl.localDate.getMonth();
            let currentYear = calendarControl.localDate.getFullYear();
            calendar.setMonth(currentMonth);
            calendar.setYear(currentYear);
            calendarControl.attachEventsOnNextPrev();
        },
        displayYear: function () {
            let yearLabel = document.querySelector(".calendar .calendar-year-label");
            yearLabel.innerHTML = calendar.getFullYear();
        },
        displayMonth: function () {
            let monthLabel = document.querySelector(
                ".calendar .calendar-month-label"
            );
            monthLabel.innerHTML = calendarControl.calMonthName[calendar.getMonth()];
        },
        selectDate: function (e) {
            console.log(
                `${e.target.textContent} ${calendarControl.calMonthName[calendar.getMonth()]
                } ${calendar.getFullYear()}`
            );
        },
        plotSelectors: function () {
            document.querySelector(
                ".calendar"
            ).innerHTML += `<div class="calendar-inner"><div class="calendar-controls">
          <div class="calendar-prev"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" viewBox="0 0 128 128"><path fill="#666" d="M88.2 3.8L35.8 56.23 28 64l7.8 7.78 52.4 52.4 9.78-7.76L45.58 64l52.4-52.4z"/></svg></a></div>
          <div class="calendar-year-month">
          <div class="calendar-month-label"></div>
          <div>-</div>
          <div class="calendar-year-label"></div>
          </div>
          <div class="calendar-next"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" viewBox="0 0 128 128"><path fill="#666" d="M38.8 124.2l52.4-52.42L99 64l-7.77-7.78-52.4-52.4-9.8 7.77L81.44 64 29 116.42z"/></svg></a></div>
          </div>
          <div class="calendar-today-date">Hoje: 
            ${calendarControl.calWeekDays[calendarControl.localDate.getDay()]}, 
            ${calendarControl.localDate.getDate()}, 
            ${calendarControl.calMonthName[calendarControl.localDate.getMonth()]} 
            ${calendarControl.localDate.getFullYear()}
          </div>
          <div class="calendar-body"></div></div>`;
        },
        plotDayNames: function () {
            for (let i = 0; i < calendarControl.calWeekDays.length; i++) {
                document.querySelector(
                    ".calendar .calendar-body"
                ).innerHTML += `<div>${calendarControl.calWeekDays[i]}</div>`;
            }
        },
        plotDates: function () {
            document.querySelector(".calendar .calendar-body").innerHTML = "";
            calendarControl.plotDayNames();
            calendarControl.displayMonth();
            calendarControl.displayYear();
            let count = 1;
            let prevDateCount = 0;

            calendarControl.prevMonthLastDate = calendarControl.getPreviousMonthLastDate();
            let prevMonthDatesArray = [];
            let calendarDays = calendarControl.daysInMonth(
                calendar.getMonth() + 1,
                calendar.getFullYear()
            );
            // Mes currente
            for (let i = 1; i < calendarDays; i++) {
                if (i < calendarControl.firstDayNumber()) {
                    prevDateCount += 1;
                    document.querySelector(
                        ".calendar .calendar-body"
                    ).innerHTML += `<div class="prev-dates"></div>`;
                    prevMonthDatesArray.push(calendarControl.prevMonthLastDate--);
                } else {
                    document.querySelector(
                        ".calendar .calendar-body"
                    ).innerHTML += `<div class="number-item" data-num=${count}><a class="dateNumber" href="#">${count++}</a></div>`;
                }
            }
            // Restantes 
            for (let j = 0; j < prevDateCount + 1; j++) {
                document.querySelector(
                    ".calendar .calendar-body"
                ).innerHTML += `<div class="number-item" data-num=${count}><a class="dateNumber" href="#">${count++}</a></div>`;
            }
            calendarControl.highlightToday();
            calendarControl.plotPrevMonthDates(prevMonthDatesArray);
            calendarControl.plotNextMonthDates();
        },
        attachEvents: function () {
            let prevBtn = document.querySelector(".calendar .calendar-prev a");
            let nextBtn = document.querySelector(".calendar .calendar-next a");
            let todayDate = document.querySelector(".calendar .calendar-today-date");
            let dateNumber = document.querySelectorAll(".calendar .dateNumber");
            prevBtn.addEventListener(
                "click",
                calendarControl.navigateToPreviousMonth
            );
            nextBtn.addEventListener("click", calendarControl.navigateToNextMonth);
            todayDate.addEventListener(
                "click",
                calendarControl.navigateToCurrentMonth
            );
            for (var i = 0; i < dateNumber.length; i++) {
                dateNumber[i].addEventListener(
                    "click",
                    calendarControl.selectDate,
                    false
                );
            }
        },
        highlightToday: function () {
            let currentMonth = calendarControl.localDate.getMonth() + 1;
            let changedMonth = calendar.getMonth() + 1;
            let currentYear = calendarControl.localDate.getFullYear();
            let changedYear = calendar.getFullYear();
            if (
                currentYear === changedYear &&
                currentMonth === changedMonth &&
                document.querySelectorAll(".number-item")
            ) {
                document
                    .querySelectorAll(".number-item")
                [calendar.getDate() - 1].classList.add("calendar-today");
            }
        },
        plotPrevMonthDates: function (dates) {
            dates.reverse();
            for (let i = 0; i < dates.length; i++) {
                if (document.querySelectorAll(".prev-dates")) {
                    document.querySelectorAll(".prev-dates")[i].textContent = dates[i];
                }
            }
        },
        plotNextMonthDates: function () {
            let childElemCount = document.querySelector('.calendar-body').childElementCount;
            // 7 linhas
            if (childElemCount > 42) {
                let diff = 49 - childElemCount;
                calendarControl.loopThroughNextDays(diff);
            }

            // 6 linhas
            if (childElemCount > 35 && childElemCount <= 42) {
                let diff = 42 - childElemCount;
                calendarControl.loopThroughNextDays(42 - childElemCount);
            }

        },
        loopThroughNextDays: function (count) {
            if (count > 0) {
                for (let i = 1; i <= count; i++) {
                    document.querySelector('.calendar-body').innerHTML += `<div class="next-dates">${i}</div>`;
                }
            }
        },
        attachEventsOnNextPrev: function () {
            calendarControl.plotDates();
            calendarControl.attachEvents();
        },
        init: function () {
            calendarControl.plotSelectors();
            calendarControl.plotDates();
            calendarControl.attachEvents();
        }
    };
    calendarControl.init();
}
const calendarControl = new CalendarControl();

// Iniciar Userfront
Userfront.init("demo1234");

var buttonEl = document.getElementById("logout-button");

// Apresenta botão se user fizer login
if (Userfront.accessToken()) {
  buttonEl.disabled = false;
}

// Fecha a sessão
function buttonLogout(e) {
  e.preventDefault();
  Userfront.logout();
}

// Adiciona um eventlistener ao clicar no botão
buttonEl.addEventListener("click", buttonLogout);