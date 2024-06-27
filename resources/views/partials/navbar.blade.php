<div class="navbar-container sticky-top" style="background-color: #388697;">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="/">JV Musik Compare</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ ($title === 'Home') ? 'active' : '' }} text-light" href="/home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ ($title === 'Weight Product') ? 'active' : '' }} text-light" href="/weight-product">Weight Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ ($title === 'Entry Value') ? 'active' : '' }} text-light" href="/entry-value">Entry Value</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ ($title === 'Result WP') ? 'active' : '' }} text-light" href="/result-wp">Result WP</a>
                    </li>
                    @if(auth()->user()->level === "admin")
                    <li class="nav-item">
                        <a class="nav-link {{ ($title === 'Admin Setting') ? 'active' : '' }} text-light" href="/admin/setting">Setting</a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#" onclick="confirmLogout(event)">Keluar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>

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
                // Lakukan logout
                window.location.href = '/sesi/logout';
            }
        });
    }
</script>