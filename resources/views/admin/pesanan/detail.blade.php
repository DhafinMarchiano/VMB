@extends('layouts.dashboard')

@section('content')
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Pesanan {{$customer->name}}</h1>
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


    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card p-4">
            <h3>Informasi Pemesan</h3>
            <div class="p-0">
                <img src="{{$customer->image}}" width="200">
                <p class="mb-1"><strong>Name:</strong> {{$customer->name}}</p>
                <p class="mb-1"><strong>Email:</strong> {{$customer->email}}</p>
                <p class="mb-1"><strong>Company:</strong> {{$customer->company}}</p>
                <p class="mb-1"><strong>Phone Number:</strong> {{$customer->phone}}</p>
                <p class="mb-1"><strong>Address:</strong> {{$customer->address}}</p>
            </div>
            <hr>
            <h3>Daftar Pesanan</h3>
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>Tgl</th>
                        <th>Berangkat</th>
                        <th>Tujuan</th>
                        <th>Berat</th>
                        <th>Tarif</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($customer->orders as $order)
                    <tr>
                        <td>{{$order->order_date}}</td>
                        <td>{{$order->start}}</td>
                        <td>{{$order->end}}</td>
                        <td>{{$order->total_weight}} Kg</td>
                        <td>Rp {{number_format($order->total_price,0,',','.')}}</td>
                        <td>
                            @if ($order->status == 'pending')
                                <span class="badge badge-warning">Pending</span>
                            @elseif ($order->status == 'onProgress')
                                <span class="badge badge-info">On Progress</span>
                            @elseif ($order->status == 'done')
                                <span class="badge badge-success">Done</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.pengiriman.edit', $order->id) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ route('admin.pengiriman.delete', $order->id) }}" class="btn btn-danger">Hapus</a>
                            </form>
                        </li>
                    </tr>
                    @empty
                    <tr>Tidak ada pesanan</tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </section>
</div>
@endsection
