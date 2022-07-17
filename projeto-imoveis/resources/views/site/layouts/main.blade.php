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
    </head>
    <body>
        <nav>
            <div class="container">
                <div class="nav-wrapper">
                    <a href="/" class="brand-logo center">Sul Imóveis</a>
                </div>
            </div>
        </nav>

        {{-- Slider --}}
        @yield('slider')

        <div class="container">
            @yield('main-field')
        </div>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

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
