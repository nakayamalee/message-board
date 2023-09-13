    @extends('templates.template')
    @section('css')
    @endsection
    @section('main')
         <!-- 主欄最上面 -->
         <div class="two-up row my-5 m-0 p-0 ">
            <div class="col-12 offset-md-1 col-md-5   ">
              <div class="row">
                <div class="col-12">
                  <h2>編輯類別</h2>
                </div>
                <div class="col-3"><span>Dashboard</span></div>
                <div class="col-6"><span class="text-black-50">Categories</span></div>
              </div>

            </div>

          </div>
          <!-- 主欄第二排 -->

        <!-- 主欄第二排 -->

        <!-- 類別產品 -->
        <div class="add-product">
            <form action="{{route('type.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="container">
                    <div class="row d-flex flex-column">
                    <!--  類別名稱 -->
                    <div class="col">`
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">類別名稱*</span>
                        <input type="text" name="name" class="form-control" placeholder="輸入類別名稱" aria-label="Username"
                        aria-describedby="basic-addon1" required>
                    </div>
                    </div>
                    <!-- 類別圖片 -->
                    <div class="col">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">類別圖片</span>
                        <input type="file" name="image[]" class="form-control" placeholder="輸入產品圖片" aria-label="Username"
                        aria-describedby="basic-addon1 "required multiple accept="image/*">
                    </div>
                    </div>


                    <!-- 類別描述 -->
                    <div class="col">
                    <div class="input-group">
                        <span class="input-group-text">類別描述</span>
                        <textarea name="desc" class="form-control" aria-label="With textarea"></textarea>
                    </div>
                    </div>
                </div>
            </form>
          <div class="row mt-4 ">
            <div class="col d-flex justify-content-end">
              <!-- 取消新增 -->
              <a href={{route('type.index')}}>
                  <button type="button" class="btn btn-outline-success me-3">取消類別
                  </button>
              </a>
              <!-- 新增產品 -->
              <a href={{route('type.store')}}>
                <button type="submit" class="btn btn-outline-success">新增類別</button>
              </a>
            </div>

          </div>
          </div>

        </div>
    @endsection



