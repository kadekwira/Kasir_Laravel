@extends('layout.template')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
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
            <div class="d-flex flex-column">
              @if(count($errors)>0)
                @foreach($errors->all() as $error)
                  <p class="alert alert-danger">{{$error}}</p>
                @endforeach
              @endif
            </div>
          </div>
        </div>
        <!-- /.content-header -->
        <section class="content">
            <div class="container-fluid">
              <form class="row g-3" method="post" action="/user" >
                @csrf
                <div class="col-md-6">
                  <label for="name" class="form-label">Nama</label>
                  <input type="text" class="form-control" id="name" name="name" 
                  value="{{old('name')}}">
                </div>
                <div class="col-md-6">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
                </div>
                <div class="col-md-6">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}">
                </div>
                <div class="col-md-6">
                  <label for="status" class="form-label">Status</label>
                  <select id="status" class="form-select" name="status">
                    <option value="aktif" selected>aktif</option>
                    <option value="tidak aktif">tidak aktif</option>
                  </select>
                </div>
                <div class="col-12">
                  <button type="submit" class="btn btn-success">Tambah User</button>
                </div>
              </form>
            </div>
        </section>
    </div>
@endsection
