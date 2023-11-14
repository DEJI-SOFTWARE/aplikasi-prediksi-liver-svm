<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile User</title>
</head>
<body>
    <h1>Hello {{$user->name}}</h1>
    <p>Edit Profile</p>
    <div>
        <form action="/profile/{{$user->id}}" method="POST">
            @method('PUT')
            @csrf
            <div>
                <label for="">Nama</label>
                <input type="name" name="name" value="{{$user->name}}">
            </div>
            <div>
                <label for="">Email</label>
                <input type="email" name="email" value="{{$user->email}}">
            </div>
            <div>
                <button type="submit">Ubah</button>
            </div>
        </form>
    </div>
</body>
</html>
