@extends('layouts.client')

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <h1>Daftar Order</h1>
        </div>
    </div>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-body">
        <table class="table table-hover text-nowrap">
        <thead>
          <tr>
            <th>No</th>
            <th>Tgl Pengiriman</th>
            <th>Pemesan</th>
            <th>Berangkat</th>
            <th>Tujuan</th>
            <th>Status</th>
            <th>Tarif</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($orders as $order)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ \Carbon\Carbon::parse($order->order_date)->format('l, d F Y') }}</td>
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
                Rp {{number_format($order->total_price,0,',','.')}}
            </td>
          </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">Tidak ada data</td>
            </tr>
          @endforelse
        </tbody>
      </table>
      </div>
    </div>
</div>
@endsection
