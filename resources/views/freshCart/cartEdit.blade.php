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
                <h2>編輯產品</h2>
              </div>
              <div class="col-3"><span>Dashboard</span></div>
              <div class="col-6"><span class="text-black-50">Categories</span></div>
            </div>

          </div>

        </div>
        <!-- 主欄第二排 -->

        <!-- 編輯產品 -->
        <div class="edit-product">
            <form action="{{route('namecartUpdate',['id'=>$product->id])}}" method="POST" enctype="multipart/form-data">
               @csrf
                <div class="container">
                    <div class="row d-flex flex-column">
                    <!--  產品名稱 -->
                    <div class="col">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">產品名稱</span>
                        <input type="text" class="form-control" placeholder="輸入產品名稱" aria-label="Username"
                        aria-describedby="basic-addon1" value="{{$product->name}}"required name="name" >
                    </div>
                    </div>
                    <!-- 產品圖片 -->
                    <div class="col">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">產品圖片</span>
                        <img src="{{asset($product->image)}}" style="width:70px; height:70px;">
                        <input type="file" class="form-control" placeholder="輸入產品圖片" aria-label="Username"
                        aria-describedby="basic-addon1" name="image[]" accept="image/*">
                    </div>
                    </div>
                    <!-- 產品價格 -->
                    <div class="col">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">產品價格</span>
                        <input type="number" class="form-control" placeholder="輸入產品價格" aria-label="Username"
                        aria-describedby="basic-addon1" value="{{$product->price}}" required name="price">
                    </div>
                    </div>
                    <!-- 顯示狀態 -->
                    <div class="col">
                    <div class="input-group mb-3 ">
                        <span class="input-group-text" id="basic-addon1">顯示狀態</span>
                        <div class="form-control d-flex">
                        <div class="form-check me-3">
                            <label class="form-check-label" for="flexRadioDefault1">
                            上架
                            <input class="form-check-input"
                                    type="radio"
                                    name="status"
                                    id="flexRadioDefault1"
                                    value="1"
                                    @if($product->status === 1)
                                    checked
                                    @endif>
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label" for="flexRadioDefault2">
                            不上架
                            <input class="form-check-input"
                                    type="radio"
                                    name="status"
                                    value="0"a
                                    id="flexRadioDefault2"
                                    @if($product->status === 0)
                                    checked
                                    @endif>>
                            </label>
                        </div>
                        </div>

                    </div>
                    </div>
                    <!-- 產品描述 -->
                    <div class="col">
                    <div class="input-group">
                        <span class="input-group-text">產品描述</span>
                        <textarea class="form-control" aria-label="With textarea"name="desc">
                        {{$product->desc}} </textarea>
                    </div>
                    </div>
                </div>

            </form>
          <div class="row mt-4 ">
            <div class="col d-flex justify-content-end">
              <!-- 取消編輯 -->
              <a href="{{route('namecartProductList')}}">
                  <button type="button" class="btn btn-outline-success me-3">取消編輯</button>
              </a>
              <!-- 儲存編輯 -->
              <a >
                  <button type="submit" class="btn btn-outline-success">儲存編輯</button>
              </a>
            </div>

          </div>
          </div>

        </div>
      </div>
    @endsection
