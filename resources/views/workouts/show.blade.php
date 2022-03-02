@extends('layouts.dashboard.index') @section('css')
<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css"
    integrity="sha512-+EoPw+Fiwh6eSeRK7zwIKG2MA8i3rV/DGa3tdttQGgWyatG/SkncT53KHQaS5Jh9MNOT3dmFL0FjTY08And/Cw=="
    crossorigin="anonymous"
/>
<style>
    .iframe {
        position: relative;
        width: 100%;
        padding-bottom: 56.25%;
        height: 0;
    }

    .iframe iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
</style>
@endsection @section('content')
<div class="app-wrapper">
    <div class="app-content">
        <div class="container-xl">
            <h3>All Clients</h3>
            <div class="card shadow-sm p-2">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <a
                            href="{{ route('workouts.create') }}"
                            class="btn btn-info btn-sm text-white mb-4"
                            ><i class="fas fa-plus"></i> Add Workouts</a
                        >
                        <h3 class="text-center mb-5">
                            {{ $workout->workout_name }}
                        </h3>
                        <div class="row p-3 justify-content-center mb-2">
                            <div
                                class="col-md-5 m-2 border border-1 mb-3 shadow-sm p-2"
                            >
                                <h5 class="text-center mb-5 m-1">
                                    About Workout
                                </h5>

                                <h4 class="text-center">
                                    {{ $workout->workout_name }}
                                </h4>
                                <p class="text-center">
                                    <i>Type: {{ $workout->workout_type }}</i>
                                    <br />
                                    <span>{{
                                        $workout->description }}</span>
                                </p>
                            </div>
                            <div
                                class="col-md-5 m-2 border border-1 shadow-sm p-2"
                            >
                                <h5 class="text-center mb-5">Video</h5>
                                @if ($workout->youtube_link)
                                <div class="iframe">
                                    <iframe
                                        width="390"
                                        height="215"
                                        src="{{ $workout->youtube_link }}"
                                        title="YouTube video player"
                                        frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen
                                    ></iframe>
                                </div>
                                @else
                                <p>No YOutube Video</p>
                                @endif
                            </div>
                        </div>
                        <div class="row p-3 shadow-sm justify-content-center">
                            <h5 class="text-center mb-5">Images</h5>
                            @forelse ($images as $image)
                            <div class="col-md-3 gallerys mb-3">
                                <a
                                    target="_blank"
                                    href="{{ asset('storage/workout_images/'.$image->image_url) }}"
                                    ><img
                                        class="img-fluid border border-1 p-2"
                                        src="{{ asset('storage/workout_images/'.$image->image_url) }}"
                                /></a>
                            </div>
                            @empty
                            <p>No Images Available</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
