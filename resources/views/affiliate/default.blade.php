<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{asset('adminbackend/assets/images/favicon-32x32.png')}}" type="image/png" />
    <link href="{{asset('adminbackend/assets/plugins/input-tags/css/tagsinput.css')}}" rel="stylesheet" />
    <link href="{{asset('adminbackend/assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css')}}" rel="stylesheet" />
    <!--plugins-->
    <link href="{{asset('adminbackend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet" />
    <link href="{{asset('adminbackend/assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
    <link href="{{asset('adminbackend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
    <link href="{{asset('adminbackend/assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
    <!-- loader-->
    <link href="{{asset('adminbackend/assets/css/pace.min.css')}}" rel="stylesheet" />
    <script src="{{asset('adminbackend/assets/js/pace.min.js')}}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{asset('adminbackend/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('adminbackend/assets/css/app.css')}}" rel="stylesheet">
    <link href="{{asset('adminbackend/assets/css/icons.css')}}" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="{{asset('adminbackend/assets/css/dark-theme.css')}}" />
    <link rel="stylesheet" href="{{asset('adminbackend/assets/css/semi-dark.css')}}" />
    <link rel="stylesheet" href="{{asset('adminbackend/assets/css/header-colors.css')}}" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
    <link href="{{asset('adminbackend/assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Affiliate Dashboard</title>
</head>

<body>
    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
        @include('affiliate.body.sidebar')
        <!--end sidebar wrapper -->
        <!--start header -->
        @include('affiliate.body.header')
        <!--end header -->
        <!--start page wrapper -->
        <div class="page-wrapper">
            @yield('affiliate')
        </div>
        <!--end page wrapper -->
        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->
        <!--Start Back To Top Button--> 
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        @include('affiliate.body.footer')
    </div>
   
    <script src="{{asset('adminbackend/assets/js/bootstrap.bundle.min.js')}}"></script>
    <!--plugins-->
    <script src="{{asset('adminbackend/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('adminbackend/assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
    <script src="{{asset('adminbackend/assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
    <script src="{{asset('adminbackend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('adminbackend/assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js')}}"></script>
	<script>
		$(document).ready(function () {
			$('#image-uploadify').imageuploadify();
		})
	</script>
    <script src="{{asset('adminbackend/assets/plugins/chartjs/js/Chart.min.js')}}"></script>
    <script src="{{asset('adminbackend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{asset('adminbackend/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{asset('adminbackend/assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js')}}"></script>
    <script src="{{asset('adminbackend/assets/plugins/sparkline-charts/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('adminbackend/assets/plugins/jquery-knob/excanvas.js')}}"></script>
    <script src="{{asset('adminbackend/assets/plugins/jquery-knob/jquery.knob.js')}}"></script>
    <script>
        $(function() {
            $(".knob").knob();
        });
    </script>
    <script src="{{asset('adminbackend/assets/js/index.js')}}"></script>
    <script src="{{asset('adminbackend/assets/js/validate.min.js')}}"></script>
    <script src="{{asset('adminbackend/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script>
		$(document).ready(function() {
			$('#example').DataTable();
		});
	</script>
    <!--app JS-->
    <script src="{{asset('adminbackend/assets/js/app.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
 @if(Session::has('message'))
 var type = "{{ Session::get('alert-type','info') }}"
 switch(type){
    case 'info':
    toastr.info(" {{ Session::get('message') }} ");
    break;
    case 'success':
    toastr.success(" {{ Session::get('message') }} ");
    break;
    case 'warning':
    toastr.warning(" {{ Session::get('message') }} ");
    break;
    case 'error':
    toastr.error(" {{ Session::get('message') }} ");
    break; 
 }
 @endif 
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="{{asset('adminbackend/assets/plugins/input-tags/js/tagsinput.js')}}"></script>
 <script src="{{asset('adminbackend/assets/js/code.js') }}"></script>
 <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>
 {{-- <script src='https://cdn.tiny.cloud/1/vdqx2klew412up5bcbpwivg1th6nrh3murc6maz8bukgos4v/tinymce/5/tinymce.min.js' referrerpolicy="origin"> --}}
	<script>
		// tinymce.init({
		//   selector: '#mytextarea'
		// });
        $('#mytextarea').summernote();
    </script>
</body>

</html>