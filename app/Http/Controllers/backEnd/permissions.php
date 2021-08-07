<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Traits\generalFunction;
use App\Http\Traits\generalGuzzleRequestTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class permissions extends Controller
{

    use generalGuzzleRequestTrait, generalFunction;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $request = $this->getRequest("retrievePermissions");
        $pers = json_decode($request->getBody()->getContents());
        if (session()->has('displayed_message')) {
            alert()->success('SuccessAlert', session()->pull("displayed_message"))->position('top-end');
        }
        $permissions = $pers->data;
        return view("permissions.index", compact("permissions"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view("permissions.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $requestInfo = collect($request->input())->except(["_token"])->toArray();
            $validator = Validator::make($requestInfo, [
                "name" => "required | String",
                "name_ar" => "required | String"
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }
            $request = $this->postStoreRequest("storePermission", $requestInfo, "newPermission");
            $request = json_decode($request->getBody()->getContents());
        } catch (\Exception $e) {
            echo $e->getMessage();
        }


        if ($request->status) {
            session()->flash("displayed_message", $request->msg);
            return redirect()->route("permissions.index");
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
        $id = $request->permission;
        $request = $this->getRequestById("retrievePermissionById" , $id);
        $permission = json_decode($request->getBody()->getContents());
        $permission = $permission->data[0];
        return view("permissions.edit" , compact("permission"));
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
        try {
            $requestInfo = collect($request->input())->except(["_token"])->toArray();
            $validator = Validator::make($requestInfo, [
                "name"    => "required | String",
                "name_ar" => "required | String"
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }
            $request = $this->postUpdateRequest("updatePermission" , $requestInfo , $id , "updatePermission");
            $request = json_decode($request->getBody()->getContents());
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

        if ($request->status) {
            session()->flash("displayed_message", $request->msg);
            return redirect()->route("permissions.index");
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
        $request = $this->destroyRequest("destroyPermission" , $id);
        $result = json_decode($request->getBody()->getContents());
        if($result->status){
            session()->flash("displayed_message", $result->msg);
            return redirect()->route("permissions.index");
        }
    }
}
