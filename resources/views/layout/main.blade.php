<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <title>JV Music Compare | {{ $title }}</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="/css/style.css">
    <style>
        body {
            overflow-y: scroll;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .nav-link-custom {
            padding: 0 20px;
            letter-spacing: .5px;
        }

        .footer {
            margin-top: auto;
            background-color: #343a40;
            color: #fff;
            padding: 20px 0;
        }

        .footer a {
            color: #fff;
            text-decoration: none;
        }

        html, body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
            margin: 0;
        }

        .container {
            flex: 1;
        }

        footer {
            flex-shrink: 0;
        }


    </style>
</head>

<body>
@include('partials.navbar')

<div class="container mt-2 mb-4">
    @yield('container')
</div>

@include('partials.footer')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        $(document).ready(function() {
            $('.selectpicker').selectpicker();
        });
    </script>

    <script>
        @if (session('successLogin'))
            Swal.fire({
                icon: 'success',
                title: 'Login Berhasil!',
                text: '{{ session('successLogin') }}',
                showConfirmButton: false,
                timer: 2000
            });
        @endif

        @if (session('failedLogin'))
            Swal.fire({
                icon: 'error',
                title: 'Login Gagal',
                text: '{{ session('failedLogin') }}',
                showConfirmButton: false,
                timer: 2000
            });
        @endif

        @if (session('successUpdateProfile'))
            Swal.fire({
                icon: 'success',
                title: 'Perubahan Berhasil!',
                text: '{{ session('successUpdateProfile') }}',
                showConfirmButton: false,
                timer: 2000
            });
        @endif
    </script>


</body>

</html>