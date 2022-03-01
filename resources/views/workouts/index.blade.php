@extends('layouts.dashboard.index')
@section('content')
<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <h3>My Workouts</h3>
            <div class="card shadow-sm p-3">
                <div class="row justify-content-center mx-auto">
                    <div class="col-md-12">
                        <a href="{{ route('workouts.create') }}" class="btn btn-info btn-sm text-white mb-4 "><i
                            class="fas fa-plus"></i> Add Workout</a>
                        <div id="calendar">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
