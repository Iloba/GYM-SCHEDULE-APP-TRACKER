<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $workout->workout_name }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css"
        integrity="sha512-+EoPw+Fiwh6eSeRK7zwIKG2MA8i3rV/DGa3tdttQGgWyatG/SkncT53KHQaS5Jh9MNOT3dmFL0FjTY08And/Cw=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
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

</head>

<body>
    <div class="container-xl p-3">
        <div class="card shadow-sm p-2">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <h3 class="text-center mb-5">
                        {{ $workout->workout_name }}
                    </h3>
                    <div class="row p-3 justify-content-center mb-2">
                        <div class="col-md-5 m-2 border border-1 mb-3 shadow-sm p-2">
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
                        <div class="col-md-5 m-2 border border-1 shadow-sm p-2">
                            <h5 class="text-center mb-5">Video</h5>
                            @if ($workout->youtube_link)
                            <div class="iframe">
                                {!! $workout->youtube_link !!}
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
                            <a target="_blank" href="{{ asset('storage/workout_images/'.$image->image_url) }}"><img
                                    class="img-fluid border border-1 p-2"
                                    src="{{ asset('storage/workout_images/'.$image->image_url) }}" /></a>
                        </div>
                        @empty
                        <p>No Images Available</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"
        integrity="sha512-IsNh5E3eYy3tr/JiX2Yx4vsCujtkhwl7SLqgnwLNgf04Hrt9BT9SXlLlZlWx+OK4ndzAoALhsMNcCmkggjZB1w=="
        crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
                $(".gallerys").magnificPopup({
                    type: "image",
                    delegate: "a",
                    gallery: {
                        enabled: true,
                    },
                });
            });
    </script>
</body>

</html>