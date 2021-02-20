document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'pt-br',
        displayEventTime: true,
        editable: true,
        eventLimit: true,

        //initialDate: '2021-02-01',
        events: 'listarEventos.php',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,listYear'
        },
        extraParams: function () {
            return {
                cachebuster: new Date().valueOf()
            };
        },
        dayMaxEventRows: true, // for all non-TimeGrid views
        views: {
            timeGrid: {
                dayMaxEventRows: 6 // adjust to 6 only for timeGridWeek/timeGridDay
            }
        },
        loading: function (bool) {
            document.getElementById('loading').style.display =
                bool ? 'block' : 'none';
        },
        eventClick: function (info) {
            info.jsEvent.preventDefault();
            $('#visualizar #id').text(info.event.id);
            $('#visualizar #title').text(info.event.title);
            $('#visualizar #start').text(info.event.start.toLocaleString('pt-br'));
            $('#visualizar #end').text(info.event.end.toLocaleString('pt-br'));
            $('#visualizar').modal('show');
        },
        selectable: true,
        select: function (info) {
            //alert('selectd ' + info.startStr + ' to ' + info.endStr);
            $('#cadastrar #start').val(info.start.toLocaleString('pt-br'));
            $('#cadastrar #end').val(info.start.toLocaleString('pt-br'));
            $('#cadastrar').modal('show');
        }
    });
    calendar.render();

});

//Mascara para o campo data e hora
function DataHora(evento, objeto) {
    var keypress = (window.event) ? evento.keyCode : evento.which;
    campo = eval(objeto);
    if (campo.value == '00/00/0000 00:00:00') {
        campo.value = "";
    }

    caracteres = '0123456789';
    separacao1 = '/';
    separacao2 = ' ';
    separacao3 = ':';
    conjunto1 = 2;
    conjunto2 = 5;
    conjunto3 = 10;
    conjunto4 = 13;
    conjunto5 = 16;
    if ((caracteres.search(String.fromCharCode(keypress)) != -1) && campo.value.length < (19)) {
        if (campo.value.length == conjunto1)
            campo.value = campo.value + separacao1;
        else if (campo.value.length == conjunto2)
            campo.value = campo.value + separacao1;
        else if (campo.value.length == conjunto3)
            campo.value = campo.value + separacao2;
        else if (campo.value.length == conjunto4)
            campo.value = campo.value + separacao3;
        else if (campo.value.length == conjunto5)
            campo.value = campo.value + separacao3;
    } else {
        evento.returnValue = false;
    }
}

$(document).ready(function () {
    $('#addevent').on('submit', function (event) {
        event.preventDefault();
        var form = $(this).serialize();
        $.ajax({
            method: 'POST',
            url: 'cad_event.php',
            data: form,
            contentyType: false,
            processData: false,
            dataType: 'json',
            success: function (retorno) {
                if (retorno['sit']) {
                    //$('#msg-cad').html(retorno['msg']);
                    location.reload();
                } else {
                    $('#msg-cad').html(retorno['msg']);
                }
            }
        });
    });
    $('.btn-canc-vis').on('click', function () {
        $('.visevent').slideToggle();
        $('.formedit').slideToggle();
    });
});