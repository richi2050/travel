@extends('layouts.app')

@section('content')
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
        .fa:before{
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
            max-height: 460px;
            overflow-y: scroll;
        }

    </style>
    <br><br>


    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 ">
                <div class="panel panel-default ">
                        <div class="col-md-8 col-md-offset-8">
                            <i class="fa fa-plus fa-2x add_project"  style="cursor: pointer;"></i>
                        </div>
                    <div class="panel-body pre-scrollable">
                        <ul class="tree">
                            @foreach($projects as $pro)
                            <li>
                                <input type="checkbox" id="p-{{$pro['proyectos']['id']}}" />
                                <label class="tree_label" data-type="1" for="p-{{$pro['proyectos']['id']}}" data-id="{{$pro['proyectos']['id']}}">
                                    <i class="fa fa-suitcase " aria-hidden="true"></i> {{ $pro['proyectos']['name'] }}
                                </label>
                                @foreach($pro['sub_proyectos'] as $sup)
                                    <ul>
                                        <li>
                                            <input type="checkbox"  id="s-{{ $sup['id'] }}" />
                                            <label for="s-{{ $sup['id'] }}" data-type="2" class="tree_label" data-id="{{ $sup['id'] }}">
                                                <i class="fa fa-folder-open" aria-hidden="true"></i>   {{ $sup['name'] }}
                                            </label>
                                            @foreach($pro['travel'] as $tra)
                                                <ul>
                                                    <li>
                                                        <i class="fa fa-plane" style="color: #2C398E;" aria-hidden="true"></i>
                                                        <span class="tree_label" data-type="3" data-id="{{ $tra['id'] }}" style="cursor: pointer;">{{ $tra['name'] }}</span>
                                                    </li>
                                                </ul>
                                            @endforeach
                                        </li>
                                    </ul>
                                @endforeach
                            </li>
                             @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"> Crear Proyecto</h3>
                    </div>
                    <div class="panel-body">
                        {{ Form::open(['id'=>'form_id']) }}
                        <div class='form-group required'>
                            <label for="" class="control-label">Nombre:</label>
                            {{ Form::text('nombre','',['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">Descripcion</label>
                            {{ Form::textarea('descripcion','',['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">Activo</label>
                            {{ Form::select('activo', array('1' => 'Activo', '0' => 'Inactivo'), 1) }}
                        </div>
                        <div class="form-group">
                            <input type="button" value="Guardar" class="btn btn-sm btn-success">
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>


            <div id="script">
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

                    $(document).ready(function(){
                        $('.add_project').unbind().bind('click', function(){
                            alert('add project');
                            $('#form_id').html();

                            $('#form_id').html(formProject());
                        });


                        $('.tree_label').unbind().bind('click', function(){
                            $data_type = $(this).attr('data-type');
                            $id = $(this).attr('data-id');
                            $route="";
                            switch(parseInt($data_type)){
                                case 1:
                                    $route = "{{ url('project/') }}"+"/"+$id;
                                    break;
                                case 2:
                                    $route = "{{ url('sub_project/') }}"+"/"+$id;
                                    break;
                                case 3:
                                    $route = "{{ url('travel/') }}"+"/"+$id;
                                    break;
                                default:
                            }


                            alert($route);

                            $.ajax({
                                url : $route,
                                type:'GET',
                                dataType: 'json',
                                success:function(data){
                                    console.log(data.user);

                                },error:function(data){

                                }
                            });



                        });
                    });

                    function formProject(){
                        $html='';
                        $html +='{{ Form::open(['id'=>'form_id']) }}'+
                            "<div class='form-group'>" +
                            "<label class='control-label'>Nombre:</label>"+
                                '{{ Form::text('nombre','',['class' => 'form-control']) }}'+
                            "</div> <div class='form-group'>"+
                            "<label  class='control-label'>Descripcion</label>"+
                                '{{ Form::textarea('descripcion','',['class' => 'form-control']) }}'+
                            "</div>"+
                            "<div class='form-group'>"+
                            "<label class='control-label'>Activo</label>"+
                                '{{ Form::select('activo', array('1' => 'Activo', '0' => 'Inactivo'), 1) }}'+
                            "</div>"+
                            "<div class='form-group'>"+
                            "<input type='button' value='Guardar' class='btn btn-sm btn-success'>"+
                            "</div>"+
                            '{{ Form::close() }}';
                            return $html;
                    }
                </script>
            </div>

    {{--<a href="#" id="Element"> Este es a crear </a>--}}
@endsection