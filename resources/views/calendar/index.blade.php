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
                locale: 'pt-br',
                themeSystem: 'bootstrap5',
            });
            calendar.render();
        });

    </script>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tables</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Tables</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the


            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-calendar-alt me-1"></i>
                DataTable Example
            </div>
            <div class="card-body">
                <div id='calendar'></div>
            </div>
        </div>
    </div>

@endsection
