@extends('layouts.auth')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">

                    <a class="navbar-brand" href="https://sndesk.com.br/">
                        <img src="{{ asset ('assets/img/logo.png') }}" alt="" width="200" height="47"
                             class="logo_login"> </a>
                    <div class="card-header"></div>
                    <div class="card-body">
                        <h3 class="text-center font-weight-light my-4">Olá!

                            <?php

                            date_default_timezone_set('America/Sao_Paulo');
                            $hora = date('H');
                            if ($hora >= 6 && $hora <= 12)
                                echo 'Bom dia!';
                            else if ($hora > 12 && $hora <= 18)
                                echo 'Boa tarde!';
                            else
                                echo 'Boa noite!';


                            ?>
                        </h3>

                        <form method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="small mb-1" for="email">Email</label>
                                <input class="form-control box_login" name="email" id="email" type="email"
                                       placeholder=""/>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="password">Senha</label>
                                <input class="form-control box_login" name="password" id="password" type="password"
                                       placeholder=""/>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                @endif
                            </div>


                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox"/>
                                    <label class="custom-control-label" for="rememberPasswordCheck">Lembrar
                                        senha</label>

                                </div>
                            </div>
                            <div class="text-center form-group">
                                <button type="submit" class="btn btn-primary" style="margin-bottom: 20px">
                                    ENTRAR
                                </button>

                                </br>

                                <a class="esqueceu_senha" href="{{ route('password.request') }}">Esqueceu a senha?</a>

                            </div>


                    </div>
                    </form>

                    <button id="setup_button" onclick="installApp()">Installer</button>
                </div>

            </div>
        </div>
    </div>
    </div>

    </div>
@endsection
