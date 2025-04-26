<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login Kasir</title>
    <link rel="icon" href="{{asset('assets/img/unsplash/logo.png')}}" type="image/x-icon">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{asset('assets/modules/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/modules/fontawesome/css/all.min.css')}}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{asset('assets/modules/bootstrap-social/bootstrap-social.css')}}">
    <link rel="stylesheet" href="{{asset('assets/modules/izitoast/css/iziToast.min.css')}}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
    
    <style>
        body {
            background: linear-gradient(135deg,white, #3498db);
            min-height: 100vh;
        }
        .login-container {
            padding-top: 80px;
        }
        .card {
            border-radius: 15px;
            border: none;
            overflow: hidden;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }
        .card-header {
            background: #17a2b8;
            color: white;
            text-align: center;
            padding: 25px;
            border-bottom: none;
        }
        .card-header h4 {
            color: white;
            font-size: 24px;
            font-weight: 600;
            margin: 0;
        }
        .card-body {
            padding: 40px 30px;
        }
        .form-control {
            height: 50px;
            border-radius: 8px;
            box-shadow: none;
            border: 1px solid #ddd;
            margin-bottom: 20px;
            padding: 10px 15px;
        }
        .form-control:focus {
            border-color: #17a2b8;
            box-shadow: 0 0 0 0.2rem rgba(23, 162, 184, 0.25);
        }
        .btn-login {
            height: 50px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            background: #17a2b8;
            border-color: #17a2b8;
            transition: all 0.3s;
        }
        .btn-login:hover {
            background: #138496;
            border-color: #138496;
            transform: translateY(-2px);
        }
        .signup-link {
            text-align: center;
            margin-bottom: 20px;
        }
        .text-info {
            color: #17a2b8 !important;
        }
        .login-brand {
            text-align: center;
            margin-bottom: 30px;
        }
        .login-brand img {
            width: 80px;
            height: 80px;
        }
        .register-link {
            font-weight: 600;
        }
        .input-group {
            margin-bottom: 20px;
        }
        .input-group-prepend .input-group-text {
            background-color: #f7f7f7;
            border-right: none;
        }
    </style>
</head>

<body class="bg-light">
    <div id="app">
        <section class="section d-flex align-items-center" style="min-height: 100vh;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-5">
                        <div class="text-center mb-4">
                            <img src="{{asset('assets/img/unsplash/logo.png')}}" alt="Logo" width="90" class="mb-3">
                            <h4 class="text-info font-weight-bold">E-Kasir</h4>
                        </div>

                        <div class="card shadow border-0">
                            <div class="card-body p-4">
                                <form method="POST" action="/postlogin" class="needs-validation" novalidate>
                                    @csrf

                                    <div class="form-group">
                                        <label class="text-info" for="email">Email</label>
                                        <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus placeholder="Masukkan Email">
                                        <div class="invalid-feedback">Please fill in your email</div>
                                    </div>

                                    <div class="form-group">
                                        <label class="text-info" for="password">Password</label>
                                        <input id="password" type="password" class="form-control" name="password" tabindex="2" required placeholder="Masukkan Password">
                                        <div class="invalid-feedback">Please fill in your password</div>
                                    </div>

                                    <div class="form-group text-center">
                                        <span>Belum punya akun?</span>
                                        <a href="/daftar" class="text-info">Daftar</a>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-info btn-lg btn-block" tabindex="4">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="text-center mt-3 d-none">
                            <a href="/forgot-password" class="text-sm text-info">Lupa Password?</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


    <!-- General JS Scripts -->
    <script src="{{asset('assets/modules/jquery.min.js')}}"></script>
    <script src="{{asset('assets/modules/popper.js')}}"></script>
    <script src="{{asset('assets/modules/tooltip.js')}}"></script>
    <script src="{{asset('assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
    <script src="{{asset('assets/modules/moment.min.js')}}"></script>
    <script src="{{asset('assets/js/stisla.js')}}"></script>

    <!-- JS Libraies -->
    <script src="{{asset('assets/modules/izitoast/js/iziToast.min.js')}}"></script>
    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="{{asset('assets/js/scripts.js')}}"></script>
    <script src="{{asset('assets/js/custom.js')}}"></script>
    @if(session('status'))
    <script>
        iziToast.success({
            title: 'Password Reset!',
            message: '{{session('status')}}',
            position: 'topLeft'
        });
    </script>
    @elseif(session('gagal'))
    <script>
        iziToast.error({
            title: 'Gagal Login!',
            message: '{{session('gagal')}}',
            position: 'topLeft'
        });
    </script>
    @elseif(session('sukses'))
    <script>
        iziToast.success({
            title: 'Sukses!',
            message: '{{session('sukses')}}',
            position: 'topLeft'
        });
    </script>
    @endif
</body>

</html>