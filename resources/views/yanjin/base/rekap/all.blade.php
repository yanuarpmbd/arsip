@extends('master.master')
@section('header')
    @include('yanjin.layouts.header')
@endsection
@section('content')
    @include('yanjin.content.rekap.all')
@endsection

@section('js')
    <script>
        $("button").click(function(){
            $("#table2excelharian").table2excel({
                // exclude CSS class
                exclude: ".noExl",
                name: "Worksheet Name",
                filename: "Rekap Harian | ARSIP DPMPTSP Prov Jateng" //do not include extension
            });
        });
    </script>
@endsection
