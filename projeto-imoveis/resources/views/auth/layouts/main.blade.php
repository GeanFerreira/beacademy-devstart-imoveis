<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

        <title>Fomulário</title>
        <style>
            body{
                background-color:teal;
            }

            .progress{
                width:50%;
                margin:0 auto;
                margin-top:20%;
            }

            @media only screen and (max-width:924px){
                .progress{
                    width:70%;
                    margin:0 auto;
                    margin-top:60%;
                }
            }

        </style>
    </head>
    <body>
        <div class="container">
            @yield('main-field')
        </div>

        <!-- Compiled and minified CSS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script>

            const login = document.querySelectorAll(".modal");
            M.Modal.init(login,{
                opacity:0.7,
                dismissible:false
            });

            document.querySelector("#content").style.display="none";
            document.querySelector("#flayer").classList.add("progress");
            document.querySelector("#slayer").classList.add("indeterminate");

            setTimeout(function(){
                document.querySelector("#flayer").classList.remove("progress");
                document.querySelector("#slayer").classList.remove("indeterminate");
                document.querySelector("#content").style.display="block";
            },3000)
        </script>
    </body>
</html>
