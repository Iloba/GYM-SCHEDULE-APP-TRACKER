@extends('layouts.dashboard.index')
@section('content')
<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <a href="{{ route('clients.index') }}" class="btn btn-info btn-sm text-white mb-4 "><i
                    class="fas fa-arrow-left"></i></a>
            <h3>Add Workout</h3>
            <div class="card shadow-sm p-3">
                <form action="{{ route('clients.store') }}" method="POST">
                    @csrf
                    <div class="row p-3">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="name"><b>Client</b></label>
                                {{-- <input type="text" name="client" class="form-control" placeholder="name..."> --}}
                                <select name="client_name" class="form-control" id="">
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
                                <input type="date" name="date" class="form-control" placeholder="phone...">
                                @error('date')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group mb-3">
                                <label for="height"><b>Workout</b></label>
                               <select name="workout_type" class="form-control" id="">
                                   <option value="">Workout</option>
                               </select>
                                @error('workout_type')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="date"><b>Time</b></label>
                                <input type="time" name="time" class="form-control">
                                @error('time')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success text-white d-block mx-auto"> <i class="fas fa-plus"></i> Add Schedule</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>



    <!--//app-footer-->

</div>
@endsection