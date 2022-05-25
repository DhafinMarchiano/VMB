<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Account</title>
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
    <form action="{{route('admin.account.create')}}" method="post">
        @csrf
        <input type="text" name="name" id="name" placeholder="name"></br>
        <input type="email" name="email" id="email" placeholder="email"></br>
        <input type="password" name="password" id="password" placeholder="password"></br>
        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="password confirmation"></br>
        <input type="submit" value="Create">
    </form>
</body>
</html>