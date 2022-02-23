@extends('layouts.dashboard.index')
@section('content')
<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <a href="{{ route('clients.index') }}" class="btn btn-info btn-sm text-white mb-4 "><i
                    class="fas fa-arrow-left"></i></a>
            <h3>Add Clients</h3>
            <div class="card shadow-sm p-3">
                <form action="{{ route('clients.store') }}" method="POST">
                    @csrf
                    <div class="row p-3">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="name"><b>Name</b></label>
                                <input type="text" name="name" class="form-control" placeholder="name...">
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="phone"><b>Phone</b></label>
                                <input type="number" name="phone" class="form-control" placeholder="phone...">
                                @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="email"><b>Email</b></label>
                                <input type="email" name="email" class="form-control" placeholder="email...">
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="age"><b>Age</b></label>
                                <input type="number" name="age" class="form-control" placeholder="age...">
                                @error('age')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="gender"><b>Gender</b></label>
                                <select class="form-control" name="gender" id="">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                                @error('gender')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="weight"><b>Weight</b></label>
                                <input type="number" name="weight" class="form-control" placeholder="weight...">
                                @error('weight')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group mb-3">
                                <label for="height"><b>Height</b></label>
                                <input type="number" name="height" class="form-control" placeholder="height...">
                                @error('height')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="weight goal"><b>Weight Goal</b></label>
                                <input type="number" name="weight_goal" class="form-control"
                                    placeholder="weight goal...">
                                @error('weight_goal')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="workout time"><b>Workout Time</b></label>
                                <input type="number" name="workout_time" class="form-control"
                                    placeholder="workout time...">
                                @error('workout_time')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="workout time per week"><b>Workout Time Per Week</b></label>
                                <input type="number" name="workout_time_per_week" class="form-control"
                                    placeholder="workout time per week...">
                                @error('workout_time_per_week')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="workout place"><b>Workout Place</b></label>
                                <input type="number" name="workout_place" class="form-control"
                                    placeholder="workout Place...">
                                @error('workout_place')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="workout place"><b>Diet Type</b></label>
                                <input type="number" name="diet_type" class="form-control" placeholder="Diet Type...">
                                @error('diet_type')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success text-white d-block mx-auto"> <i class="fas fa-plus"></i> Add Client</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>



    <!--//app-footer-->

</div>
@endsection