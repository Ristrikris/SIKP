<!DOCTYPE html>
<html>

<head>
	<!-- Favicon utk Logo di Browser-->
	<link rel="shortcut icon" href="<?php echo e(URL::to('/')); ?>/logo/sikp.png">
	<!-- Untuk Judul di Browser-->
	<title>SIKP (Sistem Informasi Kerja Praktik)</title>
	<link href="<?php echo e(asset('material')); ?>/css/.min.css?v=2.1.1" rel="stylesheet" />
	 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	 <!-- Include all compiled plugins (below), or include individual files as needed -->
	 <script src="js/bootstrap.min.js"></script>
	 <script type="text/javascript" src="assets/js/jquery.js"></script>
	 <script type="text/javascript" src="assets/js/bootstrap.js"></script>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js' type='text/javascript'></script>
	<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">


		.navbar-icon-top .navbar-nav .nav-link > .fa {
		position: relative;
		width: 36px;
		font-size: 24px;
		}

		.navbar-icon-top .navbar-nav .nav-link > .fa > .badge {
		font-size: 0.75rem;
		position: absolute;
		right: 0;
		font-family: sans-serif;
		}

		.navbar-icon-top .navbar-nav .nav-link > .fa {
		top: 3px;
		line-height: 12px;
		}

		.navbar-icon-top .navbar-nav .nav-link > .fa > .badge {
		top: -10px;
		}

		@media (min-width: 576px) {
		.navbar-icon-top.navbar-expand-sm .navbar-nav .nav-link {
			text-align: center;
			display: table-cell;
			height: 70px;
			vertical-align: middle;
			padding-top: 0;
			padding-bottom: 0;
		}

		.navbar-icon-top.navbar-expand-sm .navbar-nav .nav-link > .fa {
			display: block;
			width: 48px;
			margin: 2px auto 4px auto;
			top: 0;
			line-height: 24px;
		}

		.navbar-icon-top.navbar-expand-sm .navbar-nav .nav-link > .fa > .badge {
			top: -7px;
		}
		}

		@media (min-width: 768px) {
		.navbar-icon-top.navbar-expand-md .navbar-nav .nav-link {
			text-align: center;
			display: table-cell;
			height: 70px;
			vertical-align: middle;
			padding-top: 0;
			padding-bottom: 0;
		}

		.navbar-icon-top.navbar-expand-md .navbar-nav .nav-link > .fa {
			display: block;
			width: 48px;
			margin: 2px auto 4px auto;
			top: 0;
			line-height: 24px;
		}

		.navbar-icon-top.navbar-expand-md .navbar-nav .nav-link > .fa > .badge {
			top: -7px;
		}
		}

		@media (min-width: 992px) {
		.navbar-icon-top.navbar-expand-lg .navbar-nav .nav-link {
			text-align: center;
			display: table-cell;
			height: 70px;
			vertical-align: middle;
			padding-top: 0;
			padding-bottom: 0;
		}

		.navbar-icon-top.navbar-expand-lg .navbar-nav .nav-link > .fa {
			display: block;
			width: 48px;
			margin: 2px auto 4px auto;
			top: 0;
			line-height: 24px;
		}

		.navbar-icon-top.navbar-expand-lg .navbar-nav .nav-link > .fa > .badge {
			top: -7px;
		}
		}

		@media (min-width: 1200px) {
		.navbar-icon-top.navbar-expand-xl .navbar-nav .nav-link {
			text-align: center;
			display: table-cell;
			height: 70px;
			vertical-align: middle;
			padding-top: 0;
			padding-bottom: 0;
		}

		.navbar-icon-top.navbar-expand-xl .navbar-nav .nav-link > .fa {
			display: block;
			width: 48px;
			margin: 0px auto 0px auto;
			top: 0;
			line-height: 24px;
		}

		.navbar-icon-top.navbar-expand-xl .navbar-nav .nav-link > .fa > .badge {
			top: -7px;
		}
		}
		</style>
</head>
<body>
	<!-- Header -->
	<!-- Navbar -->
	<header>
		<nav class="navbar navbar-icon-top navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="#">SIKP</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			  <span class="navbar-toggler-icon"></span>
			</button>
		  
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
			  <ul class="navbar-nav mr-auto">
				<li class="nav-item active">
				  <a class="nav-link" href="<?php echo e(URL::to('/')); ?>/home">
					</a>
				</li>
				</ul>
				<ul class="nav navbar-nav navbar-right" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
				<li><a href="login"><button type="button" class="btn btn-outline-warning">LOGOUT</button>
							<span class="fa fa-sign-out"></a>
						<form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
							<?php echo csrf_field(); ?>
						</form>
					</li>
				</ul>
				
	</header>
			</div>
		</nav>
	</header>
	<div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
<section class="content-header">
    <h3><b>Data Identitas Mahasiswa</b></h3>
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
</html><?php /**PATH D:\xampp\htdocs\sikp_fix\resources\views/sikp/Mahasiswa/registrasi.blade.php ENDPATH**/ ?>