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

    <h1>Edit Pesanan</h1>
    <form action="{{route('admin.pesanan.edit', $customer->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" id="name" placeholder="name" value="{{$customer->name}}"></br>
        <input type="email" name="email" id="email" placeholder="email" value="{{$customer->email}}"></br>
        <input type="text" name="company" id="company" placeholder="company" value="{{$customer->company}}"></br>
        <input type="text" name="phone" id="phone" placeholder="phone" value="{{$customer->phone}}"></br>
        <textarea name="address" id="address" cols="30" rows="10" placeholder="address">{{$customer->address}}</textarea></br>
        <img src="{{$customer->image}}" alt="" width="200">
        <input type="file" name="image" id="image"></br>
        <button type="submit">save</button>
    </form>
</div>
@endsection
