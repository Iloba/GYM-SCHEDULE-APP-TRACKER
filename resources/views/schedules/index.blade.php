@extends('layouts.dashboard.index')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />

<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <h3>Schedule Workouts</h3>
            <div class="card shadow-sm p-3">
                <div class="row justify-content-center mx-auto">
                    <div class="col-md-12">
                        <a href="{{ route('schedules.create') }}" class="btn btn-info btn-sm text-white mb-4 "><i
                            class="fas fa-plus"></i> Add Schedule</a>
                        <div id="calendar">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('calendar-scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $("#calendar").fullCalendar({});
    });
</script>
@endpush

@endsection


