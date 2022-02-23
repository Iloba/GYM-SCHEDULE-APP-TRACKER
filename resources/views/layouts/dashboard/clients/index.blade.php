@extends('layouts.dashboard.index')
@section('content')
<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">         
            <h3>All Clients</h3>
            <div class="card shadow-sm p-3">
                <div class="row mb-4">
                    <div class="col-md-4">
                        <a href="{{ route('clients.create') }}" class="btn btn-info btn-sm text-white "><i class="fas fa-plus"></i> Add Clients</a>
                    </div>
                </div>
              
                    <div class="row justify-content-center mx-auto">
                    
                            <div class="col-md-12">
                               <div class="table-reponsive">
                                    <table class="table table-striped table-hover">
                                        <thead class="bg-info text-white">
                                            <tr>
                                                <th>S/NO</th>
                                                <th>NAME</th>
                                                <th>EMAIL</th>
                                                <th>GENDER</th>
                                                <th>PHONE</th>
                                                <th>AGE</th>
                                                <th>WEIGHT</th>
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
                                                    <td>{{ $client->weight }}</td>
                                                    <td><a class="btn btn-info btn-sm text-white" href=""><i class="fas fa-eye"></i>More</a></td>
                                                    <td>
                                                        <a class="btn btn-info btn-sm text-white" href=""><i class="fas fa-edit"></i></a>
                                                        <a class="btn btn-danger btn-sm text-white" href=""><i class="fas fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <p>No Clients, Please Add</p>
                                            @endforelse
                                        </tbody>
                                    </table>
                               </div>
                               
                            </div>
                        
                            {{ $clients->links() }}
                       
                    </div>
                
            </div>
        </div>
    
    </div>
  

 
    <!--//app-footer-->

</div>
@endsection