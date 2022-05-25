<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar User</title>
</head>
<body>
    <h1>Daftar User</h1>
    <a href="{{ route('admin.account.create') }}"> Buat Akun Baru</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="{{ route('admin.account.edit', $user->id) }}">Edit</a>
                    <a href="{{ route('admin.account.delete', $user->id) }}">Hapus</a>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>