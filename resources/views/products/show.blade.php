@extends('layouts.app')


@section('content')

<h1>Products ({{$qrcode['data']['product_name']}})</h1>
    <div class="row">
         

            
         
             <div class="col-sm-3 col-md-6 mt-5">
                 <div class="card">
              
                   <div class="card-body">

                     <h5 class="card-title">{{$qrcode['data']['product_name']}}</h5>
                      <h6 class="card-subtitle mb-2 text-muted">{{$qrcode['data']['company_name']}}</h6>
                     <p class="card-text"># {{$qrcode['data']['amount']}}</p>
                     <a href="{{$qrcode['data']['link']['payment_link']}}" class="btn btn-primary btn-sm">Pay with Paystack</a>
                     {{--  <a href="{{route('products.show',$qrcode['data']['id'])}}" class="btn btn-info btn-sm">Pay with Paystack</a> --}}
        
                   </div>
                 </div>

             </div>
               
             <div class="col-sm-3 mt-5">
                 <div class="card">
              
                   <div class="card-body">

                     <h5 class="card-title">Pay with Qrcode</h5>
                      <h6 class="card-subtitle mb-2 text-muted">Scan with Qrcode Scanner</h6>
                     <p class="card-text"><img src="{{$qrcode['data']['qrcode_path']}}" alt="qrcode image"></p>
                     
        
                   </div>
                 </div>

             </div>  
         
              

         
         
    </div>
      

@endsection

