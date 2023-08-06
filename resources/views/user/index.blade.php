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
                        <h1 class="m-0">User</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">User</li>
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
                        <a href="/user/create" class="btn btn-success float-end"><i class="fa-solid fa-plus"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-header -->
        <section class="content">
            <div class="container-fluid">
                <div class="table-responsive-md">
                    <table class="table table-striped">
                        <thead>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </thead>
                        <tbody>
                            @if (count($users) > 0)
                                @php($no = 1)
                                @foreach ($users as $data)
                                    <tr>
                                        <td class="text-center">{{ $no }}</td>
                                        <td class="text-center">{{ $data->name }}</td>
                                        <td class="text-center">{{ $data->email }}</td>
                                        <td class="text-center">{{ $data->status }}</td>
                                        <td class="text-center">
                                            <button class="btn btn-warning">Edit</button>
                                        </td>
                                    </tr>
                                    @php($no++)
                                @endforeach
                            @else
                                <tr>

                                    <td colspan="5" class="text-center fw-bold">Data Not Found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center mt-4">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
