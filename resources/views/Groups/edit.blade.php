@extends('dashboard.app')
@section('title', 'Edit User')
@section('content')
{{--    @php--}}
{{--    dd($groups);--}}
{{--    @endphp--}}
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Create Groups</strong>
            </div>
            <form action="{{route('groups.update' , ["group" => $groups->group_id])}}" method="post" class="form-horizontal">
                @csrf
                @method('put')
                <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col col-md-6">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input type="text" id="group_name" name="group_name" placeholder="Group Name"
                                       class="form-control" value="{{$groups->group_name}}">
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-12">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-users"></i>
                                </div>
                                <textarea name="group_description" id="group_description" cols="3" rows="4"
                                          placeholder="group_description" class="form-control">{{$groups->group_description}}</textarea>
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
                                    <div class="col col-md-2">
                                        <label for="inline-checkbox1" class="form-check-label ">
                                            <input type="checkbox" id="inline-checkbox1" name="group_dates[]"
                                                   value="6" class="form-check-input"
                                                {{in_array(6 , $groups->displayed_group_dates) ? "checked" : ""}}>Saturday
                                        </label>
                                    </div>
                                    <div class="col col-md-2">
                                        <label for="inline-checkbox2" class="form-check-label ">
                                            <input type="checkbox" id="inline-checkbox2" name="group_dates[]"
                                                   value="0" class="form-check-input"
                                                {{in_array(0 , $groups->displayed_group_dates) ? "checked" : ""}}>sunday
                                        </label>
                                    </div>
                                    <div class="col col-md-2">
                                        <label for="inline-checkbox3" class="form-check-label ">
                                            <input type="checkbox" id="inline-checkbox3" name="group_dates[]"
                                                   value="1" class="form-check-input"
                                                {{in_array(1 , $groups->displayed_group_dates) ? "checked" : ""}}>Monday
                                        </label>
                                    </div>
                                    <div class="col col-md-2">
                                        <label for="inline-checkbox4" class="form-check-label ">
                                            <input type="checkbox" id="inline-checkbox4" name="group_dates[]"
                                                   value="2" class="form-check-input"
                                                {{in_array(2 , $groups->displayed_group_dates) ? "checked" : ""}}>Tuesday
                                        </label>
                                    </div>
                                    <div class="col col-md-3">
                                        <label for="inline-checkbox5" class="form-check-label ">
                                            <input type="checkbox" id="inline-checkbox5" name="group_dates[]"
                                                   value="3" class="form-check-input"
                                                {{in_array(3 , $groups->displayed_group_dates) ? "checked" : ""}}>Wednesday</label>
                                    </div>
                                    <div class="col col-md-2">
                                        <label for="inline-checkbox6" class="form-check-label ">
                                            <input type="checkbox" id="inline-checkbox6" name="group_dates[]"
                                                   value="4" class="form-check-input"
                                                {{in_array(4 , $groups->displayed_group_dates) ? "checked" : ""}}>Thursday
                                        </label>
                                    </div>
                                    <div class="col col-md-2">
                                        <label for="inline-checkbox7" class="form-check-label ">
                                            <input type="checkbox" id="inline-checkbox7" name="group_dates[]"
                                                   value="5" class="form-check-input"
                                                {{in_array(5 , $groups->displayed_group_dates) ? "checked" : ""}}>Friday
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
                                           class="form-control" value="{{$groups->group_times}}">
                                </div>

                                <div class="input-group-addon">
                                    <i class="fa fa-euro-sign"></i>
                                </div>
                                <div class="col col-md-5">
                                    <input type="number" id="group_price" name="price" class="form-control" value="{{$groups->price}}">
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

