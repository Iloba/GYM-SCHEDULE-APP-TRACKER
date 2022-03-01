@extends('layouts.dashboard.index')
@section('css')
<link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
@endsection
@section('content')
<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <h3>All Clients</h3>
            <div class="card shadow-sm p-3">
                <div class="row justify-content-center mx-auto">
                    <div class="col-md-12">
                        <a href="{{ route('workouts.create') }}" class="btn btn-info btn-sm text-white mb-4 "><i
                                class="fas fa-plus"></i> Add Workouts</a>
                                <div class="row mb-3 p-2 justify-content-center">
                                @forelse ($workouts as $workout)
                                        <div class="card col-md-3 mb-3 m-2 pt-2">
                                            <a class="nav-link" href="{{ route('workouts.show', $workout->id) }}">
                                                <p class="text-center "><span class="btn btn-info"><i class=" fas fa-running "></i></span></p>
                                                <h3 class="text-center">{{ $workout->workout_name }}</h4>
                                                    <p class="text-center "><i>Type: {{ $workout->workout_type }}</i></p>
                                                <p class="text-center">{{ $workout->description }}</p>
                                                
                                            </a>
                                        </div>
                                @empty
                                        <p>No Workouts Please add</p>
                                @endforelse
                                </div>
                             </div>
                   <div class="d-flex justify-content-center">
                    {{ $workouts->links() }}
                   </div>
                </div>
            </div>
        </div>

    </div>



    <!--//app-footer-->

</div>
@endsection
@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
    integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready( function () {
   $('#table').DataTable();
  } );
</script>
@endpush