<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Traits\generalGuzzleRequestTrait;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Http\Requests\usersValidation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;



class Users extends Controller
{

use generalGuzzleRequestTrait;


//    public function __construct()
//    {
////       return  $this->middleware("dashToken");
//    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        $response =  $this->getRequest("test" );
        $users = json_decode($response->getbody()->getContents());
        if(session()->has('displayed_message')){
            alert()->success('SuccessAlert',session()->pull("displayed_message"))->position('top-end');
        }
        $users = $users->data;
        return view("Users.index" ,compact("users"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Users.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(usersValidation $request)
    {
        $client = new Client();
        $requestInput = collect($request->all())->except('_token')->toArray();
        $requestInput["password"] = bcrypt($requestInput["password"]);
        $response = $client->request( "post", env("Api_App_url").'saveNewUser' ,[
            'form_params' => [
            "newUser" => $requestInput,
           ]
        ]);
        $result = json_decode($response->getBody()->getContents());
        session()->flash("displayed_message", $result->msg);
        return redirect()->route('users.index')->with(["result" => $result]);
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
        $client = new Client();
        $response = $client->request( "post", env("Api_App_url").'findUser' ,[
            'form_params' => [
                "id" => $id,
            ]
        ]);
        $result = json_decode($response->getBody());
        $user = $result->user;
        return view("Users.edit" , compact("user" ));
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
        $client = new Client();
        $requestInfo = collect($request->all())->except(["_token" , "_method"])->toArray();
        if($requestInfo["password"] != ""){
            $requestInfo["password"] = bcrypt($requestInfo["password"]);
        }else{
            unset($requestInfo["password"]);
        }
            $response = $client->request("post", env("Api_App_url") . 'updateUser', [
                'form_params' => [
                    "updatedUserInfo" => $requestInfo,
                    "id" => $id,
                ]
            ]);
        $result = json_decode($response->getBody());
        if($result->status){
            session()->flash("displayed_message" , $result->msg);
            return redirect()->route("users.index");
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
        $client  =  new Client();
        $response =  $client->request('Post' , (env('Api_App_url').'deleteUser'), [
            'form_params' => [
                "id" => $id,
                ]
         ]);
        $result = json_decode($response->getBody());
        if($result->status){
            session()->flash("displayed_message" , $result->msg);
            return redirect()->route("users.index");
        }
    }
}
