<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h2> Hey there <b><i>{{$user->name}}</i></b></h2>
<h4> We are thrilled for you to join our Team!!!</h4>
<p> Please verify your email with this link
        <button><a href="{{ env('APP_FRONT_URL', 'http://localhost:8080/verify?email=')."$user->email"."&token=$token"}}">Link</a>
    </button>
</p>

</body>
</html>
