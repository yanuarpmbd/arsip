@extends('master.master_')

@section('header')
    @include('yanjin.layouts.header')
@endsection

@section('kanan')

    <div class="sidebar-panel">
    @foreach($tahun as $t)

        <div class="dropdown" style="padding-bottom: 5px;padding-top: 5px">
                <button class="btn btn btn-block btn-outline btn-utama dropdown-toggle" type="button" data-toggle="dropdown">
                {{$t->year}}
                    <span class="caret"></span>
                </button>
                        <ul class="dropdown-menu" >
                            @foreach($blog as $b)
                                @if($t->year == $b->year)
                            <li>
                                <a href="#">{{$b->month_name}} <span class="label label-info pull-right">{{$b->post_count}}</span></a>

                            </li>
                                @endif

                            @endforeach
                        </ul>

        </div>

    @endforeach
    </div>
@endsection

@section('content')

    @include('yanjin.content.form')

@endsection

@section('js')


@endsection
