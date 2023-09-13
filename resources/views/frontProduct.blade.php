@extends('templates.index')
@section('main')

<div class="container">
    <div class="row row-cols-1 row-cols-md-2 row-cols-xxl-4">
      @foreach ($products ?? [] as $item)
        <div class="col w-25 mb-3">
          <div class="card rounded">
            <img src="{{ asset($item->image) }}" class="w-100" style="height:200px;" alt="...">
            <div class="card-body">
              <h5 class="card-title">{{ $item->name }}</h5>
              <p class="card-text">{{ $item->desc }}</p>
              <p class="card-text">${{ $item->price }}</p>
                <div class="btns  d-flex justify-content-center w-100">
                    <button type="button" class="controlBtn minusBtn" onclick="minus({{ $item->id }})">-</button>
                    <input id="product{{ $item->id }}" type="number" value="1" onchange="checkQty(this)" class="w-75">
                    <button type="button" class="controlBtn plusBtn" onclick="plus({{ $item->id }})">+</button>
                </div>
                @if(Auth::check())
                <button type="button" class="btn btn-primary mt-3 " onclick="addCart({{ $item->id }})">加入購物車</button>
                @else
                <a href="{{route('login')}}"class="btn btn-primary mt-3 " >加入購物車</a>
                @endif
            </div>
          </div>
        </div>
      @endforeach
    </div>
    <input id="addCartRoute" type="hidden" value="{{ route('front.addCart') }}">
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
  }
  function plus(id) {
    const input = document.querySelector(`input#product${id}`);
    input.value++;
  }
  function checkQty(el) {
    if (el.value <= 0) {
      el.value = 1;
    }
  }

  function addCart(id) {
    const input = document.querySelector(`input#product${id}`);
    if (parseInt(input.value) <= 0) return;

    const formData = new FormData();
    formData.append('_token', '{{ csrf_token() }}');
    formData.append('qty', input.value);
    formData.append('product_id', id);

    fetch(addCartRoute, {
      method: 'POST',
      body: formData,
    }).then((res) => {
      return res.json();
    }).then((data) => {
      if (data.code == 1) {
        Swal.fire('成功加入商品');
      }
    });
  }
</script>

@endsection
