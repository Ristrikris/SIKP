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
					<i class="fa fa-home"></i> Home <span class="sr-only">(current)</span>
					</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					  <i class="fa fa-envelope-o">
						<span class="badge badge-primary"></span>
					  </i>
					  LAYANAN DOSEN
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					  <a class="dropdown-item" href="<?php echo e(URL::to('/')); ?>/sikp/koor_bimbingan_kp">Daftar Bimbingan KP</a>
					  <a class="dropdown-item" href="<?php echo e(URL::to('/')); ?>/sikp/koor_ujian_kp">Daftar Ujian KP</a>
					</div>
				  </li>
				  <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					  <i class="fa fa-envelope-o">
						<span class="badge badge-primary"></span>
					  </i>
					  LAYANAN KOORDINATOR
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					  <a class="dropdown-item" href="<?php echo e(URL::to('/')); ?>/sikp/batas_kp">Pengaturan Batas KP</a>
					  <a class="dropdown-item" href="<?php echo e(URL::to('/')); ?>/sikp/set_ujian">Pengaturan Ujian KP</a>
					  <a class="dropdown-item" href="<?php echo e(URL::to('/')); ?>/sikp/surat_ket">Daftar Pengajuan Surat Keterangan</a>
					  <a class="dropdown-item" href="<?php echo e(URL::to('/')); ?>/sikp/regis_kp">Registrasi KP</a>
					  <a class="dropdown-item" href="<?php echo e(URL::to('/')); ?>/sikp/regis_pra_kp">Registrasi Pra KP</a>
					  
					</div>
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
</html><?php /**PATH C:\xampp1\htdocs\sikp__\resources\views/sikp/layout/masterKoor.blade.php ENDPATH**/ ?>