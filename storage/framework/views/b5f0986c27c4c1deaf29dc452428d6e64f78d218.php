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
        <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading">SIKP </div>
        <div class="list-group list-group-flush">
            <a class="list-group-item list-group-item-action bg-light"href="<?php echo e(URL::to('/')); ?>/home">HOME</a>
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                LAYANAN
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="<?php echo e(URL::to('/')); ?>/sikp/suratKet">Surat Pengajuan KP</a>
                <a class="dropdown-item" href="<?php echo e(URL::to('/')); ?>/sikp/pengajuanPraKp">Pengajuan Pra KP</a>
                <a class="dropdown-item" href="<?php echo e(URL::to('/')); ?>/sikp/pengajuanKp">Pengajuan KP</a>
              </div>
            </li>
            <a href="<?php echo e(URL::to('/')); ?>/sikp/jadwalUjian" class="list-group-item list-group-item-action bg-light">Jadwal Ujian</a>
        </div>
        </div>
        <!-- /#sidebar-wrapper -->
        <!-- Page Content -->
        <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <button class="btn btn-primary" id="menu-toggle">MENU</button>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
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
        </nav>
        <div class="container-fluid">

				<!--content di halaman utama-->
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
    </body>
</html><?php /**PATH D:\SIKP\web\resources\views/sikp/layout/mahasiswaLayout.blade.php ENDPATH**/ ?>