    @extends('templates.template')
    @section('css')
    @endsection
    @section('main')

      <!-- 右邊主欄 -->
      <div class="right row w-100  m-0 px-0 pt-3 justify-content-center align-content-start">


        <!-- 主欄最上面 -->
        <div class="two-up row my-5 m-0 p-0 ">
          <div class="col-12 offset-md-1 col-md-5   ">
            <div class="row">
              <div class="col-12">
                <h2>Product list</h2>
              </div>
              <div class="col-3"><span>Dashboard</span></div>
              <div class="col-6"><span class="text-black-50">Categories</span></div>
            </div>

          </div>
        </div>
        <!-- 主欄第二排 -->

        <!-- 購物清單 -->
        <div class="list-big">
          <div class="two-down row mb-2 m-0 py-5 px-4">
            <div class="col-12 col-md-12 align-items-center d-flex">
              <form action="{{route('namecartProductList')}}" class="d-flex w-75" role="search"  method="GET">
                <input name="name" class="form-control  form-control-2 text-black-50" type="search" placeholder="搜尋名稱或描述"
                  aria-label="Search" value="{{$name}}">
                <button type="submit" class="btn ms-md-2 btn-success btn-success-self-2" style="width:100px;">搜尋</button>
                <a href="{{route('nameCartAdd')}}">
                    <button type="button" class="btn ms-md-2 btn-success  btn-success-self-2">Add New Category</button>
                </a>
            </form>

              {{-- --------------hihi------- --}}



            </div>
            <div class="col-12 offset-md-4 col-md-2 mt-2 mt-md-0">
              <div class="dropdown ">
                <a class="btn btn-secondary w-100  py-1 dropdown-self dropdown-toggle text-black " href="#" role="button"
                  id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                  Status
                </a>

                <ul class="dropdown-menu rounded-4 dropdown-menu-self py-0 w-100" aria-labelledby="dropdownMenuLink">
                  <li><a class="dropdown-item rounded-top-4 py-0 " href="#">Status</a></li>
                  <li><a class="dropdown-item py-0" href="#">Published</a></li>
                  <li><a class="dropdown-item rounded-bottom-4 py-0" href="#">Unpublished</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="list  mb-self">
            <!-- 第一行 -->
            <div class="row w-100  m-0 text-secondary fs-14-self py-2 bg-line">
              <div class="col-1 d-flex justify-content-center align-items-center"><input type="checkbox" class="input-size input-1"></input></div>
              <div class="col-1 d-flex justify-content-start align-items-center">Image</div>
              <div class="col-2 d-flex justify-content-start align-items-center">OrderName</div>
              <div class="col-2 d-flex justify-content-start align-items-center">Customer</div>
              <div class="col-2 d-flex justify-content-start align-items-center">Date & TIme</div>
              <div class="col-1 d-flex justify-content-center align-items-center">Status</div>
              <div class="col-1 d-flex justify-content-center align-items-center">Amount</div>
              <div class="col-2 d-flex justify-content-center align-items-center">Function</div>

            </div>
            {{-- @dd($items) --}}
            {{-- @foreach($items as $item)
            <div class="row w-100   m-0 text-secondary fs-14-self py-2">
              <div class="col-1 d-flex justify-content-center align-items-center"><input type="checkbox" class="input-size"></input></div>
              <div class="col-1 d-flex justify-content-start align-items-center"><img src={{asset($item->image)}} class="img-size"></div>
              <div class="col-2 d-flex justify-content-start align-items-center">{{$item->name}}</div>
              <div class="col-2 d-flex justify-content-start align-items-center">{{$item->desc}}</div>
              <div class="col-2 d-flex justify-content-start align-items-center">{{$item->created_at->format('Y-m-d')}}</div>
              @if($item->status == 1)
              <div class="col-1 d-flex justify-content-center align-items-center"><span class="px-1 bg-green rounded">顯示</span></div>
              @else
              <div class="col-1 d-flex justify-content-center align-items-center"><span class="px-1 bg-pink rounded">不顯示</span></div>
              @endif
              <div class="col-1 d-flex justify-content-center align-items-center">${{$item->price}}</div>
              <div class="col-2 d-flex justify-content-center align-items-center flex-wrap">
                <a href="{{route('nameCartEdit',['id' => $item->id])}}">
                    <button type="submit" class="btn mb-2 btn-success  btn-success-self">Edit</button>
                </a>
                <form action="{{route('nameCartDelete',['id' => $item->id])}}" method="post">
                    @csrf
                    <button type="submit" class="btn  btn-success  btn-success-self">Delete</button>
                </form>
            </div>
            </div>
            @endforeach --}}
            <!-- 第二行 -->
            {{-- @dd($products)aaa --}}
            @foreach($products as $product)
            <div class="row w-100   m-0 text-secondary fs-14-self py-2">
              <div class="col-1 d-flex justify-content-center align-items-center"><input type="checkbox" class="input-size"></div>
              <div class="col-1 d-flex justify-content-start align-items-center"><img src={{asset($product->image)}} class="img-size"></div>
              <div class="col-2 d-flex justify-content-start align-items-center">{{$product->name}}</div>
              <div class="col-2 d-flex justify-content-start align-items-center">{{$product->desc}}</div>
              <div class="col-2 d-flex justify-content-start align-items-center">{{$product->created_at->format('Y-m-d')}}</div>
              @if($product->status == 1)
              <div class="col-1 d-flex justify-content-center align-items-center"><span class="px-1 bg-green rounded">顯示</span></div>
              @else
              <div class="col-1 d-flex justify-content-center align-items-center"><span class="px-1 bg-pink rounded">不顯示</span></div>
              @endif
              <div class="col-1 d-flex justify-content-center align-items-center">${{$product->price}}</div>
              <div class="col-2 d-flex justify-content-center align-items-center flex-wrap">
                <a href="{{route('nameCartEdit',['id' => $product->id])}}">
                    <button type="submit" class="btn mb-2 btn-success  btn-success-self">Edit</button>
                </a>
                <form action="{{route('nameCartDelete',['id' => $product->id])}}" method="post">
                    @csrf
                    <button type="submit" class="btn  btn-success  btn-success-self">Delete</button>
                </form>
            </div>
            </div>
            @endforeach
          </div>
        </div>
        {{$products->links()}}
        {{-- <div class="row no-hover py-4 px-3 align-items-center">
          <div class="col-6 col-md-6 fs-14-self text-secondary">Showing 1 to 8 of 12 entries</div>
          <div class="col-6 offset-md-2 col-md-4">
            <div aria-label="Page navigation example">
              <ul class="pagination  px-0 m-0 ">
                <li class="page-item "><a class="page-link py-2 rounded-2 text-secondary" href="#">Previous</a></li>
                <li class="page-item "><a class="page-link py-2 ms-1 rounded-2 text-secondary " href="#">1</a></li>
                <li class="page-item"><a class="page-link py-2 ms-1 rounded-2 text-secondary" href="#">2</a></li>
                <li class="page-item"><a class="page-link py-2 ms-1 rounded-2 text-secondary" href="#">3</a></li>
                <li class="page-item"><a class="page-link py-2 ms-1 rounded-2 text-secondary" href="#">Next</a></li>
              </ul>
            </div>
          </div>
        </div> --}}

      </div>
    @endsection

