<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 9</title>
</head>

<body>
    <form method="POST" action="/store">
        @csrf
        <input type="text" name="topic" />
        <br /><br />
        <input type="text" name="detail" />
        <hr />
        <button type="submit">บันทึกข้อมูล</button>
    </form>
</body>

</html>
