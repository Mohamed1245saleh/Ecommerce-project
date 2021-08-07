@extends('dashboard.app')
@section('title', 'Add User')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Create Groups</strong>
            </div>
            <form action="{{route('roles.store')}}" method="post" class="form-horizontal">
                @csrf
                <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col col-md-12">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input type="text" id="role_eng_name" name="name" placeholder="English Role Name"
                                       class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                @foreach($errors->get('name') as $message)
                    <div class="alert alert-danger">
                        <ul>
                            <li>{{$message }}</li>
                        </ul>
                    </div>
                @endforeach
                <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col col-md-12">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input type="text" id="role_ara_name" name="name_ar" placeholder="Arabic Role Name"
                                       class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                @foreach($errors->get('name_ar') as $message)
                    <div class="alert alert-danger">
                        <ul>
                            <li>{{$message }}</li>
                        </ul>
                    </div>
                @endforeach
                <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Submit
                    </button>

                    <button type="reset" class="btn btn-danger btn-sm">
                        <i class="fa fa-ban"></i> Reset
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

