<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Order {{Auth::guard('customer')->user()->name}}</title>
</head>
<body>
    <a href="{{route('customer.profile')}}">Profil</a>
    <a href="{{route('customer.logout')}}">Logout</a>
    <h1>Daftar Order {{Auth::guard('customer')->user()->name}}</h1>
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
</body>
</html>