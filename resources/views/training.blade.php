<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Training | Visual Shop</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
        <link rel="stylesheet" href="{{asset('css/training.css')}}">
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
                <div class="banner-content" data-src="img/trainingBanner.jpg" data-pos-x="left" data-parallax>
                    <div class="container">
                        <div class="row">
                            <div class="col wow fadeIn">
                                <span>ENTRENAMIENTO
                                </span><br>
                                <span class="red-font">APRENDE CON NOSOTROS</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="wow fadeInUp container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="section-title">
                            ¿Quieres formar parte de la comunidad?
                        </div>
                    </div>

                    <div class="col-8">
                        <div class="section-text">
                            ¿Te gustaría poder formar parte de esta comunidad pero no sabes como empezar?
                            <br>
                            <br>
                            No te preocupes, nosotros te brindaremos todo el apoyo necesesario para que puedas lograrlo.
                            <br>
                            <br>
                            La sección de entrenamiento es la ideal si estas buscando especializarte poco a poco, ya que cuenta con
                            diversos tutoriales para aprender los softwares mas utilizados en la actualidad para crear el mejor contenido
                            multimedia.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mini-banner" data-src="img/training/3dMaxBanner.jpg" data-pos-x="left" data-parallax>
            <div class="banner-mask">
                <div class="mini-banner-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col wow fadeIn">
                                <span>3D MAX</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="wow fadeInUp container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="section-title">
                            APRENDE 3D MAX
                        </div>
                    </div>

                    <div class="col-8">
                        <div class="section-text text-center">
                            Proximamente
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mini-banner" data-src="img/training/afterEffectsBanner.jpg" data-pos-x="left" data-parallax>
            <div class="banner-mask">
                <div class="mini-banner-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col wow fadeIn">
                                <span>AFTER EFFECTS</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="wow fadeInUp container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="section-title">
                            APRENDE AFTER EFFECTS
                        </div>
                    </div>

                    <div class="col-8">
                        <div class="section-text text-center">
                            Proximamente
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mini-banner" data-src="img/training/blenderBanner.jpg" data-pos-x="left" data-parallax>
            <div class="banner-mask">
                <div class="mini-banner-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col wow fadeIn">
                                <span>BLENDER</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="wow fadeInUp container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="section-title">
                            APRENDE BLENDER
                        </div>
                    </div>

                    <div class="col-8">
                        <div class="section-text text-center">
                            Proximamente
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mini-banner" data-src="img/training/cinema4dBanner.jpg" data-pos-x="left" data-parallax>
            <div class="banner-mask">
                <div class="mini-banner-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col wow fadeIn">
                                <span>CINEMA 4D</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="wow fadeInUp container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="section-title">
                            APRENDE CINEMA 4D
                        </div>
                    </div>

                    <div class="col-8">
                        <div class="section-text text-center">
                            Proximamente
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mini-banner" data-src="img/training/illustratorBanner.jpg" data-pos-x="left" data-parallax>
            <div class="banner-mask">
                <div class="mini-banner-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col wow fadeIn">
                                <span>Illustrator</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="wow fadeInUp container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="section-title">
                            APRENDE ILLUSTRATOR
                        </div>
                    </div>

                    <div class="col-8">
                        <div class="section-text text-center">
                            Proximamente
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mini-banner" data-src="img/training/mayaBanner.jpg" data-pos-x="left" data-parallax>
            <div class="banner-mask">
                <div class="mini-banner-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col wow fadeIn">
                                <span>MAYA</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="wow fadeInUp container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="section-title">
                            APRENDE MAYA
                        </div>
                    </div>

                    <div class="col-8">
                        <div class="section-text text-center">
                            Proximamente
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mini-banner" data-src="img/training/photoshopBanner.jpg" data-pos-x="left" data-parallax>
            <div class="banner-mask">
                <div class="mini-banner-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col wow fadeIn">
                                <span>PHOTOSHOP</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="wow fadeInUp container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="section-title">
                            APRENDE PHOTOSHOP
                        </div>
                    </div>

                    <div class="col-8">
                        <div class="section-text text-center">
                            Proximamente
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mini-banner" data-src="img/training/procreateBanner.jpg" data-pos-x="left" data-parallax>
            <div class="banner-mask">
                <div class="mini-banner-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col wow fadeIn">
                                <span>PROCREATE</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="wow fadeInUp container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="section-title">
                            APRENDE PROCREATE
                        </div>
                    </div>

                    <div class="col-8">
                        <div class="section-text text-center">
                            Proximamente
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mini-banner" data-src="img/training/unrealEngineBanner.jpg" data-pos-x="left" data-parallax>
            <div class="banner-mask">
                <div class="mini-banner-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col wow fadeIn">
                                <span>UNREAL ENGINE</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="wow fadeInUp container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="section-title">
                            APRENDE UNREAL ENGINE
                        </div>
                    </div>

                    <div class="col-8">
                        <div class="section-text text-center">
                            Proximamente
                        </div>
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
        <script src="{{asset('js/training.js')}}"></script>
    </body>
</html>
