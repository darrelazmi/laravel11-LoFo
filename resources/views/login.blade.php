<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LoginPage</title>
    <link rel="stylesheet" href="{{ URL::asset('css/login.css') }}">
</head>
<body>
    <div class="container">
        <img class="background-image" src="{{ URL::asset('assets/bglogin2.png') }}" />
        <image class="title" src="{{ URL::asset('assets/logolofo.png') }}"></image>
        <form class="login-box" action="{{route('login.process')}}" method="post">
            @csrf
            @method('post')
            <input type="email" value{{Session::get('email')}} id="email-box" class="input-box" placeholder="Email" name="email">
            <input type="password" id="password-box" class="input-box" placeholder="Password" name="password">
            <button type="submit" class="login-button">Login</button>
        </form>
        <div class="register-section">
            <span class="register-text">Belum punya akun? </span>
            <a href="register">Daftar disini!</a>
        </div>
    </div>
</body>
</html>
