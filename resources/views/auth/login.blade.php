<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Responsive Meta Tag-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

    <!-- Favicon utk Logo di Browser-->
    <link rel="shortcut icon" href="{{ URL::to('/') }}/logo/">
    <!-- Untuk Judul di Browser-->
    <title>SIKP (Sistem Informasi Kerja Praktik)</title>

    <link rel="stylesheet" type="text/css" href="style.css">
    <style type="text/css">
        body {
            background-color: #fffefe;
            margin: 10px;
            font: 30/20px normal Helvetica, Arial, sans-serif;
            color: #000000;
        }

        h1 {
            text-align: center;
            font-weight: 50;
        }

        .login-box-msg {
            text-align: justify;
            /*membuat semua huruf menjadi kapital*/
            /*text-transform: uppercase;*/
        }

        .login-box {
            width: 500px;
            background: rgb(161, 178, 255);
            /*meletakkan form ke tengah*/
            margin: 100px auto;
            padding: 40px 50px;
        }

        label {
            font-size: 30pt;
        }

    </style>
</head>

<body>
    <br>
    <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
            <div class="row d-flex">
                <div class="col-lg-6">
                    <div class="card1 pb-5">
                        <div class="row"> <img src="{{ URL::to('/') }}/logo/Logo.png" width="400" height="400" class="card card0 border-0" alt=""> </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login-box">
                        <br>
                        <br>
                        <br>
                        <div class="login-box-body">
                            <p class="login-box-msg">Gunakan akun gmail google untuk masuk ke SIKP</p>
                            <form method="POST" action="{{ route('login') }}">
                                <a href="{{ route('login.provider', 'google') }}" class="btn btn-primary">
                                    <img src="{{ URL::to('/') }}/logo/google.jpg" height="25" width="25" class="rounded-circle" alt="">
                                    <strong> Login dengan Google</strong>
                                </a>
                            </form>
                        </div>
                </div>
            </div>
            <div class="bg-blue py-4">
                <div class="row px-4"> <strong class="ml-4 ml-sm-5 mb-2">Copyright &copy;rplrel 2021. referenced by eeef 2020.</strong>
                </div>
            </div>
        </div>
    </div>
</body>

</html>