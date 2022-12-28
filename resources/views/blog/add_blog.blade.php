<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="post" action="">
        @csrf
        Title: <input type="text" name="name">
        image: <input type="text" name="email">

        content: <textarea name="comment" rows="5" cols="40"></textarea>
        <button type="submit">Submit</button>
    </form>
</body>
</html>