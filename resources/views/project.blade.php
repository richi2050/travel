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
<br><br><br>

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 ">
                <div class="panel panel-default ">
                    <div class="col-md-8 col-md-offset-8">
                        <i class="fa fa-plus fa-2x add_project"  style="cursor: pointer;"></i>
                    </div>
                    <div class="panel-body pre-scrollable" id="list_project">
                        <ul class="tree">
                            <!--
                            <li>
                                <input type="checkbox" id="c1" />
                                <label class="tree_label" for="c1">Level 0</label>
                                <ul>
                                    <li>
                                        <input type="checkbox" id="c2" />
                                        <label for="c2" class="tree_label">Level 1</label>
                                        <ul>
                                            <li><span class="tree_label">Level 2</span></li>
                                            <li><span class="tree_label">Level 2</span></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="c3" />
                                        <label for="c3" class="tree_label">Looong level 1 <br/>label text <br/>with line-breaks</label>
                                        <ul>
                                            <li><span class="tree_label">Level 2</span></li>
                                            <li>
                                                <input type="checkbox" id="c4" />
                                                <label for="c4" class="tree_label"><span class="tree_custom">Specified tree item view</span></label>
                                                <ul>
                                                    <li><span class="tree_label">Level 3</span></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <input type="checkbox" id="c5" />
                                <label class="tree_label" for="c5">Level 0</label>
                                <ul>
                                    <li>
                                        <input type="checkbox" id="c6" />
                                        <label for="c6" class="tree_label">Level 1</label>
                                        <ul>
                                            <li><span class="tree_label">Level 2</span></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="c7" />
                                        <label for="c7" class="tree_label">Level 1</label>
                                        <ul>
                                            <li><span class="tree_label">Level 2</span></li>
                                            <li>
                                                <input type="checkbox" id="c8" />
                                                <label for="c8" class="tree_label">Level 2</label>
                                                <ul>
                                                    <li><span class="tree_label">Level 3</span></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            -->
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
                                            <input type="checkbox" id="s-{{$dats['id']}}" />
                                            <label  data-type="2" class="tree_label" for="s-{{$dats['id']}}">
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
            <div class="col-sm-6 col-md-6 panel_box">
                <div class="panel_cover">
                    Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.
                </div>
            </div>
        </div>
    </div>


<br><br><br>

<script>
    $(document).ready(function(){
        $('.tree_label').unbind().bind('click',function(){
            $data_type = $(this).attr('data-type');
            $id = $(this).attr('data-id');
            $route="";
            console.log($data_type);
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

            $.ajax({
                url : $route,
                type:'GET',
                dataType: 'json',
                success:function(data){
                    switch(parseInt($data_type)){
                        case 1:
                            formProject();
                            formAutoProject(data);
                            break;
                        case 2:
                            $route = "{{ url('sub_project/') }}"+"/"+$id;
                            break;
                        case 3:
                            $route = "{{ url('travel/') }}"+"/"+$id;
                            break;
                        default:
                    }

                },error:function(data){

                }
            });


        });
    });
</script>

</body>
</html>