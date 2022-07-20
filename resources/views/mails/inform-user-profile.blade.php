<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/site/css/stylecss.css">
    <title>Document</title>
</head>
<body>
    @if(!@empty($user))
        <h1>Hi, Nguyễn Văn A</h1>
        <p class="emailsend">This email send from system</p>
        <p class="info">Please check your infomation. Is it correctly</p>
        <div>
            <hr>
            <span>
              <strong style="display: inline-block; width: 48%;"> Name </strong>
              <em style="display: inline-block; width: 48%; text-align: right;"> {{ $user['name'] }} </em>
            </span>
            <hr>
            <span>
              <strong style="display: inline-block; width: 48%;"> Email </strong>
              <em style="display: inline-block; width: 48%; text-align: right;"> {{ $user['email'] }} </em>
            </span>
            <hr>
            <span>
              <strong style="display: inline-block; width: 48%;"> Phone </strong>
              <em style="display: inline-block; width: 48%; text-align: right;"> 0123456789 </em>
            </span>
            <hr>
            <span>
              <strong style="display: inline-block; width: 48%;"> Address </strong>
              <em style="display: inline-block; width: 48%; text-align: right;"> Hanoi </em>
            </span>
            <hr>
          </div>
          <div>
            <p style="text-align: center;"> <a href="{{ route('admin.user.index') }}" style="text-decoration: none; border: 1px solid blue; background: blue; color: white; padding: 10px;"> User Profile </a> </p>
          </div>
    @endif
</body>
</html>
