@extends('layouts.dashboard')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Buat Pengiriman Baru</h1>
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
            <form action="{{route('admin.pengiriman.create')}}" method="POST">
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
                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="order_date">Tanggal</label>
                        <input type="date" class="form-control" id="order_date" name="order_date">
                    </div>
                    <div class="form-group">
                        <label for="start">Berangkat</label>
                        <select class="form-control" id="start" name="start">
                            <option selected disabled>Pilih Tempat</option>
                            <option value="Jakarta">Jakarta</option>
                            <option value="Bandung">Bandung</option>
                            <option value="Surabaya">Surabaya</option>
                            <option value="Bali">Bali</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="end">Tujuan</label>
                        <select class="form-control" id="end" name="end">
                            <option selected disabled>Pilih Tempat</option>
                            <option value="Jakarta">Jakarta</option>
                            <option value="Bandung">Bandung</option>
                            <option value="Surabaya">Surabaya</option>
                            <option value="Bali">Bali</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="total_weight">Total Berat (Kg)</label>
                        <input type="number" step="0.01" class="form-control" id="total_weight" name="total_weight" placeholder="Ex: 12.5">
                    </div>
                    <div class="form-group">
                        <label for="total_price">Tarif (Rp.)</label>
                        <input type="number" class="form-control" id="total_price" name="total_price" placeholder="Ex: 2000000">
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection