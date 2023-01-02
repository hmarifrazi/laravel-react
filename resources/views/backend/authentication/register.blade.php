@extends('layout.auth')
@section('content')

    
<div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="images/logo.png" alt="">
                    </a>
                </div>
                <div class="login-form">

                     @if(Session::has('response'))
                 {!!Session::get('response')['message']!!}
                     @endif
                    <form action="{{route('register.store')}}" method="post">
                        @csrf

                        <div class="form-group">
                            <label>User Name</label>
                            <input type="FullName" name="FullName" value="{{old('FullName')}}"class="form-control" placeholder="User Name">
                        </div>
                        @if($errors->has('FullName'))
                    <small class="d-block text-danger">
                        {{$errors->first('FullName')}}
                    </small>
                         @endif

                            <div class="form-group">
                                <label>Email address</label>
                                <input type="email"  name="email" value="{{old('email')}}" class="form-control" placeholder="email">
                          </div>

                          @if($errors->has('email'))
                    <small class="d-block text-danger">
                        {{$errors->first('email')}}
                    </small>
                         @endif

                         <div class="form-group">
                                <label>Phone Number</label>
                                <input type="PhoneNumber"  name="PhoneNumber" value="{{old('PhoneNumber')}}" class="form-control" placeholder="PhoneNumber">
                          </div>

                          @if($errors->has('PhoneNumber'))
                    <small class="d-block text-danger">
                        {{$errors->first('PhoneNumber')}}
                    </small>
                         @endif

                         <div class="form-group">
                                <label>Password</label>
                                <input type="password"  name="password"  class="form-control" placeholder="Password">
                          </div>

                          @if($errors->has('password'))
                    <small class="d-block text-danger">
                        {{$errors->first('password')}}
                    </small>
                         @endif


                         <div class="form-group">
                                <label>Password</label>
                                <input type="password"  name="password_confirmation"  class="form-control" placeholder="Confirm Password">
                          </div>

                          @if($errors->has('password_confirmation'))
                    <small class="d-block text-danger">
                        {{$errors->first('password_confirmation')}}
                    </small>
                         @endif
                                  <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Register</button>
                                    <div class="register-link m-t-15 text-center">
                                        <p>Already have account ? <a href="{{route('login')}}"> Sign in</a></p>
                                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
