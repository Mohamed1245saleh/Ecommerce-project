<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Traits\generalFunction;
use App\Http\Traits\generalGuzzleRequestTrait;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class Tasks extends Controller
{
    use generalGuzzleRequestTrait , generalFunction;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->isMethod('post') && ($request->displayedRows) > 0){
                  $displayedRows =  $request->displayedRows;
        }else {
            $displayedRows = 5;
        }
        if($request->isMethod('post') && ($request->pageSelected) > 0){
            $page =  $request->pageSelected;
        }else {
            $page = 1;
        }
            $apiRequest = $this->getRequest("retrieveTasks");
            $tasksGotten = json_decode($apiRequest->getBody()->getContents());
            $tasksGotten = $tasksGotten->data;
            $links = collect($tasksGotten)->unique();
            $total = count($links);
            $tasks = $links->forPage($page, $displayedRows);
            $paginate = new LengthAwarePaginator($links->forPage($page, $displayedRows), $total, $displayedRows, Paginator::resolveCurrentPage(), [
                'path'  =>  Paginator::resolveCurrentPath(),
            ]);
            if(session()->has('displayed_message')){
                alert()->success('SuccessAlert',session()->pull("displayed_message"))->position('top-end');
            }
        if($request->isMethod('post')){
            return view("components.task-index-result" , compact("tasks" ,"paginate"));
        }
        return view("Tasks.index" , compact("tasks" ,"paginate"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = $this->retrieveGroups();
        return view("Tasks.create" , compact("groups"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        $requestInput = collect($request->input())->except("_token")->toArray();
        if(!is_null($requestInput["task_time"]) && !is_null($requestInput["task_date"])){
            $requestInput["EDT"] = $requestInput["task_date"] ." ".$requestInput["task_time"];
            unset($requestInput["task_time"] , $requestInput["task_date"]);
        }else{
            $requestInput["EDT"] = "";
            unset($requestInput["task_time"] , $requestInput["task_date"]);
        }
//        dd($requestInput);
        $request = $this->postStoreRequest("createTask" , $requestInput , "createTask" );
        $result = json_decode($request->getBody()->getContents());
        if(!$result->status){
            return redirect()->back()->withErrors($request);
        }
        session()->flash("displayed_message", $result->msg);
        return redirect()->route("tasks.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tasks = $this->getRequestById("retrieveTaskById" ,$id);
        $tasks = json_decode($tasks->getBody()->getContents());
        $tasks = $tasks->data;
        $groups = $this->retrieveGroups();
        return view("Tasks.edit" , compact("groups" , "tasks"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TaskRequest $request, $id)
    {
//        dd($request->input());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
