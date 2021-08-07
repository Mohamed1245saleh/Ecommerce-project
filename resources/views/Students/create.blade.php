@extends('dashboard.app')
@section('title', 'Add Student')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">Add StudentS</div>
            <div class="card-body card-block">
                <form action="{{route("students.store")}}" method="post" class="">
                    @csrf
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </div>
                            <input type="text" id="student_name" name="student_name" placeholder="Student Name" class="form-control">
                        </div>
                    </div>
                    @foreach($errors->get('student_name') as $message)
                        <div class="alert alert-danger">
                            <ul>
                                <li>{{$message }}</li>
                            </ul>
                        </div>
                    @endforeach
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <select class="form-control" name="group_id">
                                @foreach($groups as $group)
                                    <option id="{{"$group->group_id"}}" value="{{$group->group_id}}">{{$group->group_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @foreach($errors->get('group_id') as $message)
                        <div class="alert alert-danger">
                            <ul>
                                <li>{{$message }}</li>
                            </ul>
                        </div>
                    @endforeach
                    <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar-alt"></i>
                                </div>
                                <div class="form-check-inline form-check">
                                    <div class="col col-md-2">
                                        <label for="inline-checkbox1" class="form-check-label ">
                                            <input type="checkbox" id="inline-checkbox1" name="paid"  class="form-check-input">Paid
                                        </label>
                                    </div>
                                </div>
                            </div>
                    </div>
                    @foreach($errors->get('paid') as $message)
                        <div class="alert alert-danger">
                            <ul>
                                <li>{{$message }}</li>
                            </ul>
                        </div>
                    @endforeach
                    <div class="form-actions form-group">
                        <button type="submit" class="btn btn-success btn-sm">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="copyright">
                <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>

    </div>
@endsection

