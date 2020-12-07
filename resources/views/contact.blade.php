<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Contact | Visual Shop</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
        <link rel="stylesheet" href="{{asset('css/contact.css')}}">
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
                <div class="banner-content" data-src="img/contactBanner.jpg" data-pos-x="left" data-parallax>
                    <div class="container">
                        <div class="row">
                            <div class="col wow fadeIn">
                                <span>CONTACTO
                                </span><br>
                                <span class="red-font">NO DUDES EN PREGUNTAR</span>
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
                            CONTACTANOS
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="section-text text-center wow fadeInUp">
                                Monterrey, Nuevo León, México
                                <br>
                                C.P 64000
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid wow fadeInUp" id="map">
            <div class="row">
                <div class="col">
                    <div id="map-container" class="z-depth-1-half map-container" style="height: 500px">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28767.008539579383!2d-100.3294292421831!3d25.67540268355969!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86629587079b4b83%3A0xfae261356b66709d!2sCentro%2C%20Monterrey%2C%20N.L.!5e0!3m2!1ses!2smx!4v1607330822537!5m2!1ses!2smx" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                </div>
            </div>
        </div>

        <div class="mini-banner" data-src="img/miniBanner1.jpg" data-pos-x="left" data-parallax>
            <div class="banner-mask">
                <div class="mini-banner-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col wow fadeIn">
                                <span class="red-font">¿BUSCAS AYUDA?
                                </span><br>
                                PUEDES <span class="red-font">CONTACTAR</span> CON LOS ARTISTAS
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer>
            <div class="container">
                <div class="row wow fadeInUp">
                    <div class="col-12 col-md-6 text-center">
                        <div class="footer-header-text">CONTÁCTENOS PARA CUALQUIER DUDA</div>

                        <div class="footer-header-text">
                            Oficina
                        </div>

                        <div class="footer-text">
                            Monterrey, Nuevo León, México
                            <br>
                            C.P 64000
                        </div>

                        <div class="footer-header-text">
                            Teléfono
                        </div>

                        <div class="footer-text">
                            +52 1 81 1585 8295
                        </div>

                        <div class="footer-header-text">
                            Email
                        </div>

                        <div class="footer-text">
                            contacto.visualize@gmail.com
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <form id="contact">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" id="name" class="form-control" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label>Teléfono</label>
                                <input type="email" id="phone" class="form-control" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label>Correo Electrónico</label>
                                <input type="text" id="email" class="form-control" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label>Mensaje</label>
                                <textarea id="message" class="form-control" aria-describedby="emailHelp"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                        <div id="thankyou" style="display: none;">
                            <h3>Gracías por tu mensaje!</h3>
                            <h5>Nos pondremos en contacto contigo lo antes posible.</h5>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <a href="https://wa.me/5218115858295" id="whatsapp" target="_blank"><i class="fab fa-whatsapp"></i></a>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
        <script src="{{asset('js/jquery.parallax.min.js')}}"></script>
        <script src="{{asset('js/wow.min.js')}}"></script>
        <script src="{{asset('js/redirect.js')}}"></script>
        <script src="{{asset('js/contact.js')}}"></script>
    </body>
</html>
