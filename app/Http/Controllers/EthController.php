<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class EthController extends Controller
{
   
    
    public function index(){

        return view('searchform');
    }

    public function searchTransactions(Request $request){
       // dd($request->all());

      

       $validator = Validator::make($request->all(),[
        'ethaddress' => ['required', 'regex:/^0x[a-fA-F0-9]{40}$/'],
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


    public function getBalance(Request $request){
    
        $validator = Validator::make($request->all(),[
         'addresseth' => ['required', 'regex:/^0x[a-fA-F0-9]{40}$/'],
         'time' => ['required', 'date'],
     ]);
     if ($validator->fails()) {
         return redirect('/home')
                     ->withErrors($validator)
                     ->with('error', 'Error in validation')
                     ->withInput();
     }else{
 
        $ethaddress=$request->addresseth;
        $date=\Carbon\Carbon::parse($request->time)->timestamp;
        

        $apikey1=Config::get('crypto.ETH_ERC20_TOKEN_APIKEY');
        $response1 = Http::timeout(180)->get('https://api.etherscan.io/api?module=account&action=txlist&address='.$ethaddress.'&sort=desc&apikey='.$apikey1);
        $data1=$response1->collect();
        $lists1=$data1['result'];
       
        $last_date=$lists1[0]['timeStamp']; 
        $first_date=$lists1[count($lists1)-1]['timeStamp'];
        
        $block='';
        if($date>$last_date){
            $block='latest';
        }elseif($date<$first_date){
            $block='earliest';
        }
        else{
            foreach($lists1 as $key=>$list){ 
                if($list['timeStamp']<=$date){
                    $block=$list['blockNumber'];
                    break;
                }
            }
        }
        

        $blocknumber='';
        if($block=='latest'){
            $blocknumber='latest';
        }elseif($block=='earliest'){
            $blocknumber='earliest';
        }
        else{
            $blocknumber='0x'.dechex($block);

        }
 
        $apikey=Config::get('crypto.ETH_BALANCE_KEY');

        $response = Http::timeout(180)->withHeaders(['Content-Type'=> 'application/json',
        'Accept'=>'application/json'
        ])->post('https://mainnet.infura.io/v3/'.$apikey,
    
        [
            "jsonrpc"=> "2.0",
            "method"=> "eth_getBalance",
            "id"=> 1,
            "params"=> [
                $ethaddress,
                $blocknumber
            ]
        ])->throw()->json();
        
        $balance=hexdec($response['result'])/pow(10, 18);
        
     
        return view('show_balance', [
         'ethaddress'=>$ethaddress,
         'date'=>$request->time,
         'balance'=>$balance   
        ]);
       
         
     }
 
 
     }


}
