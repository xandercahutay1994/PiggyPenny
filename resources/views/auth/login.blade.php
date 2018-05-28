    @extends('layouts.app')

    @section('content')
    <div class="container">
        <br><br>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ url('login') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" autofocus required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                </div>
                            </div>

                            <!-- LOG-IN BUTTON  -->
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary btn-block" id="login">
                                        <i class="fa fa-sign-in-alt"></i> {{ __('Login') }}
                                    </button>
                                </div>
                            </div>

                            <!-- REGISTER BUTTON -->
                            <div class="form-group row mb-0" style="margin-top: 5px;">
                                <div class="col-md-6 offset-md-4">
                                    <a href="/register" class="btn btn-danger btn-block" id="register">
                                        {{ __('Register') }} 
                                    </a>
                                </div>
                                <div class="col-md-4 offset-md-5">
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('#login').click(function(){
            this.form.submit();
            this.disabled=true;
            this.innerHTML='<i class="fa fa-spinner fa-spin"></i> Loading…';
        });
    </script>
    @endsection
