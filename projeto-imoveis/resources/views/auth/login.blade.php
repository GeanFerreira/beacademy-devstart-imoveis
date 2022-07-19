@extends('auth.layouts.main')
@section('main-field')

<div id="flayer">
    <div id="slayer">
        <div class="container" id="content">

            <div class="row">
                <div class="col l3 m3 s12"></div>
                <div class="col l6 m6 s12">
                    <form action="" method="POST">
                        <div class="card-panel z-depth-5">
                            <h5 class="center">Registre-se</h5>
                            <p class="center">Maior rede de imóveis do sul!</p>
                            <div class="input-field">
                                <i class="material-icons prefix">account_circle</i>
                                <input type="text" name="name">
                                <label for="name">Digite seu nome</label>
                            </div>

                            <div class="input-field">
                                <i class="material-icons prefix">email</i>
                                <input type="email" name="email" class="validate">
                                <label for="email">Digite seu email</label>
                            </div>

                            <div class="input-field">
                                <i class="material-icons prefix">lock</i>
                                <input type="password" name="pass1">
                                <label for="pass1">Digite sua senha</label>
                            </div>


                            <div class="input-field">
                                <i class="material-icons prefix">vpn_key</i>
                                <input type="password" name="pass2">
                                <label for="pass2">Confirme sua senha</label>
                            </div>
                            <p class="center">Você já tem uma conta? <a href="#login" class="modal-trigger">login</a></p>
                            <input type="submit" name="submit" value="registrar" class="btn left col s12">

                            <div class="clearfix"></div>
                        </div>
                    </form>

                </div>
                <div class="col l3 m3 s12"></div>



            </div>
        </div>
    </div>
</div>
<!-- login form put in the form -->
<div class="modal modal-fixed-footer" id="login">
    <form action="" method="POST">
        <div class="modal-conent">
            <div class="container">
                <h5 class="center">Login</h5>
                <p class="center">Venha conhecer nossos imóveis</p>
                <div class="row">

                    <div class="col m12 s12">
                        <div class="input-field">
                            <i class="material-icons prefix">person</i>
                            <input type="text" name="username">
                            <label>Digite seu nome ou email</label>
                        </div>

                        <div class="input-field">
                            <i class="material-icons prefix">lock</i>
                            <input type="password" name="pass1">
                            <label>Digite sua senha</label>
                        </div>
                        <p>
                            <label>
                                <input type="checkbox">
                                <span>Lembrar</span>
                            </label>
                        </p>
                    </div>

                </div>
            </div><!-- end of modal container -->
        </div>

        <div class="modal-footer">
            <div class="container">
                <p class="left">Você é novo? <a href="#" class="modal-trigger">Registrar</a></p>
                <input type="submit" name="submit" value="login" class="btn pulse">
                <input type="button"  value="close" class="btn modal-close red">
            </div>
        </div>

</form>
</div>

@endsection
