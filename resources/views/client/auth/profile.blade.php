@extends('layouts.client')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <h1>Profil</h1>
          </div>
      </div>
    </section>
    {{-- Notif success --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    {{-- Notif error --}}
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section class="content">
        <div class="card">
          <div class="card-body">
            <form action="{{route('customer.profile.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <img src="{{$customer->image}}" alt="" width="200"></br>
                <label for="">Nama</label>
                <input class="form-control" type="text" name="name" id="name" placeholder="name" value="{{$customer->name}}"></br>
                <label for="">Email</label>
                <input class="form-control" type="email" name="email" id="email" placeholder="email" value="{{$customer->email}}"></br>
                <label for="">Perusahaan</label>
                <input class="form-control" type="text" name="company" id="company" placeholder="company" value="{{$customer->company}}"></br>
                <label for="">Telepon</label>
                <input class="form-control" type="text" name="phone" id="phone" placeholder="phone" value="{{$customer->phone}}"></br>
                <label for="">Alamat</label>
                <textarea class="form-control" name="address" id="address" cols="30" rows="10" placeholder="address">{{$customer->address}}</textarea></br>
                <label for="">Foto</label>
                <input class="form-control" type="file" name="image" id="image"></br></br>
                <button class="btn btn-primary" type="submit">Simpan</button>
            </form>
          </div>
        </div>
    </section>

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <h2>Ganti Kata Sandi</h2>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
          <div class="card-body">
            <form action="{{route('customer.password.update')}}" method="POST">
                @csrf
                <label for="">Kata Sandi Lama</label>
                <input class="form-control" type="password" name="old_password" id="old_password" placeholder="old password"></br>
                <label for="">Kata Sandi Baru</label>
                <input class="form-control" type="password" name="new_password" id="new_password" placeholder="new password"></br>
                <label for="">Konfirmasi Kata Sandi</label>
                <input class="form-control" type="password" name="new_password_confirmation" id="new_password_confirmation" placeholder="confirm password"></br>
                <button class="btn btn-primary" type="submit">Ganti kata sandi</button>
            </form>
          </div>
        </div>
    </section>
</div>
@endsection
