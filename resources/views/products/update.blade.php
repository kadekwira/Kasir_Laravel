@extends('layout.template')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
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
              <form class="row g-3" method="post" action="{{ route('products.update', $product->id ) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="foto_old"
                value="{{$product->foto}}"
                >
                <div class="col-md-6">
                  <label for="nama_product" class="form-label">Nama Product</label>
                  <input type="text" class="form-control" id="nama_product" name="nama_product" 
                  value="{{$product->nama_product}}">
                </div>
                <div class="col-md-6">
                  <label for="varian" class="form-label">Varian</label>
                  <input type="text" class="form-control" id="varian" name="varian" 
                  value="{{$product->varian}}">
                </div>
                <div class="col-12">
                  <label for="harga_pokok" class="form-label">Harga Pokok</label>
                  <input type="text" class="form-control" id="harga_pokok" name="harga_pokok" value="@currency($product->harga_pokok)">
                </div>
                <div class="col-12">
                  <label for="harga_jual" class="form-label">Harga Jual</label>
                  <input type="text" class="form-control" id="harga_jual" name="harga_jual" value="@currency($product->harga_jual)">
                </div>
                <div class="col-md-6">
                  <label for="stock" class="form-label">stock</label>
                  <input type="text" class="form-control" id="stock" name="stock" value="{{$product->stock}}">
                </div>
                <div class="col-md-6">
                  <label for="status" class="form-label">status</label>
                  <select id="status" class="form-select" name="status">
                    @if($product->status == 'aktif')
                    <option value="aktif" selected>aktif</option>
                    <option value="tidak aktif">tidak aktif</option>
                    @else
                    <option value="aktif" >aktif</option>
                    <option value="tidak aktif" selected>tidak aktif</option>
                    @endif
                  </select>
                </div>
                <div class="col-12">
                  <label for="foto" class="form-label">foto</label>
                  <input class="form-control" type="file" id="foto" name="foto">
                </div>
                <div class="col-12">
                  <button type="submit" class="btn btn-success">Update Product</button>
                </div>
              </form>
            </div>
        </section>
    </div>
@endsection
@section('rupiah')
<script src="{{ url('template') }}/dist/js/currency.js"></script>
@endsection