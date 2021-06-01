@extends('template')
@section('title', 'Dashboard')
@section('header')
  <!-- Custom fonts for this template-->
  <link href="{{asset('assets/dashboard/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('assets/dashboard/css/sb-admin-2.min.css')}}" rel="stylesheet">
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
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Generate API Key</h6>
            </div>
            <div class="card-body">
				@if ($errors->any())
				  <div class="alert alert-danger">
				      <ul>
				          @foreach ($errors->all() as $error)
				              <li>{{ $error }}</li>
				          @endforeach
				      </ul>
				  </div>
				@endif
				@if (Session::has('success'))
				  <div class="alert alert-success">
				    <i class="fas fa-check-circle"></i> {{ Session::get('success') }}
				  </div>
				@endif
            	<form method="POST" action="{{url('generate-key')}}">
            		@csrf
            		<div class="form-group">
            			<label>Key Name</label>
            			<input type="text" name="keyname" class="form-control">
            		</div>
            		<div class="form-group">
            			<label>Email</label>
            			<input type="email" name="email" value="{{Auth::user()->email}}" {{(Auth::user()->level!=="admin"?'readonly':'')}} class="form-control">
            		</div>
            		<button class="btn btn-primary form-control" type="submit">Generate</button>
            	</form>
            </div>
          </div>
          <!-- Collapsable Card Example -->
          <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
              <h6 class="m-0 font-weight-bold text-primary">List API</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
              <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($apikey as $key)
                      <tr>
                        <td class="text-center">{{$loop->iteration}}</td>
                        <td class="text-center">{{$key->name}}</td>
                        <td class="text-center"><a href="#" class="btn btn-danger">Hapus</a></td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
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
@endsection
