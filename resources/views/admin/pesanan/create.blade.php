@extends('layouts.dashboard')

@section('content')
<div class="content-wrapper p-5">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h1>Tambah Pesanan</h1>
    <form action="{{route('admin.pesanan.create')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" id="name" placeholder="name"></br>
        <input type="email" name="email" id="email" placeholder="email"></br>
        <input type="text" name="company" id="company" placeholder="company"></br>
        <input type="text" name="phone" id="phone" placeholder="phone"></br>
        <textarea name="address" id="address" cols="30" rows="10" placeholder="address"></textarea></br>
        <input type="file" name="image" id="image"></br>
        <button type="submit">submit</button>
    </form>
</div>
@endsection
