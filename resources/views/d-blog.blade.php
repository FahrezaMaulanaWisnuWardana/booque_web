<!DOCTYPE html>
<html>
<head>
    <title>Booque</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('assets')}}/image/logo/logo-booque.svg" type="image/svg+xml" sizes="any">
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/home-style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" />
</head>
<body>
    <header>
        <div class="header-custom">
            <a href="{{url('/')}}" id="logo">
                <img src="{{asset('assets')}}/image/logo/logo-booque.svg" class="logo">
                <span>Booque</span>
            </a>
            <ul>
                <li><a class="text-dark" href="{{url('/')}}">Beranda</a></li>
                <li><a class="text-dark" href="{{url('/blog')}}">Blog</a></li>
                <li><a class="text-dark" href="{{url('/#kontak-kami')}}">Kontak Kami</a></li>
            </ul>
        </div>
    </header>
    <div class="container blog-container">
    	<div class="article mt-5">
	    	<h1 class="text-center">{{$blog->article_name}}</h1>
	    	<p class="text-center">{{date("d-m-Y",strtotime($blog->tgl_buat))}}</span>
	    	<div class="text-center">
	    		<img src="{{asset('storage/blog/thumbnail/'.$blog->thumbnail)}}" class="w-50">
	    	</div>
			<span class="badge rounded-pill bg-light text-dark mt-3">{{$blog->category_name}}</span>
			<div class="content">
				{!! $blog->article !!}
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
</body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="{{asset('assets')}}/js/style.js"></script>
</html>