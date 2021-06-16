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
    	<h1>Ada Apa di Booque?</h1>
    	<h5>Tips Dan Trik seputar buku</h5>
    	<form class="row">
    		<div class="col-lg-5 col-sm-5">
	    		<div class="input-group">
			      <input type="text" class="form-control" id="autoSizingInputGroup" placeholder="Cari kuy">
			      <input type="submit" class="btn btn-primary input-group-text" name="cari" value="Cari..">
			    </div>
    		</div>
    	</form>
    	<div class="row mt-4">
    		<!-- <div class="col-lg-6 col-sm-12 p-1">
                <div class="card">
                  <img src="https://lelogama.go-jek.com/cache/c7/27/c72786f250df9147b0bb82210890726a.webp" class="card-img-top rounded">
                  <div class="card-body p-0">
                    <h4 class="card-title">Ingfo</h4>
                    <h5 class="card-title">Card title</h5>
                  </div>
                </div>
    		</div>
            <div class="col-lg-6 col-sm-12 d-flex align-items-center">
                <div class="row">
                    <div class="col-lg-6 px-3 py-1">
                        <div class="card">
                          <img src="https://lelogama.go-jek.com/cache/c7/27/c72786f250df9147b0bb82210890726a.webp" class="card-img-top rounded">
                          <div class="card-body p-0">
                            <h4 class="card-title">Card title</h4>
                            <small class="card-title">19/09/2020</small>
                          </div>
                        </div>
                    </div>
                    <div class="col-lg-6 px-3 py-1">
                        <div class="card">
                          <img src="https://lelogama.go-jek.com/cache/c7/27/c72786f250df9147b0bb82210890726a.webp" class="card-img-top rounded">
                          <div class="card-body p-0">
                            <h4 class="card-title">Card title</h4>
                            <small class="card-title">19/09/2020</small>
                          </div>
                        </div>
                    </div>
                    <div class="col-lg-6 px-3 py-1">
                        <div class="card">
                          <img src="https://lelogama.go-jek.com/cache/c7/27/c72786f250df9147b0bb82210890726a.webp" class="card-img-top rounded">
                          <div class="card-body p-0">
                            <h4 class="card-title">Card title</h4>
                            <small class="card-title">19/09/2020</small>
                          </div>
                        </div>
                    </div>
                    <div class="col-lg-6 px-3 py-1">
                        <div class="card">
                          <img src="https://lelogama.go-jek.com/cache/c7/27/c72786f250df9147b0bb82210890726a.webp" class="card-img-top rounded">
                          <div class="card-body p-0">
                            <h4 class="card-title">Card title</h4>
                            <small class="card-title">19/09/2020</small>
                          </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="row p-0">
                @if(count($blog)<1)
                    <h1 class="text-center mt-4">Belum ada artikel..</h1>
                @else
                    @foreach($blog as $dataBlog)
                    <div class="col-lg-4 py-2">
                        <a href="{{'blog/'.$dataBlog->category_name.'/'.$dataBlog->slug}}">
                            <div class="card">
                              <img src="{{asset('storage/blog/thumbnail/'.$dataBlog->thumbnail)}}" class="card-img-top rounded">
                              <div class="card-body">
                                <h4 class="card-title">{{$dataBlog->article_name}}</h4>
                                <small class="card-title">{{date("d-m-Y",strtotime($dataBlog->tgl_buat))}}</small>
                              </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                @endif
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