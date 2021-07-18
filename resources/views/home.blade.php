<!DOCTYPE html>
<html>
<head>
    <title>Booque</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('assets')}}/image/logo/logo-booque.svg" type="image/svg+xml" sizes="any">
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/home-style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" />
</head>
<body>
    <header>
        <div class="header-custom">
            <a href="#" id="logo">
                <img src="{{asset('assets')}}/image/logo/logo-booque.svg" class="logo">
                <span>Booque</span>
            </a>
            <ul>
                <li><a href="{{url('/')}}">Beranda</a></li>
                <li><a href="{{url('/blog')}}">Blog</a></li>
                <li><a href="#">Kontak Kami</a></li>
            </ul>
        </div>
    </header>
    <section>
        <div class="circle"></div>
        <div class="content-home">
            <div class="text-box">
                <h2>Bergabung dengan komunitas dan berkontribusi <br> <span>Booque</span></h2>
                <p>Mari bergabung bersama kami, komunitas berbagi buku pertama di Indonesia.</p>
                <a href="#">Download Aplikasi</a>
            </div>
            <div class="img-box">
                <img src="{{asset('assets')}}/image/onboard/human.svg" class="books">
            </div>
        </div>
        <div class="content-hero mt-5">

            <div class="owl-carousel position-relative mt-5" id="owl-how-to">
                
                <div class="card mt-4" style="background:#3A4275; color:#f2f2f2;">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="py-5" style="padding-left: 70px">
                                <h3>Cara Ikutan Berbagi</h3>
                                <div class="list">
                                    <div>
                                        <b>1.Tambah buku di Booque</b><br>
                                        <small>Ambil Gambar, Atur lokasi pengambilan - rumah , kantor atau lokasi publik.</small>
                                    </div>
                                    <div>
                                        <b>2.Terhubung dengan pengguna lain</b><br>
                                        <small>Tunggu pengguna lain menghubungi kamu.</small>
                                    </div>
                                    <div>
                                        <b>3.Selamat berbagi</b><br>
                                        <small>Selamat anda menjadi bagian dari Booque !</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 d-flex justify-content-center align-items-center">
                            <img src="{{asset('assets')}}/image/logo/logo-booque.svg" class="w-25">
                        </div>
                    </div>
                </div>

                <div class="card mt-4" style="background:#3A4275; color:#f2f2f2;">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="py-5" style="padding-left: 70px">
                                <h3>Cara Ikutan Berbagi</h3>
                                <div class="list">
                                    <div>
                                        <b>1.Tambah buku di Booque</b><br>
                                        <small>Ambil Gambar, Atur lokasi pengambilan - rumah , kantor atau lokasi publik.</small>
                                    </div>
                                    <div>
                                        <b>2.Terhubung dengan pengguna lain</b><br>
                                        <small>Tunggu pengguna lain menghubungi kamu.</small>
                                    </div>
                                    <div>
                                        <b>3.Selamat berbagi</b><br>
                                        <small>Selamat anda menjadi bagian dari Booque !</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 d-flex justify-content-center align-items-center">
                            <img src="{{asset('assets')}}/image/logo/logo-booque.svg" class="w-25">
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="content-hero py-3">
            <h2 class="text-center mb-5">
                Semangat Berbagi <br> Untuk Sesama
            </h2>
            <div class="container my-3">
                <div class="row">
                    
                    <div class="col-xl-4 col-lg-4 col-md-6 col-xs-12 col-sm-12">
                        <h1 class="fw-bold text-center" style="color: #3A4275;">{{$jml_buku}}</h1>
                        <h3 class="fw-bold text-center">Semua Buku</h3>
                    </div>
                    
                    <div class="col-xl-4 col-lg-4 col-md-6 col-xs-12 col-sm-12">
                        <h1 class="fw-bold text-center" style="color: #3A4275;">{{$jml_user}}</h1>
                        <h3 class="fw-bold text-center">Pengguna</h3>
                    </div>
                    
                    <div class="col-xl-4 col-lg-4 col-md-12 col-xs-12 col-sm-12">
                        <h1 class="fw-bold text-center" style="color: #3A4275;">{{$buku_terbagikan}}</h1>
                        <h3 class="fw-bold text-center">Buku Yang Terbagikan</h3>
                    </div>

                </div>
            </div>
        </div>
        <div class="content-about py-5">
            <div class="text-center mb-5">
                <h5 class="py-2">Tentang Booque</h5>
                <h2 class="py-2">Apa itu Booque</h2>
                <span class="py-2">Berawal dari keresahan kami tentang buku yang tidak terpakai.</span>
            </div>
            <div class="container">
                <div class="row d-flex">
                    <div class="col">
                        <img src="{{asset('assets')}}/image/onboard/reading.svg" class="w-75">
                    </div>
                    <div class="col align-self-center">
                        <h3 class="text-center">Booque</h3>
                        <p class="text-center">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-team py-5">
            <div class="text-center mb-5">
                <h5 class="my-3">Tim Booque</h5>
                <h2 class="my-2">Awal Mula Booque</h2>
                <span class="my-2">Berawal dari keresahan kami tentang buku yang tidak terpakai.</span>
            </div>
            <div class="owl-carousel position-relative" id="owl-team">
                
                <div class="card">
                    <img src="{{asset('assets')}}/image/avatar/male-avatar.svg" class="card-img-top w-25 m-auto">
                    <div class="card-body text-center">
                        <h4>Reza</h4>
                        <span class="fw-bold">Web Developer</span>
                    </div>
                </div>
                <div class="card">
                    <img src="{{asset('assets')}}/image/avatar/profile.svg" class="card-img-top w-25 m-auto">
                    <div class="card-body text-center">
                        <h4>Apek</h4>
                        <span class="fw-bold">Web Developer</span>
                    </div>
                </div>
                <div class="card">
                    <img src="{{asset('assets')}}/image/avatar/male-avatar.svg" class="card-img-top w-25 m-auto">
                    <div class="card-body text-center">
                        <h4>Bintang</h4>
                        <span class="fw-bold">Android Developer</span>
                    </div>
                </div>
                <div class="card">
                    <img src="{{asset('assets')}}/image/avatar/female-avatar.svg" class="card-img-top w-25 m-auto">
                    <div class="card-body text-center">
                        <h4>Novita</h4>
                        <span class="fw-bold">Web Developer</span>
                    </div>
                </div>
                <div class="card">
                    <img src="{{asset('assets')}}/image/avatar/female-avatar.svg" class="card-img-top w-25 m-auto">
                    <div class="card-body text-center">
                        <h4>Shinta</h4>
                        <span class="fw-bold">Web Developer</span>
                    </div>
                </div>

            </div>
        </div>
        <footer class="container py-5">
            <div class="row">
                <div class="col-12 text-left d-flex pb-3">
                    <img src="{{asset('assets')}}/image/logo/logo-booque.svg" style="width: 25px;">
                    <span style="font-size: 20px;" class="align-self-center ms-1">Booque</span>
                </div>
                <div class="col">
                    <ul>
                        <li class="fw-bold">Booque App</li>
                        <li class="mt-2">Berawal dari keresahan kami tentang buku yang tidak terpakai.</li>
                    </ul>
                </div>
                <div class="col">
                    <ul>
                        <li class="fw-bold">Menu</li>
                        <li class="mt-2"><a href="#">Beranda</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Kontak Kami</a></li>
                    </ul>
                </div>
                <div class="col">
                    <ul>
                        <li class="fw-bold">Berita</li>
                        <li class="mt-2">
                            <div class="input-group mb-3">
                              <input type="text" class="form-control" placeholder="Email Anda" aria-describedby="basic-addon2">
                              <span class="input-group-text btn-primary" id="basic-addon2">Kirim</span>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-12 text-muted text-center">
                    @Copyright Booque <?=Date('Y')?>
                </div>
            </div>
        </footer>
    </section>
</body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{asset('assets')}}/js/style.js"></script>
</html>