@extends('master.master')
@section('header')
    @include('yanjin.layouts.header')
@endsection
@section('content')
    @include('yanjin.content.rekap.izin')
@endsection

@section('js')
    <script>
        $("#btntable2excelizin").click(function(){
            $("#table2excelizin").table2excel({
                // exclude CSS class
                exclude: ".noExl",
                name: "Worksheet Name",
                filename: "Rekap Tiap Jenis Izin | ARSIP DPMPTSP Prov Jateng" //do not include extension
            });
        });
    </script>
@endsection
