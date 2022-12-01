@extends('layouts.default')

@section('content')
    <link href='{{asset("fullcallendar/5.11.3/lib/main.css")}}' rel='stylesheet' />
    <script src='{{asset("fullcallendar/5.11.3/lib/main.js")}}'></script>
    <script src='{{asset("fullcallendar/5.11.3/lib/locales/pt-br.js")}}'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
    <script>

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                editable:true,
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                eventColor: 'green',

              events:'{{ url('calendar/getevents')}}',



                selectable:true,
                //selectHelper: true,
                locale: 'pt-br',
                themeSystem: 'bootstrap5',

                dateClick: function(info) {

                    info.jsEvent.preventDefault();

                    console.log(info);

                    if(info.allDay){

                        let hora = new Date().toLocaleTimeString();
                        start = info.dateStr + "T" + hora;
                        window.location.href = "{{ url('calendar/novo')}}" + "?start=" + start;
                    }


                },

                eventClick: function(info) {
                    alert('Event: ' + info.event.title);
                    alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
                    alert('View: ' + info.view.type);

                    // change the border color just for fun
                    info.el.style.borderColor = 'red';
                },

                eventResize: function(info) {
                    alert(info.event.title + " end is now " + info.event.end.toISOString());

                    if (!confirm("is this okay?")) {
                        info.revert();
                    }
                },

                eventDrop: function(info) {
                    alert(info.event.title + " was dropped on " + info.event.start.toISOString());

                    if (!confirm("Are you sure about this change?")) {
                        info.revert();
                    }
                }




            });
            calendar.render();
        });

    </script>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tables</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ url("/") }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Tables</li>
        </ol>
{{--        <div class="card mb-4">--}}
{{--            <div class="card-body">--}}
{{--                Controle aqui a seu calendário--}}


{{--            </div>--}}
{{--        </div>--}}

        @if(session('acao'))
            @if(session('id'))
                <div class="card bg-warning text-white mb-4 card mb-4" id="msg" style="padding: 5px">
                    <div class="card-body">
                        <strong>Sucesso!</strong>
                        O registro {{ session('id')  }}  foi deletado.
                    </div>

                </div>
            @endif
        @else
            @if(session('id'))
                <div class="card bg-success text-white mb-4 card mb-4" id="msg" style="padding: 5px">
                    <div class="card-body">
                        <strong>Sucesso! </strong>
                        O registro {{ session('id')  }} {{ session('desc')  }} foi gravado.
                    </div>
                </div>

            @endif
        @endif
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-calendar-alt me-1"></i>
                Calendário
            </div>
            <div class="card-body">
                <div id='calendar'></div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    setInterval(function () {

        document.getElementById("msg").style.display = "none";
    }, 5 * 1000); // do this every 10 seconds


    </script>


@endsection
