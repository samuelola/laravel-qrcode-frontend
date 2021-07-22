@extends('layouts.app')


@section('content')

<h1>Products</h1>
    <div class="row">
         

             @foreach($qrcodes['data'] as $qrcode)


              <div class="col-sm-3 mt-5">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">{{$qrcode['product_name']}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{$qrcode['company_name']}}</h6>
                    <p class="card-text"># {{$qrcode['amount']}}</p>
                   <a href="{{$qrcode['link']['payment_link']}}" class="btn btn-primary btn-sm">Pay with Qrcode</a>
                      <a href="{{route('products.show',$qrcode['id'])}}" class="btn btn-info btn-sm">Buy Now</a>
                  </div>
                </div>
              </div>
         
          

           @endforeach
         
    </div>
      

@endsection




