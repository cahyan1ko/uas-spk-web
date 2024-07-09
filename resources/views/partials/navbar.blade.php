<div class="navbar-container sticky-top" style="background-color: #9e0059;">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="align-items-center">
                <button class="navbar-toggler me-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a href="/home" class="navbar-brand">
                    <img class="logo-nav" src="{{ asset('images/logo.png') }}" alt="JV Musik Compare Logo" class="img-fluid">
                </a>
            </div>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom {{ ($title === 'Home') ? 'active' : '' }} text-light" href="/home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom {{ ($title === 'Weight Product') ? 'active' : '' }} text-light" href="/weight-product">Weight Product</a>
                    </li>
                    @auth
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom {{ ($title === 'Entry Value') ? 'active' : '' }} text-light" href="/entry-value">Entry Value</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom {{ ($title === 'Result WP') ? 'active' : '' }} text-light" href="/result-wp">Result WP</a>
                    </li>
                    @if(auth()->user()->level === "admin")
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom {{ ($title === 'Admin Setting') ? 'active' : '' }} text-light" href="/kriteria">Setting</a>
                    </li>
                    @endif
                    @endauth
                </ul>
            </div>
            <div class="justify-content-end">
                <ul class="navbar-nav text-end">
                    @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/profile">Profil</a></li>
                            <li><a class="dropdown-item" href="#" onclick="confirmLogout(event)">Logout</a></li>
                        </ul>
                    </li>
                    @else
                    <div class="d-flex">
                        <li class="nav-item">
                            <a class="nav-link text-light me-2" href="{{ route('index') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{ route('register') }}">Register</a>
                        </li>
                    </div>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</div>

<style>
    @media (max-width: 991.98px) {
        .navbar-collapse {
            justify-content: flex-start;
        }
        .navbar-nav {
            width: 100%;
            text-align: center;
        }
        .navbar-nav .nav-item {
            width: 100%;
        }
        .navbar-toggler {
            order: -1;
            margin-right: 0;
        }
    }
    @media (max-width: 575.98px) {
        .d-flex {
            flex-direction: row;
            align-items: center;
            width: 100%;
            justify-content: space-between;
        }
        .navbar-toggler {
            margin-right: auto;
        }
        .navbar-nav .nav-link {
            margin: 0 0.5rem;
            font-size: 0.875rem;
        }
    }
</style>


<!-- Include SweetAlert library -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    function confirmLogout() {
        Swal.fire({
            title: 'Konfirmasi',
            text: 'Apakah Anda yakin ingin keluar?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Keluar',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '/sesi/logout';
            }
        });
    }

    @if (session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 2000
        });
    @endif

    function deleteKriteria(id) {
        Swal.fire({
            title: 'Anda yakin?',
            text: "Anda tidak akan dapat mengembalikan ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus saja!'
        }).then((result) => {
            if (result.isConfirmed) {
                var form = document.getElementById('delete-form-' + id);
                form.submit();
            }
        });
    }
</script>