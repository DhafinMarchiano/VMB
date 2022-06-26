@extends('layouts.dashboard')

@section('content')
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Pesanan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.pesanan') }}">Pesanan</a></li>
                        <li class="breadcrumb-item active mr-2">Edit</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <form style="max-width: 500px" action="{{route('admin.pesanan.edit', $customer->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <img class="img-fluid mb-3" src="{{$customer->image}}" alt="" width="200">
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input class="form-control" type="text" name="name" id="name" placeholder="name" value="{{$customer->name}}">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input class="form-control" type="email" name="email" id="email" placeholder="email" value="{{$customer->email}}">
                    </div>
                    <div class="form-group">
                        <label for="">Perusahaan</label>
                        <input class="form-control" type="text" name="company" id="company" placeholder="company" value="{{$customer->company}}">
                    </div>
                    <div class="form-group">
                        <label for="">Telepon</label>
                        <input class="form-control" type="text" name="phone" id="phone" placeholder="phone" value="{{$customer->phone}}">
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <textarea class="form-control" name="address" id="address" cols="30" rows="10" placeholder="address">{{$customer->address}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Foto</label>
                        <input class="form-control" type="file" name="image" id="image">
                    </div>
                    <button class="btn btn-primary" type="submit">save</button>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection
