@extends('dashboard.app')
@section('title', 'Add Task')
@section('content')
@push("jsFiles")
        <script src="{{asset('js/task.js')}}"></script>
@endpush
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">Add StudentS</div>
            <div class="card-body card-block">
                <form action="{{route("tasks.store")}}" method="post" >
                    @csrf
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </div>
                            <input type="text" id="task_name" name="task_name" placeholder="Task Name" class="form-control">
                        </div>
                    </div>
                    @foreach($errors->get('task_name') as $message)
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
                                <textarea name="task_description" id="task_description" cols="3" rows="4"
                                          placeholder="task_description" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    @foreach($errors->get('task_description') as $message)
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
                    <div class="row form-group">
                        <div class="col col-md-12">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar-alt"></i>
                                </div>
                                <div class="form-check-inline form-check">
                                    <div class="col col-md-2" style="margin-right: 15px;">
                                        <label for="inline-checkbox" class="form-check-label ">
                                            <input type="radio" id="inline-checkbox" name="task_type"
                                                   value="1" class="form-check-input">Task
                                        </label>
                                    </div>
                                    <div class="col col-md-2" style="margin-right: 15px;">
                                        <label for="inline-checkbox1" class="form-check-label ">
                                            <input type="radio" id="inline-checkbox1" name="task_type"
                                                   value="2" class="form-check-input">Quiz
                                        </label>
                                    </div>
                                    <div class="col col-md-2" style="margin-right: 15px;">
                                        <label for="inline-checkbox2" class="form-check-label ">
                                            <input type="radio" id="inline-checkbox2" name="task_type"
                                                   value="3" class="form-check-input">Exam
                                        </label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach($errors->get('task_type') as $message)
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
                                <div class="col-md-6">
                                    <div class="form-check-inline form-check" >
                                        <label for="inline-checkboxEDT" class="form-check-label ">
                                            <input type="checkbox" id="CheckEdt" name="checkEDT"  class="form-check-input" >Provide An EDT for the Task
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group" id="EDT" style="display: none;">
                        <div class="col col-md-12">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <div class="col col-md-5">
                                    <input type="time" id="task_time" name="task_time" placeholder="Time"
                                           class="form-control">
                                </div>

                                <div class="input-group-addon">
                                    <i class="fa fa-euro-sign"></i>
                                </div>
                                <div class="col col-md-5">
                                    <input type="date" id="task_date" name="task_date" class="form-control">
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-12">
                            <div class="input-group">
                                <div class="col col-md-5">
                                    @foreach($errors->get('task_time') as $message)
                                        <div class="alert alert-danger">
                                            <ul>
                                                <li>{{$message }}</li>
                                            </ul>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col col-md-5">
                                    @foreach($errors->get('task_date') as $message)
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


                    <div class="form-actions form-group">
                        <button type="submit" class="btn btn-success btn-sm">Create Task</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="copyright">
                <p>Copyright © 2020 MoSaleh. All rights reserved.</p>
            </div>
        </div>
    </div>


    </div>

@endsection

