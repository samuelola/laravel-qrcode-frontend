<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp;
use Illuminate\Support\Facades\Http;
class ProductController extends Controller
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


    public function show(Request $request){

        $client = new GuzzleHttp\Client();

        $Authorizationcode = getenv('AUTHORIZATION_CODE');

        $headers = [

            'Accept'=>'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => $Authorizationcode
        ];

        $res = $client->request('GET', 'http://localhost:8000/api/qrcodes/'.$request->id,[

             'headers'=>$headers
              
        ]);

        $qrcode = json_decode((string) $res->getBody(),true);

        return view('products.show',compact('qrcode'));
    }


    public function currency(){

        $accesskey = 'dca38d591cb809b29fe7227f515754c7';

        // $res = Http::get('http://data.fixer.io/api/latest?access_key='.$accesskey)->body();

        // $res = Http::get('https://api.currencylayer.com/live?access_key='.$accesskey)->json();

        $res = Http::get('http://data.fixer.io/api/latest?access_key='.$accesskey)->json();

        $result = $res['rates']['NGN'] * 1;

        return view('products.currency',compact('result'));


    }



    public function weather(){


        $accesskey = 'd9b552f028c5ed242a37f454c21f5b5d';
        $city_name = 'Lagos';

        $res = Http::get('api.openweathermap.org/data/2.5/weather?q='.$city_name.'&units=metric&appid='.$accesskey)->json();

        return view('products.weather',compact('res'));
      

    }

    public function crypto(){


        $accesskey = '88a085f582ce9cbb33587a0ac3cf9785';
       

        $res = Http::get('http://api.coinlayer.com/api/live?access_key='.$accesskey)->json();

        return view('products.crypto',compact('res'));
      

    }


      public function sch(){
          
            
        \Artisan::call('email:inactive-users');

        dd('successfully');
    }


    public function test_cron(){

         \Artisan::call('sam:histo');

        dd('successfully');
    }

}
