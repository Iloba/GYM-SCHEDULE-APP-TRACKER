@extends('layouts.dashboard.index')

@section('content')

<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            @yield('content')
            <h1 class="app-page-title">Home</h1>

            <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
                <div class="inner">
                    <div class="app-card-body p-3 p-lg-4">
                        <h3 class="mb-3">Welcome, {{ Auth::user()->name }}!</h3>
                        <div class="row gx-5 gy-3">
                            <div class="col-12 col-lg-9">

                                <div>
                                    Enjoy Creating Schedules for your clients
                                </div>
                            </div>
                            <!--//col-->
                            <div class="col-12 col-lg-3">
                                {{-- <button class="btn btn-success">Button</button> --}}
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
                                    <h4 class="app-card-title">Clients</h4>
                                </div>
                                <!--//col-->
                            </div>
                            <!--//row-->
                        </div>
                        <!--//app-card-header-->
                        <div class="app-card-body px-4">

                            <div class="intro">Manage all your clients with Ease. Create, Edit and Delete Clients</div>
                        </div>
                        <!--//app-card-body-->
                        <div class="app-card-footer p-4 mt-auto">
                            <a class="btn app-btn-secondary" href="{{ route('clients.create') }}">Add New Client</a>
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
                                        <i class="fas fa-running"></i>
                                    </div>
                                    <!--//icon-holder-->

                                </div>
                                <!--//col-->
                                <div class="col-auto">
                                    <h4 class="app-card-title">Schedule Workouts</h4>
                                </div>
                                <!--//col-->
                            </div>
                            <!--//row-->
                        </div>
                        <!--//app-card-header-->
                        <div class="app-card-body px-4">

                            <div class="intro">Schedule workouts for clients. get them up and running.</div>
                        </div>
                        <!--//app-card-body-->
                        <div class="app-card-footer p-4 mt-auto">
                            <a class="btn app-btn-secondary" href="#">Create New</a>
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
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-tools"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M0 1l1-1 3.081 2.2a1 1 0 0 1 .419.815v.07a1 1 0 0 0 .293.708L10.5 9.5l.914-.305a1 1 0 0 1 1.023.242l3.356 3.356a1 1 0 0 1 0 1.414l-1.586 1.586a1 1 0 0 1-1.414 0l-3.356-3.356a1 1 0 0 1-.242-1.023L9.5 10.5 3.793 4.793a1 1 0 0 0-.707-.293h-.071a1 1 0 0 1-.814-.419L0 1zm11.354 9.646a.5.5 0 0 0-.708.708l3 3a.5.5 0 0 0 .708-.708l-3-3z" />
                                            <path fill-rule="evenodd"
                                                d="M15.898 2.223a3.003 3.003 0 0 1-3.679 3.674L5.878 12.15a3 3 0 1 1-2.027-2.027l6.252-6.341A3 3 0 0 1 13.778.1l-2.142 2.142L12 4l1.757.364 2.141-2.141zm-13.37 9.019L3.001 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026z" />
                                        </svg>
                                    </div>
                                    <!--//icon-holder-->

                                </div>
                                <!--//col-->
                                <div class="col-auto">
                                    <h4 class="app-card-title">Tools</h4>
                                </div>
                                <!--//col-->
                            </div>
                            <!--//row-->
                        </div>
                        <!--//app-card-header-->
                        <div class="app-card-body px-4">

                            <div class="intro">Sed maximus, libero ac pharetra elementum, turpis nisi molestie
                                neque, et tincidunt velit turpis non enim.</div>
                        </div>
                        <!--//app-card-body-->
                        <div class="app-card-footer p-4 mt-auto">
                            <a class="btn app-btn-secondary" href="#">Create New</a>
                        </div>
                        <!--//app-card-footer-->
                    </div>
                    <!--//app-card-->
                </div>
                <!--//col-->
            </div>
            <!--//row-->



            <div class="row g-4 mb-4">
                {{-- <div class="col-12 col-lg-6">
                    <div class="app-card app-card-progress-list h-100 shadow-sm">
                        <div class="app-card-header p-3">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto">
                                    <h4 class="app-card-title">Progress</h4>
                                </div>
                                <!--//col-->
                                <div class="col-auto">
                                    <div class="card-header-action">
                                        <a href="#">All projects</a>
                                    </div>
                                    <!--//card-header-actions-->
                                </div>
                                <!--//col-->
                            </div>
                            <!--//row-->
                        </div>
                        <!--//app-card-header-->
                        <div class="app-card-body">
                            <div class="item p-3">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <div class="title mb-1 ">Project lorem ipsum dolor sit amet</div>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%;"
                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <!--//col-->
                                    <div class="col-auto">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-right"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                                        </svg>
                                    </div>
                                    <!--//col-->
                                </div>
                                <!--//row-->
                                <a class="item-link-mask" href="#"></a>
                            </div>
                            <!--//item-->


                            <div class="item p-3">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <div class="title mb-1 ">Project duis aliquam et lacus quis ornare</div>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 34%;"
                                                aria-valuenow="34" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <!--//col-->
                                    <div class="col-auto">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-right"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                                        </svg>
                                    </div>
                                    <!--//col-->
                                </div>
                                <!--//row-->
                                <a class="item-link-mask" href="#"></a>
                            </div>
                            <!--//item-->

                            <div class="item p-3">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <div class="title mb-1 ">Project sed tempus felis id lacus pulvinar</div>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 68%;"
                                                aria-valuenow="68" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <!--//col-->
                                    <div class="col-auto">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-right"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                                        </svg>
                                    </div>
                                    <!--//col-->
                                </div>
                                <!--//row-->
                                <a class="item-link-mask" href="#"></a>
                            </div>
                            <!--//item-->

                            <div class="item p-3">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <div class="title mb-1 ">Project sed tempus felis id lacus pulvinar</div>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 52%;"
                                                aria-valuenow="52" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <!--//col-->
                                    <div class="col-auto">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-right"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                                        </svg>
                                    </div>
                                    <!--//col-->
                                </div>
                                <!--//row-->
                                <a class="item-link-mask" href="#"></a>
                            </div>
                            <!--//item-->

                        </div>
                        <!--//app-card-body-->
                    </div>
                    <!--//app-card-->
                </div> --}}
                <!--//col-->
                {{-- <div class="col-12 col-lg-6">
                    <div class="app-card app-card-stats-table h-100 shadow-sm">
                        <div class="app-card-header p-3">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto">
                                    <h4 class="app-card-title">Stats List</h4>
                                </div>
                                <!--//col-->
                                <div class="col-auto">
                                    <div class="card-header-action">
                                        <a href="#">View report</a>
                                    </div>
                                    <!--//card-header-actions-->
                                </div>
                                <!--//col-->
                            </div>
                            <!--//row-->
                        </div>
                        <!--//app-card-header-->
                        <div class="app-card-body p-3 p-lg-4">
                            <div class="table-responsive">
                                <table class="table table-borderless mb-0">
                                    <thead>
                                        <tr>
                                            <th class="meta">Source</th>
                                            <th class="meta stat-cell">Views</th>
                                            <th class="meta stat-cell">Today</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href="#">google.com</a></td>
                                            <td class="stat-cell">110</td>
                                            <td class="stat-cell">
                                                <svg width="1em" height="1em" viewBox="0 0 16 16"
                                                    class="bi bi-arrow-up text-success" fill="currentColor"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z" />
                                                </svg>
                                                30%
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">getbootstrap.com</a></td>
                                            <td class="stat-cell">67</td>
                                            <td class="stat-cell">23%</td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">w3schools.com</a></td>
                                            <td class="stat-cell">56</td>
                                            <td class="stat-cell">
                                                <svg width="1em" height="1em" viewBox="0 0 16 16"
                                                    class="bi bi-arrow-down text-danger" fill="currentColor"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z" />
                                                </svg>
                                                20%
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">javascript.com </a></td>
                                            <td class="stat-cell">24</td>
                                            <td class="stat-cell">-</td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">github.com </a></td>
                                            <td class="stat-cell">17</td>
                                            <td class="stat-cell">15%</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--//table-responsive-->
                        </div>
                        <!--//app-card-body-->
                    </div>
                    <!--//app-card-->
                </div> --}}
                <!--//col-->
            </div>
            <!--//row-->

        </div>
        <!--//container-fluid-->
    </div>
    <!--//app-content-->

</div>
@endsection