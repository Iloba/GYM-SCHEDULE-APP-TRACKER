@extends('layouts.dashboard.index')
@section('code')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />

<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <!-- Modal -->
        <div class="modal fade" id="scheduleModal" tabindex="-1" role="dialog" aria-labelledby="scheduleModal"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @php
                    $user_id = auth()->user()->id;
                    @endphp
                    <div class="modal-body">
                        <input type="text" class="d-none" value="{{  $user_id }}" id="user_id">
                        <div class="form-group mb-3">
                            <label for="name"><b>Client</b></label>
                            <select name="client_name" id="client_id" class="form-control">
                                @forelse ($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->name }}</option>
                                @empty
                                <option value="No Clients">No Clients Please Add Clients</option>
                                @endforelse
                            </select>
                            @error('client')
                            <span id="clientError" class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="workout"><b>Workout</b></label>
                            <select name="workout_type" id="workout" class="form-control" id="">
                                @foreach ($workouts as $workout)
                                <option value="{{ $workout->id  }}">{{ $workout->workout_name }}</option>
                                @endforeach
                            </select>
                            @error('workout_type')
                            <span id="workoutError" class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                      
                        <div class="form-group">
                            <button id="saveSchedule" type="submit" class="btn btn-success text-white d-block mx-auto">
                                <i class="fas fa-plus"></i> Add Schedule</button>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-xl">
            <h3>Schedule Clients</h3>
            <div class="card shadow-sm p-3">
                <div class="row justify-content-center mx-auto">
                    <div class="col-md-12">
                        <a href="{{ route('schedules.create') }}" class="btn btn-info btn-sm text-white mb-4 "><i
                                class="fas fa-plus"></i> Add Schedule</a>
                        <div id="calendar">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('calendar-scripts')
<script type="text/javascript">
    let schedules = @json($schedules);
    // console.log(schedules);
    $(document).ready(function () {
        $("#calendar").fullCalendar({
            header:{
                left: 'prev, next today',
                center: 'title',
                right: 'month, agendaWeek, agendaDay    '
            },
            events: schedules,
            selectable: true,
            selectHelper: true,
            select: function(start, end, allDays){
                $('#scheduleModal').modal('toggle');
                $('#saveSchedule').click(function(){
                    let userId = $('#user_id').val();
                    let client =  $('#client_id').val();
                    let workout =  $('#workout').val();
                    let startDate = moment(start).format('YYYY-MM-DD');
                    let endDate = moment(end).format('YYYY-MM-DD');
                    console.log(userId, client, workout, startDate, endDate );

                    $.ajax({
                       
                        url: "{{ route('store.on.click') }}",
                        type: 'POST',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        dataType: 'json',
                        data:{userId, client, workout, startDate, endDate, },
                        success:function(response){

                            $('#scheduleModal').modal('hide');
                            swal("Good job!", "Schedule Created Successfully", "success");
                            location.reload();
                           
                            // $('#calendar').fullCalendar('renderEvent', {
                            //     'title': response.client, 
                            //     'start': response.start_date, 
                            //     'end': response.end_date, 
                            // });
                        },
                        error: function(error){
                            if(error.responseJSON.errors){
                                $('#clientError').html(error.responseJSON.errors.client);
                                $('#workoutError').html(error.responseJSON.errors.workout);
                            }
                        },
                    });
                })
            },
            editable: true,
            eventDrop: function(event){
                
               let id = event.id;
               let startDate = moment(event.start).format('YYYY-MM-DD');
               let endDate = moment(event.end).format('YYYY-MM-DD');

               
                $.ajax({
                        
                    url: "{{ route('update.on.click', '') }}" + '/' + id,
                    type: 'PATCH',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    dataType: 'json',
                    data:{startDate, endDate, },
                    success:function(response){

                        swal("Good job!", "Schedule Updated Successfully", "success");
                    
                    },
                    error: function(error){
                        
                        console.log(error);
                    },
                });
            },
            eventClick: function(event){
               let id = event.id;
                   
              if(confirm('Dangerous Action, Do you want to continue??')){
                $.ajax({
                    url: "{{ route('delete.on.click', '') }}" + '/' + id,
                    type: 'DELETE',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    dataType: 'json',
                    // data:{startDate, endDate, },
                    success:function(response){
                        let id = response;
                        $('#calendar').fullCalendar('removeEvents', response);
                        swal("Good job!", "Schedule Deleted Successfully", "success");
                        location.reload();
                    
                    },
                    error: function(error){
                        
                        console.log(error);
                    },
                 });
              }
            },
            // selectAllow(dropInfo, draggedEvent) {
            // // compare the start DATE and the end DATE (not the time)
            // return Ext.Date.format(dropInfo.start, 'Y-m-d') === Ext.Date.format(dropInfo.end, 'Y-m-d');
            // }
        });
    });
</script>
@endpush

@endsection