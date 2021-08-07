@extends('dashboard.app')
@section('title', 'Add User')
@section('content')
    <div class="card-body card-block">
        <form action="{{route("users.store")}}" method="post" class="">
            @csrf
            <div class="form-group">
                <div class="input-group">
                    <input type="text" id="firstName" name="first_name" placeholder="FirstName" class="form-control">
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
                    <input type="text" id="lastName" name="last_name" placeholder="LastName" class="form-control">
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
                    <input type="tel" id="mobile" name="number" placeholder="mobileNumber" class="form-control">
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
                    <input type="text" id="address" name="address" placeholder="address" class="form-control">
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
                    <input type="email" id="email" name="email" placeholder="Email" class="form-control">
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
                    <input type="password" id="password" name="password" placeholder="Password" class="form-control">
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
            <div class="form-group">
                <div class="input-group">
                    <select name="role" id="select" class="form-control">--}}
                        <option value="0">Please select</option>
                        <option value="super_admin">Super Admin</option>
                        <option value="supervisor">Supervisor</option>
                        <option value="user">User</option>
                    </select>
                    <div class="input-group-addon">
                        <i class="fa fa-asterisk"></i>
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-12">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar-alt"></i>
                        </div>
                        <div class="form-check-inline form-check">
                            <div class="col col-md-6">
                                <label for="inline-checkbox1" class="form-check-label" style="font-size: 20px;">
                                    <input type="checkbox" id="inline-checkbox1" name="permissions[]"
                                           value="Add" class="form-check-input" >Add
                                </label>
                            </div>
                            <div class="col col-md-6">
                                <label for="inline-checkbox2" class="form-check-label" style="font-size: 20px;">
                                    <input type="checkbox" id="inline-checkbox2" name="permissions[]"
                                           value="Edit" class="form-check-input">Edit
                                </label>
                            </div>
                            <div class="col col-md-6">
                                <label for="inline-checkbox3" class="form-check-label" style="font-size: 20px;">
                                    <input type="checkbox" id="inline-checkbox3" name="permissions[]"
                                           value="Update" class="form-check-input">Update
                                </label>
                            </div>
                            <div class="col col-md-6">
                                <label for="inline-checkbox4" class="form-check-label" style="font-size: 20px;">
                                    <input type="checkbox" id="inline-checkbox4" name="permissions[]"
                                           value="Delete" class="form-check-input">Delete
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-actions form-group">
                <button type="submit" class="btn btn-secondary btn-sm">Submit</button>
            </div>
        </form>
    </div>

@endsection
{{--{{ Session::get('error')}}--}}
