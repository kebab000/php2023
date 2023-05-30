document.addEventListener("DOMContentLoaded", function () {
    var calendarEl = document.getElementById("calendar");
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: "dayGridMonth",
        headerToolbar: {
            start: "prev,next today",
            center: "title",
            end: "dayGridMonth,dayGridWeek,dayGridDay",
        },
        titleFormat: function (date) {
            return (
                date.date.year + "년 " + (parseInt(date.date.month) + 1) + "월"
            );
        },
        selectable: true,
        droppable: true,
        editable: true,
        nowIndicator: true,
        locale: "ko",
        events: [],
        eventClick: function (info) {
            // Handle event click here
            console.log("Event clicked:", info.event);
        },
        select: function (info) {
            // Handle date selection here
            console.log("Selected:", info.start, info.end);
            var modal = document.getElementById("myModal");
            modal.style.display = "block";
            var eventForm = document.getElementById("eventForm");
            eventForm.onsubmit = function (event) {
                event.preventDefault();
                var titleInput = document.getElementById("eventTitle");
                var title = titleInput.value.trim();
                if (title) {
                    calendar.addEvent({
                        title: title,
                        start: info.startStr,
                        end: info.endStr,
                        allDay: info.allDay,
                    });
                }
                titleInput.value = "";
                modal.style.display = "none";
            };
        },
    });
    calendar.render();
    // Modal close button functionality
    var closeBtn = document.getElementsByClassName("close")[0];
    closeBtn.onclick = function () {
        var modal = document.getElementById("myModal");
        modal.style.display = "none";
    };
});

var modal = document.getElementById(".modal");

// fc-event-title fc-sticky 요소를 선택합니다.
var eventTitleElement = document.querySelector(".fc-event-title.fc-sticky");

// 모달창을 열기 위한 클릭 이벤트 핸들러를 추가합니다.
eventTitleElement.addEventListener("click", function () {
    // 모달창을 보이도록 설정합니다.
    modal.style.display = "block";
});

// 모달창을 닫기 위한 요소를 선택합니다.
var closeBtn = document.querySelector(".close");

// 모달창을 닫기 위한 클릭 이벤트 핸들러를 추가합니다.
closeBtn.addEventListener("click", function () {
    // 모달창을 숨깁니다.
    modal.style.display = "none";
});
