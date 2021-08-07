@extends('dashboard.app')
@section('title', 'Add User')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Create Groups</strong>
            </div>
            <form action="{{route('groups.store')}}" method="post" class="form-horizontal">
                @csrf
                <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col col-md-6">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input type="text" id="group_name" name="group_name" placeholder="Group Name"
                                       class="form-control">
                            </div>
                        </div>
                    </div>
                    @foreach($errors->get('group_name') as $message)
                        <div class="alert alert-danger">
                            <ul>
                                <li>{{$message }}</li>
                            </ul>
                        </div>
                    @endforeach
                    <div class="row form-group">
                        <div class="col col-md-12">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-users"></i>
                                </div>
                                <textarea name="group_description" id="group_description" cols="3" rows="4"
                                          placeholder="group_description" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    @foreach($errors->get('group_description') as $message)
                        <div class="alert alert-danger">
                            <ul>
                                <li>{{$message }}</li>
                            </ul>
                        </div>
                    @endforeach
                    <div class="row form-group">
                        <div class="col col-md-12">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar-alt"></i>
                                </div>
                                <div class="form-check-inline form-check">
                                    <div class="col col-md-2">
                                        <label for="inline-checkbox1" class="form-check-label ">
                                            <input type="checkbox" id="inline-checkbox1" name="group_dates[]"
                                                   value="6" class="form-check-input">Saturday
                                        </label>
                                    </div>
                                    <div class="col col-md-2">
                                        <label for="inline-checkbox2" class="form-check-label ">
                                            <input type="checkbox" id="inline-checkbox2" name="group_dates[]"
                                                   value="0" class="form-check-input">sunday
                                        </label>
                                    </div>
                                    <div class="col col-md-2">
                                        <label for="inline-checkbox3" class="form-check-label ">
                                            <input type="checkbox" id="inline-checkbox3" name="group_dates[]"
                                                   value="1" class="form-check-input">Monday
                                        </label>
                                    </div>
                                    <div class="col col-md-2">
                                        <label for="inline-checkbox4" class="form-check-label ">
                                            <input type="checkbox" id="inline-checkbox4" name="group_dates[]"
                                                   value="2" class="form-check-input">Tuesday
                                        </label>
                                    </div>
                                    <div class="col col-md-3">
                                        <label for="inline-checkbox5" class="form-check-label ">
                                            <input type="checkbox" id="inline-checkbox5" name="group_dates[]"
                                                   value="3" class="form-check-input">Wednesday</label>
                                    </div>
                                    <div class="col col-md-2">
                                        <label for="inline-checkbox6" class="form-check-label ">
                                            <input type="checkbox" id="inline-checkbox6" name="group_dates[]"
                                                   value="4" class="form-check-input">Thursday
                                        </label>
                                    </div>
                                    <div class="col col-md-2">
                                        <label for="inline-checkbox7" class="form-check-label ">
                                            <input type="checkbox" id="inline-checkbox7" name="group_dates[]"
                                                   value="5" class="form-check-input">Friday
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-12">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <div class="col col-md-5">
                                    <input type="time" id="group_time" name="group_times" placeholder="Time"
                                           class="form-control">
                                </div>

                                <div class="input-group-addon">
                                    <i class="fa fa-euro-sign"></i>
                                </div>
                                <div class="col col-md-5">
                                    <input type="number" id="group_price" name="price" class="form-control">
                                </div>
                                <div class="input-group-addon">.00</div>

                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-12">
                            <div class="input-group">
                                <div class="col col-md-5">
                                    @foreach($errors->get('group_time') as $message)
                                        <div class="alert alert-danger">
                                            <ul>
                                                <li>{{$message }}</li>
                                            </ul>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col col-md-5">
                                    @foreach($errors->get('group_price') as $message)
                                        <div class="alert alert-danger">
                                            <ul>
                                                <li>{{$message }}</li>
                                            </ul>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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

