@extends('layouts.dashboard.header')
@section('body-of-dashboard')

<head>
	<!-- FontAwesome JS-->
	<script defer src="{{ asset('js/all.min.js') }}"></script>

	<!-- App CSS -->
	<link rel="stylesheet" href="{{ asset('css/portal.css') }}">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap"
		rel="stylesheet">
	<style rel="stylesheet">
		* {
			font-family: 'Poppins', sans-serif;
		}
	</style>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
		integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	@yield('css')
</head>

<body class="app">
	<header class="app-header fixed-top">
		<div class="app-header-inner">
			<div class="container-fluid py-2">
				<div class="app-header-content">
					<div class="row justify-content-between align-items-center">

						<div class="col-auto">
							<a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
								<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30"
									role="img">
									<title>Menu</title>
									<path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10"
										stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path>
								</svg>
							</a>
						</div>
						<!--//col-->
						<div class="search-mobile-trigger d-sm-none col">
							<i class="search-mobile-trigger-icon fas fa-search"></i>
						</div>
						<!--//col-->
						<div class="app-search-box col">
							<form class="app-search-form">
								<input type="text" placeholder="Search..." name="search"
									class="form-control search-input">
								<button type="submit" class="btn search-btn btn-primary" value="Search"><i
										class="fas fa-search"></i></button>
							</form>
						</div>
						<!--//app-search-box-->

						<div class="app-utilities col-auto">
							<div class="app-utility-item app-notifications-dropdown dropdown">
								<a class="dropdown-toggle no-toggle-arrow" id="notifications-dropdown-toggle"
									data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"
									title="Notifications">
									<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
									<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bell icon"
										fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2z" />
										<path fill-rule="evenodd"
											d="M8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z" />
									</svg>
									<span class="icon-badge">1</span>
								</a>
								<!--//dropdown-toggle-->

								<div class="dropdown-menu p-0" aria-labelledby="notifications-dropdown-toggle">
									<div class="dropdown-menu-header p-3">
										<h5 class="dropdown-menu-title mb-0">Notifications</h5>
									</div>
									<!--//dropdown-menu-title-->
									<div class="dropdown-menu-content">
										<div class="item p-3">
											<div class="row gx-2 justify-content-between align-items-center">
												<div class="col-auto">
													<img class="profile-image" src="{{ asset('img/profile-2.png') }}"
														alt="">

												</div>
												<!--//col-->
												<div class="col">
													<div class="info">
														<div class="desc">Amy shared a file with you. Lorem ipsum dolor
															sit amet, consectetur adipiscing elit. </div>
														<div class="meta"> 2 hrs ago</div>
													</div>
												</div>
												<!--//col-->
											</div>
											<!--//row-->
											<a class="link-mask" href=""></a>
										</div>
										<!--//item-->
									</div>
									<!--//dropdown-menu-content-->

									<div class="dropdown-menu-footer p-2 text-center">
										<a href="">View all</a>
									</div>

								</div>
								<!--//dropdown-menu-->
							</div>
							<!--//app-utility-item-->
							<div class="app-utility-item">
								<a href="" title="Settings">
									<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
									<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-gear icon"
										fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd"
											d="M8.837 1.626c-.246-.835-1.428-.835-1.674 0l-.094.319A1.873 1.873 0 0 1 4.377 3.06l-.292-.16c-.764-.415-1.6.42-1.184 1.185l.159.292a1.873 1.873 0 0 1-1.115 2.692l-.319.094c-.835.246-.835 1.428 0 1.674l.319.094a1.873 1.873 0 0 1 1.115 2.693l-.16.291c-.415.764.42 1.6 1.185 1.184l.292-.159a1.873 1.873 0 0 1 2.692 1.116l.094.318c.246.835 1.428.835 1.674 0l.094-.319a1.873 1.873 0 0 1 2.693-1.115l.291.16c.764.415 1.6-.42 1.184-1.185l-.159-.291a1.873 1.873 0 0 1 1.116-2.693l.318-.094c.835-.246.835-1.428 0-1.674l-.319-.094a1.873 1.873 0 0 1-1.115-2.692l.16-.292c.415-.764-.42-1.6-1.185-1.184l-.291.159A1.873 1.873 0 0 1 8.93 1.945l-.094-.319zm-2.633-.283c.527-1.79 3.065-1.79 3.592 0l.094.319a.873.873 0 0 0 1.255.52l.292-.16c1.64-.892 3.434.901 2.54 2.541l-.159.292a.873.873 0 0 0 .52 1.255l.319.094c1.79.527 1.79 3.065 0 3.592l-.319.094a.873.873 0 0 0-.52 1.255l.16.292c.893 1.64-.902 3.434-2.541 2.54l-.292-.159a.873.873 0 0 0-1.255.52l-.094.319c-.527 1.79-3.065 1.79-3.592 0l-.094-.319a.873.873 0 0 0-1.255-.52l-.292.16c-1.64.893-3.433-.902-2.54-2.541l.159-.292a.873.873 0 0 0-.52-1.255l-.319-.094c-1.79-.527-1.79-3.065 0-3.592l.319-.094a.873.873 0 0 0 .52-1.255l-.16-.292c-.892-1.64.902-3.433 2.541-2.54l.292.159a.873.873 0 0 0 1.255-.52l.094-.319z" />
										<path fill-rule="evenodd"
											d="M8 5.754a2.246 2.246 0 1 0 0 4.492 2.246 2.246 0 0 0 0-4.492zM4.754 8a3.246 3.246 0 1 1 6.492 0 3.246 3.246 0 0 1-6.492 0z" />
									</svg>
								</a>
							</div>
							<!--//app-utility-item-->

							<div class="app-utility-item app-user-dropdown dropdown">
								<a class="dropdown-toggle" id="user-dropdown-toggle" data-bs-toggle="dropdown" href="#"
									role="button" aria-expanded="false"><img src="{{ asset('img/profile-2.png') }}"
										alt="user profile"></a>
								<ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
									<li><a class="dropdown-item" href="">Account: {{ Auth::user()->name }}</a></li>
									<li><a class="dropdown-item" href="">Settings</a></li>
									<li>
										<hr class="dropdown-divider">
									</li>
									<li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
										document.getElementById('logout-form').submit();">
											Logout</a></li>

									<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
										@csrf
									</form>
								</ul>
							</div>
							<!--//app-user-dropdown-->
						</div>
						<!--//app-utilities-->
					</div>
					<!--//row-->
				</div>
				<!--//app-header-content-->
			</div>
			<!--//container-fluid-->
		</div>
		<!--//app-header-inner-->
		<div id="app-sidepanel" class="app-sidepanel">
			<div id="sidepanel-drop" class="sidepanel-drop"></div>
			<div class="sidepanel-inner d-flex flex-column">
				<a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
				<div class="app-branding">
					<a class="app-logo" href=""><img class="logo-icon me-2" src="{{ asset('img/portal-logo.svg') }}"
							alt="logo"><span class="logo-text">FITNESS
							APP</span></a>

				</div>
				<!--//app-branding-->

				<nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
					<ul class="app-menu list-unstyled accordion" id="menu-accordion">
						<li class="nav-item">
							<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
							<a class="nav-link" href="{{ route('home') }}">
								<span class="nav-icon">
									<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door"
										fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd"
											d="M7.646 1.146a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5H9.5a.5.5 0 0 1-.5-.5v-4H7v4a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4h3.5V7.707L8 2.207l-5.5 5.5z" />
										<path fill-rule="evenodd"
											d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
									</svg>
								</span>
								<span class="nav-link-text">Home</span>
							</a>
							<!--//nav-link-->
						</li>
						<!--//nav-item-->
						<li class="nav-item">
							<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
							<a class="nav-link" href="{{ route('clients.index') }}">
								<span class="nav-icon">
									<i width="1em" height="1em" class="fas fa-users "></i>
								</span>
								<span class="nav-link-text">Clients</span>
							</a>
							<!--//nav-link-->
						</li>
						<!--//nav-item-->
						<li class="nav-item">
							<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
							<a class="nav-link" href="{{ route('schedules.index') }}">
								<span class="nav-icon">
									<i class="fas fa-calendar"></i>
								</span>
								<span class="nav-link-text">Schedule Workouts</span>
							</a>
							<!--//nav-link-->
						</li>
						<li class="nav-item">
							<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
							<a class="nav-link" href="{{ route('workouts.index') }}">
								<span class="nav-icon">
									<i class="fas fa-running"></i>
								</span>
								<span class="nav-link-text">Workouts</span>
							</a>
							<!--//nav-link-->
						</li>
					</ul>
					<!--//app-menu-->
				</nav>
				<!--//app-nav-->
				<div class="app-sidepanel-footer">
					<nav class="app-nav app-nav-footer">
						<ul class="app-menu footer-menu list-unstyled">
							<li class="nav-item">
								<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
								<a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
								document.getElementById('logout-form').submit();">

									<span class="nav-icon">
										<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-gear"
											fill="currentColor" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd"
												d="M8.837 1.626c-.246-.835-1.428-.835-1.674 0l-.094.319A1.873 1.873 0 0 1 4.377 3.06l-.292-.16c-.764-.415-1.6.42-1.184 1.185l.159.292a1.873 1.873 0 0 1-1.115 2.692l-.319.094c-.835.246-.835 1.428 0 1.674l.319.094a1.873 1.873 0 0 1 1.115 2.693l-.16.291c-.415.764.42 1.6 1.185 1.184l.292-.159a1.873 1.873 0 0 1 2.692 1.116l.094.318c.246.835 1.428.835 1.674 0l.094-.319a1.873 1.873 0 0 1 2.693-1.115l.291.16c.764.415 1.6-.42 1.184-1.185l-.159-.291a1.873 1.873 0 0 1 1.116-2.693l.318-.094c.835-.246.835-1.428 0-1.674l-.319-.094a1.873 1.873 0 0 1-1.115-2.692l.16-.292c.415-.764-.42-1.6-1.185-1.184l-.291.159A1.873 1.873 0 0 1 8.93 1.945l-.094-.319zm-2.633-.283c.527-1.79 3.065-1.79 3.592 0l.094.319a.873.873 0 0 0 1.255.52l.292-.16c1.64-.892 3.434.901 2.54 2.541l-.159.292a.873.873 0 0 0 .52 1.255l.319.094c1.79.527 1.79 3.065 0 3.592l-.319.094a.873.873 0 0 0-.52 1.255l.16.292c.893 1.64-.902 3.434-2.541 2.54l-.292-.159a.873.873 0 0 0-1.255.52l-.094.319c-.527 1.79-3.065 1.79-3.592 0l-.094-.319a.873.873 0 0 0-1.255-.52l-.292.16c-1.64.893-3.433-.902-2.54-2.541l.159-.292a.873.873 0 0 0-.52-1.255l-.319-.094c-1.79-.527-1.79-3.065 0-3.592l.319-.094a.873.873 0 0 0 .52-1.255l-.16-.292c-.892-1.64.902-3.433 2.541-2.54l.292.159a.873.873 0 0 0 1.255-.52l.094-.319z" />
											<path fill-rule="evenodd"
												d="M8 5.754a2.246 2.246 0 1 0 0 4.492 2.246 2.246 0 0 0 0-4.492zM4.754 8a3.246 3.246 0 1 1 6.492 0 3.246 3.246 0 0 1-6.492 0z" />
										</svg>
									</span>
									<span class="nav-link-text">Logout</span>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
										@csrf
									</form>
								</a>
								<!--//nav-link-->
							</li>
							<!--//nav-item-->

						</ul>
						<!--//footer-menu-->
					</nav>
				</div>
				<!--//app-sidepanel-footer-->

			</div>
			<!--//sidepanel-inner-->
		</div>
		<!--//app-sidepanel-->
	</header>
	<!--//app-header-->
	<div class="m-2 p-2">
		@yield('content')
		<div id="calendar">

		</div>
	</div>
	<!--//app-wrapper-->
	<footer class="app-footer">
		<div class="container text-center py-3">
			<!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
			<small class="copyright">Designed with <i class="fas fa-heart" style="color: #fb866a;"></i> by <a class=""
					href="https://rooah.xyz" target="_blank">Rooah!</a></small>

		</div>
	</footer>

	<!-- Javascript -->
	<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
		integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
		integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"
		integrity="sha512-IsNh5E3eYy3tr/JiX2Yx4vsCujtkhwl7SLqgnwLNgf04Hrt9BT9SXlLlZlWx+OK4ndzAoALhsMNcCmkggjZB1w=="
		crossorigin="anonymous"></script>
	@stack('scripts')
	@stack('scripts1')


	<script src="{{ asset('js/dashboard.js') }}"></script>



	<script src="{{ asset('js/plugins/popper.min.js') }}"></script>
	<script src="{{ asset('js/plugins/bootstrap/js/bootstrap.min.js') }}"></script>


	<!-- Page Specific JS -->
	

</body>

@endsection