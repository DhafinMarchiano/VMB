@extends('layouts.dashboard')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Daftar Pesanan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active mr-2">Pesanan</li>
            <li>
              <a href="{{ route('admin.pesanan.create') }}" class="btn btn-primary">Buat Pesanan Baru</a>
            </li>
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
        <table class="table table-hover text-nowrap">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nama Pemesan</th>
              <th>Perusahaan</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($customers as $customer)
            <tr>
              <td>{{ $customer->id }}</td>
              <td>{{ $customer->name }}</td>
              <td>{{ $customer->company }}</td>
              <td>
                <a href="{{ route('admin.pesanan.detail', $customer->id) }}" class="btn btn-info">Detail</a>
                <a href="{{ route('admin.pesanan.edit', $customer->id) }}" class="btn btn-warning">Edit</a>
                <a href="{{ route('admin.pesanan.delete', $customer->id) }}" class="btn btn-danger">Hapus</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->    
@endsection
