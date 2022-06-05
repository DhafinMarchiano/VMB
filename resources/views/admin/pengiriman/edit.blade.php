@extends('layouts.dashboard')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Pengiriman</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.pengiriman') }}">Pengiriman</a></li>
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
            <form action="{{route('admin.pengiriman.edit', $order->id)}}" style="max-width: 500px" method="POST">
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
                        <label for="customer_id">Pesanan Milik</label>
                        <select class="form-control" id="customer_id" name="customer_id">
                            <option selected disabled>Pilih Pemesan</option>
                            @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}" @if ($customer->id == $order->customer_id) selected @endif>{{ $customer->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="order_date">Tanggal</label>
                        <input type="date" class="form-control" id="order_date" name="order_date" value="{{ $order->order_date }}">
                    </div>
                    <div class="form-group">
                        <label for="start">Berangkat</label>
                        <select class="form-control" id="start" name="start">
                            <option selected disabled>Pilih Tempat</option>
                            <option value="Jakarta" @if ($order->start == 'Jakarta') selected @endif>Jakarta</option>
                            <option value="Bandung" @if ($order->start == 'Bandung') selected @endif>Bandung</option>
                            <option value="Surabaya" @if ($order->start == 'Surabaya') selected @endif>Surabaya</option>
                            <option value="Bali" @if ($order->start == 'Bali') selected @endif>Bali</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="end">Tujuan</label>
                        <select class="form-control" id="end" name="end">
                            <option selected disabled>Pilih Tempat</option>
                            <option value="Jakarta" @if ($order->end == 'Jakarta') selected @endif>Jakarta</option>
                            <option value="Bandung" @if ($order->end == 'Bandung') selected @endif>Bandung</option>
                            <option value="Surabaya" @if ($order->end == 'Surabaya') selected @endif>Surabaya</option>
                            <option value="Bali" @if ($order->end == 'Bali') selected @endif>Bali</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="total_weight">Total Berat (Kg)</label>
                        <input type="number" step="0.01" class="form-control" id="total_weight" name="total_weight" placeholder="Ex: 12.5" value="{{ $order->total_weight }}">
                    </div>
                    <div class="form-group">
                        <label for="total_price">Tarif (Rp.)</label>
                        <input type="number" class="form-control" id="total_price" name="total_price" placeholder="Ex: 2000000" value="{{ $order->total_price }}">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option selected disabled>Pilih Status</option>
                            <option value="pending" @if ($order->status == 'pending') selected @endif>Pending</option>
                            <option value="onProgress" @if ($order->status == 'onProgress') selected @endif>On Progress</option>
                            <option value="done" @if ($order->status == 'done') selected @endif>Done</option>
                        </select>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
