@php
$title = 'Home';
@endphp

@extends('layout.main')
@section('container')

<div class="container mt-2">
    <div class="row img-top-reveal">
        <div class="col-md-12 position-relative">
            <img src="{{ asset('images/img-top.png') }}" class="img-fluid" style="width: 100%; border-radius: 10px;" alt="Gambar Gitar">
            <div class="centered-text text-bottom">
                <h1><span class="auto-type"></span></h1>
            </div>
        </div>
    </div>
    <hr class="mb-4 mt-4 hr-reveal">
    <div class="row mt-4">
        <div class="col-md-4 card-left">
            <div class="card card-hover" style="width: 100%; border-radius: 10px;">
                <img src="{{ asset('images/electric-guitar.png') }}" class="card-img-top" alt="Gambar Gitar Listrik">
                <div class="card-body">
                    <h5 class="card-title">Gitar Listrik</h5>
                    <p class="card-text">Temukan suara kuat dan fleksibilitas gitar listrik. Cocok untuk rock, blues, jazz, dan lainnya.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 card-deep">
            <div class="card card-hover " style="width: 100%; border-radius: 10px;">
                <img src="{{ asset('images/acoustic-guitar.png') }}" class="card-img-top" alt="Gambar Gitar Akustik">
                <div class="card-body">
                    <h5 class="card-title">Gitar Akustik</h5>
                    <p class="card-text">Jelajahi nada hangat dan kaya dari gitar akustik, ideal untuk penyanyi-penulis lagu dan penggemar musik folk.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 card-right">
            <div class="card card-hover" style="width: 100%; border-radius: 10px;">
                <img src="{{ asset('images/bass-guitar.png') }}" class="card-img-top" alt="Gambar Gitar Bass">
                <div class="card-body">
                    <h5 class="card-title">Gitar Bass</h5>
                    <p class="card-text">Rasakan suara dalam dan resonan dari gitar bass, tulang punggung dari setiap band yang hebat.</p>
                </div>
            </div>
        </div>
    </div>
    <hr class="mb-4 mt-4 hr-reveal">
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <section class="about-us">
                    <h2 class="text-center fade-in">
                        <span class="span-title1" style="display: inline-block;">Tentang</span>
                        <span class="span-title" style="display: inline-block;">Kami</span>
                    </h2>
                    <img src="{{ asset('images/img-about-us.jpg') }}" class="img-fluid mx-auto d-block mt-3 mb-3 img-about-reveal" alt="Gambar Tentang Kami">
                    <p class="p-about-reveal">Di JV Music, kami memiliki hasrat terhadap gitar dan musik. Misi kami adalah menyediakan alat musik dan perlengkapan terbaik untuk musisi dari segala tingkatan, memastikan mereka memiliki alat yang mereka butuhkan untuk mencipta dan tampil sebaik mungkin.</p>
                    <p class="p-about-reveal">Kami menyediakan berbagai pilihan gitar listrik, akustik, dan bass berkualitas tinggi, serta aksesori dan perlengkapan, untuk memenuhi kebutuhan musisi di seluruh dunia. Apakah Anda pemula atau profesional berpengalaman, kami siap mendukung perjalanan musik Anda.</p>
                    <p class="p-about-reveal">Bergabunglah dengan komunitas pecinta musik kami dan temukan dunia suara di JV Music.</p>
                </section>
            </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
<script src="https://unpkg.com/scrollreveal"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {

        ScrollReveal({
            distance: "80px",
            duration: 2000,
            delay: 200,
            reset: true
        })

        ScrollReveal().reveal(".img-top-reveal", {
            origin: "top",
        })
        ScrollReveal().reveal(".p-about-reveal", { origin: "bottom" })
        ScrollReveal().reveal(".card-left, .span-title1", { origin: "left" })
        ScrollReveal().reveal(".card-right, .span-title", { origin: "right" })
        ScrollReveal().reveal(".hr-reveal", { origin: "center", duration: 6000})
        ScrollReveal().reveal(".img-about-reveal, .card-deep", { scale: 0.50, opacity: 0, duration: 2000 });
        ScrollReveal().reveal(".fade-in", { opacity: 0, duration: 2000, scale: 1, distance: "0px" });
        ScrollReveal().reveal(".span-title1", { origin: "left", opacity: 0, duration: 2000, scale: 1, distance: "0px" });
        ScrollReveal().reveal(".span-title", { origin: "right", opacity: 0, duration: 2000, scale: 1, distance: "0px" });

        var typed = new Typed(".auto-type", {
            strings: ["Selamat datang di JV Music", "Jelajahi perbedaan Gitar", "Temukan Gitar terbaik Anda"],
            typeSpeed: 100,
            backSpeed: 50,
            smartBackspace: true,
            loop: true
        });

        function adjustTypedFontSize() {
            var windowWidth = window.innerWidth;
            var fontSize;

            if (windowWidth < 576) {
                fontSize = '1.2rem';
            } else if (windowWidth < 768) {
                fontSize = '1.5rem';
            } else if (windowWidth < 992) {
                fontSize = '2rem';
            } else {
                fontSize = '2.5rem';
            }

            document.querySelector('.auto-type').style.fontSize = fontSize;
        }

        adjustTypedFontSize();
        window.addEventListener('resize', adjustTypedFontSize);
    });
</script>
@endsection
