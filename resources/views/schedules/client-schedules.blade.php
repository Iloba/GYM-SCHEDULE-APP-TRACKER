@extends('layouts.dashboard.clients.index')
@section('code')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />

<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <h3>My Workouts</h3>
            <div class="card shadow-sm p-3">
                <div class="row justify-content-center mx-auto">
                    <div class="col-md-12">
                        <a href="{{ route('export.client.workouts') }}" class="btn btn-info btn-sm text-white mb-4 ">
                            <i class="fa fa-file-csv"></i> Export As Csv</a>
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
            // selectable: true,
            // selectHelper: true,
            // select: function(start, end, allDays){
            //     $('#scheduleModal').modal('toggle');
            //     $('#saveSchedule').click(function(){
            //         let userId = $('#user_id').val();
            //         let client =  $('#client_id').val();
            //         let workout =  $('#workout').val();
            //         let startDate = moment(start).format('YYYY-MM-DD');
            //         let endDate = moment(end).format('YYYY-MM-DD');
            //         console.log(userId, client, workout, startDate, endDate );

            //         $.ajax({
                       
            //             url: "{{ route('store.on.click') }}",
            //             type: 'POST',
            //             headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            //             dataType: 'json',
            //             data:{userId, client, workout, startDate, endDate, },
            //             success:function(response){

            //                 $('#scheduleModal').modal('hide');
            //                 swal("Good job!", "Schedule Created Successfully", "success");
            //                 location.reload();
                           
            //                 // $('#calendar').fullCalendar('renderEvent', {
            //                 //     'title': response.client, 
            //                 //     'start': response.start_date, 
            //                 //     'end': response.end_date, 
            //                 // });
            //             },
            //             error: function(error){
            //                 if(error.responseJSON.errors){
            //                     $('#clientError').html(error.responseJSON.errors.client);
            //                     $('#workoutError').html(error.responseJSON.errors.workout);
            //                 }
            //             },
            //         });
            //     })
            // },
            // editable: true,
            // eventDrop: function(event){
                
            //    let id = event.id;
            //    let startDate = moment(event.start).format('YYYY-MM-DD');
            //    let endDate = moment(event.end).format('YYYY-MM-DD');

               
            //     $.ajax({
                        
            //         url: "{{ route('update.on.click', '') }}" + '/' + id,
            //         type: 'PATCH',
            //         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            //         dataType: 'json',
            //         data:{startDate, endDate, },
            //         success:function(response){

            //             swal("Good job!", "Schedule Updated Successfully", "success");
                    
            //         },
            //         error: function(error){
                        
            //             console.log(error);
            //         },
            //     });
            // },
            // eventClick: function(event){
            //    let id = event.id;
                   
            //   if(confirm('Dangerous Action, Do you want to continue??')){
            //     $.ajax({
            //         url: "{{ route('delete.on.click', '') }}" + '/' + id,
            //         type: 'DELETE',
            //         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            //         dataType: 'json',
            //         // data:{startDate, endDate, },
            //         success:function(response){
            //             let id = response;
            //             $('#calendar').fullCalendar('removeEvents', response);
            //             swal("Good job!", "Schedule Deleted Successfully", "success");
            //             location.reload();
                    
            //         },
            //         error: function(error){
                        
            //             console.log(error);
            //         },
            //      });
            //   }
            // },
            // selectAllow(dropInfo, draggedEvent) {
            // // compare the start DATE and the end DATE (not the time)
            // return Ext.Date.format(dropInfo.start, 'Y-m-d') === Ext.Date.format(dropInfo.end, 'Y-m-d');
            // }
        });
        // $('#closeModal').click(function(){
        //     $('#scheduleModal').modal('hide');
        // })
       
       
    });
</script>
@endpush

@endsection