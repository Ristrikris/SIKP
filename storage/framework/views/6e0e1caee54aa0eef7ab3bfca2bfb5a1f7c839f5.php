<!DOCTYPE html>
<html>

<head>
	<!-- Favicon utk Logo di Browser-->
	<link rel="shortcut icon" href="<?php echo e(URL::to('/')); ?>/logo/sikp.png">
	<!-- Untuk Judul di Browser-->
	<title>SIKP (Sistem Informasi Kerja Praktik)</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<style type="text/css">
		::selection {
			background-color: #E13300;
			color: white;
		}

		::-moz-selection {
			background-color: #E13300;
			color: white;
		}

		html,
		body {
			margin: 0;
			padding: 0;
			height: 100%;
		}

		body {
			background-color: #e1e8f0;
			/*kasi warna background*/
			margin: 10px;
			font: 13px/20px normal Helvetica, Arial, sans-serif;
			color: #000000;
			/*kasi warna tulisan*/
		}

		a {
			color: #000000;
			background-color: transparent;
			font-weight: normal;
		}

		h1 {
			color: #000000;
			background-color: transparent;
			border-bottom: 1px solid #D0D0D0;
			font-size: 19px;
			font-weight: normal;
			margin: 0 0 14px 0;
			padding: 14px 15px 10px 15px;
		}

		code {
			font-family: Consolas, Monaco, Courier New, Courier, monospace;
			font-size: 12px;
			background-color: #f5f7f7;
			border: 1px solid #D0D0D0;
			color: #000000;
			display: block;
			margin: 10px 0 10px 0;
			padding: 10px 10px 10px 10px;
		}

		#body {
			margin: 0 15px 0 15px;
		}

		p.footer {
			text-align: right;
			font-size: 11px;
			border-top: 1px solid #D0D0D0;
			line-height: 32px;
			padding: 0 10px 0 10px;
			margin: 20px 0 0 0;
		}

		#container {
			/*margin: 5px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;*/
			min-height: 100%;
			position: relative;
		}

		.jumbotron {
			background-color: #f5f7f7;
			/*kasi warna background*/
			margin: 10px 0 10px 0;
			font: 13px/20px normal Helvetica, Arial, sans-serif;
			color: #000000;
			/*kasi warna tulisan*/
		}

		#footer {
			height: 50px;
			padding-left: 10px;
			line-height: 50px;
			background: #333;
			color: #fff;
			position: absolute;
			bottom: 0px;
			width: 100%;
			/*biar memenuhi layar*/
		}

		#content {
			padding: 10px;
			padding-bottom: 60px;
			/*sama atau lebih besar dari tinggi footer*/
		}

		#copyright {
			bottom: 0;
			width: 100%;
			position: fixed;
			height: 50px;
			line-height: 50px;
			background: #3c3a3a;
			color: #fff;
			padding-left: 10px;
		}

		.header {
			background: #0cf;
			padding: 10px;
		}

		.content {
			padding: 10px;
		}
	</style>
</head>
<body>
	<!-- Header -->
	<header>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<img src="<?php echo e(URL::to('/')); ?>/logo/sikp.png" width="30" height="30" class="d-inline-block align-top" alt="">
			<a href="/home" class="navbar-brand"><b>SIKP</b></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="<?php echo e(URL::to('/')); ?>/home"></span><span class="glyphicon glyphicon-home"></span><b>Home</b></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo e(URL::to('/')); ?>/sikp/jadwalUjian"><span class="glyphicon glyphicon-list-alt"></span><b>Jadwal Ujian</b></a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-tasks"></span>
							<b>Layanan</b>
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="<?php echo e(URL::to('/')); ?>/sikp/suratKet">
								<span class="glyphicon glyphicon-envelope"></span>
									<b>Pengajuan Surat Keterangan</b></a>
							<a class="dropdown-item" href="<?php echo e(URL::to('/')); ?>/sikp/pengajuanPraKp">
								<span class="glyphicon glyphicon-tasks"></span>
									<b>Pengajuan Pra KP</b></a>
							<a class="dropdown-item" href="<?php echo e(URL::to('/')); ?>/sikp/pengajuanKp">
								<span class="glyphicon glyphicon-tasks"></span>
									<b>Pengajuan KP</b></a>
						</div>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
					<li><a href="login">Logout
							<span class="glyphicon glyphicon-log-out"></a>
						<form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
							<?php echo csrf_field(); ?>
						</form>
					</li>
				</ul>
			</div>
		</nav>
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
	<!-- Bagian Footer -->
	<footer class="main-footer" align="center">
		<strong>Copyright &copy; 2020 <a href="#">RPL 2020</a> feat <a>E E E F</a>.</strong> All rights reserved.
	</footer>
</body>
</html><?php /**PATH D:\xampp\htdocs\sikp\resources\views/sikp/layout/masterMhs.blade.php ENDPATH**/ ?>