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
                        <h2>Type list</h2>
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
                <div class="col-12 col-md-6  align-items-center d-flex">
                    <form class="d-flex w-75" role="search">
                        <input class="form-control  form-control-2 text-black-50" type="search"
                            placeholder="Search Category" aria-label="Search">
                    </form>
                    <a href="{{ route('type.create') }}">
                        <button type="button" class="btn ms-md-2 btn-success  btn-success-self-2">新增類別</button>
                    </a>
                </div>
                <div class="col-12 offset-md-4 col-md-2 mt-2 mt-md-0">
                    <div class="dropdown ">
                        <a class="btn btn-secondary w-100  py-1 dropdown-self dropdown-toggle text-black " href="#"
                            role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            Status
                        </a>

                        <ul class="dropdown-menu rounded-4 dropdown-menu-self py-0 w-100"
                            aria-labelledby="dropdownMenuLink">
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
                    <div class="col-1 d-flex justify-content-center align-items-center"><input type="checkbox"
                            class="input-size input-1"></input></div>
                    <div class="col-1 d-flex justify-content-start align-items-center">Image</div>
                    <div class="col-2 d-flex justify-content-start align-items-center">OrderName</div>
                    <div class="col-2 d-flex justify-content-start align-items-center">Customer</div>
                    <div class="col-2 d-flex justify-content-start align-items-center">Date & TIme</div>
                    <div class="col-1 d-flex justify-content-center align-items-center">Status</div>
                    <div class="col-1 d-flex justify-content-center align-items-center">Amount</div>
                    <div class="col-2 d-flex justify-content-center align-items-center">Function</div>

                </div>
                <!-- 第二行 -->
                @foreach ($types as $type)
                    <div class="row w-100   m-0 text-secondary fs-14-self py-2" id="dataCol{{ $type->id }}">
                        <div class="col-1 d-flex justify-content-center align-items-center"><input type="checkbox"
                                class="input-size"></input></div>
                        @foreach ($type->productTypeImg ?? [] as $img)
                            <div class="col-1 d-flex justify-content-start align-items-center"><img
                                    src={{ asset($img->image) }} class="img-size"></div>
                        @endforeach
                        <div class="col-2 d-flex justify-content-start align-items-center">{{ $type->name }}</div>
                        <div class="col-2 d-flex justify-content-start align-items-center">{{ $type->desc }}</div>
                        <div class="col-2 d-flex justify-content-start align-items-center">
                            {{ $type->created_at->format('Y-m-d') }}</div>
                        <div class="col-2 d-flex justify-content-center align-items-center flex-wrap nonosubmit">
                            <a href="{{ route('type.edit', ['type' => $type->id]) }}">
                                <button type="submit" class="btn mb-2 btn-success  btn-success-self">Edit</button>
                            </a>
                            {{-- <form class="deleteBtn" action="{{ route('type.destroy', ['type' => $type->id]) }}"
                                method="POST" data-name="{{ $type->name }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn  btn-success  btn-success-self">Delete</button>
                            </form> --}}
                            <button type="button" class="btn  btn-success  btn-success-self"
                                onclick="deleteData({{ $type->id }})">Delete</button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="row no-hover py-4 px-3 align-items-center">
            <div class="col-6 col-md-6 fs-14-self text-secondary">Showing 1 to 8 of 12 entries</div>
            <div class="col-6 offset-md-2 col-md-4">
                <div aria-label="Page navigation example">
                    <ul class="pagination  px-0 m-0 ">
                        <li class="page-item "><a class="page-link py-2 rounded-2 text-secondary"
                                href="#">Previous</a></li>
                        <li class="page-item "><a class="page-link py-2 ms-1 rounded-2 text-secondary " href="#">1</a>
                        </li>
                        <li class="page-item"><a class="page-link py-2 ms-1 rounded-2 text-secondary" href="#">2</a>
                        </li>
                        <li class="page-item"><a class="page-link py-2 ms-1 rounded-2 text-secondary" href="#">3</a>
                        </li>
                        <li class="page-item"><a class="page-link py-2 ms-1 rounded-2 text-secondary"
                                href="#">Next</a></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // function deleteType(event){
        //     event.
        //     // console.log(id);
        //     // const formData = new FormData();
        //     // formData.append('_token',{{ csrf_token() }});
        //     // fetch(`/type/${id}`,{
        //     //     method:;

        //     // })

        // }

        const forms = document.querySelectorAll('form.deleteBtn')
        console.log(123);
        console.log(forms);
        // 寫法一:
        // forms.forEach(element =>{
        //     element.addEventListener('submit', (event)=>{
        //         event.preventDefault();
        //         console.log(123);
        //         Swal.fire({
        //         title: `確認要刪除${element.dataset.name}嗎?`,
        //         showDenyButton: true,
        //         confirmButtonText: '取消',
        //         denyButtonText: `刪除`,
        //         }).then((result) => {
        //         /* Read more about isConfirmed, isDenied below */
        //         if (result.isConfirmed) {
        //         } else if (result.isDenied) {
        //         element.submit();
        //         }
        //     })

        //     })
        // });
        // 寫法二(寫法三更完整):
        // function deleteData(id){
        //     console.log(id);
        //     const formData = new FormData();
        //     formData.append('_token','{{ csrf_token() }}');
        //     formData.append('_method','delete');
        //    fetch(`/type/${id}`,{
        //     method:'post',
        //     body:formData,
        //    }).then((res)=>{
        //         return res.text();
        //    }).then((data)=>{
        //         // return data.data();
        //         if(data=='success'){
        //             const tr = document.querySelector(`#dataCol${id}`);
        //             tr.remove();

        //         }
        //    });


        // }

        // 寫法三:
        function deleteData(id, name) {
            console.log(id);
            const formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');3
            formData.append('_method', 'delete');
            Swal.fire({
                title: `確認要刪除${name}嗎?`,
                showDenyButton: true,
                confirmButtonText: '刪除',
                denyButtonText: `取消`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    fetch(`/type/${id}`, {
                        method: 'post',
                        body: formData,
                    }).then((res) => {
                        return res.text();
                    }).then((data) => {
                        // return data.data();
                        if (data == 'success') {
                            Swal.fire({
                                icon: 'error',
                                title: '刪除成功',
                                text: 'Something went wrong!',
                            });
                            const tr = document.querySelector(`#dataCol${id}`);
                            tr.remove();
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: '刪除失敗',
                                text: '查無資料',
                            });
                        }
                    });
                } else {

                }
            })



        }
    </script>
@endsection
