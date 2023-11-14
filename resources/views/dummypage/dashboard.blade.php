<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Halaman dashboard</h1>
    <div>
        <form action="/logout" method="post">
            @method('DELETE')
            @csrf
        <button type="submit">Logout</button>
        </form>
    </div>
</body>
</html>
