<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="{{ url('/css/register.css') }}">
</head>
<body>
    <div class="container">
        <img class="background-image" src="{{url('assets/bglogin1.png')}}" />
        <image class="title" src="{{url('./assets/logolofo.png')}}"></image>
        <form class="login-box" action="{{route('register.process')}}" method="post">
            @csrf
            @method('post')
            <input type="text" id="nama" class="input-box" placeholder="Nama" name="name">
            <input type="text" id="nim" class="input-box" placeholder="NIM" name="nim">
            <input type="email" id="email-box" class="input-box" placeholder="Email" name="email">
            <input type="text" id="nomor" class="input-box" placeholder="Nomor Telepon" name="phone">
            <input type="password" id="password-box" class="input-box" placeholder="Password" name="password">
            <button type="submit" class="register-button">Register</button>
        </form>
    </div>
</body>
</html>
