<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use App\Models\Client;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreClientRequest;
use Spatie\SimpleExcel\SimpleExcelWriter;

// use Excel;

class ClientController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clients = Client::where('user_id', auth()->user()->id)->latest()->paginate(25);

        return view('clients.index', [
            'clients' => $clients
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientRequest $request)
    {
        $authenticatedUser = auth()->user();

        $storeClient = $authenticatedUser->clients()->create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'age' => $request->age,
            'gender' => $request->gender,
            'weight' => $request->weight,
            'height' => $request->height,
            'weight_goal' => $request->weight_goal,
            'workout_time' => $request->workout_time,
            'workout_time_per_week' => $request->workout_time_per_week,
            'workout_place' => $request->workout_place,
            'diet_type' => $request->diet_type,
        ]);

        if ($storeClient) {
            Session::flash('success', 'Client Created');
            return redirect()->back();
        } else {
            Session::flash('error', 'Something went wrong ');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $clientId = Crypt::decrypt($id);

        $client = Client::find($clientId);

        //GUARD CLAUSE
        if ($client->user_id !== auth()->user()->id) {
            Session::flash('error', 'You are not authorized for this Action');
            return redirect()->back();
        }

        return view('clients.edit', [
            'client' => $client
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(StoreClientRequest $request, Client $client)
    {

        $client = Client::find($client->id);

        // dd($client->user->id);
        //GUARD CLAUSE
        if ($client->user_id !== auth()->user()->id) {
            Session::flash('error', 'You are not authorized for this Action');
            return redirect()->back();
        }

        $updateClient = $client->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'age' => $request->age,
            'gender' => $request->gender,
            'weight' => $request->weight,
            'height' => $request->height,
            'weight_goal' => $request->weight_goal,
            'workout_time' => $request->workout_time,
            'workout_time_per_week' => $request->workout_time_per_week,
            'workout_place' => $request->workout_place,
            'diet_type' => $request->diet_type,
        ]);

        if ($updateClient) {
            Session::flash('success', 'Client Updated');
            return redirect()->back();
        } else {
            Session::flash('error', 'Something went wrong ');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {

        $client = Client::find($client->id);

        //GUARD CLAUSE
        if ($client->user_id !== auth()->user()->id) {
            Session::flash('error', 'You are not authorized for this Action');
            return redirect()->back();
        }

        $client->delete();

        Session::flash('success', 'Client Deleted');
        return redirect()->back();
    }

    public function exportClientData($id)
    {
        $schedules = Schedule::where('client', $id)->get();

        if($schedules->count() > 0){
            $writer = SimpleExcelWriter::streamDownload('schedule.csv', 'csv');
            foreach ($schedules as $schedule) {
                $clientName = Client::find($schedule->client)->name;
                $writer->addRow([
                    'Subject' =>  $schedule->workout,
                    'Start Date' => Carbon::parse($schedule->start_date)->format('M d Y'),
                    'Start Time' => Carbon::parse($schedule->start_date)->format('M d Y'),
                    'End Date' => $schedule->end_date,
                    'End Time' => $schedule->end_date,
                ]);
                // $createdAt = Carbon::parse($item['created_at']);
            }
        }else{
            Session::flash('error', 'No Schedules for this Client');
            return redirect()->back();
        }

    }
}
