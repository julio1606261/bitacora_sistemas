<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Login</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="favicon.ico"> 
    
    <!-- FontAwesome JS-->
    <script defer src="{{asset('/js/fontawesome/js/all.min.js') }}"></script>

    <script defer src="{{asset('/js/app.js')}}"></script>
       
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="{{asset('/css/portal.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
   
    <link id="theme-style" rel="stylesheet" href="{{asset('/css/btn.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

</head> 

<body class="app app-login p-0">
    @include('sweetalert::alert')  	
    <div class="row g-0 app-auth-wrapper">
	    <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
		    <div class="d-flex flex-column align-content-end">
			    <div class="app-auth-body mx-auto">	
				    <div class="app-auth-branding mb-4"><a class="app-logo" href="#"><img class="logo-icon me-2" src="{{asset('images/logo_sipsa.png')}}" alt="logo"></a></div>
					<h1 class="auth-heading text-center mb-5">Ingreso al sistema</h1>
                        <div class="auth-form-container text-start">
                            <form class="auth-form login-form" method="POST" action="{{route('login_store')}}">
                                @method('POST')
                                @csrf     
                                <div class="mb-3">
                                    <label class="sr-only" for="signin-email">Usuario</label>
                                    <input id="signin-email" name="usuario" type="text" class="form-control signin-email" placeholder="Usuario" required="required">
                                </div><!--//form-group-->
                                <div class="mb-3">
                                    <label class="sr-only" for="signin-password">Contraseña</label>
                                    <input id="signin-password" name="contrasena" type="password" class="form-control signin-password" placeholder="Contraseña" required="required">
                                        <div class="extra mt-3 row justify-content-between"></div><!--//extra-->
                                </div><!--//form-group-->
                                <div class="text-center">
                                    <button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto" style="font-size: 1rem;">Ingresar</button>
                                </div>
                            </form>
                        </div><!--//auth-form-container-->	
			    </div><!--//auth-body-->	  
		    </div><!--//flex-column-->   
	    </div><!--//auth-main-col-->

	    <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
		    <div class="auth-background-holder">
		    </div>
		    <div class="auth-background-mask"></div>
		    <div class="auth-background-overlay p-3 p-lg-5">
			    <div class="d-flex flex-column align-content-end h-100">
				    <div class="h-100"></div>
				    {{-- <div class="overlay-content p-3 p-lg-4 rounded">
					    <h5 class="mb-3 overlay-title">Explore Portal Admin Template</h5>
					    <div>Portal is a free Bootstrap 5 admin dashboard template. You can download and view the template license <a href="https://themes.3rdwavemedia.com/bootstrap-templates/admin-dashboard/portal-free-bootstrap-admin-dashboard-template-for-developers/">here</a>.</div>
				    </div> --}}
				</div>
		    </div><!--//auth-background-overlay-->
	    </div><!--//auth-background-col-->
    
    </div><!--//row-->


</body>
</html> 

