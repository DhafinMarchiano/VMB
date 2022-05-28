@extends('layouts.dashboard')

@section('content')
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Buat Pesanan Baru</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.pesanan') }}">Pesanan</a></li>
                        <li class="breadcrumb-item active mr-2">Create</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <form action="{{route('admin.pesanan.create')}}" method="post" style="max-width: 500px"  enctype="multipart/form-data">
                @csrf
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-body">

                    <div class="form-group">
                        <label>Nama</label>
                        <input class="form-control" type="text" name="name" id="name" placeholder="name">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" type="email" name="email" id="email" placeholder="email">
                    </div>
                    <div class="form-group">
                        <label>Perusahaan</label>
                        <input class="form-control" type="text" name="company" id="company" placeholder="company">
                    </div>
                    <div class="form-group">
                        <label>Telepon</label>
                        <input class="form-control" type="text" name="phone" id="phone" placeholder="phone">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" name="address" id="address" cols="30" rows="10" placeholder="address"></textarea>
                    </div>
                    <div class="form-group">
                        <label>File</label>
                        <input class="form-control" type="file" name="image" id="image">
                    </div>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection
