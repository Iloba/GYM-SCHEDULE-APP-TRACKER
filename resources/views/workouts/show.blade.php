@extends('layouts.dashboard.index')
{{-- @section('css') --}}
{{-- <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"> --}}
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"> --}}
    



{{-- @endsection --}}
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css"
    integrity="sha512-+EoPw+Fiwh6eSeRK7zwIKG2MA8i3rV/DGa3tdttQGgWyatG/SkncT53KHQaS5Jh9MNOT3dmFL0FjTY08And/Cw=="
    crossorigin="anonymous" />
<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <h3>All Clients</h3>
            <div class="card shadow-sm p-3">
                <div class="row justify-content-center mx-auto">
                    <div class="col-md-12">
                        <a href="{{ route('workouts.create') }}" class="btn btn-info btn-sm text-white mb-4 "><i
                                class="fas fa-plus"></i> Add Workouts</a>
                        <h3 class="text-center mb-5">{{ $workout->workout_name }}</h3>
                        <div class="row justify-content-center">
                            <div class="col-md-5 m-3 border border-info border-3 p-3 shadow-sm">
                                <h5 class="text-center mb-5 ">About</h5>
                                <p class="text-center ">
                                    <span class="btn btn-success"><i class=" fas fa-running "></i></span>
                                </p>
                                <h4 class="text-center">{{ $workout->workout_name }}</h4>
                                <p class="text-center "><i>Type: {{ $workout->workout_type }}</i> <br> <span>{{
                                        $workout->description }}</span>
                                </p>
                            </div>
                            <div class="col-md-5 m-3 border border-info border-3 p-3 shadow-sm">
                                <h5 class="text-center mb-5 ">Youtube</h5>
                                <embed src="https://www.youtube.com/watch?v=2N0VypfgHoY" type="video">
                            </div>

                        </div>
                        <div class="row  border border-info border-3 p-3 shadow-sm justify-content-center">
                            <h5 class="text-center mb-5 ">Images</h5>
                            @forelse ($images as $image)
                            <div class="col-md-3 gallerys">
                                <a target="_blank" href="{{ asset('storage/workout_images/'.$image->image_url) }}"><img class="img-fluid border border-1 p-2"
                                        src="{{ asset('storage/workout_images/'.$image->image_url) }}"></a>
                            </div>
                            @empty
                            <p>No Images Available</p>
                            @endforelse

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script  href="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>



<script  href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"
integrity="sha512-IsNh5E3eYy3tr/JiX2Yx4vsCujtkhwl7SLqgnwLNgf04Hrt9BT9SXlLlZlWx+OK4ndzAoALhsMNcCmkggjZB1w=="
crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function(){
    $('.gallerys').magnificPopup({
        type:'image',
        delegate: 'a',
        gallery : {
            enabled: true
        } 
    });
});
</script>
@endsection