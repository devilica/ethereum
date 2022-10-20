
<body>
   
<div class="container ">


<div class="container" style="margin-top: 40px; background-color: white;  border: 5px solid green; border-radius: 25px;">

<form method="POST" action="{{url('/transactions')}}">
  @csrf
  <div class="form-group" style="margin-top: 20px; margin-left: 20px; margin-right: 20px">
    <label for="ethaddress">ETH address</label>
    <input type="text" class="form-control" id="ethaddress" name="ethaddress" placeholder="Enter eth address">
    <small class="text-danger">{{ $errors->first('ethaddress') }}</small>

  </div>
  <div class="form-group" style="margin-top: 20px;margin-left: 20px; margin-right: 20px">
    <label for="blocknumber">Block number</label>
    <input type="text" class="form-control" id="blocknumber" name="blocknumber" placeholder="Enter block number">
    <small class="text-danger">{{ $errors->first('blocknumber') }}</small>

  </div>
  <br>
  <button type="submit" class="btn btn-primary btn-block" style="margin-top: 20px; margin-bottom: 20px;margin-left: 20px; margin-right: 20px">Submit</button>
</form>
</div>
</div>
</body>