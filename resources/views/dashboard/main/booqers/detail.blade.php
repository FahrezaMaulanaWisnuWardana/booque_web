@extends('template')
@section('title', 'Detail Book')
@section('header')
  <!-- Custom fonts for this template-->
  <link href="{{asset('assets/dashboard/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('assets/dashboard/css/sb-admin-2.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css" integrity="sha256-tdcssN5ck+PmJDZmao3pZxBuewye+gY3KhQTKYAJ+Y8=" crossorigin="anonymous">
@endsection
@section('content')
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
      @include('dashboard.layout.sidebar')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        @include('dashboard.layout.topbar')
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="container">
                <label>Data User : </label>
                <div class="row">
                  <div class="col-lg-6 col-sm-12 col-xs-12">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item">Name : {{$user->full_name}}</li>
                      <li class="list-group-item">Address : {{$user->address}}</li>
                      <li class="list-group-item">Phone : {{$user->phone}}</li>
                    </ul>
                  </div>
                  <div class="col-lg-6 col-sm-12 col-xs-12">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item">Email : {{$user->email}} {!! $user->is_active === "1" ? '<span class="badge badge-pill badge-primary">Active</span>':'<span class="badge badge-pill badge-warning">Not Active</span>' !!}</li>
                      <li class="list-group-item">Province : {{$user->province_name}}</li>
                      <li class="list-group-item">City : {{$user->city_name}}</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="text-center mt-4">
                  <div class="btn-group">
                    <button type="submit" class="btn btn-outline-danger hapus-confirm" data-id="1">
                      <form action="{{route('booqer.destroy',$user->id)}}" method="POST" id="hapus-1">
                        @csrf
                        @method('DELETE')
                      </form>
                      <i class="fas fa-trash"></i>
                    </button>
                    <a href="{{route('booqer.edit',$user->id)}}" class="btn btn-outline-primary"><i class="fas fa-pen"></i></a>
                  </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

</body>
@endsection
@section('footer')
  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('assets/dashboard/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('assets/dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('assets/dashboard/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('assets/dashboard/js/sb-admin-2.min.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js" integrity="sha256-HutwTOHexZPk7phZTEa350wtMYt10g21BKrAlsStcvw=" crossorigin="anonymous"></script>
  <script src="{{asset('assets/js/confirm.js')}}"></script>
@endsection