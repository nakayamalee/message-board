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
                <h2>新增產品</h2>
              </div>
              <div class="col-3"><span>Dashboard</span></div>
              <div class="col-6"><span class="text-black-50">Categories</span></div>
            </div>

          </div>

        </div>
        <!-- 主欄第二排 -->

        <!-- 新增產品 -->
        <div class="add-product">
            <form action="{{route('namecartStore')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="container">
                    <div class="row d-flex flex-column">
                    <!--  產品名稱 -->
                    <div class="col">`
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">產品名稱*</span>
                        <input type="text" name="name" class="form-control" placeholder="輸入產品名稱" aria-label="Username"
                        aria-describedby="basic-addon1" required>
                    </div>
                    </div>
                    <!-- 產品圖片 -->
                    <div class="col">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">產品圖片</span>
                        <input type="file" name="image" class="form-control" placeholder="輸入產品圖片" aria-label="Username"
                        aria-describedby="basic-addon1 "required  accept="image/*">
                    </div>
                    </div>
                    <!-- 產品價格 -->
                    <div class="col">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">產品價格</span>
                        <input type="number" name="price" class="form-control" placeholder="輸入產品價格" aria-label="Username"
                        aria-describedby="basic-addon1" required min=0>
                    </div>
                    </div>
                    <!-- 顯示狀態 -->
                    <div class="col">
                    <div class="input-group mb-3 ">
                        <span class="input-group-text" id="basic-addon1">顯示狀態</span>
                        <div class="form-control d-flex">
                        <div class="form-check me-3">
                            <input class="form-check-input" type="radio" name="status" id="flexRadioDefault1" value="1">
                            <label class="form-check-label" for="flexRadioDefault1">
                            上架
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="flexRadioDefault2" value="0" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                            不上架
                            </label>
                        </div>
                        </div>

                    </div>
                    </div>
                    <!-- 產品描述 -->
                    <div class="col">
                    <div class="input-group">
                        <span class="input-group-text">產品描述</span>
                        <textarea name="desc" class="form-control" aria-label="With textarea"></textarea>
                    </div>
                    </div>
                </div>
            </form>
          <div class="row mt-4 ">
            <div class="col d-flex justify-content-end">
              <!-- 取消新增 -->
              <a href={{route('namecartProductList')}}>
                  <button type="button" class="btn btn-outline-success me-3">取消新增</button>
              </a>
              <!-- 新增產品 -->
              <a href={{route('namecartProductList')}}>
                <button type="submit" class="btn btn-outline-success">新增產品</button>
              </a>
            </div>

          </div>
          </div>

        </div>
      </div>
      @endsection

