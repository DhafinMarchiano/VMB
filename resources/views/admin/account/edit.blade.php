@extends('layouts.dashboard')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Akun</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.account') }}">Akun</a></li>
                        <li class="breadcrumb-item active mr-2">Edit</li>
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
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if (Session::has('error'))
                <div class="alert alert-danger">
                    {{ Session::get('error') }}
                </div>
                @endif
                <form action="{{route('admin.account.edit', $user->id)}}" style="max-width: 500px" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input class="form-control" type="text" name="name" id="name" placeholder="name" value="{{$user->name}}">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input class="form-control" type="email" name="email" id="email" placeholder="email" value="{{$user->email}}">
                    </div>
                    <div class="form-group">
                        <label for="">Password Lama</label>
                        <input class="form-control" type="password" name="password" id="password" placeholder="password">
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="">Password Baru</label>
                        <input class="form-control" type="password" name="new_password" id="new_password" placeholder="new password">
                    </div>
                    <div class="form-group">
                        <label for="">Konfirmasi Password Baru</label>
                        <input class="form-control" type="password" name="new_password_confirmation" id="new_password_confirmation"
                        placeholder="new password confirmation">
                    </div>
                    <input class="btn btn-primary" type="submit" value="save">
                </form>
            </div>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->
@endsection
