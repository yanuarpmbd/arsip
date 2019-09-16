@extends('master.master')
@section('header')
    @include('yanjin.layouts.header')
@endsection
@section('content')
    @include('yanjin.content.rekap.tahun')
@endsection

@section('js')
    <script>
        $("#btntable2exceltahun").click(function(){
            $("#table2exceltahun").table2excel({
                // exclude CSS class
                exclude: ".noExl",
                name: "Worksheet Name",
                filename: "Rekap Tahunan | ARSIP DPMPTSP Prov Jateng" //do not include extension
            });
        });
    </script>
@endsection
