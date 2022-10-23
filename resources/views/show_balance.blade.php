@extends('home')

@section('content')
<div class="main-img   justify-content-center" style="height: 95vh !important;!">


<div class="container" style="margin-top:160px">
    <div class="row justify-content-center">
        <div class="col-md-6" style="height: 40px">
            <div class="card">
                <div class="card-header"> 
                    <img src={{url('images/ethlogo.png')}}  style="width:30px; height: 30px; float:left; margin-right:20px"/><b>ETHEREUM</b>

               
                </div>

                <div class="card-body">
                <div class="container">
                <p style="float:right;"> Go back to <a href="{{ url('/home') }}" style=";color: #4CAF50; ">HOME</a>!</p>
    <br>
                       <p> ETH address: {{$ethaddress}}</p>
                       <p> Date: {{$date}}</p>
                       <p> Balance: {{$balance}}</p>

                    
                </div>
           


                </div>
            </div>

        </div>
    </div>
</div>

</div>
@endsection