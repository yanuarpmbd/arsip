2@extends('adminlte::page')

@section('title', 'Add User')

@section('content_header')
    <h1>Add User</h1>
@stop

@section('content')
    <row-box>
        <!--ERRORS-->
        @include('partials.errors')

        <form action="{{route('store.user')}}" class="form-horizontal" method="post">
            @csrf
            <div class="box-group" id="accordion">
                <div class="panel-box">
                    <div class="form-group">
                        <label for="name" class="form-control-label"> Nama Lengkap :</label>
                        <input type="text" name="name" placeholder="Nama Lengkap" class="form-control-label">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="username" class="form-control-label"> Username :</label>
                        <input type="text" name="username" placeholder="Username" class="form-control-label">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-control-label"> Password :</label>
                        <input type="password" name="password" placeholder="Password" class="form-control-label">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label">Hak Akses</label>
                        <div class="col-md-4">

                            <select class="select2_demo_2 form-control" name="role_id">
                                @foreach($roles as $d)
                                    <option value="{{$d->id}}">{{$d->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                </div>
            </div>
            <div class="form-group" style="margin-top:15px;">
                <div class="col-sm-12" style="padding:0px 25px">
                    <button type="submit" class="btn form-control ll-bgcolor ll-white" style="margin-top: 20px">
                        <i class="fa fa-plus"></i>
                        Submit
                    </button>
                    <a href="/users">back</a>
                </div>
            </div>

        </form>

    </row-box>
@stop
