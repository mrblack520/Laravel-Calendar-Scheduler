
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="">
   
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title> Admin - Dashboard</title>
	<link rel="stylesheet" href="{{ asset('css/vendors_css.css') }}">
	<!-- Style -->

<link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core/main.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid/main.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid/main.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/fullcalendar-custom.css') }}">


		<link rel="stylesheet" href="{{ asset('css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('css/skin_color.css') }}">
	
<style>
	#calendar {
  max-width: 1100px;
  margin: 40px auto;
}
</style>

  </head>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">

<div class="wrapper">
  <div id="loader"></div>

  <header class="main-header">
	<div class="d-flex align-items-center logo-box justify-content-center">
		<!-- Logo -->
		<a href="#" class="logo">
		  <!-- logo-->
		  <div class="logo-mini w-30">
			  {{-- <span class="light-logo"><img src="../images/logo-letter.png" alt="logo"></span>
			  <span class="dark-logo"><img src="../images/logo-letter.png" alt="logo"></span> --}}
		  </div>
		  <div class="logo-lg">
			  {{-- <span class="light-logo"><img src="../images/logo-light-text.png" alt="logo"></span>
			  <span class="dark-logo"><img src="../images/logo-light-text.png" alt="logo"></span> --}}
		  </div>
		</a>
	</div>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
	  <div class="app-menu">
		<ul class="header-megamenu nav">
			<li class="btn-group nav-item">
				<a href="#" class="waves-effect waves-light nav-link push-btn btn-outline no-border btn-primary-light text-dark hover-white" data-toggle="push-menu" role="button">
					<i data-feather="align-left"></i>
			    </a>
			</li>
			<li class="btn-group d-lg-inline-flex d-none">
				<div class="app-menu">
					<div class="search-bx mx-5">
						<form>
							<div class="input-group">
							  <input type="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
							  <div class="input-group-append">
								<button class="btn" type="submit" id="button-addon3"><i data-feather="search"></i></button>
							  </div>
							</div>
						</form>
					</div>
				</div>
			</li>



			</li>
		</ul>
	  </div>

      <div class="navbar-custom-menu r-side">
        <ul class="nav navbar-nav">
			<li class="btn-group nav-item d-lg-inline-flex d-none">
				<a href="#" data-provide="fullscreen" class="waves-effect waves-light nav-link btn-outline no-border full-screen btn-warning-light text-dark hover-white" title="Full Screen">
					<i data-feather="maximize"></i>
			    </a>
			</li>
		  <!-- Notifications -->
		  

	      <!-- User Account-->
          <li class="dropdown user user-menu">
            <a href="#" class="waves-effect waves-light dropdown-toggle no-border p-5 text-dark hover-white" data-bs-toggle="dropdown" title="User">
                <div class="inline-flex items-center">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />

                    @else
                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />


                </div>
                @endif
            </a>

            <ul class="dropdown-menu animated flipInX">
              <li class="user-body">
				<div class="dropdown-item block px-4 py-2 text-xs text-gray-400">
                    {{ __('Manage Account') }}
                </div></a>

				  <x-dropdown-link  href="{{ route('profile.show') }}">
                    {{ __('Profile') }}
                </x-dropdown-link></a>
                  <!-- Authentication -->
                  <div class="dropdown-divider"></div>
                  <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link href="{{ route('logout') }}"
                                     onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>



              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>

          </li>

        </ul>
      </div>
    </nav>
  </header>

  <aside class="main-sidebar">
	<div class="user-profile">
		<div class="profile-pic">
			<img src="{{ Auth::user()->profile_photo_url }}" alt="user">
			<div class="profile-info text-white"><h4> {{ Auth::user()->name }}</h4>

			</div>
		</div>
	</div>
    <!-- sidebar-->
	<section class="sidebar position-relative">
		<div class="multinav">
		<div class="multinav-scroll" style="height: 100%;">
			<!-- sidebar menu-->
            <ul class="sidebar-menu" data-widget="tree">
				<li><a href="/dashboard"><i data-feather="monitor"></i><span>Dashboard</span></a></li>
				<li class="treeview">
				  <a href="#">
					<i data-feather="grid"></i>
					<span>Manage </span>
					<span class="pull-right-container">
					  <i class="fa fa-angle-right pull-right"></i>
					</span>
				  </a>
				  <ul class="treeview-menu">
					
					@if (Auth::check())
					@if (Auth::user()->role == 1)
						<li><a href="{{ route('employee_page') }}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Employee</a></li>
						<li><a href="{{ route('company_page') }}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Companies</a></li>
					@elseif (Auth::user()->role == 2)
						<li><a href="{{ route('employee_page') }}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Employee</a></li>
				
					@elseif (Auth::user()->role == 0)
						<li><a href="/dashboard"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Calendar</a></li>
					@endif
				@endif
                </ul>
				</li>

  </aside>

  <div class="content-wrapper">
	<div class="container-full">

@yield("main")

    </div>
  </div>


   <!-- /.content-wrapper -->
   <footer class="main-footer">
    
	
  </footer>

  <!-- Control Sidebar -->
  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  
</div>
<!-- ./wrapper -->




	<!-- Page Content overlay -->


<!-- Vendor JS -->
<script src="{{ asset('js/vendors.min.js') }}"></script>
<script src="{{ asset('js/pages/chat-popup.js') }}"></script>
<script src="{{ asset('assets/icons/feather-icons/feather.min.js') }}"></script>

<script src="{{ asset('assets/vendor_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('assets/vendor_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>


<script src="{{ asset('js/template.js') }}"></script>

<script src="{{ asset('js/demo.js') }}"></script>
<script src="{{ asset('js/pages/dashboard.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
<script src="
https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@6.1.9/index.global.min.js
"></script>



@stack('scripts')
</body>
</html>
