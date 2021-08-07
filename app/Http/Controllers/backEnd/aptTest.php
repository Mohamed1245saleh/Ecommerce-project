<?php

namespace App\Http\Controllers\backEnd;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class aptTest extends Controller
{
    public function test(){
         $client  =  new Client();
         $response = $client->get(env('Api_App_url').'test');
         $body = json_decode($response->getBody()->getContents() ,true);
         return view("Users.index");
    }
}
