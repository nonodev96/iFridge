document.addEventListener('DOMContentLoaded', function () {

    function dateFormat(date) {
        return date.getUTCFullYear() + "/"
            + (date.getUTCMonth() + 1) + "/"
            + date.getUTCDate() + " "
            + date.getUTCHours() + ":"
            + date.getUTCMinutes() + ":"
            + date.getUTCSeconds();
    }

    const calendarEl = document.getElementById('calendar');

    const element = document.querySelector('meta[property~="user_id"]');
    const user_id = element && element.getAttribute("content");

    if (calendarEl != null) {
        const calendar = new FullCalendar.Calendar(calendarEl, {
            locale: 'es',
            initialView: 'dayGridMonth',
            editable: true,
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            events: "/Calendar/load/" + user_id,
            selectable: true,
            selectHelper: true,

            select: (event) => {
                const title = prompt("Introduce el nombre del evento");
                if (title !== undefined) {

                    let start = new Date(event.start);
                    start.setDate(start.getDate() + 1);
                    let end = new Date(event.end != null ? event.end : start)

                    $.ajax({
                        url: "/Calendar/insert",
                        type: "POST",
                        data: {
                            user_id: user_id,
                            title: title,
                            start: dateFormat(start),
                            end: dateFormat(end)
                        },
                        success: function () {
                            calendar.refetchEvents();
                            // alert("Added Successfully");
                        }
                    })
                }
            },
            eventResize: (info) => {

                let start = new Date(info.event.start);
                let end = new Date(info.event.end != null ? info.event.end : start)

                const title = info.event.title;
                const id = info.event.id;

                $.ajax({
                    url: "/Calendar/update",
                    type: "POST",
                    data: {
                        id: id,
                        user_id: user_id,
                        title: title,
                        start: start,
                        end: end,
                    },
                    success: function () {
                        calendar.refetchEvents();
                        // alert("Event Update");
                    }
                })
            },
            eventDrop: (info) => {

                const title = info.event.title;
                const id = info.event.id;

                let start = new Date(info.event.start);
                let end = new Date(info.event.end != null ? info.event.end : start)

                $.ajax({
                    url: "/Calendar/update",
                    type: "POST",
                    data: {
                        id: id,
                        user_id: user_id,
                        title: title,
                        start: dateFormat(start),
                        end: dateFormat(end),
                    },
                    success: function () {
                        calendar.refetchEvents();
                        // alert("Event Updated");
                    }
                })
            },
            eventClick: function (info) {
                if (confirm("Estas seguro de que quieres eliminar este evento?")) {
                    const id = info.event.id;
                    $.ajax({
                        url: "/Calendar/delete",
                        type: "POST",
                        data: {
                            id: id
                        },
                        success: function () {
                            calendar.refetchEvents();
                            // alert('Event Removed');
                        }
                    })
                }
            }
        });

        calendar.render();
    }
});