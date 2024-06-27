<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <section>
        <div class="w-50 center border rounded px-3 py3 mx-auto my-4">
            <h2 class="text-center">JV Music Compare | {{ $title }}</h2>
            <form form action="/sesi/login" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="mb-3 d-grid">
                    <button name="submit" type="submit" class="btn btn-primary">Masuk</button>
                </div>
                <div class="mb-3">
                    <a href="/sesi/register" class="btn btn-primary d-grid mb-3">Daftar</a>
                </div>
                <a href="{{ route('google.redirect') }}" class="btn btn-primary d-grid mb-3">
                    Google
                </a>

            </form>
        </div>
    </section>
</body>

</html>