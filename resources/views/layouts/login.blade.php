@extends('master.fe-master')
@section('page-content')

    <div class="kebak">
    </div>
    <!-- Form Controls - Simple Forms: Default / Using Icons (Seamless) -->
    <div class="container mb-5 example col-lg-8 col-md-10 ml-auto mr-auto tengah">
        <!-- Form Controls: Using Icons - Seamless -->
        <div class="row mb-2">
            <div class="col-10 tengah">
                <h6 class="text-white">Login</h6>
                <form action="{{route('login.post')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <div class="input-group input-group-seamless">
                                                      <span class="input-group-prepend">
                                                        <span class="input-group-text">
                                                          <i class="fa fa-user"></i>
                                                        </span>
                                                      </span>
                                <input type="text" class="form-control" id="form1-username"
                                       placeholder="Username" name="username" value="{{ old('username') }}">
                            </div>
                            @if ($errors->has('username'))
                                <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <div class="input-group input-group-seamless">
                                <input type="password" name="password" class="form-control" id="form2-password"
                                       placeholder="Password">
                                <span class="input-group-append">
                                                        <span class="input-group-text">
                                                          <i class="fa fa-lock"></i>
                                                        </span>
                                                      </span>
                            </div>
                            @if ($errors->has('password'))
                                <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-block btn-pill btn-primary">
                            <i class="fa fa-sign-in mr-1"></i>
                            Login
                        </button>
                    </div>

                </form>
            </div>
        </div>

        <!-- Form Controls: Using Icons - Default -->
    </div>

    <!-- Form Controls: Custom Controls -->

    <!-- Welcome Section -->

@endsection


