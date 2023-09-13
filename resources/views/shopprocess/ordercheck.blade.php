
@extends('templates.fontTemplete')

@section('css')
    <style>
        ul {
            padding: 0;
        }

        .content-thx {
            height: 50vh;
        }
    </style>
@endsection

@section('main-content')

<div class="container">
    <div class="card border">
        {{--  --}}
        {{-- @dd($orderResult) --}}
        {{-- @dd($itembuys) --}}
        @foreach($orderResult as $result)
            訂單編號：<br>
            姓名：{{$result->name}}<br>
            地址：{{$result->address}}<br>
            日期：{{$result->date}}<br>
            電話：{{$result->phone}}<br>
            備註：{{$result->menu}}<br>
            匯款方式：
            @if($result->pay == 1)

                <ul class="ms-2 p-0">
                    <li class="fw-bold">臨櫃匯款</li>
                    <li name="shop_account">0000-123456789-123456</li>
                    <li name="shop_bank">007&nbsp&nbsp第一銀行</li>
                    <li name="shop_user">戶名：洪券雅</li>
                    <li name="shop_remark">匯款後請聯繫洪先生
                        <br>
                        請告知帳號末五碼以便對帳</li>
                 </ul><br>
            @else
                <div class="ms-2">
                    <div class="fw-bold">線上匯款</div>
                    <div>本站線上付款為綠界金流</div>
                </div>
            @endif
            @foreach($itembuys as $itembuy)
                商品：{{$itembuy->product->name}}<br>
                數量：{{$itembuy->qty}}<br>
            @endforeach
            總金額：{{$result->total}}<br>
        @endforeach
    </div>
</div>
@endsection
