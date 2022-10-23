 <div class="container ">
   
   
   <div class="container" style="margin-top: 40px; background-color: white;  border: 5px solid #3bd562; border-radius: 25px;">
   
   <form method="POST" action="{{url('/balance')}}">
     @csrf
     <div class="form-group" style="margin-top: 20px; margin-left: 20px; margin-right: 20px">
       <label for="addresseth">ETH address</label>
       <input type="text" class="form-control" id="addresseth" name="addresseth" placeholder="Enter eth address">
       <small>For example: 0xd1a0b5843f384f92a6759015c742fc12d1d579a1</small>
       <small class="text-danger">{{ $errors->first('addresseth') }}</small>
   
   
     </div>
   
     <div class="form-group col-md-3" style="margin-top: 20px;margin-left: 20px;">
       <label for="time">Date of balance</label>
         <div class='input-group date'>
                                                
            <input class="date form-control" type="datetime" name="time" autocomplete="off" placeholder="Choose date">

               <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                  <small class="text-danger">{{ $errors->first('time') }}</small>
          </div>
      </div>
     <br>
     <button type="submit" class="btn btn-primary" style="margin-top: 20px; margin-bottom: 20px;margin-left: 20px; margin-right: 20px">Submit</button>
   </form>
   </div>
   </div>


<script type="text/javascript">
    $('.date').datepicker({  
       format: 'yyyy-mm-dd',

     });  
</script> 
