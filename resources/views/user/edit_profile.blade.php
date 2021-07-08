@extends('master')
@section('content')
    <div class="row new-account-login">
        <div class="col-sm-6 col-lg-6 mb-3">
            <div class="title-left">
                <h3>Change Password</h3>
            </div>
            <form class="mt-3  review-form-box" method="post"
                  action="{{route('user.changePassword',\Illuminate\Support\Facades\Auth::id())}}">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="InputPassword" class="mb-0">Password</label>
                        <input type="password" class="form-control" name="password" id="InputPassword"
                               placeholder="Password"></div>
                    <div class="col-md-6 text-danger">
                        @error('password')
                        {{ $message }}
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="InputPassword" class="mb-0">Password Confirmation</label>
                        <input type="password" class="form-control" name="password_confirmation" id="InputPassword"
                               placeholder="Password Confirmation"></div>
                </div>
                <button type="submit" class="btn hvr-hover">Change Password</button>
            </form>
        </div>
        <div class="col-sm-6 col-lg-6 mb-3">
            <div class="title-left">
                <h3>Edit Profile</h3>
            </div>
            <form class="mt-3 review-form-box" action="{{route('user.editProfile',\Illuminate\Support\Facades\Auth::id())}}" method="post">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="InputName" class="mb-0">Name</label>
                        <input type="text" class="form-control" id="InputName" name="name" placeholder="Name"
                               value="{{$user->name}}"></div>
                    <div class="form-group col-md-6">
                        <label for="InputPhone" class="mb-0">Phone</label>
                        <input type="text" class="form-control" id="InputPhone" name="phone" placeholder="{{$user->phone}}"></div>
                    <div class="form-group col-md-6">
                        <label for="InputAddress" class="mb-0"> Old Address</label>
                        <input type="text" class="form-control" id="InputAddress" placeholder="{{$user->address}}"
                               readonly></div>
                    <div class="form-group col-md-6">
                        <label for="InputAddress" class="mb-0"> New Address</label>
                        <div class="row">
                            <div class="col-4">
                                <select class="form-control" name="province" id="province">
                                </select>
                            </div>
                            <div class=" col-4">
                                <select class="form-control" name="district" id="district">
                                    <option value="">Quận/Huyện</option>
                                </select>
                            </div>
                            <div class=" col-4">
                                <select class="form-control" name="ward" id="ward">
                                    <option value="">Phường/Xã</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn hvr-hover">Edit Profile</button>
            </form>
        </div>
    </div>
@endsection
