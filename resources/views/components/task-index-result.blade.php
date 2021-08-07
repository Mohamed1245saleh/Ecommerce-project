<div id="displayBody" class="table-responsive table-responsive-data2">
    <table class="table table-data2">
        <thead>
        <tr>
            <th>
                <label class="au-checkbox">
                    <input type="checkbox">
                    <span class="au-checkmark"></span>
                </label>
            </th>
            <th>Task Name</th>
            <th>Task Description</th>
            <th>Group Name</th>
            <th>Task EDT</th>
            <th>Task Type</th>
        </tr>
        </thead>
        <tbody>
@foreach($tasks as $task)
    <tr  class="tr-shadow">
        <td>
            <label class="au-checkbox">
                <input type="checkbox">
                <span class="au-checkmark"></span>
            </label>
        </td>
        <td>{{$task->task_name}}</td>
        <td class="desc">{{$task->task_description}}</td>
        <td>{{$task->groups->group_name}}</td>
        <td>{{$task->EDT == "0000-00-00 00:00:00"? "No EDT" :$task->EDT}} </td>
        <td>{{$task->task_type}}</td>
        <td>
            <div class="table-data-feature">
                <a href="{{route("tasks.edit", ["task" => $task->task_id])}}" style="margin-right: 3px;">
                    <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                        <i class="zmdi zmdi-edit"></i>
                    </button>
                </a>
                <form method="Post" action="{{route("tasks.destroy" , ["task"=>$task->task_id])}}">
                    @csrf
                    {{@method_field("delete")}}
                    <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                        <i class="zmdi zmdi-delete"></i>
                    </button>
                </form>
            </div>
        </td>
    </tr>
@endforeach
<tr class="spacer"></tr>
        </tbody>
    </table>

{{$paginate->onEachSide(2)->links()}}
</div>
