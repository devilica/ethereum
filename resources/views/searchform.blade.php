
<body>
   
<div class="container ">


<div class="container" style="background-color: white;  border: 5px solid #3bd562; border-radius: 25px;">

<form method="POST" action="{{url('/transactions')}}">
  @csrf
  <div class="form-group" style="margin-top: 20px; margin-left: 20px; margin-right: 20px">
    <label for="ethaddress">ETH address</label>
    <input type="text" class="form-control" id="ethaddress" name="ethaddress" placeholder="Enter eth address">
    <small>For example: 0x5bcd25b6e044b97dfc941b9ec4b617ec10e1abcd</small>
    <small class="text-danger">{{ $errors->first('ethaddress') }}</small>


  </div>
  <div class="form-group" style="margin-top: 20px;margin-left: 20px; margin-right: 20px">
    <label for="blocknumber">Block number</label>
    <input type="text" class="form-control" id="blocknumber" name="blocknumber" placeholder="Enter block number">
    <small>For example: 3000000</small>
    <small class="text-danger">{{ $errors->first('blocknumber') }}</small>

  </div>
  <br>
  <button type="submit" class="btn btn-primary" style="margin-top: 20px; margin-bottom: 20px;margin-left: 20px; margin-right: 20px">Submit</button>
</form>
</div>
</div>

