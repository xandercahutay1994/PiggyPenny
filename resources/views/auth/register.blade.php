@extends('layouts.app')

@section('content')
<style type="text/css">
    input[type="file"] {
        display: none;
    }
    .image{
        height: 150px;
        width: 300px;
    }
</style>
<div class="container">
    <br><br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    {!! Form::open(['url' => '/register', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    @csrf
                        <div class="form-group row text-center">
                            <div class="col-md-6 offset-md-4 center-block">
                                <label for="file"> 
                                    <img src="{{ asset('img/UploadPhoto.png') }}" id="preview" class="img-thumbnail image"/>
                                    <input type="file" name="profile" id="file">
                                </label>                             
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Business Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required placeholder="Business Name...">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required placeholder="Address...">
                            </div>
                        </div>
                            
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="Email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="Email Address...">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="Password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password...">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm Password...">
                            </div>
                        </div>

                        <!-- REGISTER BUTTON -->
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-block" id="register">
                                    <i class="fa fa-save"></i> {{ __('Register') }}
                                </button>
                            </div>
                        </div>

                        <!-- LOG-IN BUTTON -->
                        <div class="form-group row mb-0" style="margin-top: 5px;">
                            <div class="col-md-6 offset-md-4">
                                 <a href="/login" class="btn btn-danger btn-block">
                                    {{ __('LOG-IN') }}
                                </a>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

    // IMAGE PREVIEW FUNCTION
    $(function(e){
        $('#file').on('change',function(){
            var file = this.files[0];
            var reader = new FileReader();
            reader.onload = viewer.load;
            reader.readAsDataURL(file);
            viewer.setProperties(file);
        });
        var viewer = {
            load: function(e){
                $('#preview').attr('src', e.target.result);
            },
            setProperties: function(file){
                $('#filename').text(file.name);
                $('#filetype').text(file.type);
                $('#filesize').text(Math.round(file.size/1024));
            }
        }
    });

    // =============================
    // GOOGLE ADDRESS API
    // =============================
    var searchAddress = new google.maps.places.SearchBox(document.getElementById('address'));   
</script>
<script src="{{ asset('js/custom.js') }}"></script>
@endsection
