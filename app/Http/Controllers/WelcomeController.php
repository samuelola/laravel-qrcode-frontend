<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp;

class WelcomeController extends Controller
{
    public function index(Request $request){

        $client = new GuzzleHttp\Client();

        $Authorizationcode = getenv('AUTHORIZATION_CODE');

        $headers = [

            'Accept'=>'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => $Authorizationcode
        ];

        $res = $client->request('GET', 'http://localhost:8000/api/qrcodes',[

             'headers'=>$headers
              
        ]);

        $qrcodes = json_decode((string) $res->getBody(),true);

        return view('products.index',compact('qrcodes'));
    }

}
