@extends('layouts.dashboard.index')
@section('css')
<link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
@endsection
@section('content')
<div class="app-wrapper">
    <div class="app-content">
        <div class="container">
            <h3>All Clients</h3>
            <div class="card shadow-sm p-3">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <a href="{{ route('clients.create') }}" class="btn btn-info btn-sm text-white mb-4 "><i
                                class="fas fa-plus"></i> Add Clients</a>

                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-sm"  id="table">
                                <thead class="bg-info text-white">
                                    <tr>
                                        <th>S/NO</th>
                                        <th>NAME</th>
                                        <th>EMAIL</th>
                                        <th>GENDER</th>
                                        <th>PHONE</th>
                                        <th>AGE</th>
                                        <th>MORE</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($clients as $client)
                                    <tr>
                                        <td>{{ $client->id }}</td>
                                        <td>{{ $client->name }}</td>
                                        <td>{{ $client->email }}</td>
                                        <td>{{ $client->gender }}</td>
                                        <td>{{ $client->phone }}</td>
                                        <td>{{ $client->age }}</td>

                                        <td>
                                            <button type="button" class="btn btn-secondary btn-sm text-white m-2"
                                                data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $client->id }}">
                                                <i class="far fa-eye text-white"></i>
                                            </button>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                @php
                                                    $parameter = $client->id;

                                                    $parameter = Crypt::encrypt($parameter);
                                                @endphp
                                                <a class="btn btn-info btn-sm text-white  m-2"
                                                    href="{{ route('clients.edit', $parameter) }}"><i
                                                        class="fas fa-edit"></i></a>
                                                <a class="btn btn-danger btn-sm text-white  m-2" onclick="
                                                event.preventDefault();
                                                if(confirm('Dangerous Action, Do you want to Continue??')){
                                                     document.getElementById('{{ 'form-delete-'. $client->id }}').submit();
                                                }
                                
                                                " href="{{ route('clients.destroy', $client->id) }}"><i
                                                        class="fas fa-trash"></i></a>

                                                <form action="{{ route('clients.destroy', $client->id) }}" method="POST"
                                                    class="d-none" id="{{ 'form-delete-'. $client->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>

                                        </td>
                                    </tr>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal-{{ $client->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Weight: {{ $client->weight }} <br>
                                                    Height: {{ $client->height }} <br>
                                                    Weight Goal: {{ $client->weight_goal }} <br>
                                                    Workout Time: {{ $client->workout_time }} <br>
                                                    Workout Time Per Week: {{ $client->workout_time_per_week }} <br>
                                                    Workout Place: {{ $client->workout_place }} <br>
                                                    Diet Type: {{ $client->diet_type }} <br>
                                                    Date Added: {{
                                                    \Carbon\Carbon::parse($client->created_at)->diffForHumans() }} <br>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                         <p class="text-center">No Clients, Please Add</p>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class=" d-flex justify-content-center">
                        {{ $clients->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')

<script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready( function () {
   $('#table').DataTable();
  } );
</script>
@endpush