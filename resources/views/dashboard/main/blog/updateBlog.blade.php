@extends('template')
@section('title', 'Edit article')
@section('header')
  <!-- Custom fonts for this template-->
  <link href="{{asset('assets/dashboard/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('assets/dashboard/css/sb-admin-2.min.css')}}" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
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
              <h6 class="m-0 font-weight-bold text-primary">Edit article</h6>
            </div>
            <div class="card-body">
              @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
              @endif
              <form method="POST" action="{{url('dashboard/update-blog',$blog->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
              <div class="form-group">
                <label for="title-blog" class="form-label">Title</label>
                <input type="text" class="form-control" id="title-blog" name="title" value="{{$blog->article_name}}">
              </div>
                <label class="form-label">Thumbnail</label>
              <div class="custom-file mb-4">
                <input type="file" class="custom-file-input" id="customFile" name="thumbnail">
                <label class="custom-file-label" for="customFile">Choose file</label>
              </div>
              <div class="form-group">
                <label for="title-blog" class="form-label">Content</label>
                <textarea id="summernote" class="form-control" name="content">{!! $blog->article !!}</textarea>
              </div>
              <div class="form-group">
                <label for="title-blog" class="form-label">Category</label>
                <select class="form-control" name="category">
                    @foreach ($category as $data)
                      <option value="{{$data->id}}" {{$blog->id === $data->id ? 'selected':''}}>{{$data->category_name}}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <input type="submit" value="Update" class="form-control btn btn-primary">
              </div>
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

  <!-- Page level custom scripts -->
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {

      $('#customFile').on('change',function(){
          //get the file name
          var fileName = $(this).val();
          //replace the "Choose a file" label
          $(this).next('.custom-file-label').html(fileName);
      })
      $('#summernote').summernote({
        toolbar:[
          ['style', ['bold', 'italic', 'underline', 'clear']],
          ['font', ['strikethrough', 'superscript', 'subscript']],
          ['fontsize', ['fontsize']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['height', ['height']],
          ['insert',['picture']]
        ],
        height:400,
        popatmouse:true
      });
    });
  </script>
@endsection
