<!doctype html>
	<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<title>{{ config('app.name', 'Laravel') }}</title>

		<!-- Fontawesome 6 cdn -->
		<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css' integrity='sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==' crossorigin='anonymous' referrerpolicy='no-referrer' />

		<!-- Fonts -->
		<link rel="dns-prefetch" href="//fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

		<!-- Usando Vite -->
		@vite(['resources/js/app.js'])
	</head>

	<body>
		<div id="app">

			<div class="container-fluid vh-100">
				<div class="row h-100">
					<nav id="sidebarMenu" class="col-md-3 col-lg-2 bg-dark d-md-block navbar-dark sidebar collapse border-end border-dark border-opacity-10">
						<div class="position-sticky pt-3">
							<ul class="nav flex-column ">

								<li class="nav-item">
									<a class="p-3 nav-link text-white " href="/">
										<i class="me-3 fa-solid fa-home-alt fa-lg fa-fw"></i> Home
									</a>
								</li>

								<li class="nav-item">
									<a class="p-3 rounded-3 nav-link text-white {{ Route::currentRouteName() == 'admin.dashboard' ? ' my_shadow ' : '' }}" href="{{route('admin.dashboard')}}">
										<i class="me-3 fa-solid fa-tachometer-alt fa-lg fa-fw"></i> Dashboard
									</a>
								</li>

								<li class="nav-item">
									<a class="p-3 rounded-3 nav-link text-white {{ Route::currentRouteName() == 'admin.posts.index' ? ' my_shadow ' : '' }}" href="{{route('admin.posts.index')}}">
										<i class="me-3 fa-solid fa-image fa-lg fa-fw"></i> Posts
									</a>
								</li>

								<li class="nav-item">
									<a class="p-3 rounded-3 nav-link text-white {{ Route::currentRouteName() == 'admin.posts.create' ? ' my_shadow ' : '' }}" href="{{route('admin.posts.create')}}">
										<i class="me-3 fa-solid fa-add fa-lg fa-fw"></i> Aggiungi post
									</a>
								</li>

								<li class="nav-item">
									<a class="p-3 nav-link text-white" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
										<i class="me-3 fa-solid fa-sign-out-alt fa-lg fa-fw"></i> {{ __('Logout') }}
									</a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
										@csrf
									</form>
								</li>

							</ul>

						</div>
					</nav>

					<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
						@yield('content')
					</main>
				</div>
			</div>

		</div>
	</body>

	</html>