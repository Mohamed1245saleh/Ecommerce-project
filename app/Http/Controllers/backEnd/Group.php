<?php

namespace App\Http\Controllers\backEnd;

use Illuminate\Http\Request;
use App\Http\Requests\GroupRequest;
use GuzzleHttp\Client;
use App\Http\Traits\generalGuzzleRequestTrait;
class Group extends Controller
{
      use generalGuzzleRequestTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request = $this->getRequest("retrieveGroups");
        $groups = json_decode($request->getBody()->getContents());
        if(session()->has('displayed_message')){
            alert()->success('SuccessAlert',session()->pull("displayed_message"))->position('top-end');
        }
        $groups = $groups->data;
        return view("Groups.index" , compact("groups"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Groups.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GroupRequest $request)
    {
        $client = new Client();
        $days ="";
        $requestInput = collect($request->all())->except("_token")->toArray();
        foreach ($requestInput["group_dates"] as $day){
            $days .= $day." ,";
        }
        $requestInput["group_dates"] = substr($days , 0 ,-1);
        $response = $client->request( "post", env("Api_App_url").'saveNewGroup' ,[
            'json' =>  $requestInput,
        ]);
        $result = json_decode($response->getBody()->getContents());
        if($result->status){
            session()->flash("displayed_message", $result->msg);
            return redirect()->route('groups.index');
        }


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
    public function edit(Request $request)
    {
        $id = $request->group;
        $request = $this->getRequestById("retrieveGroupsById" , $id);
        $groups = json_decode($request->getBody()->getContents());
        $groups = $groups->data[0];
        return view("groups.edit" , compact("groups"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $days = "";
        $requestInfo = collect($request->all())->except(["_token" , "_method"])->toArray();
        foreach ($requestInfo["group_dates"] as $day){
            $days .= $day." ,";
        }
        $requestInfo["group_dates"] = substr($days , 0 ,-1);
        $response = $this->postUpdateRequest("updateGroup" , $requestInfo , $id , "updateGroup");
        $result = json_decode($response->getBody()->getContents());
        if($result->status){
            session()->flash("displayed_message", $result->msg);
            return redirect()->route("groups.index");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $request = $this->destroyRequest("destroyGroup" , $id);
        $result = json_decode($request->getBody()->getContents());
        if($result->status){
            session()->flash("displayed_message", $result->msg);
            return redirect()->route("groups.index");
        }

    }
}
