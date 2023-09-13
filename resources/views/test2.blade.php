@extends('templates.template')
@section('css')
@endsection
@section('main')

<div>step2</div>
<div>
    電話{{$phone}}
</div>
<a href="{{route('nameTest')}}">
    <button class="btn btn-success">回上一頁</button>
</a>
@endsection
