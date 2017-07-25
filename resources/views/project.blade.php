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
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.css') }}">
    <!--Plugin Foggy-->

    <script type="text/javascript" src="{{ asset('js/jquery.foggy.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
</head>
<body>
<style>
    .tree { margin: 1em; }

    .tree input {
        position: absolute;
        clip: rect(0, 0, 0, 0);
    }

    .tree input ~ ul { display: none; }

    .tree input:checked ~ ul { display: block; }

    /* ————————————————————–
      Tree rows
    */
    .tree li {
        line-height: 1.2;
        position: relative;
        padding: 0 0 1em 1em;
    }

    .tree ul li { padding: 1em 0 0 1em; }

    .tree > li:last-child { padding-bottom: 0; }

    /* ————————————————————–
      Tree labels
    */
    .tree_label {
        position: relative;
        display: inline-block;
        background: #fff;
    }

    label.tree_label { cursor: pointer; }

    label.tree_label:hover { color: #666; }

    /* ————————————————————–
      Tree expanded icon
    */
    label.tree_label:before {
        background: #099C7F;
        color: #fff;
        position: relative;
        z-index: 1;
        float: left;
        margin: 0 1em 0 -2em;
        width: 1.2em;
        height: 1.2em;
        border-radius: 1em;
        content: '+';
        text-align: center;
        line-height: .9em;
    }

    :checked ~ label.tree_label:before { content: '–'; }
    :checked ~ label.tree_label i.fa:before { color: #2C398E;}


    /* ————————————————————–
      Tree branches
    */
    :checked ~ i.fa-folder-open:before {
        color: #2C398E;
    }
    .fa.fa-suitcase:before{
        color: #099C7F;
    }
    .fa.fa-suitcase.fa-form-title:before{
        color: #2C398E;
    }
    .fa-folder-open:before {
        color: #099C7F;
    }
    .fa.fa-plane:before{
        color: #2C398E;
    }
    .tree li:before {
        position: absolute;
        top: 0;
        bottom: 0;
        left: -.5em;
        display: block;
        width: 0;
        border-left: 1px solid #777;
        content: "";
    }

    .tree_label:after {
        position: absolute;
        top: 0;
        left: -1.5em;
        display: block;
        height: 0.5em;
        width: 1em;
        border-bottom: 1px solid #777;
        border-left: 1px solid #777;
        border-radius: 0 0 0 .3em;
        content: '';
    }

    label.tree_label:after { border-bottom: 0; }

    :checked ~ label.tree_label:after {
        border-radius: 0 .3em 0 0;
        border-top: 1px solid #777;
        border-right: 1px solid #777;
        border-bottom: 0;
        border-left: 0;
        bottom: 0;
        top: 0.5em;
        height: auto;
    }

    .tree li:last-child:before {
        height: 1em;
        bottom: auto;
    }

    .tree > li:last-child:before { display: none; }

    .tree_custom {
        display: block;
        background: #eee;
        padding: 1em;
        border-radius: 0.3em;
    }
    .pre-scrollable {
        max-height: 400px;
        overflow-y: scroll;
    }
    .titulo{
        text-align: center;
        color: #009577;
    }
    .conten-img{
        margin: auto;
        width: 50%;
        height: 30%;
        padding: 10px;
        margin-top: 5%;
    }
    .conten-img-title{
        text-align: center;
        color: #009577;
        margin-top: 10%;
        font-weight: bold;
        font-size: 16px;
    }
    .add_project_back{
        background-color: #099C7F;
        color: white;
        border-radius: 15px;
        width: 50%;
        height: 50%;
        text-align: center;
    }



    .input-group-btn .btn-group {
        display: flex !important;
    }
    .btn-group .btn {
        border-radius: 0;
        margin-left: -1px;
    }
    .btn-group .btn:last-child {
        border-top-right-radius: 4px;
        border-bottom-right-radius: 4px;
    }
    .btn-group .form-horizontal .btn[type="submit"] {
        border-top-left-radius: 4px;
        border-bottom-left-radius: 4px;
    }


    @media screen and (min-width: 768px) {
        #adv-search {

            margin: 0 auto;
        }
        .dropdown.dropdown-lg {
            position: static !important;
        }
        .dropdown.dropdown-lg .dropdown-menu {
            min-width: 500px;
        }
    }
    .add_project{
        cursor: pointer;
        color: white;
    }
    .panel-title{
        margin-top: 0;
        margin-bottom: 0;
        font-size: 20px;
        color: #009577;
    }
    .label-form{
        color: #2C398E;
    }
    .form-group {
        margin-bottom: 9px;
    }
    input.form-control{
        background: transparent;
        display: block;
        width: 100%;
        height: 34px;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        color: black;
        background-image: none;
        border: 1px solid #2C398E;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
        box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
        -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
        -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
        transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    }
    textarea.form-control{
        background: transparent;
        border: 1px solid #2C398E;
        color: black;
    }
    select.form-control{
        border: 1px solid #2C398E;
        color: black;
        background: transparent;
    }
    .btn-save{
        background-color: #E97A70;
        color: white;
    }
    .content-plus{

        font-size: 30px;
        cursor: pointer;
    }

</style>

<script>
    function isNumber(n) {
        return !isNaN(parseFloat(n)) && isFinite(n);
    }

    function setFontSize(el) {
        var fontSize = el.val();

        if ( isNumber(fontSize) && fontSize >= 0.5 ) {
            $('body').css({ fontSize: fontSize + 'em' });
        } else if ( fontSize ) {
            el.val('1');
            $('body').css({ fontSize: '1em' });
        }
    }

    $(function() {

        $('#fontSize')
            .bind('change', function(){ setFontSize($(this)); })
            .bind('keyup', function(e){
                if (e.keyCode == 27) {
                    $(this).val('1');
                    $('body').css({ fontSize: '1em' });
                } else {
                    setFontSize($(this));
                }
            });

        $(window)
            .bind('keyup', function(e){
                if (e.keyCode == 27) {
                    $('#fontSize').val('1');
                    $('body').css({ fontSize: '1em' });
                }
            });

    });
</script>
<br><br>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 ">
                <h3 class="titulo"> <i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i> PROYECTOS, SUBPROYECTOS Y VIAJE. </h3>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 ">
                <div class="panel panel-default" style="background: transparent; border-color: transparent;">
                    <div class="col-md-4">
                        <div class="conten-img">
                            <img alt="User Pic" src="{{ Session::get('img') }}" class="img-circle img-responsive img-profile">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="conten-img-title">
                            Usuario: {{ Session::get('name').'  '.Session::get('lastName') }}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-10">
                            <div class="input-group" id="adv-search">
                                <input type="text" class="form-control" placeholder="Search for snippets" />
                                <div class="input-group-btn">
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn">
                                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <span class="icon-mas add_new_project" style="font-size: 30px; cursor: pointer;">
                                    <span class="path1"></span><span class="path2"></span>
                                </span>
                        </div>
                    </div>
                    <div class="panel-body pre-scrollable" id="list_project">
                        <ul class="tree">
                            @foreach($data as $dat)
                                <li>
                                    <input type="checkbox" id="p-{{ $dat['project']['id'] }}" />
                                    <label data-type="1" data-id="{{ $dat['project']['id'] }}" class="tree_label" for="p-{{ $dat['project']['id'] }}">
                                        <i class="fa fa-suitcase" aria-hidden="true"></i>
                                        {{ $dat['project']['name'] }}
                                    </label>
                                    <?php //dd($dat); ?>
                                    <ul>
                                        @foreach($dat['subproject'] as $dats)
                                        <li>
                                            <input type="checkbox" id="s-{{  $dats['id'] }}" />
                                            <label  data-type="2"  data-id="{{ $dats['id'] }}" class="tree_label" for="s-{{$dats['id']}}">
                                                <i class="fa fa-folder-open" aria-hidden="true"></i> {{ $dats['name'] }}
                                            </label>
                                            <ul>
                                                @foreach($dat['travel'] as $datr)
                                                <li>
                                                    <i class="fa fa-plane" style="color: #2C398E;" aria-hidden="true"></i>
                                                    <span class="tree_label" data-type="3" data-id="{{ $datr['id'] }}" style="cursor: pointer;">{{ $datr['name'] }}</span>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                                @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 ">
                <!-- Inicio de panel project -->
                <div class="panel_project">
                    <div class="panel panel-default" style="background: transparent; border-color: #099C7F;">
                        <div class="panel-heading"  style="background: transparent;border-color: transparent;">
                            <h3 class="panel-title"> <i class="fa icon-proyectos fa-form-title" aria-hidden="true"></i>  Proyectos </h3>
                        </div>
                        <div class="panel-body">
                            {{ Form::open(['id'=>'form_project_id','class' => 'form-horizontal']) }}
                            <div class='form-group'>
                                <label class='control-label label-form col-md-2'>Nombre:</label>
                                <div class="col-md-10">
                                    <input type='hidden' name='id' class="" id='txt_pro_id' class="">
                                    <input type='hidden' name='type' class="" id='txt_type' class="" value='1'>
                                    {{ Form::text('nombre','',['class' => 'form-control','id'=>'txt_pro_name']) }}
                                </div>
                            </div>
                            <div class='form-group'>
                                <label class='control-label label-form col-md-2'>Descripcion</label>
                                <div class="col-md-10">
                                    {{ Form::textarea('descripcion','',['class' => 'form-control','id'=>'txt_pro_descr']) }}
                                </div>
                            </div>
                            <div class='form-group'>
                                <label class='control-label label-form col-md-2'>Status</label>
                                <div class="col-md-10">
                                    {{ Form::select('activo', array('1' => 'Activo', '0' => 'Inactivo'), 1,['class' => 'form-control','id'=>'txt_pro_activo']) }}
                                </div>
                            </div>
                            <div class='form-group info_user_pro hidden'>
                                <label class='control-label label-user-project label-form col-xs-6'>Autor: {{ "Ricardo Lugo" }}</label>
                                <div class="col-xs-6">
                                    <label class='control-label label-name-subproject label-form fecha-pro'> Fecha : </label>
                                </div>
                            </div>
                            <div class='form-group'>
                                <div class="col-md-12">
                                    <input type='button' data-type='1' id='register_project' value='Registrar' class='save btn btn-sm btn-save pull-right'>
                                </div>
                            </div>
                            {{ Form::close() }}
                            <div class="form-group pull-right content-plus" id="content-plus-project">
                            <span class="icon-mas">
                                    <span class="path1"></span><span class="path2"></span>
                            </span>
                                <i class="icon-subproyectos_verde" > </i>

                            </div>
                        </div>

                    </div>
                </div>
                <!-- fin d epanel project-->


                <!-- inicio de panel subprojecto-->
                <div class="panel_sub_project hidden">
                    <div class="panel panel-default" style="background: transparent; border-color: #099C7F;">
                        <div class="panel-heading"  style="background: transparent;border-color: transparent;">
                            <h3 class="panel-title"> <i class="fa icon-subproyectos fa-form-title" aria-hidden="true"></i> Sub Proyectos </h3>
                        </div>
                        <div class="panel-body">
                            {{ Form::open(['id'=>'form_subproject_id','class' => 'form-horizontal']) }}
                                <div class='form-group'>
                                    <label class='control-label label-form col-md-2'>Proyecto</label>
                                    <input type="" id="txt_subproject_id" name="id">
                                    <input type="" id="txt_project_id_subproject" name="project_id">
                                    <div class="col-md-10">
                                        <label class='control-label label-name-project label-form' id="label_name_project">Proyecto</label>
                                    </div>
                                </div>
                                <div class='form-group'>
                                    <label class='control-label label-form col-md-2'>Nombre:</label>
                                    <div class="col-md-10">
                                        {{ Form::text('nombre','',['class' => 'form-control','id'=>'txt_subpro_name']) }}
                                    </div>
                                </div>
                                <div class='form-group'>
                                    <label class='control-label label-form col-md-2'>Descripcion</label>
                                    <div class="col-md-10">
                                        {{ Form::textarea('descripcion','',['class' => 'form-control','id'=>'txt_subpro_descr']) }}
                                    </div>
                                </div>
                                <div class='form-group'>
                                    <label class='control-label label-form col-md-2'>Status</label>
                                    <div class="col-md-10">
                                        {{ Form::select('activo', array('1' => 'Activo', '0' => 'Inactivo'), 1,['class' => 'form-control','id'=>'txt_subpro_activo']) }}
                                    </div>
                                </div>
                                <div class='form-group info_user_subpro hidden'>
                                    <label class='control-label label-user-subproject label-form col-xs-6'>Autor: {{ "Ricardo Lugo" }}</label>
                                    <div class="col-xs-6">
                                        <label class='control-label label-name-subproject label-form fecha-subpro'> Fecha : </label>
                                    </div>
                                </div>
                                <div class='form-group'>
                                    <div class="col-md-12">
                                        <input type='button'  id='register_subproject'  value='Registrar' class='save btn btn-sm btn-save pull-right'>
                                    </div>
                                </div>

                            {{ Form::close() }}
                            <div class="form-group pull-right content-plus hidden" id="content-plus-subproject">
                                <span class="icon-mas">
                                    <span class="path1"></span><span class="path2"></span>
                                </span>
                                <i class="icon-viaje_verde" > </i>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- fin de panel subproject -->


                <!-- inicio panel viaje -->
                <div class="panel_viaje hidden">
                    <div class="panel panel-default" style="background: transparent; border-color: #099C7F;">
                        <div class="panel-heading"  style="background: transparent;border-color: transparent;">
                            <h3 class="panel-title"> <i class="fa icon-viaje fa-form-title" aria-hidden="true"></i> Viajes </h3>
                        </div>
                        <div class="panel-body">
                            {{ Form::open(['id'=>'form_travel_id','class' => 'form-horizontal']) }}
                            <div class='form-group'>
                                <input type="" id="txt_travel_id" name="id">
                                <input type="" id="txt_travel_id_project" name="project_id">
                                <input type="" id="txt_travel_id_subproject" name="subproject_id">

                                <label class='control-label label-form col-md-3'>Proyecto</label>
                                <div class="col-md-9">
                                    <label class='control-label label-name-project label-form'>Proyecto</label>
                                </div>
                            </div>
                            <div class='form-group'>
                                <label class='control-label label-form col-md-3'>Sub Proyecto</label>
                                <div class="col-md-9">
                                    <label class='control-label label-name-subproject label-form'>Sub Proyecto</label>
                                </div>
                            </div>
                            <div class='form-group'>
                                <label class='control-label label-form col-md-3'>Nombre del Viaje</label>
                                <div class="col-md-9">
                                    {{ Form::text('nombre','',['class' => 'form-control','id'=>'txt_travel_name']) }}
                                </div>
                            </div>

                            <div class='form-group'>
                                <label class='control-label label-form col-md-3'>Descripcion</label>
                                <div class="col-md-9">
                                    {{ Form::textarea('descripcion','',['class' => 'form-control','id'=>'txt_travel_descr']) }}
                                </div>
                            </div>
                            <div class='form-group'>
                                <label class='control-label label-form col-md-3'>Status</label>
                                <div class="col-md-9">
                                    {{ Form::select('activo', array('1' => 'Activo', '0' => 'Inactivo'), 1,['class' => 'form-control','id'=>'txt_travel_activo']) }}
                                </div>
                            </div>
                            <div class='form-group info_user_travel hidden'>
                                <label class='control-label label-user-travel label-form col-xs-6'>Autor: {{ "Ricardo Lugo" }}</label>
                                <div class="col-xs-6">
                                    <label class='control-label label-form fecha-travel'> Fecha : </label>
                                </div>
                            </div>
                            <div class='form-group'>
                                <div class="col-md-12">
                                    <input type='button' data-type='1' value='Registrar' id="register_travel" class='save btn btn-sm btn-save pull-right'>
                                </div>
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
                <!-- fin del panel viaje -->
            </div>
        </div>
    </div>


<br><br><br>

<script>
    $(document).ready(function(){
        clearFormProject();
        $('#register_project').unbind().bind('click',function(){
            $datForm = $('#form_project_id').serialize();
            $.ajax({
                url:"{{ route('project.store') }}",
                type:'POST',
                data : $datForm,
                dataType: 'json',
                success:function(data){
                    if(data.success){
                        ListProject();
                    }
                },error:function(){
                    alert('Upps lo sentimos mucho, intente mas tarde');
                }
            });

        });

        $('#register_subproject').unbind().bind('click',function(){
            $formSubproject = $('#form_subproject_id').serialize();
            $.ajax({
                url:'{{ route("subproject.store") }}',
                data: $formSubproject,
                type:'POST',
                dataType: 'json',
                success:function(data){
                    ListProject();
                },error:function(data){
                    alert('Upps lo sentimos mucho, intente mas tarde');
                }
            });
        });

        $('#register_travel').unbind().bind('click',function(){
            $formTravel = $('#form_travel_id').serialize();
            $.ajax({
                url:'{{ route("travel.store") }}',
                data: $formTravel,
                type:'POST',
                dataType: 'json',
                success:function(data){
                    ListProject();
                },error:function(data){
                    alert('Upps lo sentimos mucho, intente mas tarde');
                }
            });
        });

        $('.add_new_project').unbind().bind('click',function(){
            clearFormProject();
        });

        $('#content-plus-project').unbind().bind('click',function(){
            clearFormSubProject();
        });
        $('#content-plus-subproject').unbind().bind('click',function(){
            clearFormTravel();
        });

        $('.tree_label').unbind().bind('click',function(){
            $data_type = $(this).attr('data-type');
            $id = $(this).attr('data-id');
            $route="";
            switch(parseInt($data_type)){
                case 1:
                    $route = "{{ url('project/') }}"+"/"+$id;
                    $('#content-plus-project').removeClass('hidden');
                    break;
                case 2:
                    $route = "{{ url('subproject/') }}"+"/"+$id;
                    $('#content-plus-subproject').removeClass('hidden');
                    break;
                case 3:
                    $route = "{{ url('travel/') }}"+"/"+$id;

                    break;
                default:
            }

            $.ajax({
                url : $route,
                type:'GET',
                dataType: 'json',
                success:function(data){
                    switch(parseInt($data_type)){
                        case 1:
                            fillFormProject(data);
                            break;
                        case 2:
                            fillFormSubProject(data)
                            break;
                        case 3:
                            fillFormTravel(data);
                            break;
                        default:
                    }

                },error:function(data){
                    alert('Upps lo sentimos mucho, intente mas tarde');
                }
            });

        });
    });

    function clearFormSubProject(){
        $project_id = $('#txt_pro_id').val();
        $name_project = $('#txt_pro_name').val();
        console.log($project_id);
        console.log($name_project);
        $('.label-name-project').text($name_project);
        $('#txt_project_id_subproject').val($project_id);
        $('.panel_project').addClass('hidden');
        $('.panel_sub_project').removeClass('hidden');
    }

    function clearFormTravel(){
        $('.panel_viaje').removeClass('hidden');
        $('.panel_project').addClass('hidden');
        $('.panel_sub_project').addClass('hidden');
        $subprojectId = $('#txt_subproject_id').val();
        $nameSubproject = $('#txt_subpro_name').val();
        $projectId = $('#txt_project_id_subproject').val();
        $nameProject = $('#label_name_project').text();
        $('.label-name-project').text($nameProject);
        $('#txt_travel_id_project').val($projectId);
        $('#txt_travel_id_subproject').val($subprojectId);
        $('.label-name-subproject').text($nameSubproject);
    }

    function fillFormProject(data){
        $('.info_user_pro').removeClass('hidden')
        $('#txt_pro_id').val(data.project.id);
        $('#txt_pro_name').val(data.project.name);
        $('#txt_pro_descr').val(data.project.description);
        $('#txt_pro_activo option[value="'+data.project.active+'"]').attr("selected", "selected");
        $('.fecha-pro').text('Fecha: '+data.project.created_at);
        $('.label-user-project').text('Autor: '+ data.user.original.data.name+ ' '+data.user.original.data.las_name);
        $('.panel_sub_project').addClass('hidden');
        $('.panel_viaje').addClass('hidden');
        $('.panel_project').removeClass('hidden');
    }

    function fillFormSubProject(data){
        $('.info_user_subpro').removeClass('hidden');
        $('#txt_subproject_id').val(data.subproject.id);
        $('#txt_project_id_subproject').val(data.subproject.project_id);
        $('.label-name-project').text(data.project.name);
        $('#txt_subpro_name').val(data.subproject.name);
        $('#txt_subpro_descr').val(data.subproject.description);
        $('#txt_subpro_activo option[value="'+data.subproject.active+'"]').attr("selected", "selected");
        $('.fecha-subpro').text('Fecha: '+data.subproject.created_at);
        $('.label-user-subproject').text('Autor: '+ data.user.original.data.name+ ' '+data.user.original.data.las_name);
        $('.panel_sub_project').removeClass('hidden');
        $('.panel_viaje').addClass('hidden');
        $('.panel_project').addClass('hidden');
    }

    function clearFormProject(){
        $('.info_user_pro').addClass('hidden')
        $('#txt_pro_id').val('');
        $('#txt_pro_name').val('');
        $('#txt_pro_descr').val('');
        $('#txt_pro_activo option[value=1]').attr("selected",true);
        $('#txt_pro_activo option[value=0]').attr("selected",false);
        $('.fecha-pro').text('Fecha: ');
        $('.panel_project').removeClass('hidden');
        $('.panel_sub_project').addClass('hidden');
        $('.panel_viaje').addClass('hidden');
        $('#content-plus-project').addClass('hidden');
    }

    function fillFormTravel(data) {
        $('.info_user_travel').removeClass('hidden')
        $('#txt_travel_id').val(data.travel.id);
        $('#txt_travel_name').val(data.travel.name);
        $('#txt_travel_descr').val(data.travel.description);
        $('#txt_travel_activo option[value="'+data.travel.active+'"]').attr("selected", "selected");
        $('#txt_travel_id_project').val(data.project.id);
        $('#txt_travel_id_subproject').val(data.subproject.id);
        $('.fecha-travel').text('Fecha: '+data.travel.created_at);
        $('.label-user-travel').text('Autor: '+ data.user.original.data.name+ ' '+data.user.original.data.las_name);
        $('.label-name-project').text(data.project.name);
        $('.label-name-subproject').text(data.subproject.name);
        $('.panel_sub_project').addClass('hidden');
        $('.panel_viaje').removeClass('hidden');
        $('.panel_project').addClass('hidden');
    }

    
    function ListProject() {
        $.ajax({
            url : "{{ route('list_project') }} ",
            type:'GET',
            success:function(data){

                $('#list_project').html(data);
            },error:function(data){

            }
        });
        
    }

</script>

</body>
</html>