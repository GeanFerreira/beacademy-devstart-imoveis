<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title>Registrar</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
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

<div id="flayer">
    <div id="slayer">
        <div class="container" id="content">
            <div class="row">
                <div class="col l3 m3 s12"></div>
                <div class="col l6 m6 s12">
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="card-panel z-depth-5">
                            <h5 class="center">Registrar</h5>
                            <p class="center">Maior rede de imóveis!</p>

                            <div class="input-field">
                                <i class="material-icons prefix">account_circle</i>
                                <input type="text" id="name" name="name">
                                <label for="name">Nome</label>
                            </div>

                            <div class="input-field">
                                <i class="material-icons prefix">email</i>
                                <input type="email" id="email" name="email" class="validate">
                                <label for="email">Email</label>
                            </div>

                            <div class="input-field">
                                <i class="material-icons prefix">lock</i>
                                <input type="password" id="password" name="password">
                                <label for="password">Senha</label>
                            </div>

                            <div class="input-field">
                                <i class="material-icons prefix">vpn_key</i>
                                <input type="password" id="password_confirmation" name="password_confirmation">
                                <label for="password_confirmation">Confirme senha</label>
                            </div>
                            <p class="right">Já tem uma conta? <a href="{{ route('login') }}" class="modal-trigger">login</a></p>
                            <button type="submit" class="btn left col s12">REGISTRAR</button>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
                <div class="col l3 m3 s12"></div>
            </div>
        </div>
    </div>
</div>


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
