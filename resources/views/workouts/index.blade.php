@extends('layouts.dashboard.index') 

@section('content')
<link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
/>
<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <h3>All Workouts</h3>
            <div class="card shadow-sm p-3">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <a
                            href="{{ route('workouts.create') }}"
                            class="btn btn-info btn-sm text-white mb-4"
                            ><i class="fas fa-plus"></i> Add Workouts</a
                        >
                        <div class="row mb-3 p-2 justify-content-center">
                            @forelse ($workouts as $workout)
                            <div
                                class="card col-md-3 mb-3 m-2 pt-2 bg-light shadow-sm"
                            >
                                @php $parameter = Crypt::encrypt($workout->id);
                                @endphp
                                <a
                                    class="nav-link text-secondary"
                                    href="{{
                                        route('workouts.show', $parameter)
                                    }}"
                                >
                                    <p class="text-center">
                                        <span class="btn btn-primary"
                                            ><i class="fas fa-running"></i
                                        ></span>
                                    </p>
                                    <h4 class="text-center">
                                        {{ $workout->workout_name }}
                                    </h4>
                                    <p class="text-center">
                                       
                                            Type:
                                            {{ $workout->workout_type }}
                                        
                                        <br />
                                        See more.... <br>
                                        <small>Added by: {{ $workout->user->name}}</small>
                                       
                                    </p>
                                </a>
                            </div>
                            @empty
                            <p class="text-center">No Workouts Please add</p>
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
@endsection @push('scripts')
<script
    src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
    integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI="
    crossorigin="anonymous"
></script>
<script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#table").DataTable();
    });
</script>
@endpush
