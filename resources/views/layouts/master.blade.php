<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{asset('js/vue.js')}}"></script>
    <script src="{{asset('js/axios.js')}}"></script>
    <title> @yield('title') </title>
    <link rel="stylesheet" href="{{asset('css/master.css')}}">
    <style>
        .table-right td {
            text-align: center;
        }

        .general_btn {
            margin-right: -4px;
        }
    </style>
    @include('layouts.header')
    @include('layouts.nav')
</head>
<body>

@yield('content')

@include('layouts.footer')
<!-- end main-wrapper -->
<script src="{{asset('js/master.js')}}"></script>
@yield('secripts')

@include('layouts.notification')
</body>
</html>
