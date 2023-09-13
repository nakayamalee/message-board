@extends('templates.fontTemplete')

@section('css')
@endsection

@section('main-content')
    <div class="container">
        <div class="w-100 bg-light ">
            <title class="d-inline fs-1 ">Check out</title>
            <div class="d-flex flex-row">
                <a href="">Home</a>/<a href="">Shop</a>/<a href="">ShopCheckout</a>
            </div>
            <p class=" mb-5">already have account? Click here to <a href="">Sign in</a> .</p>
        </div>
        <form action="{{ route('shopStoreDeliver') }}" method="POST">
            @csrf
            <div class="mb-5 mt-4">配送資訊</div>
            <div class="container border p-4 mb-4">
                <div class="container d-flex flex-column p-0 m-0">
                    <input name="name" class="w-100 mb-3" type="text" placeholder="收件者姓名" value="{{ old('name', $hasBeen['name'] ?? '') }}" required>
                    <input name="address" class="w-100 mb-3" type="text" placeholder="收件者地址" value="{{ old('address', $hasBeen['address'] ?? '') }}" required>
                    <input name="date" class="w-100 mb-3" type="date" value="{{ old('date', $hasBeen['date'] ?? '') }}" min="{{ substr(today(), 0, 10) }}" required>
                    <input name="phone" class="w-100 mb-3" type="number" placeholder="收貨者連絡電話" value="{{ old('phone', $hasBeen['phone'] ?? '') }}" required>
                    <input name="menu" class="w-100" type="text" value="{{ old('menu', $hasBeen['menu'] ?? '') }}" placeholder="備註">
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <a href="{{ route('shopOrderdetailsGet') }}">
                    <button type="button">上一步</button>
                </a>
                <button type="submit">下一步</button>
            </div>
        </form>
    </div>
@endsection

@section('js')
@endsection
