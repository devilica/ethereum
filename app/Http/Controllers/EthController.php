<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;




class EthController extends Controller
{
   
    
    public function index(){

        return view('searchform');
    }

    public function searchTransactions(Request $request){
       // dd($request->all());

      

       $validator = Validator::make($request->all(),[
        'ethaddress' => ['required', 'string'],
        'blocknumber' => ['required', 'integer'],
    ]);
    if ($validator->fails()) {
        return redirect('/home')
                    ->withErrors($validator)
                    ->with('error', 'Error in validation')
                    ->withInput();
    }else{

       $ethaddress=$request->ethaddress;
       $blocknumber=$request->blocknumber;

       $apikey=Config::get('crypto.ETH_ERC20_TOKEN_APIKEY');
      

       $response = Http::timeout(180)->get('https://api.etherscan.io/api?module=account&action=txlist&address='.$ethaddress.'&startblock='.$blocknumber.'&sort=asc&apikey='.$apikey);
       $data=$response->collect();
       $lists=$data['result'];
      
    
       return view('transactions', [
        'lists'=>$lists,
        'ethaddress'=>$ethaddress,
        'blocknumber'=>$blocknumber
       ]);
      
        
    }


    }


}
