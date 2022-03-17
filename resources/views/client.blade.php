@extends('layouts.dashboard.clients.index')
@section('content')

<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            @yield('content')
            <h1 class="app-page-title">Home</h1>

            <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
                <div class="inner">
                    <div class="app-card-body p-3 p-lg-4">
                        <h3 class="mb-3">Welcome, {{ Auth::guard('client')->user()->name }}!</h3>
                        <div class="row gx-5 gy-3">
                            <div class="col-12 col-lg-9">
                                <div>
                                    View your workout Schedules
                                </div>
                            </div>
                            <!--//col-->
                            <div class="col-12 col-lg-3">
                                {{--
                                <button class="btn btn-success">Button</button>
                                --}}
                            </div>
                            <!--//col-->
                        </div>
                        <!--//row-->
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <!--//app-card-body-->
                </div>
                <!--//inner-->
            </div>
            <!--//app-card-->

            <div class="row g-4 mb-4">
                <div class="col-12 col-lg-4">
                    <div class="app-card app-card-basic d-flex flex-column align-items-start shadow-sm">
                        <div class="app-card-header p-3 border-bottom-0">
                            <div class="row align-items-center gx-3">
                                <div class="col-auto">
                                    <div class="app-icon-holder">
                                        <i class="fas fa-users"></i>
                                    </div>
                                    <!--//icon-holder-->
                                </div>
                                <!--//col-->
                                <div class="col-auto">
                                    <h4 class="app-card-title">Chat</h4>
                                </div>
                                <!--//col-->
                            </div>
                            <!--//row-->
                        </div>
                        <!--//app-card-header-->
                        <div class="app-card-body px-4">
                            <div class="intro">
                               Chat with Instructor
                            </div>
                        </div>
                        <!--//app-card-body-->
                        <div class="app-card-footer p-4 mt-auto">
                            <a class="btn app-btn-secondary" href="">Chat</a>
                        </div>
                        <!--//app-card-footer-->
                    </div>
                    <!--//app-card-->
                </div>
                <!--//col-->
                <div class="col-12 col-lg-4">
                    <div class="app-card app-card-basic d-flex flex-column align-items-start shadow-sm">
                        <div class="app-card-header p-3 border-bottom-0">
                            <div class="row align-items-center gx-3">
                                <div class="col-auto">
                                    <div class="app-icon-holder">
                                        <i class="fas fa-calendar"></i>
                                    </div>
                                    <!--//icon-holder-->
                                </div>
                                <!--//col-->
                                <div class="col-auto">
                                    <h4 class="app-card-title">
                                        My Calendar
                                    </h4>
                                </div>
                                <!--//col-->
                            </div>
                            <!--//row-->
                        </div>
                        <!--//app-card-header-->
                        <div class="app-card-body px-4">
                            <div class="intro">
                               View all Pending Workouts
                            </div>
                        </div>
                        <!--//app-card-body-->
                        <div class="app-card-footer p-4 mt-auto">
                            <a class="btn app-btn-secondary" href="{{ route('client.calendar') }}">View</a>
                        </div>
                        <!--//app-card-footer-->
                    </div>
                    <!--//app-card-->
                </div>
                <!--//col-->
                
                <!--//col-->
            </div>
            <!--//row-->

            <div class="row g-4 mb-4">


            </div>
            <!--//row-->
        </div>
        <!--//container-fluid-->
    </div>
    <!--//app-content-->
</div>
@endsection