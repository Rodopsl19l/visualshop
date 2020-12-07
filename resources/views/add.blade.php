<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Admin | Visual Shop</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
        <link rel="stylesheet" href="{{asset('css/add.css')}}">
    </head>

    <body>
        <nav id="navbar" class="navbar navbar-expand-lg fixed-top navbar-visible bg-dark navbar-dark">
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

        <div class="section">
            <div class="wow fadeInUp container">
                <div class="row">
                    <div class="section-title">
                        CREACIÓN DE CONTENIDO
                    </div>
                </div>

                <div class="row">
                    <div id="requiredField" class="requiredField">
                        <h2>Este campo es requerido</h2>
                    </div>

                    <div id="postError" class="postError">
                        <h2>Ocurrió un error al agregar el contenido, intenta de nuevo</h2>
                    </div>

                    <div class="addBox">
                        <div class="textBox">
                            <label for="name">Nombre del contenido</label>
                            <input id="name" class="addInput" type="text" name="name" placeholder="Nombre del contenido">
                        </div>

                        <div class="textBox">
                            <label for="description">Descripción del contenido</label>
                            <input id="description" class="addInput" type="text" name="description" placeholder="Descripción del contenido">
                        </div>

                        <div class="fileBox">
                            <label for="imageOne">Imagen 1 del contenido</label>
                            <input id="imageOne" class="form-control-file" type="file" name="imageOne">
                        </div>

                        <div class="fileBox">
                            <label for="imageTwo">Imagen 2 del contenido</label>
                            <input id="imageTwo" class="form-control-file" type="file" name="imageTwo">
                        </div>

                        <div class="fileBox">
                            <label for="imageThree">Imagen 3 del contenido</label>
                            <input id="imageThree" class="form-control-file" type="file" name="imageThree">
                        </div>

                        <div class="fileBox">
                            <label for="videoOne">Video del contenido</label>
                            <input id="videoOne" class="form-control-file" type="file" name="videoOne">
                        </div>

                        <div class="checkBox text-left">
                            <input id="publish" class="form-check-input" type="checkbox" name="publish">
                            <label class="form-check-label" for="publish">Hacer público el contenido</label>
                        </div>

                        <button id="btnCreate" class="btnCreate">
                            Agregar contenido
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
        <script src="{{asset('js/add.js')}}"></script>
    </body>
</html>
