@extends('layouts.auth.master',['title' => 'Register - Hacbu'])

@section('content')


<h4 class="text-muted text-center font-size-18"><b>Register</b></h4>

<div class="p-3">
    <form class="form-horizontal mt-3" action="{{ route('register') }}" method="POST">
        @csrf
        <div class="form-group mb-3 row">
            <div class="col-12">
                <input class="form-control @error('name') is-invalid @enderror" name="name" type="text" placeholder="Name">
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        
        <div class="form-group mb-3 row">
            <div class="col-12">
                <input class="form-control @error('email') is-invalid @enderror" name="email" type="email" placeholder="Email">
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>


        <div class="form-group mb-3 row">
            <div class="col-12">
                <input class="form-control @error('password') is-invalid @enderror" name="password" type="password" placeholder="Password">
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="form-group mb-3 row">
            <div class="col-12">
                <input class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" type="password" placeholder="Password Confirm">
                @error('password_confirmation')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="form-group mb-3 row">
            <div class="col-12">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                    <label class="form-label ms-1 fw-normal" for="customCheck1">I accept <a href="#"
                            class="text-muted">Terms and Conditions</a></label>
                </div>
            </div>
        </div>

        <div class="form-group text-center row mt-3 pt-1">
            <div class="col-12">
                <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Register</button>
            </div>
        </div>

        <div class="form-group mt-2 mb-0 row">
            <div class="col-12 mt-3 text-center">
                <a href="pages-login.html" class="text-muted">Already have account?</a>
            </div>
        </div>
    </form>
    <!-- end form -->
</div>

@endsection