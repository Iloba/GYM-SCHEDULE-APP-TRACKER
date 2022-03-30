<?php

namespace App\Http\Controllers;

use App\Models\Workout;
use App\Models\WorkoutMedia;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Intervention\Image\Facades\Image;
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
        $workouts = Workout::latest()->paginate(9);
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

        $request->validate([
            'workout_name' => 'required',
            'workout_type' => 'required',
            'workout_image' => 'required|mimes:jpg,png,gif|max:1024',
            'workout_description' => 'required',
            'workout_image' => 'required'
        ]);


        $workout = new Workout;
        $workout->user_id = auth()->user()->id;
        $workout->workout_name = $request->workout_name;
        $workout->workout_type = $request->workout_type;
        $workout->description = $request->workout_description;
        $workout->youtube_link = $request->youtube_link;

        $workout->save();
        
        $this->uploadMultipleImages($request, $workout->id);

        Session::flash('success', 'Workout Created');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Workout  $workout
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = Crypt::decrypt($id);


        //Get Workout
        $workout = Workout::find($id);

        //Get Workout Media
        $images = WorkoutMedia::where('workout_id', $id)->get();

        return view('workouts.show', [
            'workout' => $workout,
            'images' => $images
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Workout  $workout
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $id = crypt::decrypt($id);

        $workout = Workout::find($id);

        return view('workouts.edit', [
            'workout' => $workout
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Workout  $workout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'workout_name' => 'required',
            'workout_type' => 'required',
            'workout_image' => 'required|mimes:jpg,png,gif|max:1024',
            'workout_description' => 'required',
            'workout_image' => 'required'
        ]);


        $workout = Workout::find($id);

        $workout->user_id = auth()->user()->id;
        $workout->workout_name = $request->workout_name;
        $workout->workout_type = $request->workout_type;
        $workout->description = $request->workout_description;
        $workout->youtube_link = $request->youtube_link;
        $workout->save();


        //Handle Images

        //Delete all other images before uploading new ones
        $formerImages = Workoutmedia::where('workout_id', $id)->get();
        foreach ($formerImages as $oldImage) {
            $oldImage->delete();
        }


        // //Upload new images
        $this->uploadMultipleImages($request,  $workout->id);

        Session::flash('success', 'Workout Updated');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Workout  $workout
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Crypt::decrypt($id);

        //YOU CAN ONLY DELETE WORKOUT YOU CREATED
        $workout = Workout::find($id);


        if ($workout->user_id !== auth()->user()->id) {
            Session::flash('error', 'Unauthorized Action');
            return redirect()->back();
        }

        $workout->delete();
        Session::flash('success', 'Delete Successful');
        return redirect()->route('workouts.index');
    }

    private function uploadMultipleImages($request, $workoutId)
    {
        $images = $request->file('workout_image');

        foreach ($images as $image) {

            //Get Name
            $imageName = time() . $image->getClientOriginalName();

            //Resize Image
            $img = Image::make($image)->fit(500)->encode();


            //Save with Filename
            Storage::put($imageName, $img);

            //Move file to location
            Storage::move($imageName, 'public/workout_images/' . $imageName);


            $workoutImage = new WorkoutMedia;
            $workoutImage->workout_id = $workoutId;
            $workoutImage->media_type = 'image';
            $workoutImage->image_url =  $imageName;
            $workoutImage->save();
        }
    }
}
