<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreClientRequest;

class ClientController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clients = Client::where('user_id', auth()->user()->id)->latest()->paginate(20);

        return view('layouts.dashboard.clients.index', [
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
        return view('layouts.dashboard.clients.create');
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

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Models\Client  $client
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(Client $client)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        $client = Client::find($client->id);

        return view('layouts.dashboard.clients.edit', [
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
        //GUARD CLAUSE

        $client = Client::find($client->id);


        $authenticatedUser = auth()->user();

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

        if($updateClient){
            Session::flash('success', 'Client Updated');
            return redirect()->back();
        }else{
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
        //GUARD CLAUSE

        //
    }
}
