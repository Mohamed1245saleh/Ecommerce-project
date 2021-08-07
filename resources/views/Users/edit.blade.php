@extends('dashboard.app')
@section('title', 'Add User')
@section('content')
    <div class="card-body card-block">
        <form action="{{route("users.update", ["user" => $user->id])}}" method="POST" class="">
            @csrf
            {{ method_field('PUT') }}
            <div class="form-group">
                <div class="input-group">
                    <input type="text" id="firstName" name="first_name" placeholder="FirstName" class="form-control" value="{{$user->first_name}}">
                    <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                    </div>
                </div>
                @foreach($errors->get('firstName') as $message)
                    <div class="alert alert-danger">
                        <ul>
                            <li>{{$message }}</li>
                        </ul>
                    </div>
                @endforeach
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="text" id="lastName" name="last_name" placeholder="LastName" class="form-control" value="{{$user->last_name}}">
                    <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                    </div>
                </div>
                @foreach($errors->get('lastName') as $message)
                    <div class="alert alert-danger">
                        <ul>
                            <li>{{$message }}</li>
                        </ul>
                    </div>
                @endforeach
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="tel" id="mobile" name="number" placeholder="mobileNumber" class="form-control" value="{{$user->number}}">
                    <div class="input-group-addon">
                        <i class="fa fa-phone-square"></i>
                    </div>
                </div>
                @foreach($errors->get('mobile') as $message)
                    <div class="alert alert-danger">
                        <ul>
                            <li>{{$message }}</li>
                        </ul>
                    </div>
                @endforeach
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="text" id="address" name="address" placeholder="address" class="form-control" value="{{$user->address}}">
                    <div class="input-group-addon">
                        <i class="fa fa-address-book"></i>
                    </div>
                </div>
                @foreach($errors->get('address') as $message)
                    <div class="alert alert-danger">
                        <ul>
                            <li>{{$message }}</li>
                        </ul>
                    </div>
                @endforeach
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="email" id="email" name="email" placeholder="Email" class="form-control" value="{{$user->email}}">
                    <div class="input-group-addon">
                        <i class="fa fa-envelope"></i>
                    </div>
                </div>
                @foreach($errors->get('email') as $message)
                    <div class="alert alert-danger">
                        <ul>
                            <li>{{$message }}</li>
                        </ul>
                    </div>
                @endforeach
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="password" id="password" name="password" placeholder="Password" class="form-control" value="">
                    <div class="input-group-addon">
                        <i class="fa fa-asterisk"></i>
                    </div>
                </div>
                @foreach($errors->get('password') as $message)
                    <div class="alert alert-danger">
                        <ul>
                            <li>{{$message }}</li>
                        </ul>
                    </div>
                @endforeach
            </div>
            <div class="form-actions form-group">
                <button type="submit" class="btn btn-secondary btn-sm">update</button>
            </div>
        </form>
    </div>

@endsection
{{--{{ Session::get('error')}}--}}
