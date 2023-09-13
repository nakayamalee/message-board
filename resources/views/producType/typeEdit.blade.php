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
            <form action="{{route('type.update',['type'=>$type->id])}}" method="POST" enctype="multipart/form-data">
               @csrf
                @method('PUT')
               <div class="container">
                    <div class="row d-flex flex-column">
                    <!--  類別名稱 -->
                    <div class="col">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">類別名稱</span>
                        <input type="text" class="form-control" placeholder="輸入產品名稱" aria-label="Username"
                        aria-describedby="basic-addon1" value="{{$type->name}}"required name="name" >
                    </div>
                    </div>
                    {{-- @dd($type->productTypeImg); --}}
                    <!-- 類別圖片 -->
                    <div class="col">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">類別圖片</span>
                        @foreach($type->productTypeImg ?? [] as $item)
                        <img src="{{asset($item->image)}}" style="width:70px; height:70px;">
                        @endforeach
                        <input type="file" class="form-control" placeholder="輸入產品圖片" aria-label="Username"
                        aria-describedby="basic-addon1" name="image[]" accept="image/*" multiple>
                    </div>
                    </div>

                    <!-- 類別描述 -->
                    <div class="col">
                    <div class="input-group">
                        <span class="input-group-text">類別描述</span>
                        <textarea class="form-control" aria-label="With textarea"name="desc">
                        {{$type->desc}} </textarea>
                    </div>
                    </div>
                </div>

            </form>
          <div class="row mt-4 ">
            <div class="col d-flex justify-content-end">
              <!-- 取消編輯 -->
              <a href="{{route('type.index')}}">
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










