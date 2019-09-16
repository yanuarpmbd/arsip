@extends('master.master_')

@section('search')
    @include('yanjin.layouts.search')
@endsection


    <div class="sidebar-panel">
        @foreach($blog as $b)
            <li class="navbar-collapse collapse hide">
                <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">{{$b->year}}</span><span
                        class="fa arrow"></span></a>
                <ul class="">
                    <li><a data-toggle="collapse" data-target=".navbar-collapse" href="#one">{{$b->month_name}}</a>
                        <span class="label label-info pull-right">{{$b->post_count}}</span>
                    </li>
                </ul>
            </li>
        @endforeach
    </div>


@section('content')
    @include('yanjin.content.form')
@endsection
