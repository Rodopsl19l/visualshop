<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Contenido | Visual Shop</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
        <link rel="stylesheet" href="{{asset('css/content.css')}}">
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
            <div class="wow fadeInUp container-fluid">
                <div class="contentInfo">
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div id="contentName" class="section-title text-left">
                                        Nombre del contenido
                                    </div>

                                    <div id="contentDescription" class="section-text">
                                        Descripción del contenido
                                    </div>
                                </div>
                            </div>

                            <div class="row contentImages">
                                <div class="row">
                                    <div class="col-12 contentImagesText">
                                        Imagenes del contenido
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-md-4 contentImage">
                                        <img id="contentImageOne" class="card-img-top">
                                    </div>

                                    <div class="col-12 col-md-4 contentImage">
                                        <img id="contentImageTwo" class="card-img-top">
                                    </div>

                                    <div class="col-12 col-md-4 contentImage">
                                        <img id="contentImageThree" class="card-img-top">
                                    </div>
                                </div>
                            </div>

                            <div class="row contentVideo">
                                <div class="row">
                                    <div class="col-12 contentVideoText">
                                        Video del contenido
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <video id="contentVideoOne" class="card-img-top" autoplay loop muted></video>
                                    </div>
                                </div>
                            </div>

                            <div class="row contentOwner">
                                <div class="row">
                                    <div class="col-12 contentOwnertext">
                                        Creador del contenido
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="row">
                                            <div class="col-12 col-md-4">
                                                <img id="userContentImage" class="card-img-top userContentImage">
                                            </div>

                                            <div class="col-12 col-md-8">
                                                <div id="userContentName" class="userContentName"></div>
                                                <div id="userContentEmail" class="userContentEmail"></div>
                                                <div id="userContentPhone" class="userContentPhone"></div>
                                                <div id="userContentPhone" class="userContentPhone"></div>
                                                <button id="btnFollowUser" class="btn btn-success">Seguir usuario</button>
                                                <button id="btnUnfollowUser" class="btn btn-danger">Dejar de seguir</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row contentComments">
                                <div class="row comments">
                                    <div class="col-12">
                                        Comentarios del contenido
                                    </div>

                                    <div id="singleComment" class="col-12">

                                    </div>

                                    <div class="col-12">
                                        <div id="commentRequiredField" class="commentRequiredField">
                                            <h2>Este campo es requerido</h2>
                                        </div>

                                        <div class="textBox text-right">
                                            <input id="comment" class="addInput" type="text" name="comment" placeholder="Escriba el comentario...">
                                            <button id="btnCreateComment" class="btnCreateComment">
                                                Agregar comentario
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="wow fadeInUp container-fluid">

            </div>
        </div>

        <input id="contentId" type="hidden" data-value="{{ $id }}"/>
        <input id="userId" type="hidden" data-value="{{ $userId }}"/>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
        <script src="{{asset('js/jquery.parallax.min.js')}}"></script>
        <script src="{{asset('js/wow.min.js')}}"></script>
        <script src="{{asset('js/redirect.js')}}"></script>
        <script src="{{asset('js/content.js')}}"></script>
    </body>
</html>
