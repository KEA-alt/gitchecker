<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/gitchecker.css') }}">
</head>

<body>
    <div id="app">
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <img class="navbar-brand logoNav" src="{{ asset('img/NULLLOGO.png') }}"></img>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <router-link to="/" class="nav-link text-light text-uppercase">Accueil</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/audit" class="nav-link text-light text-uppercase">Audit de sécurité
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/documentation" class="nav-link text-light text-uppercase">Documentation
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/donate" class="nav-link text-light text-uppercase">Donation</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/contact" class="nav-link text-light text-uppercase">Contact</router-link>
                        </li>
                    </ul>
                    <ul class="nav justify-content-end">
                        <li class="nav-item mr-2">
                            <a class="btn btn-outline-light" href="#">Pannel admin</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <router-view></router-view>

        <footer>
            <div class="navbar navbar-expand-lg navbar-dark bg-dark p-4 row align-items-center">

                <div class="p-5 col-12 col-md-5 col-lg-4 order-md-2 text-light">
                    <h3>BESOIN D'AIDE</h3>
                    <router-link to="/documentation" class="btn btn-light mt-2">Documentation</router-link>
                </div>
                <div class="p-5 col-12 col-md-5 col-lg-4 order-md-2  text-light">
                    <h3>CONTACTEZ-NOUS</h3>

                </div>
                <div class="p-5 col-12 col-md-5 col-lg-4 order-md-2 text-light">
                    <h3>GITCHECKER</h3>
                    <p>est un outil d'audit de cybersécurité</p>
                    <p>Copyright © It-Akademy 2020 </p>
                </div>

            </div>
        </footer>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>