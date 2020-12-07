<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Account | Visual Shop</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
        <link rel="stylesheet" href="{{asset('css/account.css')}}">
    </head>

    <body>
        <nav id="navbar" class="navbar navbar-expand-lg fixed-top navbar-transparent bg-dark navbar-dark">
            <a class="navbar-brand" href="/">
                <img src="{{asset('img/logo.png')}}">
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                </ul>
                <ul class="navbar-nav my-2 my-lg-0">
                    <li class="nav-item <?= ($_SERVER['REQUEST_URI'] == '/') ? 'active' : ''?>">
                        <a class="nav-link" href="/">Inicio</a>
                    </li>

                    <li class="nav-item <?= ($_SERVER['REQUEST_URI'] == '/training') ? 'active' : ''?>">
                        <a class="nav-link" href="/training">Entrenamiento</a>
                    </li>

                    <li class="nav-item <?= ($_SERVER['REQUEST_URI'] == '/services') ? 'active' : ''?>">
                        <a class="nav-link" href="/services">Servicios</a>
                    </li>

                    <li class="nav-item <?= ($_SERVER['REQUEST_URI'] == '/about') ? 'active' : ''?>">
                        <a class="nav-link" href="/about">Nosotros</a>
                    </li>

                    <li class="nav-item <?= ($_SERVER['REQUEST_URI'] == '/contact') ? 'active' : ''?>">
                        <a class="nav-link" href="/contact">Contacto</a>
                    </li>

                    @if(!$userId)
                        <li class="nav-item <?= ($_SERVER['REQUEST_URI'] == '/login') ? 'active' : ''?>">
                            <a class="nav-link" href="/login">Iniciar Sesión</a>
                        </li>
                    @endif

                    @if($userId)
                        <li class="nav-item <?= ($_SERVER['REQUEST_URI'] == '/admin') ? 'active' : ''?> dropdown">
                            <a class="nav-link" href="/admin">Administrar</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Cuenta
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/account">Editar</a>
                                <a class="dropdown-item" href="/logout">Cerrar Sesión</a>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>

        <div id="banner">
            <div class="banner-mask">
                <div id="coverCoverImage" class="banner-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-md-3 wow fadeIn">
                                <img id="coverProfileImage" class="card-img-top" style="border-radius: 50%;">
                            </div>

                            <div class="col-12 col-md-9 wow fadeIn">
                                <br>
                                <span id="coverName" class="red-font"> Nombre del usuario</span>
                                <br>
                                <span id="coverUserType">Tipo de usuario</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="wow fadeInUp container">
                <div class="row">
                    <div class="section-title">
                        Editar mi información
                    </div>
                </div>

                <div class="row">
                    <div id="requiredField" class="requiredField">
                        <h2>Este campo es requerido</h2>
                    </div>

                    <div id="passwordsError" class="passwordsError">
                        <h2>Este campo es requerido</h2>
                    </div>

                    <div id="userError" class="userError">
                        <h2>Ocurrió un error al actualizar la información, intenta de nuevo</h2>
                    </div>

                    <div class="editBox">
                        <div class="textBox">
                            <div class="row">
                                <div class="col-6">
                                    <label for="name">Nombre</label>
                                     <input id="name" class="addInput" type="text" name="name" placeholder="Nombre">
                                </div>

                                <div class="col-6">
                                    <label for="lastname">Apellido</label>
                                    <input id="lastname" class="addInput" type="text" name="lastname" placeholder="Apellido">
                                </div>
                            </div>
                        </div>

                        <div class="textBox">
                            <label for="email">Email</label>
                            <input id="email" class="addInput" type="email" name="email" placeholder="Correo" readonly>
                        </div>

                        <div class="textBox">
                            <label for="username">Username</label>
                            <input id="username" class="addInput" type="username" name="username" placeholder="Username" readonly>
                        </div>

                        <div class="textBox">
                            <div class="row">
                                <div class="col-6">
                                    <label for="password">Contraseña</label>
                                     <input id="password" class="addInput" type="password" name="password" placeholder="Contraseña">
                                </div>

                                <div class="col-6">
                                    <label for="confirmPassword">Confirmar contraseña</label>
                                    <input id="confirmPassword" class="addInput" type="password" name="password" placeholder="Confirmar contraseña" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="textBox">
                            <label for="phone">Teléfono</label>
                            <input id="phone" class="addInput" type="phone" name="phone" placeholder="Teléfono">
                        </div>

                        <div class="fileBox">
                            <label for="profileImage">Imagen de perfil</label>
                            <img id="userProfileImage" class="card-img-top">
                            <input id="profileImage" class="form-control-file" type="file" name="profileImage">
                        </div>

                        <div class="fileBox">
                            <label for="coverImage">Imagen de portada</label>
                            <img id="userCoverImage" class="card-img-top">
                            <input id="coverImage" class="form-control-file" type="file" name="coverImage">
                        </div>

                        <button id="btnEdit" class="btnEdit">
                            Editar información
                        </button>

                        <input id="userId" type="hidden" data-value="{{ $userId }}"/>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
        <script src="{{asset('js/jquery.parallax.min.js')}}"></script>
        <script src="{{asset('js/wow.min.js')}}"></script>
        <script src="{{asset('js/redirect.js')}}"></script>
        <script src="{{asset('js/account.js')}}"></script>
    </body>
</html>
