<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{asset('js/vue.js')}}"></script>
    <script src="{{asset('lawSystem/assets/js/jquery.js')}}"></script>
    <script src="{{asset('js/axios.js')}}"></script>
    <title> @yield('title') </title>
    <link rel="shortcut icon" href="{{asset('lawSystem/assets/images/logo4.png')}}" title=""/>
    <link rel="stylesheet" href="{{asset('lawSystem/assets/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('lawSystem/assets/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('lawSystem/assets/css/main.css')}}"/>
    <link rel="stylesheet" href="{{asset('lawSystem/assets/css/select2.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('lawSystem/assets/css/icons.css')}}"/>
    <link rel="stylesheet" href="{{asset('lawSystem/assets/css/jquery.toast.css')}}"/>
    @yield('stylesheets')
    @include('layouts.header')
    @include('layouts.nav')
</head>
<body>

@yield('content')

@include('layouts.footer')
<!-- end main-wrapper -->

<script src="{{asset('lawSystem/assets/js/jquery.js')}}"></script>
<script src="{{asset('lawSystem/assets/js/multiselect.js')}}"></script>
<script src="{{asset('lawSystem/assets/js/popper.js')}}"></script>
<script src="{{asset('lawSystem/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('lawSystem/assets/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('lawSystem/assets/js/full_numbers_no_ellipses.js')}}"></script>
<script src="{{asset('lawSystem/assets/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('lawSystem/assets/js/function.js')}}"></script>
@yield('secripts')
<script src="{{asset('lawSystem/assets/js/select2.min.js')}}"></script>
<script src="{{asset('lawSystem/assets/js/jquery.toast.js')}}"></script>
<script src="{{asset('lawSystem/assets/js/alertfunction.js')}}"></script>
<script type="text/javascript">
    function openPdf(file) {
        var omyFrame = document.getElementById("myFrame");
        omyFrame.style.display = "block";
        let filename = "/storage/KuwaitAlyoum_unfinished/" + file;
        omyFrame.src = filename;
    }
</script>
@include('layouts.notification')
</body>
</html>
