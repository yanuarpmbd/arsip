@extends('master.master')
@section('header')
    @include('yanjin.layouts.header')
@endsection
@section('content')
    @include('yanjin.content.rekap.sektor')
@endsection

@section('js')
    <script>
        $("#btntable2excelsektor").click(function(){
            $("#table2excelsektor").table2excel({
                // exclude CSS class
                exclude: ".noExl",
                name: "Worksheet Name",
                filename: "Rekap Tiap Sektor | ARSIP DPMPTSP Prov Jateng" //do not include extension
            });
        });
    </script>
@endsection
