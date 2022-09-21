<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FeedBack</title>
</head>
<body>
    <div class="">
        <h3>Your User Name: {{ $comment['user_name'] }}</h3>
        <h3>Your User Password: {{ $comment['password'] }}</h3>
        <h3>Your Login: {{ $comment['link'] }}</h3>
    </div>
</body>
</html>