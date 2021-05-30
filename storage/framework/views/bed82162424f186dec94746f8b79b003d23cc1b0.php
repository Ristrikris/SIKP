<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Responsive Meta Tag-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

    <!-- Favicon utk Logo di Browser-->
    <link rel="shortcut icon" href="<?php echo e(URL::to('/')); ?>/logo/sikp.png">
    <!-- Untuk Judul di Browser-->
    <title>SIKP (Sistem Informasi Kerja Praktik)</title>

    <link rel="stylesheet" type="text/css" href="style.css">
    <style type="text/css">
        body {
            background-color: #e1e8f0;
            /*kasi warna background*/
            margin: 10px;
            font: 13px/20px normal Helvetica, Arial, sans-serif;
            color: #000000;
            /*kasi warna tulisan*/
        }

        h1 {
            text-align: center;
            /*ketebalan font*/
            font-weight: 50;
        }

        .login-box-msg {
            text-align: center;
            /*membuat semua huruf menjadi kapital*/
            /*text-transform: uppercase;*/
        }

        .login-box {
            width: 350px;
            background: white;
            /*meletakkan form ke tengah*/
            margin: 80px auto;
            padding: 30px 20px;
        }

        label {
            font-size: 11pt;
        }

        .login-logo {
            display: block;
            margin-left: auto;
            margin-right: auto;
            max-width: 100%;
            height: auto;
        }
    </style>
</head>

<body>
    <br>
    <h1>Selamat Datang!</h1><br>
    <div class="login-box">
        <img src="<?php echo e(URL::to('/')); ?>/logo/sikp.png" width="140" height="140" class="login-logo" alt="">
        <br>
        <div class="login-box-body">
            <p class="login-box-msg">Silahkan Login menggunakan email UKDW Anda</p>
            <form method="POST" action="<?php echo e(route('login')); ?>">
                <a href="<?php echo e(route('login.provider', 'google')); ?>" class="btn btn-lg btn-primary btn-block">
                    <img src="<?php echo e(URL::to('/')); ?>/logo/google.jpg" height="25" width="25" class="rounded-circle" alt="">
                    <strong> Login dengan Google</strong>
                </a>
            </form>
        </div>
    </div>
</body>

</html><?php /**PATH D:\xampp\htdocs\sikp\resources\views/auth/login.blade.php ENDPATH**/ ?>