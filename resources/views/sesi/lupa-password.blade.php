<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <title>JV Music Compare | Reset Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa; /* Background color */
        }
        .card {
            margin-top: 50px; /* Spacing from top */
        }
        .card-header {
            background-color: #9E0059; /* Header background color */
            color: white; /* Header text color */
            font-size: 1.5rem; /* Header font size */
            font-weight: bold; /* Header font weight */
        }
        .btn-kirim-forgot {
            color: #9E0059;
            border: 1px solid #9E0059;

        }
        .btn-kirim-forgot:hover {
            background-color: #9E0059;
            color: #fff;
        }
        .btn-back{
            color: #9E0059;
            border: 1px solid #9E0059;
        }
        .btn-back:hover{
            background-color: #9E0059;
            color: #fff;
        }
    </style>
</head>

<body>

    <section>
        <div class="container">
            <div class="row mb-3 mt-2">
                <div class="col">
                    <a href="#" onclick="history.go(-1)" class="btn btn-back"><i class="fas fa-arrow-left me-1"></i></a>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow">
                        <div class="card-header">{{ __('Reset Password') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @endif

                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf

                                <div class="mb-3">
                                    <label for="email" class="form-label">{{ __('Email') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <button type="submit" class="btn btn-kirim-forgot">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
