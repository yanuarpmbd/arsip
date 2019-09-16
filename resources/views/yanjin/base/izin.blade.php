@extends('master.master_')
@section('header')
    @include('yanjin.layouts.header')
@endsection

@section('content')

    @include('yanjin.content.form_izin')
    @include('yanjin.content.data_izin')
@endsection
