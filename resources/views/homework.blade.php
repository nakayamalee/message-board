@extends('templates.hwTemplate')
@section('main')

@foreach($responses as $key => $res)
{{-- @dump($key) --}}
<div class="container rounded border shadow p-5 mb-5">第{{$key+1}}樓留言
    <div class="p-3">
        {{$res->response}}
        <form action="{{route('hw.destroy',['hw'=>$res->id])}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-success"> 刪除</button>
        </form>
    </div>
    <form action="{{route('hw.update',['hw'=>$res->id])}}" method="POST" class="container d-flex justify-content-between mb-5">
        @csrf
        @method('PUT')
        <textarea name="modify" class="form-control w-75 fs-5"></textarea>
        <div class="justify-content-end d-flex">
            <button type="submit" class="btn btn-success me-3" >完成修改</button>
        </div>
    </form>
    {{-- @dd($re) --}}

    <hr>
    <div class="container p-5 mb-5">回覆第{{$key+1}}樓留言
        @foreach($res->responseSent ?? [] as $key => $r)
        <div class="d-flex align-items-center mb-3 appear1">
            <div class="w-100 ">第{{$key+1}}則回覆&nbsp;&nbsp;&nbsp;&nbsp;{{$r->re}}</div>
            <div class="container justify-content-end d-flex ">
                <button class="btn btn-success me-3 responsebox" >修改</button>
                <form action="{{route('nameDelete',['id'=>$r->id])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-success"> 刪除</button>
                </form>
            </div>
        </div>
        {{-- ------------------------------------------------------------------ --}}
        <div class="appear2 d-none">
            <div class="d-flex align-items-center w-100">
                <div>第{{$key+1}}則回覆&nbsp;&nbsp;&nbsp;&nbsp;{{$r->re}}</div>&nbsp;&nbsp;&nbsp;&nbsp;

                <form action="{{route('nameDelete',['id'=>$r->id])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-success"> 刪除</button>
                </form>
            </div>
            <form action="{{route('nameReModify',['id'=>$r->id])}}" method="POST" class="container d-flex justify-content-between mb-3">
                @csrf
                @method('PUT')
                <textarea name="remodify" class="form-control w-75 fs-5"></textarea>
                <div class="justify-content-end d-flex">
                    <button type="submit" class="btn btn-success me-3 responsebox2" >完成修改</button>
                </div>
            </form>
        </div>
        @endforeach
        <form action="{{route('nameRe',['id'=>$res->id])}}" method="POST" class="d-flex justify-content-end flex-wrap mt-3">
            @csrf
            <textarea name="re" class="form-control w-100" aria-label="With textarea"></textarea>
            <button type="submit" class="btn btn-success mt-3"> 回覆</button>
        </form>
    </div>


</div>

@endforeach


<div class="container rounded border shadow p-5 my-3 ">建立新留言
    <form action="{{route('hw.store')}}" method="POST" class="d-flex justify-content-end flex-wrap mt-3">
        @csrf
        <textarea name="response" class="form-control w-100" aria-label="With textarea"></textarea>
        <button class="btn btn-success mt-3"> 送出</button>
    </form>
</div>

@endsection

@section('js')
<script>
    let box =  document.querySelectorAll('.responsebox');
    console.log(box);
    let box2 =  document.querySelectorAll('.responsebox2');
    console.log(box2);
    let appear1 = document.querySelectorAll('.appear1');
    console.log(appear1);
    let appear2 = document.querySelectorAll('.appear2');
    console.log(appear2);


    box.forEach((box,index) => {
        box.addEventListener('click', () => {
            // console.log(123,index);
            console.log(appear1[index]);
            // appear1[index].style.display = 'none!important';
            appear1[index].style.setProperty('display', 'none', 'important');
            appear2[index].style.setProperty('display', 'block', 'important');
        // appear[0].classList.toggle('d-block');
      })
      });

    box2.forEach((box,index) => {
        box.addEventListener('click', () => {
            console.log(456,index);

        // appear[0].classList.toggle('d-block');
      })
      });

</script>
@endsection
