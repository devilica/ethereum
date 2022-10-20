@extends('home')

@section('content')

<body>
<div class="container ">

<h1 style="color: #4CAF50;   text-align: center; ">Transactions that containing ETH address <a href="{{'https://etherscan.io/address/'.$ethaddress}}" style="color: black"  target="_blank"> {{$ethaddress}}</a> from block <a href="{{'https://etherscan.io/block/'.$blocknumber}}" style="color: black"  target="_blank">{{$blocknumber}}</a></h1>
<div class="container" style="margin-top: 40px; background-color: white;">

    @foreach($lists as $key=>$list)
        <div class="card text-white bg-success mb-3">
        <div class="card-header">Block number: {{$list['blockNumber']}}</div>
        <div class="card-body">
            <h4 class="card-title">Details about transaction</h4>
            <span class="card-text">Timestamp: {{$list['timeStamp']}}</span><br>
            <span class="card-text">Hash: <a href="{{'https://etherscan.io/tx/'.$list['hash']}}" style="color: black"  target="_blank">{{$list['hash']}}</a> (Click on link to see on Etherscan)</span><br>
            <span class="card-text">Nonce: {{$list['nonce']}}</span><br>
            <span class="card-text">Block hash: {{$list['blockHash']}}</span><br>
            <span class="card-text">Transaction index: {{$list['transactionIndex']}}</span><br>
            <span class="card-text">From: {{$list['from']}}</span><br>
            <span class="card-text">To address: {{$list['to']}}</span><br>
            <span class="card-text">Value: {{$list['value']}}</span><br>
            <span class="card-text">Contract: {{$list['contractAddress']}}</span><br>
            <span class="card-text">Input: {{$list['input']}}</span><br>
            <span class="card-text">Gas: {{$list['gas']}}</span><br>
            <span class="card-text">Gas used: {{$list['gasUsed']}}</span><br>
            <span class="card-text">Gas price: {{$list['gasPrice']}}</span><br>
            <span class="card-text">Cumulative gas used: {{$list['cumulativeGasUsed']}}</span><br>
            <span class="card-text">Tx receipt status: {{$list['txreceipt_status']}}</span><br>
            <span class="card-text">Is error: {{$list['isError']}}</span><br>
            <span class="card-text">Confirmations: {{$list['confirmations']}}</span><br>
            <span class="card-text">Method Id: {{$list['methodId']}}</span><br>
            <span class="card-text">Function name: {{$list['functionName']}}</span><br>


        </div>
        </div>

    @endforeach   
</div>
</div>


</body>

@endsection