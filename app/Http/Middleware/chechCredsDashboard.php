<?php

namespace App\Http\Middleware;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Closure;

class chechCredsDashboard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $response = "";
        $client = new Client(['headers' => ['Content-Type' => 'application/json']]);
        $requestInput =collect($request->all())->except('_token')->toArray();
        try{
            $response = $client->request( "post", env("Api_App_url").'checkAdmin' ,
                [
                    'form_params' => [
                        'email' => $requestInput["email"],
                        'password' => $requestInput["password"],
                    ],
                    'headers' => [
                        'Accept' => 'application/json'
                    ],
                ]);


       }


        catch(\Exception $e){
            echo $e->getMessage();
    }
        $result = json_decode($response->getBody()->getContents());
        if(! $result->status){
            return redirect()->route('logout');
        }
        session()->put("user_token" , $result->status);
        return  $next($request);


    }


}
