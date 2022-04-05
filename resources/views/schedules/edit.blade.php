@extends('layouts.dashboard.index')
@section('content')
<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <a href="{{ route('schedules.index') }}" class="btn btn-info btn-sm text-white mb-4 "><i
                    class="fas fa-arrow-left"></i></a>
                 
            <div class=" d-flex justify-content-end ">
                 <a onclick="
                     event.preventDefault();
                    if(confirm('Dangerous Action, Do you want to Continue??')){
                            document.getElementById('{{ 'form-delete-'. $schedule->id }}').submit();
                    }
    
                 
                 "
                 
                 href="{{ route('schedules.destroy', $schedule->id) }}" class="btn btn-danger  btn-sm text-white "><i class="fas fa-trash"></i></a>
                 <form action="{{ route('schedules.destroy', $schedule->id) }}" method="POST" id="{{ 'form-delete-'.$schedule->id }}">
                    @csrf
                    @method('DELETE')
                </form>
            </div>


            <h3>Edit {{ $schedule->client->name}}'s Session</h3>
            <div class="card shadow-sm p-3">
                @php
                $user_id = auth()->user()->id;
                @endphp
                    <div class="row p-3">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <input type="text" class="d-none" value="{{  $user_id }}" id="user_id">
                                <input type="text" class="d-none" value="{{  $schedule->id }}" id="schedule_id">
                                <label for="name"><b>Client</b></label>
                                <select name="client" class="form-control" id="client_id">
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
                                <input type="date" name="start_date" class="form-control" id="start_date">
                                @error('start_date')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group mb-3">
                                <label for=""><b>Workout</b></label>
                                <select name="workout" class="form-control" id="workout">
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
                                <input type="time" class="form-control" name="workout_time" id="workout_time">
                                @error('workout_type')
                                <span id="workoutError" class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success text-white d-block mx-auto" id="updateSchedule"> <i
                                    class="fas fa-plus"></i> Update Schedule</button>
                        </div>
                    </div>
                {{-- </form> --}}

            </div>
        </div>
    </div>
</div>
@push('calendar-scripts')
<script type="text/javascript">

    $('#updateSchedule').click(function(){
        let userId = $('#user_id').val();
        let client =  $('#client_id').val();
        let workout =  $('#workout').val();
        let Workoutdate = $('#start_date').val()
        let startDate = moment(Workoutdate).format('YYYY-MM-DD');
        let endDate = moment(Workoutdate).format('YYYY-MM-DD');
        let ScheduleId = $('#schedule_id').val()
        let workoutTime = function onTimeChange() { 
            let TimeInputElement = document.getElementById('workout_time');
            let timeSplit = TimeInputElement.value.split(':'),
                hours,
                minutes,
                meridian;
                hours = timeSplit[0];
                minutes = timeSplit[1];
                if (hours > 12) {
                    meridian = 'PM';
                    hours -= 12;
                } else if (hours < 12) {
                    meridian = 'AM';
                    if (hours == 0) {
                    hours = 12;
                    }
                } else {
                    meridian = 'PM';
                }
            
            return realTime = hours + ':' + minutes + ' ' + meridian;
            
        }
        // console.log(userId, client, workout, startDate, endDate, workoutTime(), ScheduleId);
        $.ajax({
            
            url: "{{ route('update.on.click', '') }}" + '/' + ScheduleId,
            type: 'PUT',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            dataType: 'json',
            data:{userId, client, workout, startDate, endDate, workoutTime, ScheduleId},
            success:function(response){

                $('#scheduleModal').modal('hide');
                swal("Good job!", "Schedule Created Successfully", "success");
                location.reload();
                

            },
            error: function(error){
                swal("Error!", "Something Went Wrong", "error");
                 location.reload();
            },
        });
    })
       
</script>
@endpush
@endsection