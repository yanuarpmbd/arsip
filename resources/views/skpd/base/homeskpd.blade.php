@extends('master.master-skpd')
@section('header')
    @include('skpd.layouts.header')
@endsection
@section('content')
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>WELCOME ADMIN {{$user}}</h5>
        </div>
    </div>
@endsection

@section('js')
    {{--   <script>
           $("#table2excelsektor").click(function(){
               $("#table2excelsektor").table2excel({
                   // exclude CSS class
                   exclude: ".noExl",
                   name: "Worksheet Name",
                   filename: "Rekap Dinas Teknis | ARSIP DPMPTSP Prov Jateng" //do not include extension
               });
           });
       </script>--}}
@endsection
