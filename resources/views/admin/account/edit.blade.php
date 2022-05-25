<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Account</title>
</head>
<body>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
    @endif
    <form action="{{route('admin.account.edit', $user->id)}}" method="post">
        @csrf
        <input type="text" name="name" id="name" placeholder="name" value="{{$user->name}}"></br>
        <input type="email" name="email" id="email" placeholder="email" value="{{$user->email}}"></br>
        <input type="password" name="password" id="password" placeholder="password"></br>
        <hr>
        <input type="password" name="new_password" id="new_password" placeholder="new password"></br>
        <input type="password" name="new_password_confirmation" id="new_password_confirmation" placeholder="new password confirmation"></br>
        <input type="submit" value="save">
    </form>
</body>
</html>