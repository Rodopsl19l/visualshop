<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Admin | Visual Shop</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
        <link rel="stylesheet" href="{{asset('css/admin.css')}}">
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

                    <li class="nav-item <?= ($_SERVER['REQUEST_URI'] == '/admin') ? 'active' : ''?>">
                        <a class="nav-link" href="/admin">Administrar</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Cuenta
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/account">Editar</a>
                            <a class="dropdown-item" href="#">Cerrar Sesión</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <div id="banner">
            <div class="banner-mask">
                <div class="banner-content" data-src="img/adminBanner.jpg" data-pos-x="left" data-parallax>
                    <div class="container">
                        <div class="row">
                            <div class="col wow fadeIn">
                                <span>ADMINISTRAR
                                </span><br>
                                <span class="red-font">CONTROLA TU CONTENIDO</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="wow fadeInUp container">
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-6">
                        <div class="section-title text-left">
                            TU CONTENIDO
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 text-right">
                        <a class="btnAdd" href="/admin/add">Agregar contenido</a>
                    </div>

                    <div class="col-12">
                        <div id="contentAlert" class="section-alert">
                            No hay contenido, agrega algo
                        </div>
                    </div>

                    <div id="contentCards" class="card-columns text-center">

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
        <script src="{{asset('js/admin.js')}}"></script>
    </body>
</html>
