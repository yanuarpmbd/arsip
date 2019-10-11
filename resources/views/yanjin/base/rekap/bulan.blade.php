@extends('master.master')
@section('header')
    @include('yanjin.layouts.header')
@endsection
@section('content')
    @include('yanjin.content.rekap.bulan')
@endsection

@section('js')
    <script>
        $("#btntable2excelbulan").click(function(){
            $("#table2excelbulan").table2excel({
                // exclude CSS class
                exclude: ".noExl",
                name: "Worksheet Name",
                filename: "Rekap Bulanan | ARSIP DPMPTSP Prov Jateng" //do not include extension
            });
        });
    </script>
@endsection
