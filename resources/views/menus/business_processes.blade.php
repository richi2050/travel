<!doctype html>
<html lang="en">
<head>
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
    <!--Plugin Foggy-->

    <script type="text/javascript" src="{{ asset('js/jquery.foggy.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
</head>
<body>

<div class="container">
    <br><br>
    <div class="row" style="margin-top: 15%">
        <div class="col-md-12 col-sm-12 col-xs-6">
            <div class="about-item scrollpoint sp-effect2">
                
                <p style="text-align:center;">
                    <img src="{{ asset('images/menu/proceso_negocio.png') }}" alt="">
                </p>
            </div><! --/about-item -->
        </div><! --/col-md-3 -->
    </div>
    <br>
    <div class="row">
        <div class="col-md-3 col-sm-3 col-xs-6 panel_menu">
            <div class="about-item scrollpoint sp-effect2">
                <p>
                    <a href="{{ route('project.index') }}" >
                        <img src="{{ asset('images/menu/creacion_proyectos.png') }}" alt="">
                    </a>
                </p>
                <h3 class="font_menu">Creación de proyectos, subproyectos y viajes.</h3>
            </div><! --/about-item -->
        </div><! --/col-md-3 -->

        <div class="col-md-3 col-sm-3 col-xs-6 panel_menu" >
            <div class="about-item scrollpoint sp-effect5">
                <p>
                    <a {{ checkPermission('click_me_aut_viaje') ?  '' : 'href= '.route('travel_autho') }}>
                        <img src="{{ asset('images/menu/autorizacion_viaje.png') }}" alt="">
                    </a>
                </p>
                <h3 class="font_menu">Autorización del viaje.</h3>
            </div><! --/about-item -->
        </div><! --/col-md-3 -->

        <div class="col-md-3 col-sm-3 col-xs-6 panel_menu" >
            <div class="about-item scrollpoint sp-effect5">
                <p>
                    <img src="{{ asset('images/menu/autorisacion_comprobacion.png') }}" alt="">
                <h3 class="font_menu">Autorización de comprobación del viaje</h3>
                </p>
            </div><! --/about-item -->
        </div><! --/col-md-3 -->

        <div class="col-md-3 col-sm-3 col-xs-6 panel_menu" >
            <div class="about-item scrollpoint sp-effect1">

                <p>
                    <img src="{{ asset('images/menu/autorizacion_pendientes.png') }}" alt="">
                </p>
                <h3 class="font_menu">Autorizaciones pendientes</h3>
            </div><! --/about-item -->
        </div><! --/col-md-3 -->
    </div><! --/row -->
</div>

</body>
</html>