@extends('layouts.dashboard')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Jadwal Pengiriman</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active mr-2">Pengiriman</li>
            <li>
              <a href="{{ route('admin.pengiriman.create') }}" class="btn btn-primary">Buat Pengiriman Baru</a>
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
              <th>Tgl</th>
              <th>Pemesan</th>
              <th>Berangkat</th>
              <th>Tujuan</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($orders as $order)
            <tr>
              <td>{{ $order->id }}</td>
              <td>{{ $order->order_date }}</td>
              <td>{{ $order->customer->name }}</td>
              <td>{{ $order->start }}</td>
              <td>{{ $order->end }}</td>
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
                <a href="{{ route('admin.pengiriman.delete', $order->id) }}" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                </form>
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

