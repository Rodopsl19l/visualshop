<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login | Visual Shop</title>

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
        <link rel="stylesheet" href="{{asset('css/login.css')}}">
    </head>

    <body>
        <div class="loginBox">
            <div class="loginLogo">
                <img src="{{asset('img/logo.png')}}">
            </div>

            <div class="textBox">
                <i class="fa fa-user" aria-hidden="true"></i>
                <input type="text" placeholder="Correo">
            </div>

            <div class="textBox">
                <i class="fa fa-lock" aria-hidden="true"></i>
                <input type="password" placeholder="Contraseña">
            </div>

            <a class="btnForgotPassword" href="/forgotPassword">Olvidé mi contraseña</a>

            <input class="btnLogin" type="button" value="Entrar">

            <a class="btnRegister" href="/register">¡Registrate ahora!</a>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="{{asset('js/login.js')}}"></script>
    </body>
</html>
