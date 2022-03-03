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
        //
        $schedules = array();
        $allSchedules = Schedule::where('user_id', auth()->user()->id)->get();
        foreach ($allSchedules as $schedule) {
            $schedules[] = [
                'title' => $schedule->workout,
                'start' => $schedule->date,
                'end' => $schedule->date,
            ];
        }

        return view('schedules.index', [
            'schedules' => $schedules
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
            'client_name' => 'required',
            'date' => 'required',
            'workout_type' => 'required',
            'time' => 'required',
        ]);
        //
        $authenticatedUser = auth()->user();


        $storeSchedule = $authenticatedUser->schedules()->create([
            'client' => $request->client_name,
            'workout' => $request->workout_type,
            'date' => $request->date,
            'time' => $request->time,
        ]);



        if ($storeSchedule) {
            Session::flash('success', 'Schedule Created');
            return redirect()->back();
        } else {
            Session::flash('error', 'Something went wrong ');
            return redirect()->back();
        }
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
