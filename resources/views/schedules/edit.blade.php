@extends('layouts.dashboard.index')
@section('content')
<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <a href="{{ route('schedules.index') }}" class="btn btn-info btn-sm text-white mb-4 "><i
                    class="fas fa-arrow-left"></i></a>
            <a href="{{ route('schedules.destroy', $schedule->id) }}" class="btn btn-danger float-right btn-sm text-white mb-4 "><i class="fas fa-trash"></i></a>


            <h3>Edit {{ 'client Name' }} Session</h3>
            <div class="card shadow-sm p-3">
                <form action="{{ route('schedules.update', $schedule->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row p-3">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="name"><b>Client</b></label>
                                <select name="client" class="form-control" id="">
                                    @forelse ($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                                    @empty
                                    <option value="No Clients">No Clients Please Add Clients</option>
                                    @endforelse
                                </select>
                                @error('client')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="date"><b>Date</b></label>
                                <input type="date" name="start_date" class="form-control">
                                @error('start_date')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group mb-3">
                                <label for=""><b>Workout</b></label>
                                <select name="workout" class="form-control" id="">
                                    @foreach ($workouts as $workout)
                                    <option value="{{ $workout->id }}">{{ $workout->workout_name }}</option>
                                    @endforeach
                                </select>
                                @error('workout')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="workout_time"><b>Select Time</b></label>
                                <input type="time" class="form-control" name="workout_time" id="">
                                @error('workout_type')
                                <span id="workoutError" class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success text-white d-block mx-auto"> <i
                                    class="fas fa-plus"></i> Update Schedule</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>



    <!--//app-footer-->

</div>
@endsection