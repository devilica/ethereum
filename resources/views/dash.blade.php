
<div class="container" style="margin-top:20px">
    <div class="row justify-content-center">
        <div class="col-md-6" style="height: 400px">
            <div class="card">
                <div class="card-header"> 
                    <img src={{url('images/ethlogo.png')}}  style="width:30px; height: 30px; float:left; margin-right:20px"/><b>ETHEREUM</b>

               
                </div>

                <div class="card-body">
                @if (Route::has('login'))
                <div class="container">
                    @auth
                       <p style="float:right; font-size:4vw;"> Go back to <a href="{{ url('/home') }}" style="text-transform: uppercase;color: #4CAF50; ">HOME</a>!</p>
                    @else
                        
                        
                        @if (Route::has('register'))
                            
                        
                        <h5>You can <a href="{{ route('register') }}" style="text-transform: uppercase;color: #4CAF50; " >REGISTER</a>
                         to test ETH search or you can <a href="{{ route('login') }}" style="text-transform: uppercase;color: #4CAF50;">LOG IN</a>!!</h5>
                           
                        
                        @endif
                    @endauth
                </div>
            @endif


                </div>
            </div>

        </div>
    </div>
</div>

