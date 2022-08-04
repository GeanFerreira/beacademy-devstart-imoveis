<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

        <title>Sul Imóveis</title>

        <style>
            .s-about .container .about-me p {
                font-weight: 400;
                line-height: 2.4rem;
                font-size: 1.6rem;
                color: rgba(255, 255, 255, 0.83);
                margin-top: 2.4rem;
            }

            .s-about .container .about-me ul {
                display: flex;
                gap: 1.6rem;
                margin-top: 3.2rem;
            }
            .s-about .container .about-me ul li a img {
                transition: all 0.2s;
            }
            .s-about .container .about-me ul li a img:hover {
                transform: translateY(-12%);
                filter: brightness(80%);
            }
        </style>
    </head>
    <body>
        <nav class="teal darken-1">
            <div class="container">
                <div class="nav-wrapper">
                    <a href="/" class="brand-logo">Sul Imóveis</a>

                    <!-- Ícone para Mobile -->
                    <a href="#" data-target="mobile-navbar" class="sidenav-trigger">
                        <i class="material-icons">menu</i>
                    </a>

                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li>
                            <a href="/admin/cities" class="right">Área Administrativa</a>
                        </li>
                        @if(Auth::user())
                            <li>
                                <a href="#" class="right">Admin</a>
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                        {{ __('Sair') }}
                                    </x-responsive-nav-link>
                                </form>
                            </li>
                        @else
                            <a href="/login" class="right">LOGIN</a>
                            <a href="/register" class="right">REGISTRAR</a>
                        @endif
                    </ul>

                    <!-- Dropdown -->
                    <ul id="dropdown-menu" class="dropdown-content">
                        <li><a href="/admin/cities">Cidades</a></li>
                        <li><a href="/admin/properties">Imóveis</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Menu Mobile -->
        <ul id="mobile-navbar" class="sidenav">
            <li><a href="/">Início</a></li>
            <li><a href="/admin/cities">Cidades</a></li>
            <li>
                <a href="#" class="left dropdown-trigger" data-target="dropdown-menu">
                    Área Administrativa<i class="material-icons right">arrow_drop_down</i>
                </a>
            </li>
            @if(Auth::user())
                <li>
                    <a href="#" class="right">Admin</a>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Sair') }}
                        </x-responsive-nav-link>
                    </form>
                </li>
            @else
                <a href="/login" class="right">LOGIN</a>
                <a href="/register" class="right">REGISTRAR</a>
            @endif
        </ul>

        {{-- Slider --}}
        @yield('slider')

        <div class="container">
            @yield('main-field')
        </div>

        <footer class="page-footer teal darken-1 s-about" id="about">
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <h5 class="white-text">sulimoveis.com.br</h5>
                        <p>
                            <i>Agradecimentos</i> a toda equipe da Paylivre, e<br> também da Be Academy por essa jornada incrível<br>que este bootcamp pode proporcionar!
                        </p>
                    </div>
                    <div class="col l4 offset-l2 s12 about-me">
                        <h5 class="white-text">QUEM SOU</h5>
                        <ul>
                            <li>
                                <a href="https://www.linkedin.com/in/ferreiragean" target="_blank"><img src="/img/icon-linkedin.svg" alt="Meu Linkedin"/></a>
                            </li>
                            <li>
                                <a href="http://www.instagram.com/marcel_gean" target="_blank"><img src="/img/icon-instagram.svg" alt="Meu Instagram"/></a>
                            </li>
                            <li>
                                <a href="https://github.com/GeanFerreira" target="_blank"><img class="responsive-img" src="/img/icon-github.svg" alt="Meu GitHub"/></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                    © 2022 Copyright
                    <a class="right" href="#!">Outros Links</a>
                </div>
            </div>
        </footer>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
        const elemsDropdown = document.querySelectorAll(".dropdown-trigger");
        const instancesDropdown = M.Dropdown.init(elemsDropdown, {
            coverTrigger: false
        })
        elemsSidenav = document.querySelectorAll(".sidenav");
        const instancesSidenav = M.Sidenav.init(elemsSidenav, {
            edge: "left"
        })
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function (){

            //Slider
            var sliders = document.querySelectorAll('.slider');

            M.Slider.init(sliders, {
               indicators: false,
               height: 400,
               interval: 4000,
            });

            //Material Box
            var boxes = document.querySelectorAll('.materialboxed');

            M.Materialbox.init(boxes);
        });
    </script>

    </body>
</html>
