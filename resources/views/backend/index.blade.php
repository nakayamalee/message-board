@extends('templates.template')
@section('main')
<div class="fs-3 p-3 text-black-50">歡迎 , {{Auth::user()->name}} ! !</div>



{{--

@foreach ($products as $product)


<button type="button" class="controlBtn minusBtn" onclick="minus{{$product->$id}}">-</button>
<input type="" id="" >
<button type="button" class="controlBtn minusBtn" onclick="plus{{$product->$id}}">+</button>
@endforeach --}}
{{-- <input id="addCartRoute" type="hidden" value=""> --}}


@endsection











@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

function minus(id){
    console.log(id);
    const input = document.querySelector(`input#product${id}`);
    if(inpur.value ==='1') return;
    input.value--;
}

function plus(id){
    console.log(id);
    const input = document.querySelector(`input#product${id}`);
    input.value++;
}

function checkQty(el){
if (el.value <=0){
    el.value = 1;
}
}



// function addCart(id){
//     const input = document.querySelector(`input#product${id}`);

//     if(parseInt(input.value)<=0) return;
//     const formData= new Formdata();
//     formData.append('_token','{{csrf_token()}}');
//     formData.append('qty',input.value);
//     formData.append('product_id',id);

        // fetch(addCartRoute,{
            // method:'POST',
            // body:'formData',
        // }).then((res)=>{
        //     return res.json();
        // }).then((data)=>{
        //     if(data.code == 1){
        //         Swal.fire('成功加入商品');
        //     }
        // });

// }



</script>






@endsection

