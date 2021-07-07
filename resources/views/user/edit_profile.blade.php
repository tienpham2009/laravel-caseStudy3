@extends('master')
@section('content')
    <div class="row new-account-login">
        <div class="col-sm-6 col-lg-6 mb-3">
            <div class="title-left">
                <h3>Account Login</h3>
            </div>
            <h5><a data-toggle="collapse" href="#formLogin" role="button" aria-expanded="false">Click here to Login</a></h5>
            <form class="mt-3 collapse review-form-box" id="formLogin">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="InputEmail" class="mb-0">Email Address</label>
                        <input type="email" class="form-control" id="InputEmail" placeholder="Enter Email"> </div>
                    <div class="form-group col-md-6">
                        <label for="InputPassword" class="mb-0">Password</label>
                        <input type="password" class="form-control" id="InputPassword" placeholder="Password"> </div>
                </div>
                <button type="submit" class="btn hvr-hover">Login</button>
            </form>
        </div>
        <div class="col-sm-6 col-lg-6 mb-3">
            <div class="title-left">
                <h3>Create New Account</h3>
            </div>
            <h5><a data-toggle="collapse" href="#formRegister" role="button" aria-expanded="false">Click here to Register</a></h5>
            <form class="mt-3 collapse review-form-box" id="formRegister">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="InputName" class="mb-0">First Name</label>
                        <input type="text" class="form-control" id="InputName" placeholder="First Name"> </div>
                    <div class="form-group col-md-6">
                        <label for="InputLastname" class="mb-0">Last Name</label>
                        <input type="text" class="form-control" id="InputLastname" placeholder="Last Name"> </div>
                    <div class="form-group col-md-6">
                        <label for="InputEmail1" class="mb-0">Email Address</label>
                        <input type="email" class="form-control" id="InputEmail1" placeholder="Enter Email"> </div>
                    <div class="form-group col-md-6">
                        <label for="InputPassword1" class="mb-0">Password</label>
                        <input type="password" class="form-control" id="InputPassword1" placeholder="Password"> </div>
                </div>
                <button type="submit" class="btn hvr-hover">Register</button>
            </form>
        </div>
    </div>
@endsection
