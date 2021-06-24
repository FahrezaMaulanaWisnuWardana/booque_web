@extends('template')
@section('title', 'List Book')
@section('header')
  <!-- Custom fonts for this template-->
  <link href="{{asset('assets/dashboard/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('assets/dashboard/css/sb-admin-2.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/dashboard/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
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
            <div class="card-header py-3 d-flex justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">List Book</h6>
              <a class="m-0 font-weight-bold text-primary" href="{{route('booqer.create')}}"><i class="fas fa fa-plus"></i></a>
            </div>
            <div class="card-body">
        @if ($errors->any())
          <div class="alert alert-danger">
              @foreach ($errors->all() as $error)
                  {{ $error }}<br>
              @endforeach
          </div>
        @endif
        @if (Session::has('success'))
          <div class="alert alert-success">
            <i class="fas fa-check-circle"></i> {{ Session::get('success') }}
          </div>
        @endif
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Email</th>
                      <th>Login Type</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Email</th>
                      <th>Login Type</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($user as $data)
                      <tr>
                        <td class="text-center">{{$loop->iteration}}</td>
                        <td class="text-center">{{$data->email}} {!! $data->is_active === "1" ? '<span class="badge badge-pill badge-primary">Active</span>' : '<span class="badge badge-pill badge-danger">Not Active</span>' !!}</td>
                        <td class="text-center">{{$data->login_type}}</td>
                        <td class="text-center">
                            <form action="{{route('booqer.destroy',$data->id)}}" method="POST">
                              @csrf
                              @method('DELETE')
                              <div class="btn-group">
                                <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash"></i></button>
                                <a href="{{route('booqer.show',$data->id)}}" class="btn btn-outline-warning"><i class="fas fa-eye"></i></a>
                                <a href="{{route('booqer.edit',$data->id)}}" class="btn btn-outline-primary"><i class="fas fa-pen"></i></a>
                              </div>
                            </form>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
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
  <!-- Page level plugins -->
  <script src="{{asset('assets/dashboard/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('assets/dashboard/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('assets/dashboard/js/demo/datatables-demo.js')}}"></script>
@endsection
