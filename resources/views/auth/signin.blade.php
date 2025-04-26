<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Daftar Kasir</title>
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
        .register-container {
            padding-top: 50px;
            padding-bottom: 50px;
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
        .btn-register {
            height: 50px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            background: #17a2b8;
            border-color: #17a2b8;
            transition: all 0.3s;
        }
        .btn-register:hover {
            background: #138496;
            border-color: #138496;
            transform: translateY(-2px);
        }
        .login-link {
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
        .login-link-text {
            font-weight: 600;
        }
        .input-group {
            margin-bottom: 20px;
        }
        .input-group-prepend .input-group-text {
            background-color: #f7f7f7;
            border-right: none;
        }
        .custom-select {
            height: 50px;
            border-radius: 8px;
        }
        #warning-message {
            font-size: 12px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div id="app">
        <section class="section">
            <div class="container register-container">
                <div class="row">
                    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2">
                        <div class="login-brand">
                            <h2 class="text-white mb-0"><i class="fas fa-cash-register mr-2"></i> E-Kasir</h2>
                        </div>

                        <div class="card shadow">
                            <div class="card-header">
                                <h4>Daftar Akun Baru</h4>
                            </div>
                            @error('status')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                            <div class="card-body">
                                <form method="POST" action="/user/daftar" class="needs-validation" id="form-daftar">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-info" for="nama">Nama</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                    </div>
                                                    <input id="nama" type="text" class="form-control" name="nama"
                                                        tabindex="1" autofocus placeholder="Masukkan Nama" oninput="validasiInput(this)">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-info" for="email">Email</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                    </div>
                                                    <input id="email" type="email" class="form-control" name="email"
                                                        tabindex="2" placeholder="Masukkan Email">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="d-block">
                                                    <label for="password" class="control-label text-info">Password</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                                        </div>
                                                        <input id="password" type="password" class="form-control"
                                                            name="password" tabindex="3" placeholder="Masukan Password">
                                                    </div>
                                                    <div id="warning-message" style="color: red; display: none;">
                                                        Password minimal 8 karakter dan 1 huruf kapital
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label text-info" for="Level">Login sebagai</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                                                    </div>
                                                    <select class="custom-select" name="level" id="level" tabindex="4">
                                                        <option value="">-- Pilih Level --</option>
                                                        <option value="admin">Admin</option>
                                                        <option value="kasir">Kasir</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group login-link">
                                        <span>Sudah punya akun? </span>
                                        <a href="/login" class="text-info login-link-text">
                                            Login Sekarang
                                        </a>
                                    </div>

                                    <div class="form-group col-sm-6 mx-auto">
                                        <button type="submit" class="btn btn-info btn-lg btn-block btn-register" tabindex="5">
                                            <i class="fas fa-user-plus mr-2"></i> Daftar
                                        </button>
                                    </div>
                                </form>
                            </div>
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
        iziToast.error({
            title: 'Gagal Daftar!',
            message: '{{session('status')}}',
            position: 'topRight'
        });
    </script>
    @endif
    <script>
    function validasiInput(inputElement) {
      // Membuang karakter angka dari nilai input
      inputElement.value = inputElement.value.replace(/[^a-zA-Z]/g, '');
    }

    // Ambil referensi ke elemen input password
    const passwordInput = document.getElementById('password');

    // Tambahkan event listener untuk memeriksa input setiap kali pengguna mengetik
    passwordInput.addEventListener('input', function() {
        // Ambil nilai password dari input
        const password = passwordInput.value;

        // Periksa panjang password
        const isLengthValid = password.length >= 8;

        // Periksa apakah setidaknya satu huruf kapital ada di dalam password
        const hasCapitalLetter = /[A-Z]/.test(password);

        // Jika panjang password tidak mencukupi atau tidak memiliki huruf kapital
        if (!isLengthValid || !hasCapitalLetter) {
            // Tampilkan pesan kesalahan
            document.getElementById('warning-message').style.display = 'block';
        } else {
            // Hapus pesan kesalahan jika password valid
            document.getElementById('warning-message').style.display = 'none';
        }
    });
  </script>
</body>

</html>