@extends('layouts.dashboard.index')
@section('content')
<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <a href="{{ route('clients.index') }}" class="btn btn-info btn-sm text-white mb-4 "><i
                    class="fas fa-arrow-left"></i></a>
            <h3>Add Workout</h3>
            <div class="card shadow-sm p-3">
                <form action="{{ route('workouts.store') }}" method="POST">
                    @csrf
                    <div class="row p-3">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="Workout Name"><b>Workout Name</b></label>
                                <input type="text" name="workout_name" class="form-control" placeholder="Enter Workout Name....">
                                @error('workout_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="Workout Description"><b>Workout Description</b></label>
                               <textarea name="workout_description" class="form-control" id="" cols="30" rows="10"></textarea>
                                @error('workout_description')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group mb-3">
                                <label for="Workout Type"><b>Workout Type</b></label>
                                <input type="text" name="workout_type" class="form-control" placeholder="Enter Workout Type....">
                                @error('workout_type')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="Youtube Link"><b>Youtube Link</b></label>
                                <input type="text" name="youtube_link" class="form-control" placeholder="Enter Link to video">
                                @error('youtube_link')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3" >
                            <label for="Youtube Link"><b>Add Image</b></label>
                            <div id="img-form-box">
                                <input type="file" name="workout_image" class="form-control"> <br>
                            </div>
                            <span class="btn btn-info text-white" id="add-img-button">Add Image</span>
                            @error('image')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror <br>
                          
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-success text-white d-block mx-auto"> <i class="fas fa-plus"></i> Add Workout</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>
    <!--//app-footer-->

</div>
<script type="text/javascript">
    const AddImageButton = document.querySelector('#add-img-button');
    const ImgDiv = document.querySelector('#img-form-box');

    AddImageButton.addEventListener('click', function(event){
        event.preventDefault();
        
    const newImageForm = `
     <input type="file" name="workout_image" class="form-control"> <br>
    @error('image')
    <span class="text-danger">{{ $message }}</span>
    @enderror <br>
             `;

     ImgDiv.insertAdjacentHTML('afterend', newImageForm);


    })
</script>
@endsection

