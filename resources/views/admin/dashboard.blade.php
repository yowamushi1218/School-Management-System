@extends('layouts.themes.main')
@section('content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <ol class="breadcrumb text-left">
                    <li><h3>Dashboard</h3></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section id="dashboard">
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card bg-primary">
                        <div class="card-body">
                            <i class="fa fa-id-card-o" style='font-size:70px; color: #ffffff;'></i>
                            <span class="ml-5 text-white" style="font-size: 50px;">{{ $totalUsers }}</span>
                            <p style="font-size: 14px; color:#ffffff">Total Employee's Available</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card bg-secondary">
                        <div class="card-body">
                            <i class="fa fa-calendar" style='font-size:70px; color: #ffffff;'></i>
                            <span class="ml-5 text-white" style="font-size: 50px;">{{ $totalAppointments }}</span>
                            <p style="font-size: 14px; color:#ffffff">Total Appointments Today</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card bg-danger">
                        <div class="card-body">
                            <i class="fa fa-user-md" style='font-size:70px; color: #ffffff;'></i>
                            <span class="ml-5 text-white" style="font-size: 50px;">{{ $totalClients }}</span>
                            <p style="font-size: 14px; color:#ffffff">Total Overall Clients</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <canvas id="barChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div id='calendar'>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div style="max-width: 600; margin: 0 auto;">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Client</th>
                                            <th>Phone</th>
                                            <th>Condition's</th>
                                            <th>Time</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($appointments as $index => $sched)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $sched->full_name }}</td>
                                                <td>{{ $sched->app_phone }}</td>
                                                <td>{{ $sched->app_medical_conditions }}</td>
                                                <td>{{ $sched->app_preferred_time }}</td>
                                                <td>{{ \Carbon\Carbon::parse($sched->app_appointment_date)->format('F d, Y H:i') }}</td>
                                                <td>
                                                    @if($sched->app_active == '1')
                                                        <span class="badge badge-success">On-going</span>
                                                    @elseif($sched->app_active == '2')
                                                        <span class="badge badge-primary">Approved</span>
                                                    @elseif($sched->app_active == '-1')
                                                        <span class="badge badge-warning">Cancelled</span>
                                                    @elseif($sched->app_active == '0')
                                                        <span class="badge badge-danger">Inactive</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth'
      });
      calendar.render();
    });
</script>
<script src="{{ asset('assets/dashboard/js/charts.js') }}"></script>
@endsection
