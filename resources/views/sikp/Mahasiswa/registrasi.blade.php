<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SIKP</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        
        <script>
        jQuery(document).ready(function($){
            $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
            });
        })</script>
        <style>
            body {
        overflow-x: hidden;
        }
        #sidebar-wrapper {
        min-height: 100vh;
        margin-left: -15rem;
        -webkit-transition: margin .25s ease-out;
        -moz-transition: margin .25s ease-out;
        -o-transition: margin .25s ease-out;
        transition: margin .25s ease-out;
        }
        #sidebar-wrapper .sidebar-heading {
        padding: 0.875rem 1.25rem;
        font-size: 1.2rem;
        }
        #sidebar-wrapper .list-group {
        width: 15rem;
        }
        #page-content-wrapper {
        min-width: 100vw;
        }
        #wrapper.toggled #sidebar-wrapper {
        margin-left: 0;
        }
        @media (min-width: 768px) {
        #sidebar-wrapper {
            margin-left: 0;
        }
        #page-content-wrapper {
            min-width: 0;
            width: 100%;
        }
        #wrapper.toggled #sidebar-wrapper {
            margin-left: -15rem;
        }
        }
		</style>
</head>
<body>
	<div class="d-flex" id="wrapper">
        <!-- Sidebar -->
		<div id="page-content-wrapper">
			<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto mt-2 mt-lg-0">
					<ul class="nav navbar-nav navbar-right" href="{{ route('logout') }}" onclick="event.preventDefault();
							 document.getElementById('logout-form').submit();">
					<li><a href="login"><button type="button" class="btn btn-danger">LOGOUT</button>
								<span class="fa fa-sign-out"></a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
							</form>
				</div>		
            </div>
    </div>
	<div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
<section class="content-header">
    <h3><b>Registrasi Mahasiswa</b></h3>
            </section>
			<div class="container h-100">
   			 <div class="row h-100 justify-content-center align-items-center">
				<section class="content-header">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            @if(auth()->user()->photo)
                            <br><img src="{{ auth()->user()->photo }}" alt="photo" height="150" width="150" class="rounded-circle"><br><br>
                            @endif
                            <form method="post" action="/home_mahasiswa">
                            @csrf
                                <div class="form-group row">
                                    <div class="col-sm-15">
                                        {{ auth()->user()->name }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-15">
                                        {{ auth()->user()->email }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm col-form-label">NIM : </label> 
                                    <input type="number" class="form-control" id="inputPassword" name="nim" style="width:100px" require>
                                </div>
                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                            </form>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
	</div>
	</div>
	<hr />
	</div>
	</div>
	</div>
</body>
</html>