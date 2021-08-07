<?php


namespace App\Http\Traits;
use GuzzleHttp\Client;


Trait generalGuzzleRequestTrait
{
    private $client;
    public function __construct(){
        $this->client = new Client();
    }

    public function getRequest($requestName){
        $request = $this->client->request("get" , env("Api_App_url")."$requestName");
        return $request;
    }

    public function getRequestById ($requestName , $id){
        $client = new Client();
        $request = $this->client->request("get" , env("Api_App_url")."$requestName/{$id}");
        return $request;
    }

//    public function getRequestByOptionalValue ($requestName , $id){
//        $client = new Client();
//        $request = $this->client->request("get" , env("Api_App_url")."$requestName/{".$id."?}");
//        return $request;
//    }


    public function postUpdateRequest($apiRouteName , $requestArray , $id , $jsonParameter){
        $response = $this->client->request("post", env("Api_App_url") . $apiRouteName, [
            "headers" => ["content-type" => "application/json"],
            'json' => [
                $jsonParameter => $requestArray,
                "id" => intval($id),
            ]
        ]);
        return $response;
    }


    public function postStoreRequest($apiRouteName , $requestArray , $jsonParameter=""){
        $response = $this->client->request("Post", env("Api_App_url") . $apiRouteName, [
            "headers" => ["content-type" => "application/json"],
            'json' => [
                $jsonParameter => $requestArray,

            ]
        ]);
        return $response;
    }

    public function destroyRequest($apiRouteName , $id)
    {
        $response = $this->client->request('Post', (env('Api_App_url') . $apiRouteName), [
            'form_params' => [
                "id" => $id,
            ]
        ]);
        return $response;
    }
}
