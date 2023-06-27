<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>داشبورد</title>

    <!-- Google Font: Source Sans Pro -->
{{--    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">--}}
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('admin/assets/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{asset('admin/assets/icon/ionicons.min')}}}}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('admin/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('admin/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('admin/assets/plugins/jqvmap/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('admin/assets/dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('admin/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('admin/assets/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('admin/assets/plugins/summernote/summernote-bs4.min.css')}}">
    <!--rtl CSS-->
    <link rel="stylesheet" href="{{asset('admin/assets/dist/css/rtl.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/fonts/fonts.css')}}">

    <!-- BS Stepper -->
    <link rel="stylesheet" href="{{asset('admin/assets/plugins/bs-stepper/css/bs-stepper.min.css')}}">
    <link href="{{ asset('admin/assets/dist/css/colorbox.css') }}" rel="stylesheet" />
{{--    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>--}}
    <script src="{{asset('admin/assets/chart/cdn.min')}}"></script>

    @stack('css')
    @livewireStyles
</head>
<body class="hold-transition sidebar-mini layout-fixed" style="font-family: Vazirmatn;">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{asset('admin/assets/dist/img/output.png')}}"  alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    @include('layouts.admin.navbar')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('layouts.admin.rightmenu')
    <!-- Content Wrapper. Contains page content -->
    {{$slot}}
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>کپی رایت &copy; 2014-2021 .</strong>
        تمام حقوق محفوظ می باشد.

        <a href="http://ap99.ir">قدرت گرفته از آپادانا شبکه</a>
        <div class="float-right d-none d-sm-inline-block">
            <b>نسخه</b> 3.2.0
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@stack('scp')
<livewire:scripts />
@livewireChartsScripts
@livewireScripts
{{--<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>--}}

{{--<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>--}}
<script src="{{asset('admin/assets/chart/apexcharts')}}"></script>
<script src="{{asset('admin/assets/chart/alpine.min')}}"></script>
<!-- jQuery -->
<script src="{{asset('admin/assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('admin/assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('admin/assets/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('admin/assets/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('admin/assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('admin/assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('admin/assets/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('admin/assets/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('admin/assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('admin/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('admin/assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('admin/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin/assets/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('admin/assets/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('admin/assets/dist/js/pages/dashboard.js')}}"></script>
<script src="{{ asset('admin/assets/dist/js/jquery.colorbox.js') }}"></script>

<script>
    function ModalBox(tt,href_me,width_me,height_me){
        $.colorbox({
            iframe:true,
            width:width_me,
            height:height_me,
            href:href_me
        });
    }
    $(document).ready(
        function()
        {$("#cboxClose1").click(
            function(){parent.location.reload();parent.$.colorbox.close();return false;}
        );
        });
</script>
<script type="text/javascript">
    window.livewire.on('userStore', () => {
        $('#exampleModal').modal('hide');
    });
</script>
</body>
</html>
