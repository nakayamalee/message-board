@extends('templates.fontTemplete')

@section('css')
    <style>
        ul {
            padding: 0;
        }

        .card {
            border: none !important;
            border-bottom: 1px solid black !important;
        }

        .card-img-top {
            max-width: 100px;
            height: 100px;
            background-repeat: no-repeat;
            background-size: contain;
        }
    </style>
@endsection

@section('main-content')
    <div class="order-list d-flex flex-column">
        <div class="container">
            <div class="w-100 bg-light ">
                <title class="d-inline fs-1 ">Check out</title>
                <div class="d-flex flex-row">
                    <a href="">Home</a>/<a href="">Shop</a>/<a href="">ShopCheckout</a>
                </div>
                <p class=" mb-5">already have account? Click here to <a href="">Sign in</a> .</p>
            </div>
            {{-- <form class="mt-5 m-auto d-flex flex-column" action="{{ route('shopStorePrice') }}" method="POST">
                 @csrf --}}
                <ul class="border">
                    <div class="border-bottom p-2">Order details</div>
                    <div class="w-100">
                      @foreach ($itembuys as $itembuy)
                      {{-- ->responseSent ?? [] as $key => $r --}}
                        <li id="row{{ $itembuy->id }}" class="card w-100 d-flex flex-row align-items-center justify-content-between" style="width: 18rem;">
                            {{-- @dd( $itembuy->product) --}}
                            <img src="{{asset($itembuy->product_withTrashed->image)}}" class="card-img-top w-25" alt="...">
                            <div class="card-body d-flex flex-row flex-wrap align-items-center w-50  justify-content-between">
                                <div>
                                    <h5 class="card-title">{{$itembuy->product_withTrashed->name}}</h5>
                                </div>
                                <p class="card-text">{{$itembuy->product_withTrashed->desc}}</p>
                                <p class="card-text"> ${{$itembuy->product_withTrashed->price}}</p>
                                <div>
                                    <button type="button" class="controlBtn minusBtn" onclick="minus({{ $itembuy->id }})">-</button>
                                    <input id="product{{ $itembuy->id }}" type="number" value="{{ $itembuy->qty }}" onchange="inputQty('{{$itembuy->id}}')" class="w-75">
                                    <button type="button" class="controlBtn plusBtn" onclick="plus({{ $itembuy->id }})">+</button>
                                </div>
                            </div>
                            <div id="price{{ $itembuy->id }}" class="me-5">
                                ${{$itembuy->product_withTrashed->price * $itembuy->qty}}
                            </div>
                            <div>
                                <button type="button" class="btn btn-danger" onclick="deleteCart('{{ $itembuy->id }}')">移除</button>
                            </div>
                        </li>
                      @endforeach
                        <div class="w-100 d-flex flex-row justify-content-between border-bottom" >
                            <div class="p-2">總金額</div>
                            <div class="p-2" id="total">${{$total}}</div>
                        </div>
                    </div>
                    <div id="nextStep" class="w-100 d-flex justify-content-end">
                        @if($itembuys->count())
                            <a href="{{ route('shopDeliverGet') }}">
                                <button type="submit" class="btn btn-primary align-self-end mt-2 p-2 ">
                                    下一步
                                </button>
                            </a>
                        @endif
                    </div>
                    <input id="addCartRoute" type="hidden" value="{{ route('nameUpdate') }}">
                </ul>
            {{-- </form> --}}
        </div>
    </div>
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  const addCartRoute = document.querySelector('input#addCartRoute').value;

  function minus(id) {

    const input = document.querySelector(`input#product${id}`);
    if (input.value === '1') return;
    input.value--;
    checkQty(id, input.value);
  }
  function plus(id) {
    const input = document.querySelector(`input#product${id}`);
    input.value++;
    checkQty(id, input.value);
  }
  function inputQty(id) {
    const input = document.querySelector(`input#product${id}`);
    if (input.value <= 1) {
        input.value = 1;
    }
    checkQty(id, input.value);
  }


  function checkQty(id, qty) {
    const formData = new FormData();
    formData.append('_token', '{{ csrf_token() }}');
    formData.append('_method', 'PUT');
    formData.append('qty', qty);
    formData.append('cart_id', id);
    // formData.append('id', id);

    fetch(addCartRoute, {
      method: 'POST',
      body: formData,
    }).then((res) => {
      return res.json();
    }).then((data) => {
        const price = document.querySelector(`#price${id}`);
        // price.textContent = '$' + `${data.price}`;
        const totalEl = document.querySelector('#total');//朝上的箭頭怎麼打
        price.textContent='$' + `${data.price}`;

        const all_price = document.querySelectorAll('[id^=price]');//朝上的箭頭怎麼打
        console.log(price, totalEl, all_price);
        let total = 0;
        all_price.forEach(element=>{
            const price = parseInt(element.textContent.trim().substring(1));
            total += price;
        });
        totalEl.textContent = '$' + total;
    });
  }

  function deleteCart(id) {
    Swal.fire({
        title: '確定要刪除此筆資料嗎?',
        showDenyButton: true,
        showCancelButton: true,
        showConfirmButton: false,
        denyButtonText: `刪除`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isDenied) {
            const formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('_method', 'DELETE');
            formData.append('cart_id', id);
            fetch('{{ route("shop.deleteCart") }}', {
                method: 'POST',
                body: formData,
            }).then((res) => {
                return res.json();
            }).then((data) => {
                if (data.code === 1) {
                    const row = document.querySelector(`#row${data.id}`);
                    const nextBtn = document.querySelector(`#nextStep`);
                    const total = document.querySelector('#total');
                    row.remove();

                    const rows = document.querySelectorAll('[id^=row]');

                    total.textContent = '$' + data.total;

                    if (rows.length === 0) {
                        nextBtn.textContent = '';
                    }
                } else {
                    location.reload();
                }
            });
        }
    });
  }



//   function addCart(id) {
//     const input = document.querySelector(`input#product${id}`);
//     if (parseInt(input.value) <= 0) return;

//     const formData = new FormData();
//     formData.append('_token', '{{ csrf_token() }}');
//     formData.append('qty', input.value);
//     // formData.append('product_id', id);
//     formData.append('id', id);
//     console.log("AA");
//     fetch(addCartRoute, {
//       method: 'POST',
//       body: formData,
//     });
//   }
</script>

@endsection
