@extends('layouts.app')


@section('content')

<h1>Bicoin rate for 1 dollar</h1>
    <div class="row">
         

            


              <div class="col-sm-3 mt-5">
                <div class="card">
                  <div class="card-body">
                    <form action="">
                      
                    </form>
                    <h5 class="card-title">BTC:{{$res['rates']['BTC']}}</h5>
                    {{-- <p class="card-text"># {{$value['NGN']}}*2</p> --}}
                  
                  </div>
                </div>
              </div>
         
          

          
         
    </div>
      

@endsection




