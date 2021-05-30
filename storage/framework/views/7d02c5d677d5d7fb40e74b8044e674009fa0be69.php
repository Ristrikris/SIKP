<!DOCTYPE html>
<html>

<head>
	<!-- Favicon utk Logo di Browser-->
	<link rel="shortcut icon" href="<?php echo e(URL::to('/')); ?>/logo/sikp.png">
	<!-- Untuk Judul di Browser-->
	<title>SIKP (Sistem Informasi Kerja Praktik)</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
			margin: 2px auto 4px auto;
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
					<i class="fa fa-home"></i> Home <span class="sr-only">(current)</span>
					</a>
				</li>
				<li class="nav-item">
				  	<a class="nav-link" href="<?php echo e(URL::to('/')); ?>/sikp/bimbingan_kp"> <i class="fa fa-list-alt"></i>Daftar Bimbingan KP</strong></a>
				<li class="nav-item">
				  	<a class="nav-link" href="<?php echo e(URL::to('/')); ?>/sikp/ujian_kp"> <i class="fa fa-calendar-o"></i>Jadwal Ujian</a>

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
	<!-- Bagian Content -->
	<div class="jumbotron jumbotron-fluid">
		<!-- bagian konten blog -->
		<div class="jumbotron jumbotron-fluid">
			<!--UTK MENAMPILKAN PESAN-->
			<?php if($message = Session::get('success')): ?>
			<div class="alert alert-success alert-block">
				<button type="button" class="close" data-dismiss="alert">×</button>
				<strong><?php echo e($message); ?></strong>
			</div>
			<?php endif; ?>

			<?php if($message = Session::get('error')): ?>
			<div class="alert alert-danger alert-block">
				<button type="button" class="close" data-dismiss="alert">×</button>
				<strong><?php echo e($message); ?></strong>
			</div>
			<?php endif; ?>

			<?php if($message = Session::get('warning')): ?>
			<div class="alert alert-warning alert-block">
				<button type="button" class="close" data-dismiss="alert">×</button>
				<strong><?php echo e($message); ?></strong>
			</div>
			<?php endif; ?>

			<?php if($message = Session::get('info')): ?>
			<div class="alert alert-info alert-block">
				<button type="button" class="close" data-dismiss="alert">×</button>
				<strong><?php echo e($message); ?></strong>
			</div>
			<?php endif; ?>

			<?php if($errors->any()): ?>
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert">×</button>
				Please check the form below for errors
			</div>
			<?php endif; ?>

			<div class="container-fluid">
				<?php echo $__env->yieldContent('konten'); ?>
			</div>
		</div>
	<hr />
	</div>
	</div>
	</div>
</body>
</html><?php /**PATH D:\xampp\htdocs\sikp_fix\resources\views/sikp/layout/dosenLayout.blade.php ENDPATH**/ ?>