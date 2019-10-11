<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>DPMPTSP | Pinjam Arsip</title>

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('css/plugins/iCheck/custom.css')}}" rel="stylesheet">
    <link href="{{asset('css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">

    <link href="{{asset('css/plugins/select2/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

    @yield('css')
</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen   animated fadeInDown">
    @yield('isi')
</div>

<!-- Mainly scripts -->
<script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- iCheck -->
<script src="{{asset('js/plugins/iCheck/icheck.min.js')}}"></script>
<script src="{{asset('js/plugins/select2/select2.full.min.js')}}"></script>
<script src="{{asset('js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>
<script>
    $(document).ready(function(){

        $(".select2_demo_1").select2();
        $(".select2_demo_2").select2({
            maximumSelectionLength: 1,
            placeholder: "Nama Peminjam",
            allowClear: true,
            minimumInputLength:3,
        });
        $(".select2_demo_3").select2({
            maximumSelectionLength: 1,
            placeholder: "Pilih Arsip",
            allowClear: true,
            minimumInputLength:3,
        });

        $('#data_1 .input-group.date').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true,
            format: "yyyy/mm/dd"
        });


        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
    });
</script>

@yield('js')
</body>

</html>
