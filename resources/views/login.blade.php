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

            <div id="requiredField" class="requiredField">
                <h2>Este campo es requerido</h2>
            </div>

            <div id="emailNotFound" class="emailNotFound">
                <h2>No se encontró una cuenta con este correo</h2>
            </div>

            <div id="incorrectPassword" class="incorrectPassword">
                <h2>Contraseña incorrecta</h2>
            </div>

            <div id="loginError" class="loginError">
                <h2>Ocurrió un error, intenta de nuevo</h2>
            </div>

            <div class="textBox">
                <i class="fa fa-user" aria-hidden="true"></i>
                <input id="email" type="text" placeholder="Correo">
            </div>

            <div class="textBox">
                <i class="fa fa-lock" aria-hidden="true"></i>
                <input id="password" type="password" placeholder="Contraseña">
            </div>

            <a class="btnForgotPassword" href="/forgotPassword">Olvidé mi contraseña</a>

            <input id="btnLogin" class="btnLogin" type="button" value="Entrar">

            <a class="btnRegister" href="/register">¡Registrate ahora!</a>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="{{asset('js/redirect.js')}}"></script>
        <script src="{{asset('js/login.js')}}"></script>
    </body>
</html>
