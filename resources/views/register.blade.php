<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Register | Visual Shop</title>

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('css/register.css')}}">
    </head>

    <body>
        <div class="registerBox">
            <div class="registerLogo">
                <img src="{{asset('img/logo.png')}}">
            </div>

            <div class="registerTitle">
                <h1>Registrate</h1>
            </div>

            <div id="requiredField" class="requiredField">
                <h2>Este campo es requerido</h2>
            </div>

            <div id="passwordsMatch" class="passwordsMatch">
                <h2>Las contraseñas no coinciden</h2>
            </div>

            <div id="registerError" class="registerError">
                <h2>Ocurrió un error, intenta de nuevo</h2>
            </div>

            <div class="textBox">
                <i class="fa fa-user" aria-hidden="true"></i>
                <input id="name" type="text" placeholder="Nombre">
            </div>

            <div class="textBox">
                <i class="fa fa-user" aria-hidden="true"></i>
                <input id="lastname" type="text" placeholder="Apellido">
            </div>

            <div class="textBox">
                <i class="fas fa-envelope" aria-hidden="true"></i>
                <input id="email" type="text" placeholder="Correo">
            </div>

            <div class="textBox">
                <i class="fa fa-user" aria-hidden="true"></i>
                <input id="username" type="text" placeholder="Username">
            </div>

            <div class="textBox">
                <i class="fa fa-lock" aria-hidden="true"></i>
                <input id="password" type="password" placeholder="Contraseña">
            </div>

            <div class="textBox">
                <i class="fa fa-lock" aria-hidden="true"></i>
                <input id="confirmPassword" type="password" placeholder="Confirmar contraseña">
            </div>

            <div class="textBox">
                <i class="fas fa-phone" aria-hidden="true"></i>
                <input id="phone" type="phone" placeholder="Teléfono">
            </div>

            <input id="btnRegister" class="btnRegister" type="button" value="Registrarme">

            <a class="btnLogin" href="/login">¿Ya tienes cuenta? Inicia sesión</a>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="{{asset('js/redirect.js')}}"></script>
        <script src="{{asset('js/register.js')}}"></script>
    </body>
</html>
