<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>داشبورد</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('admin/assets/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('admin/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('admin/assets/dist/css/adminlte.min.css')}}">
    <!--rtl CSS-->
    <link rel="stylesheet" href="{{asset('admin/assets/dist/css/rtl.css')}}">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="{{asset('admin/assets/fonts/fonts.css')}}">

    @stack('css')
    <style>
        body {
            background-image: url('{{asset('admin/assets/dist/img/ttt1.jpg')}}');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
            background-color: rgba(255,255,255,0.9);
            /*background: rgba(0,0,0,.6);*/
        }
        .form-control::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
            color: white;
            opacity: 1; /* Firefox */
        }
    </style>
    @livewireStyles
</head>
<body class="hold-transition login-page" dir="rtl" style="font-family: Vazirmatn;">
<!-- /.login-box -->
{{$slot}}

<!-- jQuery -->

<!-- jQuery -->
<script src="{{asset('admin/assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('admin/assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- AdminLTE App -->
<script src="{{asset('admin/assets/dist/js/adminlte.js')}}"></script>
@livewireScripts
@stack('scp')
</body>

</html>
