<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Bootstrap Css -->
    <link rel="stylesheet" href="{{asset('fronts/fontawsome/all.min.css')}}">
    <link href="{{asset('fronts/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('fronts/css/bootstrap-select.css')}}" rel="stylesheet" />
    <link href="{{asset('fronts/css/dashboard6.css')}}" rel="stylesheet" />
    <style>
        .wrapper-panel {align-items:stretch;width:100%;height:auto;margin:0 auto;padding:0;position:relative;}
    </style>
</head>

<body>
   @yield('content')
</body>
<script src="{{asset('fronts/js/jquery.min.js')}}"></script>
<script src="{{asset('fronts/js/popper.min.js')}}"></script>
<script src="{{asset('fronts/js/bootstrap.min.js')}}"></script>
<script src="{{asset('fronts/js/bootstrap-select.js')}}"></script>
<script src="{{asset('fronts/js/jquery.scrollbar.js')}}"></script>
 @yield('script')
</html>
