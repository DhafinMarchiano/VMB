@extends('layouts.dashboard')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Buat Akun</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.account') }}">Akun</a></li>
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
            <div class="card-body">
                <form action="{{route('admin.account.create')}}" style="max-width: 500px" method="post">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @csrf
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input class="form-control" type="text" name="name" id="name" placeholder="name">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input class="form-control" type="email" name="email" id="email" placeholder="email">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input class="form-control" type="password" name="password" id="password" placeholder="password">
                    </div>
                    <div class="form-group">
                        <label for="">Konfirmasi Password</label>
                        <input class="form-control" type="password" name="password_confirmation" id="password_confirmation"
                        placeholder="password confirmation">
                    </div>
                    <input class="btn btn-primary" type="submit" value="Create">
                </form>
            </div>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->
@endsection
