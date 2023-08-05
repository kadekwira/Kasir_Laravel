@extends('layout.template')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('sweetalert::alert')

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Products</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Products</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row g-3">
                    <div class="col-lg-10 col-12">
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                                name="search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                    <div class="col-lg-2 col-12">
                        <a href="/products/create" class="btn btn-success float-end"><i class="fa-solid fa-plus"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-header -->
        <section class="content">
            <div class="container-fluid">
                <div class="d-flex justify-content-center flex-wrap gap-4">
                    @foreach ($products as $data)
                        <div class="card" style="width: 18rem;">
                            <img src="{{ asset('storage') }}/{{ $data->foto }} " class="card-img-top" alt="..."
                                height="200px">
                            <div class="card-body">
                                <h5 class="card-title fw-semibold mb-2">{{ $data->nama_product }} - {{ $data->varian }}</h5>
                                <p class="card-text mb-0">Stock : <span class="fw-semibold">{{ $data->stock }}</span></p>
                                <p class="card-text mb-0">Harga Pokok : <span class="fw-semibold">@currency($data->harga_pokok)</span>
                                </p>
                                <p class="card-text">Harga Jual : <span class="fw-semibold">@currency($data->harga_jual)</span></p>
                                <d-flex class="gap-2">
                                    <a href="/products/{{ $data->id }}/edit" class="btn btn-warning"><i
                                            class="fa-solid fa-pen-to-square"></i></a>

                                    <button class="btn btn-danger" onclick="deleteData({{ $data->id }})"
                                        data-route="{{ route('products.destroy', $data->id) }}"
                                        id="btn-delete">Delete</button>

                                </d-flex>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-center mt-4">
                    {{ $products->links() }}
                </div>
            </div>
        </section>
    </div>
@endsection

@section('swal')
    <script>
        function deleteData(id) {
            const route = $('#btn-delete').data('route');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        type: 'POST',
                        url: route,
                        data: {
                            _token: CSRF_TOKEN,
                            _method: 'DELETE',
                            id: id
                        },
                        dataType: 'JSON',
                        success: function(response) {
                            if (response.status == "Success") {
                                Swal.fire(
                                    'Deleted!',
                                    response.messages,
                                    'success'
                                )
                                window.location.reload();
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: response.messages,
                                })
                                window.location.reload();
                            }
                        }
                    })

                }
            })
        }
    </script>
@endsection
