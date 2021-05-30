<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
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
					<ul class="nav navbar-nav navbar-right" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
							 document.getElementById('logout-form').submit();">
					<li><a href="login"><button type="button" class="btn btn-danger">LOGOUT</button>
								<span class="fa fa-sign-out"></a>
							<form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
								<?php echo csrf_field(); ?>
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
                            <?php if(auth()->user()->photo): ?>
                            <br><img src="<?php echo e(auth()->user()->photo); ?>" alt="photo" height="150" width="150" class="rounded-circle"><br><br>
                            <?php endif; ?>
                            <form method="post" action="/home_mahasiswa">
                            <?php echo csrf_field(); ?>
                                <div class="form-group row">
                                    <div class="col-sm-15">
                                        <?php echo e(auth()->user()->name); ?>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-15">
                                        <?php echo e(auth()->user()->email); ?>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm col-form-label">NIM : </label> 
                                    <input type="text" class="form-control" id="inputPassword" name="nim" style="width:100px" require>
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
</html><?php /**PATH C:\xampp1\htdocs\sikp_fix\resources\views/sikp/Mahasiswa/registrasi.blade.php ENDPATH**/ ?>