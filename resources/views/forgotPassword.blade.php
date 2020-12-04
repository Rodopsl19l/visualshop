<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Forgot Password | Visual Shop</title>

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
        <link rel="stylesheet" href="{{asset('css/forgotPassword.css')}}">
    </head>

    <body>
        <div class="forgotPasswordBox">
            <div class="forgotPasswordLogo">
                <img src="{{asset('img/logo.png')}}">
            </div>

            <div id="requiredField" class="requiredField">
                <h2>Este campo es requerido</h2>
            </div>

            <div id="emailNotFound" class="emailNotFound">
                <h2>No se encontró una cuenta con este correo</h2>
            </div>

            <div id="forgotPasswordError" class="forgotPasswordError">
                <h2>Ocurrió un error, intenta de nuevo</h2>
            </div>

            <div id="enterEmail" class="enterEmail">
                <h1>Ingrese el correo con el que registro su cuenta, para así poder cambiar su contraseña<h1>

                <div class="textBox">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <input id="email" type="text" placeholder="Correo">
                </div>

                <input id="btnValidateEmail" class="btnValidateEmail" type="button" value="Validar correo">
            </div>


            <div id="enterPassword" class="enterPassword">
                <h1>Ingrese su nueva contraseña y luego verifiquela<h1>

                <div class="textBox">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                    <input id="password" type="password" placeholder="Contraseña">
                </div>

                <div class="textBox">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                    <input id="confirmPassword" type="password" placeholder="Confirmar contraseña">
                </div>

                <input id="btnResetPassword" class="btnResetPassword" type="button" value="Restablecer contraseña">
            </div>



            <a class="btnLogin" href="/login">Regresar al Login</a>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="{{asset('js/redirect.js')}}"></script>
        <script src="{{asset('js/forgotPassword.js')}}"></script>
    </body>
</html>
