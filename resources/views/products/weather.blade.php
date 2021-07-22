@extends('layouts.app')


@section('content')

<h1>Weather in Lagos</h1>
    <div class="row">
         

            


              <div class="col-sm-3 mt-5">
                <div class="card">
                  <div class="card-body">
                    <form action="">
                      
                    </form>
                    <h5 class="card-title">Weather:

                      @foreach($res['weather'] as $item)
                           {{$item['main']}} [{{$item['description']}}]
                      @endforeach
                    
                  </h5>
                    <h5 class="card-title">Temp: {{$res['main']['temp']}}</h5>
                    <h5 class="card-title">Pressure: {{$res['main']['pressure']}}</h5>
                    <h5 class="card-title">Humidity: {{$res['main']['humidity']}}</h5>
                    <h5 class="card-title">Wind Speed: {{$res['wind']['speed']}}</h5>
                    {{-- <p class="card-text"># {{$value['NGN']}}*2</p> --}}
                  
                  </div>
                </div>
              </div>
         
          

          
         
    </div>
      

@endsection




