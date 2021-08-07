<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Traits\generalFunction;
use App\Http\Traits\generalGuzzleRequestTrait;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Requests\studentsRequest;


class Students extends Controller
{
    use generalGuzzleRequestTrait, generalFunction;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $request = $this->getRequest("retrieveStudents");
        $students = json_decode($request->getBody()->getContents());
        if (session()->has('displayed_message')) {
            alert()->success('SuccessAlert', session()->pull("displayed_message"))->position('top-end');
        }
        $students = $students->data;
        return view("Students.index", compact("students"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = $this->retrieveGroups();
        return view("Students.create", compact("groups"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(studentsRequest $request)
    {
        try {
            $requestInfo = collect($request->input())->except(["_token"])->toArray();
            if (array_key_exists("paid", $requestInfo)) {
                $requestInfo["paid"] = 1;
            } else {
                $requestInfo["paid"] = 0;
            }
            $request = $this->postStoreRequest("storeStudent", $requestInfo, "json");
            $request = json_decode($request->getBody()->getContents());
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
        if ($request->status) {
            session()->flash("displayed_message", $request->msg);
            return redirect()->route("students.index");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $request = $this->getRequestById("retrieveStudentById", $id);
        $students = json_decode($request->getBody()->getContents());
        $students = $students->data;
        $groups = $this->retrieveGroups();
        return view("Students.edit", compact("students", "groups"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $requestInfo = collect($request->all())->except(["_token", "_method"])->toArray();
        if (array_key_exists("paid", $requestInfo)) {
            $requestInfo["paid"] = 1;
        } else {
            $requestInfo["paid"] = 0;
        }
        $validator = Validator::make($requestInfo, [
            "student_name" => "required | string",
            "group_id" => "required | not_in: -1 , 0",
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $request = $this->postUpdateRequest("updateStudent", $requestInfo, $id, "json");
        $request = json_decode($request->getBody()->getContents());
        if ($request->status) {
            session()->flash("displayed_message", $request->msg);
            return redirect()->route("students.index");

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $request = $this->destroyRequest("destroyStudent", $id);
        $result = json_decode($request->getBody()->getContents());
        if ($result->status) {
            session()->flash("displayed_message", $result->msg);
            return redirect()->route("students.index");
        }

    }


}
