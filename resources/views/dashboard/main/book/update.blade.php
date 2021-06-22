@extends('template')
@section('title', 'Detail Book')
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
            <div class="card-header py-3 d-flex justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Detail {{$book->book_name}}</h6>
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
              <form method="POST" action="{{route('book.update',$book->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label for="book_name">Book Name</label>
                  <input type="text" name="book_name" id="book_name" value="{{$book->book_name}}" class="form-control">
                </div>
                <div class="form-group">
                  <label for="user">User</label>
                  <select class="form-control" name="user" id="user">
                    @foreach($user as $userData)
                    <option value="{{$userData->user_id}}" {{ $userData->id === $book->user_id ? 'selected' :'' }}>{{$userData->full_name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea id="description" class="form-control" name="description" rows="10">{{$book->description}}</textarea>
                </div>
                <div class="form-group">
                  <label for="address">Address</label>
                  <input type="text" name="address" id="address" value="{{$book->address}}" class="form-control">
                </div>
                <div class="form-group">
                  <label for="category">Category</label>
                  <select class="form-control" name="category" id="category">
                    @foreach($category as $categoryData)
                    <option value="{{$categoryData->id}}" {{ $categoryData->id === $book->category_id ? 'selected' :'' }}>{{$categoryData->category_name}}</option>
                    @endforeach
                  </select>
                </div>
                <label class="form-label">Thumbnail</label>
                <div class="custom-file mb-4">
                  <input type="file" class="custom-file-input" id="customFile" name="image">
                  <label class="custom-file-label" for="customFile">Pilih Gambar</label>
                </div>
                <div class="form-group">
                  <label for="author">Author</label>
                  <input type="text" name="author" id="author" value="{{$book->author}}" class="form-control">
                </div>
                <div class="form-group">
                  <label for="year">Year</label>
                  <input type="number" name="year" id="year" value="{{$book->year}}" class="form-control">
                </div>
                <div class="form-group">
                  <label for="publisher">Publisher</label>
                  <input type="text" name="publisher" id="publisher" value="{{$book->publisher}}" class="form-control">
                </div>
                <div class="form-group">
                  <label for="province">Province</label>
                  <select class="form-control" name="province" id="province">
                    @foreach($province as $provinceData)
                    <option value="{{$provinceData->id}}" {{ $provinceData->id === $book->province_id ? 'selected' :'' }}>{{$provinceData->province_name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="city">City</label>
                  <select class="form-control" name="city" id="city">
                    @foreach($city as $cityData)
                    <option value="{{$cityData->id}}" {{ $cityData->id === $book->city_id ? 'selected' :'' }}>{{$cityData->city_name}}</option>
                    @endforeach
                  </select>
                </div>
                <input type="submit" value="Edit" class="form-control btn btn-primary">
              </form>
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
  <script type="text/javascript">
    $(document).ready(function() {

      $('#customFile').on('change',function(){
          //get the file name
          var fileName = $(this).val();
          //replace the "Choose a file" label
          $(this).next('.custom-file-label').html(fileName);
      })
    });
  </script>
@endsection
