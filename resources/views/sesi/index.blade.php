<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <title>JV Music Compare | Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="/css/sesi.css">
</head>
<body>
    <section class="background-image-section">
        <div class="container-fluid">
            <div class="row justify-content-center mt-5">
                <div class="col-md-6 col-lg-4">
                    <div class="card-login">
                        <div class="card-body">
                            <div class="d-flex justify-content-center align-items-center flex-column">
                                <img class="logo-sesi" src="{{ asset('images/logo-sesi.png') }}" alt="">
                            </div>
                            <form action="/sesi/login" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <div class="mb-3 text-end">
                                    <a href="/sesi/lupa-password" class="form-text">Lupa Password?</a>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn-login-fix btn w-100">Masuk</button>
                                </div>
                                <div class="mb-3 text-center">
                                    <a href="/sesi/register" class="btn-login btn w-100">Daftar</a>
                                </div>
                                <div class="mb-3 text-center">
                                    <a href="{{ route('google.redirect') }}" class="btn-login btn w-100">Login with Google</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.13/dist/sweetalert2.all.min.js"></script>

    <script>
        $(document).ready(function() {
            @if (session('failedLogin'))
                Swal.fire({
                    icon: 'error',
                    title: 'Login Gagal',
                    text: '{{ session('failedLogin') }}',
                    showConfirmButton: false,
                    timer: 2000
                });
            @endif
        });
    </script>
    @if (session('status') == 'password_reset')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Kata sandi berhasil diperbarui',
                text: 'Silahkan login',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
</body>
</html>
