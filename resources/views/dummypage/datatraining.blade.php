<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload data</title>
</head>
<body>
    upload data training
    <div>
        <form action="/data/training" method="POST" enctype="multipart/form-data">
            @csrf
        <label for="">Upload excel</label>
        <input type="file" name="file" id="file">

        <button type="submit">Upload</button>
        </form>
    </div>
</body>
</html>
