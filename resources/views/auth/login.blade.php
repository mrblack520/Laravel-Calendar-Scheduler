<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('css/vendors_css.css') }}">
	<!-- Style -->
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('css/skin_color.css') }}">
	

    <title> Admin - Log in </title>
  
	
</head>
	
<body class="hold-transition theme-primary bg-img" >
	
	<div class="container h-p100">
		<div class="row align-items-center justify-content-md-center h-p100">	
			@if (session('status'))
							<div class="mb-4 font-medium text-sm text-green-600">
								{{ session('status') }}
							</div>
						@endif
			<div class="col-12">
				<div class="row justify-content-center g-0">
					<div class="col-lg-5 col-md-5 col-12">
						<div class="bg-white rounded10 shadow-lg">
							<div class="content-top-agile m-60 p-30 pb-0">
								<h2 class="text-primary">Let's Get Started</h2>
								
							</div>							
							
							<div class="p-30">
							
					
								<form  method="POST" action="{{ route('login') }}">
									@csrf
									
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
											<input class="form-control ps-15 bg-transparent"id="email"  type="email" name="email" :value="old('email')" required autofocus autocomplete="username" >
										</div>
									</div>
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text  bg-transparent"><i class="ti-lock"></i></span>
											<input  class="form-control ps-15 bg-transparent" id="password" type="password" name="password" required autocomplete="current-password">
										</div>
									</div>
									  <div class="row">
										<div class="col-6">
										  <div class="checkbox">
											<input type="checkbox" id="remember_me" name="remember" >
											<label for="basic_checkbox_1">Remember Me</label>
										  </div>
										</div>
										<!-- /.col -->
										<div class="col-6">
										 <div class="fog-pwd text-end">
											@if (Route::has('password.request'))
											<a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
												{{ __('Forgot your password?') }}
											</a>
										@endif	
										</div>
										</div>
										<!-- /.col -->
										<div class="col-12 text-center">
										  <button type="submit" class="btn btn-danger mt-10">SIGN IN</button>
										</div>
										<!-- /.col -->
									  </div>
								</form>	
								
							</div>						
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="{{ asset('js/vendors.min.js') }}"></script>
	<script src="{{ asset('js/pages/chat-popup.js') }}"></script>
	<script src="{{ asset('assets/icons/feather-icons/feather.min.js') }}"></script>
	
	<script src="{{ asset('assets/vendor_components/moment/min/moment.min.js') }}"></script>
	<script src="{{ asset('assets/vendor_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
	
	
	<!-- CrmX Admin App -->
	<script src="{{ asset('js/template.js') }}"></script>
	<script src="{{ asset('js/demo.js') }}"></script>
	<script src="{{ asset('js/pages/dashboard.js') }}"></script>
</body>

<!-- Mirrored from crmx-admin-template.multipurposethemes.com/bs5/main-minimal/auth_login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Oct 2023 11:01:00 GMT -->
</html>
