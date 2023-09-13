
@extends('templates.template')
@section('css')
@endsection
@section('main')

<a href="{{route('nameTest2')}}">
    <button class="btn btn-success">到test2頁面</button>
</a>
<form action="{{route('test.store')}}" method="POST">
@csrf
<input type="tel" name="phone" value="{{old('phone')}}">
<button type="submit">下一步</button>
</form>
@endsection
