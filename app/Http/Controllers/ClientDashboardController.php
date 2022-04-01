<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Client;
use App\Models\Workout;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Spatie\SimpleExcel\SimpleExcelWriter;

class ClientDashboardController extends Controller
{
    public function displayCalendarWithSchedules()
    {


        $schedules = array();
        $allSchedules = Schedule::where('client_id', auth('client')->user()->id)->get();

        foreach ($allSchedules as $schedule) {
            $schedules[] = [
                'id' => $schedule->id,
                'title' => Workout::find($schedule->workout)->workout_name,
                'start' => $schedule->start_date,
                'end' => $schedule->end_date,
            ];
        }

        return view('schedules.client-schedules', [
            'schedules' => $schedules,

        ]);
    }

    public function exportClientData()
    {
        $schedules = Schedule::where('client_id', auth('client')->user()->id)->get();

        if (!$schedules->count() > 0) {
            Session::flash('error', 'No Schedules has been added for you');
            return redirect()->back();
        }

        $writer = SimpleExcelWriter::streamDownload(auth('client')->user()->name.'.csv', 'csv');
        foreach ($schedules as $schedule) {
            $clientName = Client::find($schedule->client_id)->name;
            $description = Workout::find($schedule->workout)->description;
            $subject = Workout::find($schedule->workout)->workout_name;
            $url = route('user.workouts.show', Crypt::encrypt($schedule->workout));
            $writer->addRow([
                'Subject' =>  $subject . ' for ' . $clientName,
                'Start Date' => Carbon::parse($schedule->start_date)->format('d/m/Y'),
                'Start Time' => '10:00 AM',
                'End Date' => carbon::parse($schedule->end_date)->format('d/m/Y'),
                'End Time' => '10:00 AM',
                'Description' => ' Description: ' .  $description  . ' Link: ' . $url,
                'All Day Event' => TRUE,
            ]);
        }
    }
}
