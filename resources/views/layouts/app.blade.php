<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Styles -->
    {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    <!--
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    {{--<script src="{{ asset('js/app.js') }}"></script>--}}
    <script
            src="https://code.jquery.com/jquery-3.2.1.js"
            integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script> -->



    <!-- <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- Font Roboto -->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <!-- File CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.css') }}">
    <!--Plugin Foggy-->

    <script type="text/javascript" src="{{ asset('js/jquery.foggy.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>

</head>
<body>
    <div id="blur">
        <div class="container-fluid container_head">
            <div class="row">
                <div class="col-md-4 col-xs-4">
                    <img src="{{ asset('images/logo_travel.png') }}" alt="CPA Travel" title="CPA Travel" class="img-responsive center-block">
                </div>
                <div class="col-md-6 col-xs-8 title_menu center-block no_padding">
                    <div class="box_nom_emp">
                        @if(Session::get('business_id'))
                        <div class="col-md-12">Empresa: {{ Session::get('business_description') }}</div>
                        <div class="col-md-12">Grupo: Nombre Grupo</div>
                        @endif
                    </div>
                </div>
                <div class="col-md-2 col-xs-12">
                    <div class="col-md-12 col-xs-12 menu_btns">

                        <div class="col-md-4 col-xs-4">
                            @if(Session::get('business_id'))
                                <a href="{{ route('list') }}">
                                    <img class="center-block" title="Cambio de Empresa" alt="Cambio de Empresa" src="{{ asset('images/cambio_icono.png') }}">
                                </a>
                            @endif
                        </div>
                        <div class="col-md-4 col-xs-4">
                            @if(Session::get('token'))
                                <a href="{{ route('logout_exter') }}">
                                    <img class="center-block" title="Cerrar Sesión" alt="Cerrar Sesión" src="{{ asset('images/cerrar_sesion_icono.png') }}">
                                </a>
                            @endif
                        </div>
                        <div class="col-md-4 col-xs-4">
                            <img class="center-block" title="RSS" alt="RSS" src="{{ asset('images/rss_icono.png') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
                <div class="container">
                    <div class="row">
                            @yield('content')
                    </div>
                </div>
        @if(Session::get('business_id'))
        <footer class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 main-icos-footer">
                    <div class="col-md-3 col-xs-4 box-icos-footer">
                        <div class="pull-left">
                            <div class="col-md-4 col-xs-4 cont-ico-footer no_padding">
                                <img title="Facebook" alt="Facebook" class="img-responsive center-block" src="{{ asset('images/logo_facebook.png') }}">
                            </div>
                            <div class="col-md-8 col-xs-8 txt-face">cpavisionmx</div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-4">
                        <img title="CPA Vision" alt="CPA Vision" class="img-responsive center-block" src="{{ asset('images/logo_cpavision.png') }}">
                    </div>
                    <div class="col-md-3 col-xs-4 box-icos-footer">
                        <div class="pull-right">
                            <div class="col-md-4 col-xs-4 cont-ico-footer no_padding">
                                <img title="Twitter" alt="Facebook" class="img-responsive center-block" src="{{ asset('images/twitter_logo.png') }}">
                            </div>
                            <div class="col-md-8 col-xs-8 txt-twitter">@CPA_visionmx</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 banner-footer"></div>
            </div>
        </footer>
        @endif
    </div>
    <div id="news" class="panel_foggy"></div>
    <iframe width="80%" height="90%" id="launcher" src="" frameborder=0 ALLOWTRANSPARENCY="true"></iframe>
    <div id="close_config" class="panel_foggy" onclick="blurStuff(0)">Cerrar</div>
</body>
</html>
