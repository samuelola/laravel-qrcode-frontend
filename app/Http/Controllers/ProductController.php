<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp;
use Illuminate\Support\Facades\Http;
use App\Transaction;
use App\Charges;
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



    public function initial(Request $request){

        $client = new GuzzleHttp\Client();

        $Authorizationcode = 'Bearer sk_test_bd26d3bef795b1b0896128cc607ce244af635f69';


        $headers = [

            'Accept'=>'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => $Authorizationcode
        ];


        $data = [

            'email'=> "oladelesamuel48@email.com",
            'amount'=>20000,

        ];

        $res = $client->request('POST', 'https://api.paystack.co/transaction/initialize',[

             'headers'=>$headers,
             'body'=>json_encode($data)
              
        ]);

        $qrcode = json_decode((string) $res->getBody(),true);

        return $qrcode;
    }


    public function sammy(Request $request){
        
        
        
        $client = new GuzzleHttp\Client();

        $Authorizationcode = 'Bearer sk_test_bd26d3bef795b1b0896128cc607ce244af635f69';


        $headers = [

            'Accept'=>'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => $Authorizationcode
        ];


        $refParam = $request->reference;


        $res = $client->request('GET', "https://api.paystack.co/transaction/verify/".$refParam,[

             'headers'=>$headers
             
              
        ]);

        $qrcode = json_decode((string) $res->getBody(),true);  
            
        $sam = $qrcode['data']['authorization']['authorization_code'];
       
        $auth_code = $sam;

        $tran_id = Transaction::create([

             'user_id' =>1,
             'amount'  =>$qrcode['data']['amount'],
             'reference' => $qrcode['data']['reference'],
             'authorization' => $auth_code,
             'status'  => $qrcode['data']['status']
        ])->id;


        return redirect()->route('charge',$tran_id);


    }


    public function charge($id){

        $tran = Transaction::where('id',$id)->first();

        $client = new GuzzleHttp\Client();

        $Authorizationcode = 'Bearer sk_test_bd26d3bef795b1b0896128cc607ce244af635f69';


        $headers = [

            'Accept'=>'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => $Authorizationcode
        ];


        $data = [

            'email'=> "oladelesamuel48@email.com",
            'amount'=>20000,
            'authorization_code'=>$tran->authorization

        ];

        $res = $client->request('POST', 'https://api.paystack.co/transaction/charge_authorization',[

             'headers'=>$headers,
             'body'=>json_encode($data)
              
        ]);

        $qrcode = json_decode((string) $res->getBody(),true);

        Charges::create([

             'user_id' =>1,
             'amount'  =>$qrcode['data']['amount'],
             'reference' => $qrcode['data']['reference'],
             'authorization_code' => $tran->authorization,
             'status'  => $qrcode['data']['status'],
             'currency'  => $qrcode['data']['currency'],
             'last4'  => $qrcode['data']['authorization']['last4'],
             'card_type'  => $qrcode['data']['authorization']['card_type'],
        ]);

        
          return "you have been charged";
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


    // public function sammyola(){

    //     \Artisan::call('schedule:run');
    // }


    public function sammyola(){

        \Artisan::call('registered:users');

        dd('successfully');
    }



/*cron job alternative approach */

//     use Carbon\Carbon;
// use Illuminate\Support\Facades\Artisan


// class Kernel extends ConsoleKernel
// {
  
//   // Some code exists here
  
//   protected function schedule(Schedule $schedule): void
//   {

//       // Rest of schedules

//        $schedule->call(function () {
//                $year = Carbon::now()->y;
//                if($year == 2021){
//                   Artisan::call('nuke:country "Kim Young Un" Amerika');
//                 }
//         })->cron('13 00 12 06 *');


//       // More schedules

//   }

//   // Rest of code here
// }

/* end cron job alternative approach */

}
