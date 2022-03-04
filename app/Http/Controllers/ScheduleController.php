<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Workout;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::where('user_id', auth()->user()->id)->get();
        $workouts = Workout::all();

        $schedules = array();
        $allSchedules = Schedule::where('user_id', auth()->user()->id)->get();
        // $clientName = Client::where('id', $schedule->client)->get();
        // dd($clientName);
        foreach ($allSchedules as $schedule) {
           
            $schedules[] = [
                'title' => $schedule->workout,
                'start' => $schedule->start_date,
                'end' => $schedule->end_date,
            ];
        }

        return view('schedules.index', [
            'schedules' => $schedules,
            'clients' => $clients,
            'workouts' => $workouts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $clients = Client::where('user_id', auth()->user()->id)->get();
        $workouts = Workout::all();

        return view('schedules.create', [
            'clients' => $clients,
            'workouts' => $workouts
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
           
            'client' => 'required',
            'workout' => 'required',
            'start_date' => 'required',
          
        ]);
       

        $schedule = new Schedule;
        $schedule->user_id = auth()->user()->id;
        $schedule->client = $request->client;
        $schedule->workout = $request->workout;
        $schedule->start_date = $request->start_date;
        $schedule->end_date = $request->start_date;

        $schedule->save();
      
        Session::flash('success', 'Schedule Created');
        return redirect()->back();
    }

    public function storeOnClick(Request $request){
        
        $request->validate([
            'userId' => 'required',
            'client' => 'required',
            'workout' => 'required',
            'startDate' => 'required',
            'endDate' => 'required',

        ]);
       

        $schedule = new Schedule;
        $schedule->user_id = $request->userId;
        $schedule->client = $request->client;
        $schedule->workout = $request->workout;
        $schedule->start_date = $request->startDate;
        $schedule->end_date = $request->endDate;


        $schedule->save();

        return response()->json($schedule);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        //
    }
}
