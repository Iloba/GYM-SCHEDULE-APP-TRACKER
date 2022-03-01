<?php

namespace App\Http\Controllers;

use App\Models\Workout;
use App\Models\WorkoutMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class WorkoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workouts = Workout::where('user_id', auth()->user()->id)->latest()->paginate(9);
        return view('workouts.index', [
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
        //
        return view('workouts.create');
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
            'workout_name' => 'required',
            'workout_type' => 'required',
            'workout_image' => 'required',
            'workout_description' => 'required',
            'youtube_link' => 'required',
            'workout_image' => 'required'
        ]);
       

        $workout = new Workout;
        $workout->user_id = auth()->user()->id;
        $workout->workout_name = $request->workout_name;
        $workout->workout_type = $request->workout_type;
        $workout->description = $request->workout_description;
        $workout->youtube_link = $request->youtube_link;

        $workout->save();
        //Handle Images
        $images = $request->file('workout_image');

        foreach ($images as $image) {

            //Get Name
            $imageName = time() . $image->getClientOriginalName();

            //Save with Filename
            Storage::put($imageName, file_get_contents($image));

            //Move file to location
            Storage::move($imageName, 'public/workout_images/' . $imageName);

            $workoutImage = new WorkoutMedia;
            $workoutImage->workout_id = $workout->id;
            $workoutImage->media_type = 'image';
            $workoutImage->image_url =  $imageName;
            $workoutImage->save();
        }

        Session::flash('success', 'Workout Created');
        return redirect()->back();
    }


    // public function storeMultipleImages(){
    //     $image = array();
    //     if($files = $request->file('workout_image')){
    //         foreach ($files as $file) {
    //             $image_name = $file->getClientOriginalName();
    //         }
    //     }
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Workout  $workout
     * @return \Illuminate\Http\Response
     */
    public function show(Workout $workout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Workout  $workout
     * @return \Illuminate\Http\Response
     */
    public function edit(Workout $workout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Workout  $workout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Workout $workout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Workout  $workout
     * @return \Illuminate\Http\Response
     */
    public function destroy(Workout $workout)
    {
        //
    }
}
