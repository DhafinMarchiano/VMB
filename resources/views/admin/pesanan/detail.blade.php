<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail {{$customer->name}}</title>
</head>
<body>
    <h1>Detail {{$customer->name}}</h1>
    <ul>
        <li><img src="{{$customer->image}}" width="200"></li>
        <li>Name: {{$customer->name}}</li>
        <li>Email: {{$customer->email}}</li>
        <li>Company: {{$customer->company}}</li>
        <li>Phone Number: {{$customer->phone}}</li>
        <li>Address: {{$customer->address}}</li>
    </ul>
    <hr>
    <h1>Daftar Pesanan</h1>
    <ol>
        @forelse ($customer->orders as $order)
        <li>
            <ul>
                <li>Tgl: {{$order->order_date}}</li>
                <li>Berangkat: {{$order->start}}</li>
                <li>Tujuan: {{$order->end}}</li>
                <li>Berat: {{$order->total_weight}} Kg</li>
                <li>Tarif: Rp {{number_format($order->total_price,0,',','.')}}</li>
                <li>
                    <a href="{{ route('admin.pengiriman.edit', $order->id) }}" class="btn btn-warning">Edit</a>
                    <a href="{{ route('admin.pengiriman.delete', $order->id) }}" class="btn btn-danger">Hapus</a>
                    </form>
                </li>
            </ul>
        </li></br>
        @empty
        <li>Tidak ada pesanan</li>
        @endforelse
    </ol>
</body>
</html>