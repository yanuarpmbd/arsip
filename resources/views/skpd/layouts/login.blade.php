@extends('master.master_login')

@section('login')

    <form class="contact100-form validate-form" method="POST" action="{{route('login.post')}}">
        @csrf

        <div class="wrap-input100 validate-input">
            <span class="label-input100">Username </span>
            <input class="input100{{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" name="name"
                   id="name" placeholder="Username" value="{{ old('name') }}" required autofocus>
            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
            <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input">
            <span class="label-input100">Password </span>
            <input class="input100{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password"
                   id="password" placeholder="password" required>
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
            <span class="focus-input100"></span>
        </div>

        <div class="row" style="align-content: center">
            <div class="form-group row">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember"
                           id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="container-contact100-form-btn">
                    <button class="contact100-form-btn" value="submit" name="submit" type="submit">
						<span>
							Submit
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
                    </button>
                </div>
            </div>
        </div>

    </form>
@endsection
